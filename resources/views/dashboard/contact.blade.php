{{-- resources/views/dashboard/contact.blade.php --}}
@extends('dashboard')


@section('content')

<main class="flex-1 overflow-y-auto bg-gray-50 p-6">
    <div class="space-y-6">
        
        {{-- Header --}}
        <div class="flex justify-between items-center">
            <div>
                <h2 class="text-2xl font-bold text-gray-800">Contact Section</h2>
                <p class="text-gray-600 text-sm mt-1">Manage contact information and settings</p>
            </div>
        </div>

        {{-- Stats --}}
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <div class="bg-gradient-to-br from-purple-500 to-purple-600 rounded-lg p-4 text-white">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-purple-100 text-xs font-medium">Phone Numbers</p>
                        <p class="text-2xl font-bold mt-1">2</p>
                    </div>
                    <svg class="w-8 h-8 text-purple-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                    </svg>
                </div>
            </div>

            <div class="bg-gradient-to-br from-green-500 to-green-600 rounded-lg p-4 text-white">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-green-100 text-xs font-medium">Map Status</p>
                        <p class="text-xl font-bold mt-1">Active</p>
                    </div>
                    <svg class="w-8 h-8 text-green-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/>
                    </svg>
                </div>
            </div>

            <div class="bg-gradient-to-br from-orange-500 to-orange-600 rounded-lg p-4 text-white">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-orange-100 text-xs font-medium">Last Updated</p>
                        <p class="text-sm font-bold mt-1">{{ $contact->updated_at->diffForHumans() }}</p>
                    </div>
                    <svg class="w-8 h-8 text-orange-200" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                    </svg>
                </div>
            </div>

            <div class="bg-gradient-to-br from-teal-500 to-teal-600 rounded-lg p-4 text-white">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-teal-100 text-xs font-medium">Total Sections</p>
                        <p class="text-2xl font-bold mt-1">5</p>
                    </div>
                    <svg class="w-8 h-8 text-teal-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
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
                    <p class="text-gray-800 font-medium mt-1" id="headingTitle">{{ $contact->heading_title }}</p>
                </div>
                <div>
                    <label class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Subtitle</label>
                    <p class="text-gray-600 mt-1" id="headingSubtitle">{{ $contact->heading_subtitle }}</p>
                </div>
            </div>
        </div>

        {{-- Phone Section --}}
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
            <div class="bg-gradient-to-r from-green-50 to-emerald-50 px-6 py-4 border-b flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800">Telepon / WhatsApp</h3>
                </div>
                <button onclick="openPhoneModal()" class="px-3 py-1.5 bg-green-600 hover:bg-green-700 text-white text-sm rounded-lg transition">
                    Edit
                </button>
            </div>

            <div class="p-6 space-y-3">
                <div class="flex items-center gap-3 p-3 bg-gray-50 rounded-lg">
                    <svg class="w-5 h-5 text-gray-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/>
                    </svg>
                    <div>
                        <p class="text-xs text-gray-500">Mobile / WhatsApp</p>
                        <p class="text-sm text-gray-700 font-medium" id="phoneMobile">{{ $contact->phone_mobile }}</p>
                    </div>
                </div>
                <div class="flex items-center gap-3 p-3 bg-gray-50 rounded-lg">
                    <svg class="w-5 h-5 text-gray-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/>
                    </svg>
                    <div>
                        <p class="text-xs text-gray-500">Lab IoT</p>
                        <p class="text-sm text-gray-700 font-medium" id="phoneOffice">{{ $contact->phone_office }}</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Address Section --}}
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
            <div class="bg-gradient-to-r from-purple-50 to-pink-50 px-6 py-4 border-b flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800">Alamat</h3>
                </div>
                <button onclick="openAddressModal()" class="px-3 py-1.5 bg-purple-600 hover:bg-purple-700 text-white text-sm rounded-lg transition">
                    Edit
                </button>
            </div>

            <div class="p-6">
                <div class="space-y-2">
                    <p class="text-gray-800 font-medium" id="addressLab">{{ $contact->address_lab }}</p>
                    <p class="text-gray-600" id="addressFaculty">{{ $contact->address_faculty }}</p>
                    <p class="text-gray-600" id="addressUniversity">{{ $contact->address_university }}</p>
                    <p class="text-gray-600" id="addressStreet">{{ $contact->address_street }}</p>
                </div>
            </div>
        </div>

        {{-- Map Section --}}
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
            <div class="bg-gradient-to-r from-orange-50 to-red-50 px-6 py-4 border-b flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-orange-100 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800">Google Maps</h3>
                </div>
                <button onclick="openMapModal()" class="px-3 py-1.5 bg-orange-600 hover:bg-orange-700 text-white text-sm rounded-lg transition">
                    Edit
                </button>
            </div>

            <div class="p-6">
                <div class="aspect-video rounded-lg overflow-hidden border" id="mapContainer">
                    <iframe 
                        id="mapPreview"
                        src="{{ $contact->map_embed_url }}" 
                        width="100%" 
                        height="100%" 
                        style="border:0;" 
                        allowfullscreen="" 
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
                <div class="mt-4 p-3 bg-blue-50 rounded-lg border border-blue-200">
                    <p class="text-xs text-blue-700">
                        <strong>Tip:</strong> Go to Google Maps → Share → Embed a map → Copy HTML code
                    </p>
                </div>
            </div>
        </div>

        {{-- Institution Section --}}
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
            <div class="bg-gradient-to-r from-teal-50 to-cyan-50 px-6 py-4 border-b flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-teal-100 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-teal-600" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3z"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800">Institution Badge</h3>
                </div>
                <button onclick="openInstitutionModal()" class="px-3 py-1.5 bg-teal-600 hover:bg-teal-700 text-white text-sm rounded-lg transition">
                    Edit
                </button>
            </div>

            <div class="p-6">
                <div class="inline-flex items-center gap-3 bg-gray-50 px-6 py-4 rounded-xl border">
                    <div class="w-12 h-12 bg-green-600 rounded-lg flex items-center justify-center flex-shrink-0">
                        <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3z"/>
                        </svg>
                    </div>
                    <div class="text-left">
                        <p class="text-sm text-gray-500" id="institutionLabel">{{ $contact->institution_label }}</p>
                        <p class="font-semibold text-gray-800" id="institutionName">{{ $contact->institution_name }}</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</main>

