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
            <div class="bg-gradient-to-br from-blue-500 to-blue-600 rounded-lg p-4 text-white">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-blue-100 text-xs font-medium">Email Addresses</p>
                        <p class="text-2xl font-bold mt-1">2</p>
                    </div>
                    <svg class="w-8 h-8 text-blue-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                </div>
            </div>

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
                        <p class="text-sm font-bold mt-1">Today</p>
                    </div>
                    <svg class="w-8 h-8 text-orange-200" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
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
                    <p class="text-gray-800 font-medium mt-1" id="headingTitle">Kontak</p>
                </div>
                <div>
                    <label class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Subtitle</label>
                    <p class="text-gray-600 mt-1" id="headingSubtitle">Hubungi kami untuk informasi lebih lanjut tentang project ini</p>
                </div>
            </div>
        </div>

        {{-- Contact Information Grid --}}
        <div class="grid md:grid-cols-2 gap-6">
            
            {{-- Email Section --}}
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                <div class="bg-gradient-to-r from-blue-50 to-cyan-50 px-6 py-4 border-b flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-800">Email</h3>
                    </div>
                    <button onclick="openEmailModal()" class="px-3 py-1.5 bg-blue-600 hover:bg-blue-700 text-white text-sm rounded-lg transition">
                        Edit
                    </button>
                </div>

                <div class="p-6 space-y-3">
                    <div class="flex items-center gap-3 p-3 bg-gray-50 rounded-lg">
                        <svg class="w-5 h-5 text-gray-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
                        </svg>
                        <span class="text-sm text-gray-700" id="email1">iot.agriculture@university.ac.id</span>
                    </div>
                    <div class="flex items-center gap-3 p-3 bg-gray-50 rounded-lg">
                        <svg class="w-5 h-5 text-gray-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
                        </svg>
                        <span class="text-sm text-gray-700" id="email2">dr.andisaputra@university.ac.id</span>
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
                            <p class="text-sm text-gray-700 font-medium" id="phoneMobile">+62 812-3456-7890</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-3 p-3 bg-gray-50 rounded-lg">
                        <svg class="w-5 h-5 text-gray-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/>
                        </svg>
                        <div>
                            <p class="text-xs text-gray-500">Lab IoT</p>
                            <p class="text-sm text-gray-700 font-medium" id="phoneOffice">(031) 123-4567</p>
                        </div>
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
                    <p class="text-gray-800 font-medium" id="addressLab">Laboratorium IoT & Embedded Systems</p>
                    <p class="text-gray-600" id="addressFaculty">Fakultas Teknik Informatika</p>
                    <p class="text-gray-600" id="addressUniversity">Universitas Teknologi Nusantara</p>
                    <p class="text-gray-600" id="addressStreet">Jl. Teknologi No. 123, Surabaya 60111</p>
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
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.344!2d112.7366!3d-7.2504!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zN8KwMTUnMDEuNCJTIDExMsKwNDQnMTEuOCJF!5e0!3m2!1sen!2sid!4v1234567890" 
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
                        <p class="text-sm text-gray-500" id="institutionLabel">Supported by</p>
                        <p class="font-semibold text-gray-800" id="institutionName">Universitas Teknologi Nusantara</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</main>

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
        <form class="p-6 space-y-4">
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Title <span class="text-red-500">*</span></label>
                <input type="text" id="inputHeadingTitle" value="Kontak" class="w-full px-4 py-2.5 border rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent" required>
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Subtitle <span class="text-red-500">*</span></label>
                <textarea id="inputHeadingSubtitle" rows="3" class="w-full px-4 py-2.5 border rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent resize-none" required>Hubungi kami untuk informasi lebih lanjut tentang project ini</textarea>
            </div>
            <div class="flex justify-end gap-3 pt-4 border-t">
                <button type="button" onclick="closeHeadingModal()" class="px-6 py-2.5 border border-gray-300 text-gray-700 hover:bg-gray-50 rounded-lg">Cancel</button>
                <button type="button" onclick="saveHeading()" class="px-6 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg">Save</button>
            </div>
        </form>
    </div>
</div>

