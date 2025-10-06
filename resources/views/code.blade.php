{{-- FILE: resources/views/code.blade.php --}}
<section id="code" class="py-20 bg-gray-50">
  <div class="max-w-5xl mx-auto px-6">
    <h2 class="text-4xl font-light text-gray-800 text-center mb-4 tracking-wide animate-on-scroll fade-in-up">Kode Project IoT</h2>
    <p class="text-center text-gray-600 mb-12 animate-on-scroll fade-in-up" style="animation-delay: 0.1s">Source code untuk ESP32 dan monitoring system</p>

    <!-- Code Tabs -->
    <div class="bg-white rounded-2xl shadow-sm overflow-hidden mb-6 animate-on-scroll fade-in-up" style="animation-delay: 0.2s">
      <div class="flex border-b border-gray-200">
        <button class="code-tab px-6 py-3 text-sm font-medium bg-gray-800 text-white transition" data-tab="arduino">ESP32 Arduino</button>
        <button class="code-tab px-6 py-3 text-sm font-medium text-gray-600 hover:bg-gray-50 transition" data-tab="python">Python Backend</button>
      </div>
      <div class="p-6">
        <!-- Arduino Code -->
        <div id="code-arduino" class="code-content">
          <pre><code class="language-cpp">#include &lt;WiFi.h&gt;
#include &lt;DHT.h&gt;
#include &lt;PubSubClient.h&gt;

// Pin Definitions
#define DHTPIN 4
#define SOIL_MOISTURE_PIN 34
#define RELAY_PIN 2

// WiFi Credentials
const char* ssid = "YourWiFi";
const char* password = "YourPassword";

// MQTT Server
const char* mqtt_server = "broker.example.com";
const int mqtt_port = 1883;

DHT dht(DHTPIN, DHT22);
WiFiClient espClient;
PubSubClient client(espClient);

void setup() {
  Serial.begin(115200);
  pinMode(RELAY_PIN, OUTPUT);
  
  // Connect to WiFi
  WiFi.begin(ssid, password);
  while (WiFi.status() != WL_CONNECTED) {
    delay(1000);
    Serial.println("Connecting to WiFi...");
  }
  Serial.println("Connected to WiFi!");
  
  // Setup MQTT
  client.setServer(mqtt_server, mqtt_port);
  
  dht.begin();
  Serial.println("IoT Agriculture System Ready!");
}

void reconnectMQTT() {
  while (!client.connected()) {
    if (client.connect("ESP32_AgriTech")) {
      Serial.println("MQTT Connected!");
      client.subscribe("agritech/control");
    } else {
      delay(5000);
    }
  }
}

void loop() {
  if (!client.connected()) {
    reconnectMQTT();
  }
  client.loop();
  
  // Read sensor data
  float temperature = dht.readTemperature();
  float humidity = dht.readHumidity();
  int soilMoisture = analogRead(SOIL_MOISTURE_PIN);
  
  // Auto irrigation control
  if (soilMoisture < 500) {
    digitalWrite(RELAY_PIN, HIGH);
    Serial.println("Irrigation: ON");
  } else {
    digitalWrite(RELAY_PIN, LOW);
    Serial.println("Irrigation: OFF");
  }
  
  // Publish data to MQTT
  String payload = String(temperature) + "," + 
                   String(humidity) + "," + 
                   String(soilMoisture);
  client.publish("agritech/sensors", payload.c_str());
  
  Serial.printf("Temp: %.1f°C | Humidity: %.1f%% | Soil: %d\n", 
                temperature, humidity, soilMoisture);
  
  delay(5000); // Read every 5 seconds
}</code></pre>
        </div>

        <!-- Python Code -->
        <div id="code-python" class="code-content hidden">
          <pre><code class="language-python">from flask import Flask, jsonify, request
from flask_cors import CORS
import paho.mqtt.client as mqtt
import mysql.connector
from datetime import datetime
import json

app = Flask(__name__)
CORS(app)

# Database Configuration
db_config = {
    'host': 'localhost',
    'user': 'root',
    'password': 'password',
    'database': 'agritech_db'
}

# MQTT Configuration
MQTT_BROKER = "broker.example.com"
MQTT_PORT = 1883
MQTT_TOPIC = "agritech/sensors"

# Global variable for latest sensor data
latest_data = {
    'temperature': 0,
    'humidity': 0,
    'soil_moisture': 0,
    'timestamp': None
}

def on_connect(client, userdata, flags, rc):
    print(f"Connected to MQTT Broker with code: {rc}")
    client.subscribe(MQTT_TOPIC)

def on_message(client, userdata, msg):
    global latest_data
    try:
        # Parse sensor data
        data = msg.payload.decode().split(',')
        temp, humidity, soil = float(data[0]), float(data[1]), int(data[2])
        
        latest_data = {
            'temperature': temp,
            'humidity': humidity,
            'soil_moisture': soil,
            'timestamp': datetime.now().isoformat()
        }
        
        # Save to database
        save_to_database(temp, humidity, soil)
        print(f"Data received: {latest_data}")
        
    except Exception as e:
        print(f"Error processing message: {e}")