{{-- Modals dan JavaScript sama seperti sebelumnya... --}}
{{-- Saya kasih versi lengkap di bawah --}}

{{-- Heading Modal --}}
<div id="headingModal" class="hidden fixed inset-0 bg-black/50 backdrop-blur-sm z-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-xl shadow-2xl max-w-lg w-full">
        <div class="border-b px-6 py-4 flex items-center justify-between">
            <h3 class="text-xl font-bold text-gray-800">Edit Heading Section</h3>
            <button onclick="closeHeadingModal()" class="text-gray-400 hover:text-gray-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
        <form id="headingForm" class="p-6 space-y-4">
            @csrf
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Title <span class="text-red-500">*</span></label>
                <input type="text" name="heading_title" id="inputHeadingTitle" value="{{ $contact->heading_title }}" class="w-full px-4 py-2.5 border rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent" required>
                <span class="text-red-500 text-xs error-message" id="error-heading_title"></span>
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Subtitle <span class="text-red-500">*</span></label>
                <textarea name="heading_subtitle" id="inputHeadingSubtitle" rows="3" class="w-full px-4 py-2.5 border rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent resize-none" required>{{ $contact->heading_subtitle }}</textarea>
                <span class="text-red-500 text-xs error-message" id="error-heading_subtitle"></span>
            </div>
            <div class="flex justify-end gap-3 pt-4 border-t">
                <button type="button" onclick="closeHeadingModal()" class="px-6 py-2.5 border border-gray-300 text-gray-700 hover:bg-gray-50 rounded-lg">Cancel</button>
                <button type="submit" class="px-6 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg">Save</button>
            </div>
        </form>
    </div>
</div>

