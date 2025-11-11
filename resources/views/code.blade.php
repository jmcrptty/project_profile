{{-- FILE: resources/views/code.blade.php --}}
@php
    $code = App\Models\Code::first();
@endphp

<section id="code" class="py-20 bg-white">
  <div class="max-w-[1500px] mx-auto px-6">
    <h2 class="text-4xl font-light text-gray-800 text-center mb-4 tracking-wide animate-on-scroll fade-in-up"> Preview Kode Project IoT</h2>
    <p class="text-center text-gray-600 mb-12 animate-on-scroll fade-in-up" style="animation-delay: 0.1s">Source code Smart Farming</p>

    <!-- Code Tabs -->
    <div class="bg-white rounded-2xl shadow-lg overflow-hidden mb-6 animate-on-scroll fade-in-up border border-gray-200" style="animation-delay: 0.2s">
      <div class="flex border-b border-gray-200">
        <button class="code-tab px-6 py-3 text-sm font-medium bg-blue-600 text-white transition" data-tab="arduino">Offline</button>
        <button class="code-tab px-6 py-3 text-sm font-medium text-gray-600 hover:bg-gray-50 hover:text-gray-800 transition" data-tab="python">Online</button>
      </div>
      <div class="p-6">
        <!-- Arduino Code -->
        <div id="code-arduino" class="code-content">
          <div class="bg-gray-50 rounded-lg overflow-hidden border border-gray-200">
            <div class="bg-gray-100 px-4 py-2 flex items-center justify-between border-b border-gray-200">
              <span class="text-xs text-gray-600 font-mono">Online</span>
              <button onclick="copyCode('arduino')" class="text-xs text-gray-600 hover:text-blue-600 transition flex items-center gap-1">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                </svg>
                Copy
              </button>
            </div>
            <div class="overflow-x-auto overflow-y-auto max-h-[500px]">
              <pre class="p-4"><code id="arduino-code" class="language-cpp text-sm">@if($code && $code->arduino_code)
{{ $code->arduino_code }}
@else
#include &lt;WiFi.h&gt;
#include &lt;DHT.h&gt;

void setup() {
  Serial.begin(115200);
}

void loop() {
  // Your code here
}
@endif</code></pre>
            </div>
          </div>
        </div>

        <!-- Python Code -->
        <div id="code-python" class="code-content hidden">
          <div class="bg-gray-50 rounded-lg overflow-hidden border border-gray-200">
            <div class="bg-gray-100 px-4 py-2 flex items-center justify-between border-b border-gray-200">
              <span class="text-xs text-gray-600 font-mono">backend_api.py</span>
              <button onclick="copyCode('python')" class="text-xs text-gray-600 hover:text-blue-600 transition flex items-center gap-1">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                </svg>
                Copy
              </button>
            </div>
            <div class="overflow-x-auto overflow-y-auto max-h-[500px]">
              <pre class="p-4"><code id="python-code" class="language-python text-sm">@if($code && $code->python_code)
{{ $code->python_code }}
@else
from flask import Flask, jsonify, request
from flask_cors import CORS
import paho.mqtt.client as mqtt

app = Flask(__name__)
CORS(app)

# API Endpoints
@app.route('/api/latest')
def get_latest_data():
    return jsonify({'status': 'ok'})

if __name__ == '__main__':
    app.run(host='0.0.0.0', port=5000)