{{-- Email Modal --}}
<div id="emailModal" class="hidden fixed inset-0 bg-black/50 backdrop-blur-sm z-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-xl shadow-2xl max-w-lg w-full">
        <div class="border-b px-6 py-4 flex items-center justify-between">
            <h3 class="text-xl font-bold text-gray-800">Edit Email Addresses</h3>
            <button onclick="closeEmailModal()" class="text-gray-400 hover:text-gray-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
        <form class="p-6 space-y-4">
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Email 1 <span class="text-red-500">*</span></label>
                <input type="email" id="inputEmail1" value="iot.agriculture@university.ac.id" class="w-full px-4 py-2.5 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Email 2 <span class="text-red-500">*</span></label>
                <input type="email" id="inputEmail2" value="dr.andisaputra@university.ac.id" class="w-full px-4 py-2.5 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
            </div>
            <div class="flex justify-end gap-3 pt-4 border-t">
                <button type="button" onclick="closeEmailModal()" class="px-6 py-2.5 border border-gray-300 text-gray-700 hover:bg-gray-50 rounded-lg">Cancel</button>
                <button type="button" onclick="saveEmail()" class="px-6 py-2.5 bg-blue-600 hover:bg-blue-700 text-white rounded-lg">Save</button>
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
        <form class="p-6 space-y-4">
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Mobile / WhatsApp <span class="text-red-500">*</span></label>
                <input type="tel" id="inputPhoneMobile" value="+62 812-3456-7890" class="w-full px-4 py-2.5 border rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent" required>
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Lab IoT <span class="text-red-500">*</span></label>
                <input type="tel" id="inputPhoneOffice" value="(031) 123-4567" class="w-full px-4 py-2.5 border rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent" required>
            </div>
            <div class="flex justify-end gap-3 pt-4 border-t">
                <button type="button" onclick="closePhoneModal()" class="px-6 py-2.5 border border-gray-300 text-gray-700 hover:bg-gray-50 rounded-lg">Cancel</button>
                <button type="button" onclick="savePhone()" class="px-6 py-2.5 bg-green-600 hover:bg-green-700 text-white rounded-lg">Save</button>
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
        <form class="p-6 space-y-4">
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Laboratory <span class="text-red-500">*</span></label>
                <input type="text" id="inputAddressLab" value="Laboratorium IoT & Embedded Systems" class="w-full px-4 py-2.5 border rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent" required>
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Faculty <span class="text-red-500">*</span></label>
                <input type="text" id="inputAddressFaculty" value="Fakultas Teknik Informatika" class="w-full px-4 py-2.5 border rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent" required>
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">University <span class="text-red-500">*</span></label>
                <input type="text" id="inputAddressUniversity" value="Universitas Teknologi Nusantara" class="w-full px-4 py-2.5 border rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent" required>
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Street Address <span class="text-red-500">*</span></label>
                <input type="text" id="inputAddressStreet" value="Jl. Teknologi No. 123, Surabaya 60111" class="w-full px-4 py-2.5 border rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent" required>
            </div>
            <div class="flex justify-end gap-3 pt-4 border-t">
                <button type="button" onclick="closeAddressModal()" class="px-6 py-2.5 border border-gray-300 text-gray-700 hover:bg-gray-50 rounded-lg">Cancel</button>
                <button type="button" onclick="saveAddress()" class="px-6 py-2.5 bg-purple-600 hover:bg-purple-700 text-white rounded-lg">Save</button>
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
        <form class="p-6 space-y-4">
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Google Maps Embed URL <span class="text-red-500">*</span></label>
                <textarea id="inputMapUrl" rows="4" class="w-full px-4 py-2.5 border rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent resize-none font-mono text-xs" placeholder="https://www.google.com/maps/embed?pb=..." required>https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.344!2d112.7366!3d-7.2504!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zN8KwMTUnMDEuNCJTIDExMsKwNDQnMTEuOCJF!5e0!3m2!1sen!2sid!4v1234567890</textarea>
                <p class="text-xs text-gray-500 mt-2">Paste the full embed URL from Google Maps</p>
            </div>
            <div class="flex justify-end gap-3 pt-4 border-t">
                <button type="button" onclick="closeMapModal()" class="px-6 py-2.5 border border-gray-300 text-gray-700 hover:bg-gray-50 rounded-lg">Cancel</button>
                <button type="button" onclick="saveMap()" class="px-6 py-2.5 bg-orange-600 hover:bg-orange-700 text-white rounded-lg">Save</button>
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
        <form class="p-6 space-y-4">
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Label <span class="text-red-500">*</span></label>
                <input type="text" id="inputInstitutionLabel" value="Supported by" class="w-full px-4 py-2.5 border rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-transparent" required>
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Institution Name <span class="text-red-500">*</span></label>
                <input type="text" id="inputInstitutionName" value="Universitas Teknologi Nusantara" class="w-full px-4 py-2.5 border rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-transparent" required>
            </div>
            <div class="flex justify-end gap-3 pt-4 border-t">
                <button type="button" onclick="closeInstitutionModal()" class="px-6 py-2.5 border border-gray-300 text-gray-700 hover:bg-gray-50 rounded-lg">Cancel</button>
                <button type="button" onclick="saveInstitution()" class="px-6 py-2.5 bg-teal-600 hover:bg-teal-700 text-white rounded-lg">Save</button>
            </div>
        </form>
    </div>
</div>

<script>
// Modal Open/Close Functions
function openHeadingModal() { 
    document.getElementById('inputHeadingTitle').value = document.getElementById('headingTitle').textContent;
    document.getElementById('inputHeadingSubtitle').value = document.getElementById('headingSubtitle').textContent;
    document.getElementById('headingModal').classList.remove('hidden'); 
}
function closeHeadingModal() { document.getElementById('headingModal').classList.add('hidden'); }