{{-- Phone Modal --}}
<div id="phoneModal" class="hidden fixed inset-0 bg-black/50 backdrop-blur-sm z-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-xl shadow-2xl max-w-lg w-full">
        <div class="border-b px-6 py-4 flex items-center justify-between">
            <h3 class="text-xl font-bold text-gray-800">Edit Phone Numbers</h3>
            <button onclick="closePhoneModal()" class="text-gray-400 hover:text-gray-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
        <form id="phoneForm" class="p-6 space-y-4">
            @csrf
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Mobile / WhatsApp <span class="text-red-500">*</span></label>
                <input type="tel" name="phone_mobile" id="inputPhoneMobile" value="{{ $contact->phone_mobile }}" class="w-full px-4 py-2.5 border rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent" required>
                <span class="text-red-500 text-xs error-message" id="error-phone_mobile"></span>
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Lab IoT <span class="text-red-500">*</span></label>
                <input type="tel" name="phone_office" id="inputPhoneOffice" value="{{ $contact->phone_office }}" class="w-full px-4 py-2.5 border rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent" required>
                <span class="text-red-500 text-xs error-message" id="error-phone_office"></span>
            </div>
            <div class="flex justify-end gap-3 pt-4 border-t">
                <button type="button" onclick="closePhoneModal()" class="px-6 py-2.5 border border-gray-300 text-gray-700 hover:bg-gray-50 rounded-lg">Cancel</button>
                <button type="submit" class="px-6 py-2.5 bg-green-600 hover:bg-green-700 text-white rounded-lg">Save</button>
            </div>
        </form>
    </div>
</div>

{{-- Address Modal --}}
<div id="addressModal" class="hidden fixed inset-0 bg-black/50 backdrop-blur-sm z-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-xl shadow-2xl max-w-lg w-full">
        <div class="border-b px-6 py-4 flex items-center justify-between">
            <h3 class="text-xl font-bold text-gray-800">Edit Address</h3>
            <button onclick="closeAddressModal()" class="text-gray-400 hover:text-gray-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
        <form id="addressForm" class="p-6 space-y-4">
            @csrf
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Laboratory <span class="text-red-500">*</span></label>
                <input type="text" name="address_lab" id="inputAddressLab" value="{{ $contact->address_lab }}" class="w-full px-4 py-2.5 border rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent" required>
                <span class="text-red-500 text-xs error-message" id="error-address_lab"></span>
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Faculty <span class="text-red-500">*</span></label>
                <input type="text" name="address_faculty" id="inputAddressFaculty" value="{{ $contact->address_faculty }}" class="w-full px-4 py-2.5 border rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent" required>
                <span class="text-red-500 text-xs error-message" id="error-address_faculty"></span>
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">University <span class="text-red-500">*</span></label>
                <input type="text" name="address_university" id="inputAddressUniversity" value="{{ $contact->address_university }}" class="w-full px-4 py-2.5 border rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent" required>
                <span class="text-red-500 text-xs error-message" id="error-address_university"></span>
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Street Address <span class="text-red-500">*</span></label>
                <input type="text" name="address_street" id="inputAddressStreet" value="{{ $contact->address_street }}" class="w-full px-4 py-2.5 border rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent" required>
                <span class="text-red-500 text-xs error-message" id="error-address_street"></span>
            </div>
            <div class="flex justify-end gap-3 pt-4 border-t">
                <button type="button" onclick="closeAddressModal()" class="px-6 py-2.5 border border-gray-300 text-gray-700 hover:bg-gray-50 rounded-lg">Cancel</button>
                <button type="submit" class="px-6 py-2.5 bg-purple-600 hover:bg-purple-700 text-white rounded-lg">Save</button>
            </div>
        </form>
    </div>
</div>