@endif</code></pre>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- GitHub Link -->
    <div class="text-center animate-on-scroll fade-in-up" style="animation-delay: 0.3s">
      <a href="{{ $code->github_url ?? 'https://github.com/agritech-iot/project' }}" target="_blank" class="inline-flex items-center gap-2 px-6 py-3 bg-blue-600 text-white rounded-full hover:bg-blue-500 transition shadow-lg hover:shadow-blue-500/50">
        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
          <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
        </svg>
        Lihat Full Code di GitHub
      </a>
    </div>

    <!-- Documentation -->
    <div class="mt-12 grid md:grid-cols-2 gap-6">
      <div class="bg-white rounded-xl p-6 border border-gray-200 animate-on-scroll fade-in-left shadow-lg hover:shadow-xl transition" style="animation-delay: 0.4s">
        <h3 class="text-lg font-semibold text-gray-800 mb-3">📦 Hardware Requirements</h3>
        <ul class="space-y-2 text-sm text-gray-600">
          @forelse($code->hardware_requirements ?? [] as $item)
            <li>• {{ $item }}</li>
          @empty
            <li>• ESP32 Development Board</li>
            <li>• DHT22 Temperature & Humidity Sensor</li>
            <li>• Soil Moisture Sensor</li>
            <li>• 5V Relay Module</li>
            <li>• Water Pump (12V)</li>
          @endforelse
        </ul>
      </div>
      <div class="bg-white rounded-xl p-6 border border-gray-200 animate-on-scroll fade-in-right shadow-lg hover:shadow-xl transition" style="animation-delay: 0.4s">
        <h3 class="text-lg font-semibold text-gray-800 mb-3">⚙️ Software Stack</h3>
        <ul class="space-y-2 text-sm text-gray-600">
          @forelse($code->software_stack ?? [] as $item)
            <li>• {{ $item }}</li>
          @empty
            <li>• Arduino IDE / PlatformIO</li>
            <li>• Python Flask (Backend)</li>
            <li>• MySQL Database</li>
            <li>• React.js (Dashboard)</li>
            <li>• MQTT Protocol</li>
          @endforelse
        </ul>
      </div>
    </div>
  </div>
</section>

<style>
/* Custom Scrollbar untuk Code Block */
.overflow-y-auto::-webkit-scrollbar {
  width: 8px;
}

.overflow-y-auto::-webkit-scrollbar-track {
  background: #1f2937;
  border-radius: 4px;
}

.overflow-y-auto::-webkit-scrollbar-thumb {
  background: #4b5563;
  border-radius: 4px;
}

.overflow-y-auto::-webkit-scrollbar-thumb:hover {
  background: #6b7280;
}

/* Firefox scrollbar */
.overflow-y-auto {
  scrollbar-width: thin;
  scrollbar-color: #4b5563 #1f2937;
}

/* Smooth scrolling */
.overflow-y-auto {
  scroll-behavior: smooth;
}
</style>

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
        t.classList.remove('bg-blue-600', 'text-white');
        t.classList.add('text-gray-600', 'hover:bg-gray-50', 'hover:text-gray-800');
      });

      // Add active class to clicked tab
      tab.classList.add('bg-blue-600', 'text-white');
      tab.classList.remove('text-gray-600', 'hover:bg-gray-50', 'hover:text-gray-800');

      // Hide all code contents
      codeContents.forEach(content => {
        content.classList.add('hidden');
      });

      // Show selected code content
      document.getElementById(`code-${tabName}`).classList.remove('hidden');

      // Re-highlight code syntax
      if (typeof hljs !== 'undefined') {
        hljs.highlightAll();
      }
    });
  });

  // Copy code to clipboard
  function copyCode(type) {
    const codeElement = document.getElementById(`${type}-code`);
    const codeText = codeElement.textContent;

    navigator.clipboard.writeText(codeText).then(() => {
      // Show notification
      const button = event.target.closest('button');
      const originalText = button.innerHTML;

      button.innerHTML = `
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
        </svg>
        Copied!
      `;

      setTimeout(() => {
        button.innerHTML = originalText;
      }, 2000);
    }).catch(err => {
      console.error('Failed to copy code: ', err);
    });
  }

  // Initialize syntax highlighting on page load
  document.addEventListener('DOMContentLoaded', function() {
    if (typeof hljs !== 'undefined') {
      hljs.highlightAll();
    }
  });
</script>