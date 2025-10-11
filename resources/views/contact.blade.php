{{-- resources/views/contact.blade.php --}}
@php
    // Query langsung di view (fallback solution)
    $contact = \App\Models\Contact::first();
@endphp

<section id="contact" class="py-20 bg-white">
  <div class="max-w-4xl mx-auto px-6">
    <h2 class="text-4xl font-light text-gray-800 text-center mb-4 tracking-wide animate-on-scroll fade-in-up">
      {{ $contact->heading_title }}
    </h2>
    <p class="text-center text-gray-600 mb-12 animate-on-scroll fade-in-up" style="animation-delay: 0.1s">
      {{ $contact->heading_subtitle }}
    </p>

    <div class="grid md:grid-cols-2 gap-8">
      
      <!-- Contact Info -->
      <div class="space-y-6">
        
        {{-- Phone Section --}}
        <div class="flex items-start gap-4 animate-on-scroll fade-in-left">
          <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center flex-shrink-0">
            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
            </svg>
          </div>
          <div>
            <h3 class="font-medium text-gray-800 mb-1">Telepon / WhatsApp</h3>
            <p class="text-gray-600 text-sm">{{ $contact->phone_mobile }}</p>
          </div>
        </div>

        {{-- Address Section --}}
        <div class="flex items-start gap-4 animate-on-scroll fade-in-left" style="animation-delay: 0.1s">
          <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center flex-shrink-0">
            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
            </svg>
          </div>
          <div>
            <h3 class="font-medium text-gray-800 mb-1">Alamat</h3>
            <p class="text-gray-600 text-sm">{{ $contact->address_lab }}</p>
            <p class="text-gray-600 text-sm">{{ $contact->address_faculty }}</p>
            <p class="text-gray-600 text-sm">{{ $contact->address_university }}</p>
            <p class="text-gray-600 text-sm">{{ $contact->address_street }}</p>
          </div>
        </div>
      </div>

      <!-- Map -->
      <div class="bg-gray-200 rounded-2xl overflow-hidden h-full min-h-[300px] animate-on-scroll fade-in-right">
        <iframe 
          src="{{ $contact->map_embed_url }}" 
          width="100%" 
          height="100%" 
          style="border:0;" 
          allowfullscreen="" 
          loading="lazy"
          referrerpolicy="no-referrer-when-downgrade">
        </iframe>
      </div>
    </div>

    <!-- Institution Logo -->
    <div class="mt-16 text-center animate-on-scroll fade-in-up" style="animation-delay: 0.3s">
      <div class="inline-flex items-center gap-3 bg-gray-50 px-8 py-4 rounded-2xl">
        <div class="w-12 h-12 rounded-lg flex items-center justify-center">
          <img src="img/logo_musamus.png" alt="Institution Logo" class="w-20 h-20 object-contain">
        </div>
        <div class="text-left">
          <p class="text-sm text-gray-500">{{ $contact->institution_label }}</p>
          <p class="font-semibold text-gray-800">{{ $contact->institution_name }}</p>
        </div>
      </div>
    </div>
  </div>
</section>