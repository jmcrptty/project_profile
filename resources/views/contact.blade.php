{{-- logikanya langsung dari PageController ya lur --}}

<section id="contact" class="py-20 bg-gradient-to-b from-gray-900 to-slate-900">
  <div class="max-w-[1500px] px-6 mx-auto">
    <h2 class="mb-4 text-4xl font-light tracking-wide text-center text-white animate-on-scroll fade-in-up">
      {{ $contact->heading_title }}
    </h2>
    <p class="mb-12 text-center text-gray-300 animate-on-scroll fade-in-up" style="animation-delay: 0.1s">
      {{ $contact->heading_subtitle }}
    </p>

    <div class="grid gap-10 lg:grid-cols-2 max-w-6xl mx-auto">

      <!-- Contact Info -->
      <div class="bg-gray-800 border border-gray-700 rounded-2xl p-8 md:p-10 lg:p-12 space-y-8 shadow-xl hover:shadow-2xl transition animate-on-scroll fade-in-left">

        {{-- Phone Section --}}
        <div class="flex items-start gap-5">
          <div class="flex items-center justify-center flex-shrink-0 w-14 h-14 md:w-16 md:h-16 bg-green-900 rounded-xl">
            <svg class="w-7 h-7 md:w-8 md:h-8 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
            </svg>
          </div>
          <div>
            <h3 class="mb-2 text-base md:text-lg font-semibold text-white">Telepon / WhatsApp</h3>
            <p class="text-sm md:text-base text-gray-300 font-medium">{{ $contact->phone_mobile }}</p>
          </div>
        </div>

        {{-- Address Section --}}
        <div class="flex items-start gap-5 animate-on-scroll fade-in-left" style="animation-delay: 0.1s">
          <div class="flex items-center justify-center flex-shrink-0 w-14 h-14 md:w-16 md:h-16 bg-green-900 rounded-xl">
            <svg class="w-7 h-7 md:w-8 md:h-8 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
            </svg>
          </div>
          <div>
            <h3 class="mb-2 text-lg md:text-xl font-semibold text-white">Alamat</h3>
            <p class="text-base md:text-lg text-gray-300 leading-relaxed">{{ $contact->address_lab }}</p>
            <p class="text-base md:text-lg text-gray-300 leading-relaxed">{{ $contact->address_faculty }}</p>
            <p class="text-base md:text-lg text-gray-300 leading-relaxed">{{ $contact->address_university }}</p>
            <p class="text-base md:text-lg text-gray-300 leading-relaxed">{{ $contact->address_street }}</p>
          </div>
        </div>
      </div>

      <!-- Map -->
      <div class="bg-gray-800 border border-gray-700 rounded-2xl overflow-hidden h-full min-h-[400px] md:min-h-[450px] shadow-xl animate-on-scroll fade-in-right">
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
      <div class="inline-flex items-center gap-3 px-8 py-4 bg-gray-800 border border-gray-700 rounded-2xl">
        <div class="flex items-center justify-center w-12 h-12 rounded-lg">
          <img src="img/logo_musamus.png" alt="Institution Logo" class="object-contain w-20 h-20">
        </div>
        <div class="text-left">
          <p class="text-sm text-gray-500">{{ $contact->institution_label }}</p>
          <p class="font-semibold text-white">{{ $contact->institution_name }}</p>
        </div>
      </div>
    </div>
  </div>
</section>