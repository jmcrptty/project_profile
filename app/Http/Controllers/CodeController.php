<?php

namespace App\Http\Controllers;

use App\Models\Code;
use Illuminate\Http\Request;

class CodeController extends Controller
{
    /**
     * Display the code management page
     */
    public function index()
    {
        $code = Code::first();

        // Jika belum ada data, buat data default
        if (!$code) {
            $code = Code::create([
                'arduino_code' => '#include <WiFi.h>
#include <DHT.h>

void setup() {
  Serial.begin(115200);
  // More code...
}',
                'python_code' => 'from flask import Flask
import paho.mqtt.client as mqtt

app = Flask(__name__)
# More code...',
                'github_url' => 'https://github.com/agritech-iot/project',
                'hardware_requirements' => [
                    'ESP32 Development Board',
                    'DHT22 Temperature & Humidity Sensor',
                    'Soil Moisture Sensor',
                    '5V Relay Module',
                    'Water Pump (12V)'
                ],
                'software_stack' => [
                    'Arduino IDE / PlatformIO',
                    'Python Flask (Backend)',
                    'MySQL Database',
                    'React.js (Dashboard)',
                    'MQTT Protocol'
                ]
            ]);
        }

        return view('dashboard.code', compact('code'));
    }

    /**
     * Update Arduino code
     */
    public function updateArduino(Request $request)
    {
        $request->validate([
            'arduino_code' => 'required|string'
        ]);

        $code = Code::firstOrCreate([]);
        $code->update([
            'arduino_code' => $request->arduino_code
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Arduino code updated successfully'
        ]);
    }

    /**
     * Update Python code
     */
    public function updatePython(Request $request)
    {
        $request->validate([
            'python_code' => 'required|string'
        ]);

        $code = Code::firstOrCreate([]);
        $code->update([
            'python_code' => $request->python_code
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Python code updated successfully'
        ]);
    }

    /**
     * Update GitHub URL
     */
    public function updateGithub(Request $request)
    {
        $request->validate([
            'github_url' => 'required|url'
        ]);

        $code = Code::firstOrCreate([]);
        $code->update([
            'github_url' => $request->github_url
        ]);

        return response()->json([
            'success' => true,
            'message' => 'GitHub URL updated successfully'
        ]);
    }

    /**
     * Update Hardware Requirements
     */
    public function updateHardware(Request $request)
    {
        $request->validate([
            'hardware_requirements' => 'required|string'
        ]);

        // Split by new lines and filter empty lines
        $lines = array_filter(
            array_map('trim', explode("\n", $request->hardware_requirements)),
            fn($line) => !empty($line)
        );

        $code = Code::firstOrCreate([]);
        $code->update([
            'hardware_requirements' => array_values($lines)
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Hardware requirements updated successfully'
        ]);
    }

    /**
     * Update Software Stack
     */
    public function updateSoftware(Request $request)
    {
        $request->validate([
            'software_stack' => 'required|string'
        ]);

        // Split by new lines and filter empty lines
        $lines = array_filter(
            array_map('trim', explode("\n", $request->software_stack)),
            fn($line) => !empty($line)
        );

        $code = Code::firstOrCreate([]);
        $code->update([
            'software_stack' => array_values($lines)
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Software stack updated successfully'
        ]);
    }
}