def save_to_database(temp, humidity, soil):
    try:
        conn = mysql.connector.connect(**db_config)
        cursor = conn.cursor()
        
        query = """INSERT INTO sensor_data 
                   (temperature, humidity, soil_moisture, timestamp) 
                   VALUES (%s, %s, %s, %s)"""
        values = (temp, humidity, soil, datetime.now())
        
        cursor.execute(query, values)
        conn.commit()
        cursor.close()
        conn.close()
        
    except Exception as e:
        print(f"Database error: {e}")

# Initialize MQTT Client
mqtt_client = mqtt.Client()
mqtt_client.on_connect = on_connect
mqtt_client.on_message = on_message
mqtt_client.connect(MQTT_BROKER, MQTT_PORT, 60)
mqtt_client.loop_start()

# API Endpoints
@app.route('/api/latest', methods=['GET'])
def get_latest_data():
    return jsonify(latest_data)

@app.route('/api/history', methods=['GET'])
def get_history():
    try:
        conn = mysql.connector.connect(**db_config)
        cursor = conn.cursor(dictionary=True)
        
        cursor.execute("""
            SELECT * FROM sensor_data 
            ORDER BY timestamp DESC 
            LIMIT 100
        """)
        
        results = cursor.fetchall()
        cursor.close()
        conn.close()
        
        return jsonify(results)
        
    except Exception as e:
        return jsonify({'error': str(e)}), 500

@app.route('/api/control', methods=['POST'])
def control_device():
    data = request.json
    action = data.get('action')
    
    if action in ['irrigation_on', 'irrigation_off']:
        mqtt_client.publish('agritech/control', action)
        return jsonify({'status': 'success', 'action': action})
    
    return jsonify({'status': 'error', 'message': 'Invalid action'}), 400

if __name__ == '__main__':
    app.run(host='0.0.0.0', port=5000, debug=True)</code></pre>
        </div>
      </div>
    </div>

    <!-- GitHub Link -->
    <div class="text-center animate-on-scroll fade-in-up" style="animation-delay: 0.3s">
      <a href="https://github.com/agritech-iot/project" target="_blank" class="inline-flex items-center gap-2 px-6 py-3 bg-gray-800 text-white rounded-full hover:bg-gray-700 transition">
        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
          <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
        </svg>
        Lihat Full Code di GitHub
      </a>
    </div>

    <!-- Documentation -->
    <div class="mt-12 grid md:grid-cols-2 gap-6">
      <div class="bg-white rounded-xl p-6 border border-gray-200 animate-on-scroll fade-in-left" style="animation-delay: 0.4s">
        <h3 class="text-lg font-semibold text-gray-800 mb-3">📦 Hardware Requirements</h3>
        <ul class="space-y-2 text-sm text-gray-600">
          <li>• ESP32 Development Board</li>
          <li>• DHT22 Temperature & Humidity Sensor</li>
          <li>• Soil Moisture Sensor</li>
          <li>• 5V Relay Module</li>
          <li>• Water Pump (12V)</li>
        </ul>
      </div>
      <div class="bg-white rounded-xl p-6 border border-gray-200 animate-on-scroll fade-in-right" style="animation-delay: 0.4s">
        <h3 class="text-lg font-semibold text-gray-800 mb-3">⚙️ Software Stack</h3>
        <ul class="space-y-2 text-sm text-gray-600">
          <li>• Arduino IDE / PlatformIO</li>
          <li>• Python Flask (Backend)</li>
          <li>• MySQL Database</li>
          <li>• React.js (Dashboard)</li>
          <li>• MQTT Protocol</li>
        </ul>
      </div>
    </div>
  </div>
</section>

{{-- Script khusus untuk Code Section (Tab Switching & Syntax Highlighting) --}}
<script>
  // Code Tab Switching
  const codeTabs = document.querySelectorAll('.code-tab');
  const codeContents = document.querySelectorAll('.code-content');

  codeTabs.forEach(tab => {
    tab.addEventListener('click', () => {
      const tabName = tab.getAttribute('data-tab');
      
      // Remove active class from all tabs
      codeTabs.forEach(t => {
        t.classList.remove('bg-gray-800', 'text-white');
        t.classList.add('text-gray-600', 'hover:bg-gray-50');
      });
      
      // Add active class to clicked tab
      tab.classList.add('bg-gray-800', 'text-white');
      tab.classList.remove('text-gray-600', 'hover:bg-gray-50');
      
      // Hide all code contents
      codeContents.forEach(content => {
        content.classList.add('hidden');
      });
      
      // Show selected code content
      document.getElementById(`code-${tabName}`).classList.remove('hidden');
      
      // Re-highlight code syntax
      hljs.highlightAll();
    });
  });

  // Initialize syntax highlighting on page load
  hljs.highlightAll();
</script>