{{-- Map Modal --}}
<div id="mapModal" class="hidden fixed inset-0 bg-black/50 backdrop-blur-sm z-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-xl shadow-2xl max-w-lg w-full">
        <div class="border-b px-6 py-4 flex items-center justify-between">
            <h3 class="text-xl font-bold text-gray-800">Edit Google Maps</h3>
            <button onclick="closeMapModal()" class="text-gray-400 hover:text-gray-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
        <form id="mapForm" class="p-6 space-y-4">
            @csrf
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Google Maps Embed URL <span class="text-red-500">*</span></label>
                <textarea name="map_embed_url" id="inputMapUrl" rows="4" class="w-full px-4 py-2.5 border rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent resize-none font-mono text-xs" placeholder="https://www.google.com/maps/embed?pb=..." required>{{ $contact->map_embed_url }}</textarea>
                <p class="text-xs text-gray-500 mt-2">Paste the full embed URL from Google Maps</p>
                <span class="text-red-500 text-xs error-message" id="error-map_embed_url"></span>
            </div>
            <div class="flex justify-end gap-3 pt-4 border-t">
                <button type="button" onclick="closeMapModal()" class="px-6 py-2.5 border border-gray-300 text-gray-700 hover:bg-gray-50 rounded-lg">Cancel</button>
                <button type="submit" class="px-6 py-2.5 bg-orange-600 hover:bg-orange-700 text-white rounded-lg">Save</button>
            </div>
        </form>
    </div>
</div>

{{-- Institution Modal --}}
<div id="institutionModal" class="hidden fixed inset-0 bg-black/50 backdrop-blur-sm z-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-xl shadow-2xl max-w-lg w-full">
        <div class="border-b px-6 py-4 flex items-center justify-between">
            <h3 class="text-xl font-bold text-gray-800">Edit Institution Badge</h3>
            <button onclick="closeInstitutionModal()" class="text-gray-400 hover:text-gray-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
        <form id="institutionForm" class="p-6 space-y-4">
            @csrf
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Label <span class="text-red-500">*</span></label>
                <input type="text" name="institution_label" id="inputInstitutionLabel" value="{{ $contact->institution_label }}" class="w-full px-4 py-2.5 border rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-transparent" required>
                <span class="text-red-500 text-xs error-message" id="error-institution_label"></span>
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Institution Name <span class="text-red-500">*</span></label>
                <input type="text" name="institution_name" id="inputInstitutionName" value="{{ $contact->institution_name }}" class="w-full px-4 py-2.5 border rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-transparent" required>
                <span class="text-red-500 text-xs error-message" id="error-institution_name"></span>
            </div>
            <div class="flex justify-end gap-3 pt-4 border-t">
                <button type="button" onclick="closeInstitutionModal()" class="px-6 py-2.5 border border-gray-300 text-gray-700 hover:bg-gray-50 rounded-lg">Cancel</button>
                <button type="submit" class="px-6 py-2.5 bg-teal-600 hover:bg-teal-700 text-white rounded-lg">Save</button>
            </div>
        </form>
    </div>
</div>

<script>
// Modal Open/Close Functions
function openHeadingModal() { document.getElementById('headingModal').classList.remove('hidden'); }
function closeHeadingModal() { document.getElementById('headingModal').classList.add('hidden'); clearErrors(); }

function openPhoneModal() { document.getElementById('phoneModal').classList.remove('hidden'); }
function closePhoneModal() { document.getElementById('phoneModal').classList.add('hidden'); clearErrors(); }

function openAddressModal() { document.getElementById('addressModal').classList.remove('hidden'); }
function closeAddressModal() { document.getElementById('addressModal').classList.add('hidden'); clearErrors(); }

function openMapModal() { document.getElementById('mapModal').classList.remove('hidden'); }
function closeMapModal() { document.getElementById('mapModal').classList.add('hidden'); clearErrors(); }

function openInstitutionModal() { document.getElementById('institutionModal').classList.remove('hidden'); }
function closeInstitutionModal() { document.getElementById('institutionModal').classList.add('hidden'); clearErrors(); }

// Clear all error messages
function clearErrors() {
    document.querySelectorAll('.error-message').forEach(el => el.textContent = '');
}

// Handle Heading Form
document.getElementById('headingForm').addEventListener('submit', async function(e) {
    e.preventDefault();
    await handleFormSubmit(this, '{{ route("contact.heading") }}', {
        title: 'headingTitle',
        subtitle: 'headingSubtitle'
    }, closeHeadingModal);
});

