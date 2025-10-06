@extends('dashboard')

@section('content')

<main class="flex-1 overflow-y-auto bg-gray-50 p-6">
    <div class="space-y-6">
        
        {{-- Header --}}
        <div class="flex justify-between items-center">
            <div>
                <h2 class="text-2xl font-bold text-gray-800">Code Section</h2>
                <p class="text-gray-600 text-sm mt-1">Manage project source code and documentation</p>
            </div>
        </div>

        {{-- Stats --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="bg-gradient-to-br from-purple-500 to-purple-600 rounded-lg p-4 text-white">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-purple-100 text-xs font-medium">Code Languages</p>
                        <p class="text-2xl font-bold mt-1">2</p>
                    </div>
                    <svg class="w-8 h-8 text-purple-200" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M12.316 3.051a1 1 0 01.633 1.265l-4 12a1 1 0 11-1.898-.632l4-12a1 1 0 011.265-.633zM5.707 6.293a1 1 0 010 1.414L3.414 10l2.293 2.293a1 1 0 11-1.414 1.414l-3-3a1 1 0 010-1.414l3-3a1 1 0 011.414 0zm8.586 0a1 1 0 011.414 0l3 3a1 1 0 010 1.414l-3 3a1 1 0 11-1.414-1.414L16.586 10l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"/>
                    </svg>
                </div>
            </div>

            <div class="bg-gradient-to-br from-blue-500 to-blue-600 rounded-lg p-4 text-white">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-blue-100 text-xs font-medium">Requirements</p>
                        <p class="text-2xl font-bold mt-1">10</p>
                    </div>
                    <svg class="w-8 h-8 text-blue-200" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"/>
                        <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm9.707 5.707a1 1 0 00-1.414-1.414L9 12.586l-1.293-1.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                </div>
            </div>

            <div class="bg-gradient-to-br from-green-500 to-green-600 rounded-lg p-4 text-white">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-green-100 text-xs font-medium">GitHub Status</p>
                        <p class="text-xl font-bold mt-1">Active</p>
                    </div>
                    <svg class="w-8 h-8 text-green-200" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
                    </svg>
                </div>
            </div>
        </div>

        {{-- Heading Section --}}
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
            <div class="bg-gradient-to-r from-indigo-50 to-purple-50 px-6 py-4 border-b flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-indigo-100 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800">Heading Section</h3>
                </div>
                <button onclick="openHeadingModal()" class="px-3 py-1.5 bg-indigo-600 hover:bg-indigo-700 text-white text-sm rounded-lg transition">
                    Edit
                </button>
            </div>
            <div class="p-6 space-y-4">
                <div>
                    <label class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Title</label>
                    <p class="text-gray-800 font-medium mt-1" id="headingTitle">Kode Project IoT</p>
                </div>
                <div>
                    <label class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Subtitle</label>
                    <p class="text-gray-600 mt-1" id="headingSubtitle">Source code untuk ESP32 dan monitoring system</p>
                </div>
            </div>
        </div>

        {{-- Code Sections --}}
        <div class="grid md:grid-cols-2 gap-6">
            
            {{-- Arduino Code --}}
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                <div class="bg-gradient-to-r from-blue-50 to-cyan-50 px-6 py-4 border-b flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M12.316 3.051a1 1 0 01.633 1.265l-4 12a1 1 0 11-1.898-.632l4-12a1 1 0 011.265-.633zM5.707 6.293a1 1 0 010 1.414L3.414 10l2.293 2.293a1 1 0 11-1.414 1.414l-3-3a1 1 0 010-1.414l3-3a1 1 0 011.414 0zm8.586 0a1 1 0 011.414 0l3 3a1 1 0 010 1.414l-3 3a1 1 0 11-1.414-1.414L16.586 10l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-800">ESP32 Arduino Code</h3>
                    </div>
                    <button onclick="openArduinoModal()" class="px-3 py-1.5 bg-blue-600 hover:bg-blue-700 text-white text-sm rounded-lg transition">
                        Edit
                    </button>
                </div>
                <div class="p-6">
                    <div class="bg-gray-900 rounded-lg p-4 overflow-x-auto">
                        <pre class="text-xs text-green-400" id="arduinoCodePreview">#include &lt;WiFi.h&gt;
#include &lt;DHT.h&gt;

void setup() {
  Serial.begin(115200);
  // More code...
}</pre>
                    </div>
                    <p class="text-xs text-gray-500 mt-3">Click edit to modify the full Arduino code</p>
                </div>
            </div>

            {{-- Python Code --}}
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                <div class="bg-gradient-to-r from-yellow-50 to-orange-50 px-6 py-4 border-b flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-yellow-100 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-yellow-600" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M12.316 3.051a1 1 0 01.633 1.265l-4 12a1 1 0 11-1.898-.632l4-12a1 1 0 011.265-.633zM5.707 6.293a1 1 0 010 1.414L3.414 10l2.293 2.293a1 1 0 11-1.414 1.414l-3-3a1 1 0 010-1.414l3-3a1 1 0 011.414 0zm8.586 0a1 1 0 011.414 0l3 3a1 1 0 010 1.414l-3 3a1 1 0 11-1.414-1.414L16.586 10l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-800">Python Backend Code</h3>
                    </div>
                    <button onclick="openPythonModal()" class="px-3 py-1.5 bg-yellow-600 hover:bg-yellow-700 text-white text-sm rounded-lg transition">
                        Edit
                    </button>
                </div>
                <div class="p-6">
                    <div class="bg-gray-900 rounded-lg p-4 overflow-x-auto">
                        <pre class="text-xs text-green-400" id="pythonCodePreview">from flask import Flask
import paho.mqtt.client as mqtt

app = Flask(__name__)
# More code...</pre>
                    </div>
                    <p class="text-xs text-gray-500 mt-3">Click edit to modify the full Python code</p>
                </div>
            </div>

        </div>

        {{-- GitHub Link --}}
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
            <div class="bg-gradient-to-r from-gray-50 to-gray-100 px-6 py-4 border-b flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-gray-200 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-gray-700" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800">GitHub Repository</h3>
                </div>
                <button onclick="openGithubModal()" class="px-3 py-1.5 bg-gray-700 hover:bg-gray-800 text-white text-sm rounded-lg transition">
                    Edit
                </button>
            </div>
            <div class="p-6">
                <a href="#" id="githubLink" target="_blank" class="inline-flex items-center gap-2 text-blue-600 hover:text-blue-700">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
                    </svg>
                    <span id="githubUrlText">https://github.com/agritech-iot/project</span>
                </a>
            </div>
        </div>

        {{-- Requirements --}}
        <div class="grid md:grid-cols-2 gap-6">
            
            {{-- Hardware Requirements --}}
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                <div class="bg-gradient-to-r from-green-50 to-emerald-50 px-6 py-4 border-b flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"/>
                                <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm9.707 5.707a1 1 0 00-1.414-1.414L9 12.586l-1.293-1.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-800">Hardware Requirements</h3>
                    </div>
                    <button onclick="openHardwareModal()" class="px-3 py-1.5 bg-green-600 hover:bg-green-700 text-white text-sm rounded-lg transition">
                        Edit
                    </button>
                </div>
                <div class="p-6">
                    <ul class="space-y-2 text-sm text-gray-700" id="hardwareList">
                        <li>• ESP32 Development Board</li>
                        <li>• DHT22 Temperature & Humidity Sensor</li>
                        <li>• Soil Moisture Sensor</li>
                        <li>• 5V Relay Module</li>
                        <li>• Water Pump (12V)</li>
                    </ul>
                </div>
            </div>

            {{-- Software Stack --}}
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                <div class="bg-gradient-to-r from-purple-50 to-pink-50 px-6 py-4 border-b flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-purple-600" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M2 5a2 2 0 012-2h12a2 2 0 012 2v10a2 2 0 01-2 2H4a2 2 0 01-2-2V5zm3.293 1.293a1 1 0 011.414 0l3 3a1 1 0 010 1.414l-3 3a1 1 0 01-1.414-1.414L7.586 10 5.293 7.707a1 1 0 010-1.414zM11 12a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-800">Software Stack</h3>
                    </div>
                    <button onclick="openSoftwareModal()" class="px-3 py-1.5 bg-purple-600 hover:bg-purple-700 text-white text-sm rounded-lg transition">
                        Edit
                    </button>
                </div>
                <div class="p-6">
                    <ul class="space-y-2 text-sm text-gray-700" id="softwareList">
                        <li>• Arduino IDE / PlatformIO</li>
                        <li>• Python Flask (Backend)</li>
                        <li>• MySQL Database</li>
                        <li>• React.js (Dashboard)</li>
                        <li>• MQTT Protocol</li>
                    </ul>
                </div>
            </div>

        </div>

    </div>
</main>

{{-- Heading Modal --}}
<div id="headingModal" class="hidden fixed inset-0 bg-black/50 backdrop-blur-sm z-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-xl shadow-2xl max-w-lg w-full">
        <div class="border-b px-6 py-4 flex items-center justify-between">
            <h3 class="text-xl font-bold text-gray-800">Edit Heading</h3>
            <button onclick="closeHeadingModal()" class="text-gray-400 hover:text-gray-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
        <form class="p-6 space-y-4">
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Title</label>
                <input type="text" id="inputHeadingTitle" value="Kode Project IoT" class="w-full px-4 py-2.5 border rounded-lg focus:ring-2 focus:ring-indigo-500">
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Subtitle</label>
                <input type="text" id="inputHeadingSubtitle" value="Source code untuk ESP32 dan monitoring system" class="w-full px-4 py-2.5 border rounded-lg focus:ring-2 focus:ring-indigo-500">
            </div>
            <div class="flex justify-end gap-3 pt-4 border-t">
                <button type="button" onclick="closeHeadingModal()" class="px-6 py-2.5 border border-gray-300 text-gray-700 hover:bg-gray-50 rounded-lg">Cancel</button>
                <button type="button" onclick="saveHeading()" class="px-6 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg">Save</button>
            </div>
        </form>
    </div>
</div>

{{-- Arduino Code Modal --}}
<div id="arduinoModal" class="hidden fixed inset-0 bg-black/50 backdrop-blur-sm z-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-xl shadow-2xl max-w-3xl w-full max-h-[90vh] flex flex-col">
        <div class="border-b px-6 py-4 flex items-center justify-between flex-shrink-0">
            <h3 class="text-xl font-bold text-gray-800">Edit Arduino Code</h3>
            <button onclick="closeArduinoModal()" class="text-gray-400 hover:text-gray-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
        <form class="p-6 flex-1 overflow-y-auto">
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Arduino/ESP32 Code</label>
                <textarea id="inputArduinoCode" rows="20" class="w-full px-4 py-2.5 border rounded-lg focus:ring-2 focus:ring-blue-500 font-mono text-sm" placeholder="Paste your Arduino code here...">#include <WiFi.h>
#include <DHT.h>

void setup() {
  Serial.begin(115200);
}</textarea>
            </div>
            <div class="flex justify-end gap-3 pt-4 border-t mt-4">
                <button type="button" onclick="closeArduinoModal()" class="px-6 py-2.5 border border-gray-300 text-gray-700 hover:bg-gray-50 rounded-lg">Cancel</button>
                <button type="button" onclick="saveArduino()" class="px-6 py-2.5 bg-blue-600 hover:bg-blue-700 text-white rounded-lg">Save</button>
            </div>
        </form>
    </div>
</div>

{{-- Python Code Modal --}}
<div id="pythonModal" class="hidden fixed inset-0 bg-black/50 backdrop-blur-sm z-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-xl shadow-2xl max-w-3xl w-full max-h-[90vh] flex flex-col">
        <div class="border-b px-6 py-4 flex items-center justify-between flex-shrink-0">
            <h3 class="text-xl font-bold text-gray-800">Edit Python Code</h3>
            <button onclick="closePythonModal()" class="text-gray-400 hover:text-gray-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
        <form class="p-6 flex-1 overflow-y-auto">
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Python Backend Code</label>
                <textarea id="inputPythonCode" rows="20" class="w-full px-4 py-2.5 border rounded-lg focus:ring-2 focus:ring-yellow-500 font-mono text-sm" placeholder="Paste your Python code here...">from flask import Flask
import paho.mqtt.client as mqtt

app = Flask(__name__)</textarea>
            </div>
            <div class="flex justify-end gap-3 pt-4 border-t mt-4">
                <button type="button" onclick="closePythonModal()" class="px-6 py-2.5 border border-gray-300 text-gray-700 hover:bg-gray-50 rounded-lg">Cancel</button>
                <button type="button" onclick="savePython()" class="px-6 py-2.5 bg-yellow-600 hover:bg-yellow-700 text-white rounded-lg">Save</button>
            </div>
        </form>
    </div>
</div>

{{-- GitHub Modal --}}
<div id="githubModal" class="hidden fixed inset-0 bg-black/50 backdrop-blur-sm z-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-xl shadow-2xl max-w-lg w-full">
        <div class="border-b px-6 py-4 flex items-center justify-between">
            <h3 class="text-xl font-bold text-gray-800">Edit GitHub Link</h3>
            <button onclick="closeGithubModal()" class="text-gray-400 hover:text-gray-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
        <form class="p-6 space-y-4">
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">GitHub Repository URL</label>
                <input type="url" id="inputGithubUrl" value="https://github.com/agritech-iot/project" class="w-full px-4 py-2.5 border rounded-lg focus:ring-2 focus:ring-gray-500">
            </div>
            <div class="flex justify-end gap-3 pt-4 border-t">
                <button type="button" onclick="closeGithubModal()" class="px-6 py-2.5 border border-gray-300 text-gray-700 hover:bg-gray-50 rounded-lg">Cancel</button>
                <button type="button" onclick="saveGithub()" class="px-6 py-2.5 bg-gray-700 hover:bg-gray-800 text-white rounded-lg">Save</button>
            </div>
        </form>
    </div>
</div>

{{-- Hardware Modal --}}
<div id="hardwareModal" class="hidden fixed inset-0 bg-black/50 backdrop-blur-sm z-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-xl shadow-2xl max-w-lg w-full">
        <div class="border-b px-6 py-4 flex items-center justify-between">
            <h3 class="text-xl font-bold text-gray-800">Edit Hardware Requirements</h3>
            <button onclick="closeHardwareModal()" class="text-gray-400 hover:text-gray-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
        <form class="p-6 space-y-4">
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Hardware List (one per line)</label>
                <textarea id="inputHardware" rows="8" class="w-full px-4 py-2.5 border rounded-lg focus:ring-2 focus:ring-green-500" placeholder="ESP32 Development Board&#10;DHT22 Sensor&#10;...">ESP32 Development Board
DHT22 Temperature & Humidity Sensor
Soil Moisture Sensor
5V Relay Module
Water Pump (12V)</textarea>
                <p class="text-xs text-gray-500 mt-1">Each line will become a bullet point</p>
            </div>
            <div class="flex justify-end gap-3 pt-4 border-t">
                <button type="button" onclick="closeHardwareModal()" class="px-6 py-2.5 border border-gray-300 text-gray-700 hover:bg-gray-50 rounded-lg">Cancel</button>
                <button type="button" onclick="saveHardware()" class="px-6 py-2.5 bg-green-600 hover:bg-green-700 text-white rounded-lg">Save</button>
            </div>
        </form>
    </div>
</div>

{{-- Software Modal --}}
<div id="softwareModal" class="hidden fixed inset-0 bg-black/50 backdrop-blur-sm z-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-xl shadow-2xl max-w-lg w-full">
        <div class="border-b px-6 py-4 flex items-center justify-between">
            <h3 class="text-xl font-bold text-gray-800">Edit Software Stack</h3>
            <button onclick="closeSoftwareModal()" class="text-gray-400 hover:text-gray-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
        <form class="p-6 space-y-4">
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Software List (one per line)</label>
                <textarea id="inputSoftware" rows="8" class="w-full px-4 py-2.5 border rounded-lg focus:ring-2 focus:ring-purple-500" placeholder="Arduino IDE&#10;Python Flask&#10;...">Arduino IDE / PlatformIO
Python Flask (Backend)
MySQL Database
React.js (Dashboard)
MQTT Protocol</textarea>
                <p class="text-xs text-gray-500 mt-1">Each line will become a bullet point</p>
            </div>
            <div class="flex justify-end gap-3 pt-4 border-t">
                <button type="button" onclick="closeSoftwareModal()" class="px-6 py-2.5 border border-gray-300 text-gray-700 hover:bg-gray-50 rounded-lg">Cancel</button>
                <button type="button" onclick="saveSoftware()" class="px-6 py-2.5 bg-purple-600 hover:bg-purple-700 text-white rounded-lg">Save</button>
            </div>
        </form>
    </div>
</div>

<script>
// Modal Functions
function openHeadingModal() { document.getElementById('headingModal').classList.remove('hidden'); }
function closeHeadingModal() { document.getElementById('headingModal').classList.add('hidden'); }

function openArduinoModal() { document.getElementById('arduinoModal').classList.remove('hidden'); }
function closeArduinoModal() { document.getElementById('arduinoModal').classList.add('hidden'); }

function openPythonModal() { document.getElementById('pythonModal').classList.remove('hidden'); }
function closePythonModal() { document.getElementById('pythonModal').classList.add('hidden'); }

function openGithubModal() { document.getElementById('githubModal').classList.remove('hidden'); }
function closeGithubModal() { document.getElementById('githubModal').classList.add('hidden'); }

function openHardwareModal() { document.getElementById('hardwareModal').classList.remove('hidden'); }
function closeHardwareModal() { document.getElementById('hardwareModal').classList.add('hidden'); }

function openSoftwareModal() { document.getElementById('softwareModal').classList.remove('hidden'); }
function closeSoftwareModal() { document.getElementById('softwareModal').classList.add('hidden'); }

// Save Functions
function saveHeading() {
    const title = document.getElementById('inputHeadingTitle').value;
    const subtitle = document.getElementById('inputHeadingSubtitle').value;
    
    document.getElementById('headingTitle').textContent = title;
    document.getElementById('headingSubtitle').textContent = subtitle;
    
    closeHeadingModal();
    showNotification('Heading updated!');
}

function saveArduino() {
    const code = document.getElementById('inputArduinoCode').value;
    const preview = code.substring(0, 100) + '...';
    document.getElementById('arduinoCodePreview').textContent = preview;
    
    closeArduinoModal();
    showNotification('Arduino code updated!');
}

function savePython() {
    const code = document.getElementById('inputPythonCode').value;
    const preview = code.substring(0, 80) + '...';
    document.getElementById('pythonCodePreview').textContent = preview;
    
    closePythonModal();
    showNotification('Python code updated!');
}

function saveGithub() {
    const url = document.getElementById('inputGithubUrl').value;
    document.getElementById('githubLink').href = url;
    document.getElementById('githubUrlText').textContent = url;
    
    closeGithubModal();
    showNotification('GitHub link updated!');
}

function saveHardware() {
    const text = document.getElementById('inputHardware').value;
    const lines = text.split('\n').filter(line => line.trim() !== '');
    const html = lines.map(line => `<li>• ${line.trim()}</li>`).join('');
    document.getElementById('hardwareList').innerHTML = html;
    
    closeHardwareModal();
    showNotification('Hardware requirements updated!');
}

function saveSoftware() {
    const text = document.getElementById('inputSoftware').value;
    const lines = text.split('\n').filter(line => line.trim() !== '');
    const html = lines.map(line => `<li>• ${line.trim()}</li>`).join('');
    document.getElementById('softwareList').innerHTML = html;
    
    closeSoftwareModal();
    showNotification('Software stack updated!');
}

// Notification
function showNotification(message) {
    const notif = document.createElement('div');
    notif.className = 'fixed top-4 right-4 px-6 py-3 bg-green-500 text-white rounded-lg shadow-lg z-50';
    notif.textContent = message;
    document.body.appendChild(notif);
    setTimeout(() => notif.remove(), 3000);
}

// Close on ESC
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeHeadingModal();
        closeArduinoModal();
        closePythonModal();
        closeGithubModal();
        closeHardwareModal();
        closeSoftwareModal();
    }
});

// Close on outside click
document.querySelectorAll('[id$="Modal"]').forEach(modal => {
    modal.addEventListener('click', function(e) {
        if (e.target === this) this.classList.add('hidden');
    });
});
</script>

@endsection