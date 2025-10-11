<?php
// app/Http/Controllers/ContactController.php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    /**
     * Display contact page for DASHBOARD/ADMIN
     * Route: GET /dashboard/contact (contact.index)
     */
    public function index()
    {
        $contact = Contact::firstOrCreate(
            ['id' => 1],
            [
                'heading_title' => 'Kontak',
                'heading_subtitle' => 'Hubungi kami untuk informasi lebih lanjut tentang project ini',
                'phone_mobile' => '+62 812-3456-7890',
                'phone_office' => '(031) 123-4567',
                'address_lab' => 'Laboratorium IoT & Embedded Systems',
                'address_faculty' => 'Fakultas Teknik Informatika',
                'address_university' => 'Universitas Musamus',
                'address_street' => 'Jl. Kamizaun Mopah Lama, Merauke 99600',
                'map_embed_url' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.7945!2d140.4026!3d-8.4742!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6940b1c7c7c7c7c7%3A0x1234567890abcdef!2sUniversitas%20Musamus!5e0!3m2!1sen!2sid!4v1710145678901!5m2!1sen!2sid',
                'institution_label' => 'Supported by',
                'institution_name' => 'Universitas Musamus',
            ]
        );
        
        return view('dashboard.contact', compact('contact'));
    }

    /**
     * Display contact page for PUBLIC/LANDING PAGE
     * Route: GET /contact (contact.show)
     */
    public function show()
{
    $contact = Contact::firstOrCreate(
        ['id' => 1],
        [
            'heading_title' => 'Kontak',
            'heading_subtitle' => 'Hubungi kami untuk informasi lebih lanjut tentang project ini',
            'phone_mobile' => '+62 812-3456-7890',
            'phone_office' => '(031) 123-4567',
            'address_lab' => 'Laboratorium IoT & Embedded Systems',
            'address_faculty' => 'Fakultas Teknik Informatika',
            'address_university' => 'Universitas Musamus',
            'address_street' => 'Jl. Kamizaun Mopah Lama, Merauke 99600',
            'map_embed_url' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.7945!2d140.4026!3d-8.4742!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6940b1c7c7c7c7c7%3A0x1234567890abcdef!2sUniversitas%20Musamus!5e0!3m2!1sen!2sid!4v1710145678901!5m2!1sen!2sid',
            'institution_label' => 'Supported by',
            'institution_name' => 'Universitas Musamus',
        ]
    );
    
    
    return view('contact', compact('contact'));
}

    /**
     * Update heading section
     * Route: POST /dashboard/contact/heading (contact.heading)
     */
    public function updateHeading(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'heading_title' => 'required|string|max:255',
            'heading_subtitle' => 'required|string|max:1000',
        ], [
            'heading_title.required' => 'Title is required',
            'heading_title.max' => 'Title must not exceed 255 characters',
            'heading_subtitle.required' => 'Subtitle is required',
            'heading_subtitle.max' => 'Subtitle must not exceed 1000 characters',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $contact = Contact::firstOrFail();
            $contact->update([
                'heading_title' => $request->heading_title,
                'heading_subtitle' => $request->heading_subtitle,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Heading updated successfully!',
                'data' => [
                    'heading_title' => $contact->heading_title,
                    'heading_subtitle' => $contact->heading_subtitle,
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to update heading: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Update phone section
     * Route: POST /dashboard/contact/phone (contact.phone)
     */
    public function updatePhone(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone_mobile' => 'required|string|max:20',
            'phone_office' => 'required|string|max:20',
        ], [
            'phone_mobile.required' => 'Mobile number is required',
            'phone_mobile.max' => 'Mobile number must not exceed 20 characters',
            'phone_office.required' => 'Office number is required',
            'phone_office.max' => 'Office number must not exceed 20 characters',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $contact = Contact::firstOrFail();
            $contact->update([
                'phone_mobile' => $request->phone_mobile,
                'phone_office' => $request->phone_office,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Phone numbers updated successfully!',
                'data' => [
                    'phone_mobile' => $contact->phone_mobile,
                    'phone_office' => $contact->phone_office,
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to update phone numbers: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Update address section
     * Route: POST /dashboard/contact/address (contact.address)
     */
    public function updateAddress(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'address_lab' => 'required|string|max:255',
            'address_faculty' => 'required|string|max:255',
            'address_university' => 'required|string|max:255',
            'address_street' => 'required|string|max:255',
        ], [
            'address_lab.required' => 'Laboratory name is required',
            'address_faculty.required' => 'Faculty name is required',
            'address_university.required' => 'University name is required',
            'address_street.required' => 'Street address is required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $contact = Contact::firstOrFail();
            $contact->update([
                'address_lab' => $request->address_lab,
                'address_faculty' => $request->address_faculty,
                'address_university' => $request->address_university,
                'address_street' => $request->address_street,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Address updated successfully!',
                'data' => [
                    'address_lab' => $contact->address_lab,
                    'address_faculty' => $contact->address_faculty,
                    'address_university' => $contact->address_university,
                    'address_street' => $contact->address_street,
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to update address: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Update map section
     * Route: POST /dashboard/contact/map (contact.map)
     */
    public function updateMap(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'map_embed_url' => 'required|url|max:1000',
        ], [
            'map_embed_url.required' => 'Map URL is required',
            'map_embed_url.url' => 'Map URL must be a valid URL',
            'map_embed_url.max' => 'Map URL must not exceed 1000 characters',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $contact = Contact::firstOrFail();
            $contact->update([
                'map_embed_url' => $request->map_embed_url,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Map updated successfully!',
                'data' => [
                    'map_embed_url' => $contact->map_embed_url,
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to update map: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Update institution section
     * Route: POST /dashboard/contact/institution (contact.institution)
     */
    public function updateInstitution(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'institution_label' => 'required|string|max:100',
            'institution_name' => 'required|string|max:255',
        ], [
            'institution_label.required' => 'Institution label is required',
            'institution_label.max' => 'Institution label must not exceed 100 characters',
            'institution_name.required' => 'Institution name is required',
            'institution_name.max' => 'Institution name must not exceed 255 characters',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $contact = Contact::firstOrFail();
            $contact->update([
                'institution_label' => $request->institution_label,
                'institution_name' => $request->institution_name,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Institution badge updated successfully!',
                'data' => [
                    'institution_label' => $contact->institution_label,
                    'institution_name' => $contact->institution_name,
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to update institution: ' . $e->getMessage()
            ], 500);
        }
    }
}