// Handle Phone Form
document.getElementById('phoneForm').addEventListener('submit', async function(e) {
    e.preventDefault();
    await handleFormSubmit(this, '{{ route("contact.phone") }}', {
        mobile: 'phoneMobile',
        office: 'phoneOffice'
    }, closePhoneModal);
});

// Handle Address Form
document.getElementById('addressForm').addEventListener('submit', async function(e) {
    e.preventDefault();
    await handleFormSubmit(this, '{{ route("contact.address") }}', {
        lab: 'addressLab',
        faculty: 'addressFaculty',
        university: 'addressUniversity',
        street: 'addressStreet'
    }, closeAddressModal);
});

// Handle Map Form
document.getElementById('mapForm').addEventListener('submit', async function(e) {
    e.preventDefault();
    await handleFormSubmit(this, '{{ route("contact.map") }}', {
        url: 'mapPreview'
    }, closeMapModal, true);
});

// Handle Institution Form
document.getElementById('institutionForm').addEventListener('submit', async function(e) {
    e.preventDefault();
    await handleFormSubmit(this, '{{ route("contact.institution") }}', {
        label: 'institutionLabel',
        name: 'institutionName'
    }, closeInstitutionModal);
});

// Generic form submission handler
async function handleFormSubmit(form, url, fieldMap, closeModal, isIframe = false) {
    const submitBtn = form.querySelector('button[type="submit"]');
    const originalBtnText = submitBtn.innerHTML;
    
    clearErrors();
    
    submitBtn.disabled = true;
    submitBtn.innerHTML = `
        <svg class="animate-spin h-5 w-5 inline-block mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
        </svg>
        Saving...
    `;
    
    try {
        const formData = new FormData(form);
        
        const response = await fetch(url, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json',
            },
            body: formData
        });
        
        const data = await response.json();
        
        if (data.success) {
            for (const [key, elementId] of Object.entries(fieldMap)) {
                const element = document.getElementById(elementId);
                const dataKey = Object.keys(data.data).find(k => k.includes(key));
                
                if (element && dataKey) {
                    if (isIframe && element.tagName === 'IFRAME') {
                        element.src = data.data[dataKey];
                    } else {
                        element.textContent = data.data[dataKey];
                    }
                }
            }
            
            showNotification(data.message, 'success');
            closeModal();
        } else {
            if (data.errors) {
                for (const [field, messages] of Object.entries(data.errors)) {
                    const errorEl = document.getElementById(`error-${field}`);
                    if (errorEl) {
                        errorEl.textContent = messages[0];
                    }
                }
            }
            throw new Error(data.message || 'Validation failed');
        }
        
    } catch (error) {
        console.error('Error:', error);
        if (!error.message.includes('Validation')) {
            showNotification(error.message || 'An error occurred while saving', 'error');
        }
    } finally {
        submitBtn.disabled = false;
        submitBtn.innerHTML = originalBtnText;
    }
}

// Notification Function
function showNotification(message, type = 'success') {
    const notification = document.createElement('div');
    const bgColor = type === 'success' ? 'bg-green-500' : 'bg-red-500';
    const icon = type === 'success' 
        ? '<svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>'
        : '<svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>';
    
    notification.className = `fixed top-4 right-4 px-6 py-3 rounded-lg shadow-lg z-50 ${bgColor} text-white flex items-center transform transition-all duration-300`;
    notification.innerHTML = icon + message;
    document.body.appendChild(notification);
    
    setTimeout(() => {
        notification.style.opacity = '0';
        setTimeout(() => notification.remove(), 300);
    }, 3000);
}

// Close modals on ESC
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeHeadingModal();
        closePhoneModal();
        closeAddressModal();
        closeMapModal();
        closeInstitutionModal();
    }
});

// Close modals when clicking outside
document.querySelectorAll('[id$="Modal"]').forEach(modal => {
    modal.addEventListener('click', function(e) {
        if (e.target === this) {
            this.classList.add('hidden');
            clearErrors();
        }
    });
});
</script>

@endsection