function openEmailModal() { 
    document.getElementById('inputEmail1').value = document.getElementById('email1').textContent;
    document.getElementById('inputEmail2').value = document.getElementById('email2').textContent;
    document.getElementById('emailModal').classList.remove('hidden'); 
}
function closeEmailModal() { document.getElementById('emailModal').classList.add('hidden'); }

function openPhoneModal() { 
    document.getElementById('inputPhoneMobile').value = document.getElementById('phoneMobile').textContent;
    document.getElementById('inputPhoneOffice').value = document.getElementById('phoneOffice').textContent;
    document.getElementById('phoneModal').classList.remove('hidden'); 
}
function closePhoneModal() { document.getElementById('phoneModal').classList.add('hidden'); }

function openAddressModal() { 
    document.getElementById('inputAddressLab').value = document.getElementById('addressLab').textContent;
    document.getElementById('inputAddressFaculty').value = document.getElementById('addressFaculty').textContent;
    document.getElementById('inputAddressUniversity').value = document.getElementById('addressUniversity').textContent;
    document.getElementById('inputAddressStreet').value = document.getElementById('addressStreet').textContent;
    document.getElementById('addressModal').classList.remove('hidden'); 
}
function closeAddressModal() { document.getElementById('addressModal').classList.add('hidden'); }

function openMapModal() { 
    document.getElementById('inputMapUrl').value = document.getElementById('mapPreview').src;
    document.getElementById('mapModal').classList.remove('hidden'); 
}
function closeMapModal() { document.getElementById('mapModal').classList.add('hidden'); }

function openInstitutionModal() { 
    document.getElementById('inputInstitutionLabel').value = document.getElementById('institutionLabel').textContent;
    document.getElementById('inputInstitutionName').value = document.getElementById('institutionName').textContent;
    document.getElementById('institutionModal').classList.remove('hidden'); 
}
function closeInstitutionModal() { document.getElementById('institutionModal').classList.add('hidden'); }

// Save Functions (Update display with new values)
function saveHeading() {
    const title = document.getElementById('inputHeadingTitle').value;
    const subtitle = document.getElementById('inputHeadingSubtitle').value;
    
    document.getElementById('headingTitle').textContent = title;
    document.getElementById('headingSubtitle').textContent = subtitle;
    
    closeHeadingModal();
    showNotification('Heading updated successfully!', 'success');
}

function saveEmail() {
    const email1 = document.getElementById('inputEmail1').value;
    const email2 = document.getElementById('inputEmail2').value;
    
    document.getElementById('email1').textContent = email1;
    document.getElementById('email2').textContent = email2;
    
    closeEmailModal();
    showNotification('Email addresses updated successfully!', 'success');
}

function savePhone() {
    const mobile = document.getElementById('inputPhoneMobile').value;
    const office = document.getElementById('inputPhoneOffice').value;
    
    document.getElementById('phoneMobile').textContent = mobile;
    document.getElementById('phoneOffice').textContent = office;
    
    closePhoneModal();
    showNotification('Phone numbers updated successfully!', 'success');
}

function saveAddress() {
    const lab = document.getElementById('inputAddressLab').value;
    const faculty = document.getElementById('inputAddressFaculty').value;
    const university = document.getElementById('inputAddressUniversity').value;
    const street = document.getElementById('inputAddressStreet').value;
    
    document.getElementById('addressLab').textContent = lab;
    document.getElementById('addressFaculty').textContent = faculty;
    document.getElementById('addressUniversity').textContent = university;
    document.getElementById('addressStreet').textContent = street;
    
    closeAddressModal();
    showNotification('Address updated successfully!', 'success');
}

function saveMap() {
    const url = document.getElementById('inputMapUrl').value;
    document.getElementById('mapPreview').src = url;
    
    closeMapModal();
    showNotification('Map updated successfully!', 'success');
}

function saveInstitution() {
    const label = document.getElementById('inputInstitutionLabel').value;
    const name = document.getElementById('inputInstitutionName').value;
    
    document.getElementById('institutionLabel').textContent = label;
    document.getElementById('institutionName').textContent = name;
    
    closeInstitutionModal();
    showNotification('Institution badge updated successfully!', 'success');
}

// Notification Function
function showNotification(message, type = 'success') {
    const notification = document.createElement('div');
    notification.className = `fixed top-4 right-4 px-6 py-3 rounded-lg shadow-lg z-50 ${type === 'success' ? 'bg-green-500' : 'bg-red-500'} text-white`;
    notification.textContent = message;
    document.body.appendChild(notification);
    
    setTimeout(() => {
        notification.remove();
    }, 3000);
}

// Close modals on ESC
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeHeadingModal();
        closeEmailModal();
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
        }
    });
});
</script>

@endsection