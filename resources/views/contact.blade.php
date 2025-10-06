{{-- FILE: resources/views/contact.blade.php --}}
<section id="contact" class="py-20 bg-white">
  <div class="max-w-4xl mx-auto px-6">
    <h2 class="text-4xl font-light text-gray-800 text-center mb-4 tracking-wide animate-on-scroll fade-in-up">Kontak</h2>
    <p class="text-center text-gray-600 mb-12 animate-on-scroll fade-in-up" style="animation-delay: 0.1s">Hubungi kami untuk informasi lebih lanjut tentang project ini</p>

    <div class="grid md:grid-cols-2 gap-8">
      
      <!-- Contact Info -->
      <div class="space-y-6">
        <div class="flex items-start gap-4 animate-on-scroll fade-in-left">
          <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center flex-shrink-0">
            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
            </svg>
          </div>
          <div>
            <h3 class="font-medium text-gray-800 mb-1">Email</h3>
            <p class="text-gray-600 text-sm">iot.agriculture@university.ac.id</p>
            <p class="text-gray-600 text-sm">dr.andisaputra@university.ac.id</p>
          </div>
        </div>

        <div class="flex items-start gap-4 animate-on-scroll fade-in-left" style="animation-delay: 0.1s">
          <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center flex-shrink-0">
            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
            </svg>
          </div>
          <div>
            <h3 class="font-medium text-gray-800 mb-1">Telepon / WhatsApp</h3>
            <p class="text-gray-600 text-sm">+62 812-3456-7890</p>
            <p class="text-gray-600 text-sm">Lab IoT: (031) 123-4567</p>
          </div>
        </div>

        <div class="flex items-start gap-4 animate-on-scroll fade-in-left" style="animation-delay: 0.2s">
          <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center flex-shrink-0">
            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
            </svg>
          </div>
          <div>
            <h3 class="font-medium text-gray-800 mb-1">Alamat</h3>
            <p class="text-gray-600 text-sm">Laboratorium IoT & Embedded Systems</p>
            <p class="text-gray-600 text-sm">Fakultas Teknik Informatika</p>
            <p class="text-gray-600 text-sm">Universitas Teknologi Nusantara</p>
            <p class="text-gray-600 text-sm">Jl. Teknologi No. 123, Surabaya 60111</p>
          </div>
        </div>
      </div>

      <!-- Map -->
      <div class="bg-gray-200 rounded-2xl overflow-hidden h-full min-h-[300px] animate-on-scroll fade-in-right">
        <iframe 
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.344!2d112.7366!3d-7.2504!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zN8KwMTUnMDEuNCJTIDExMsKwNDQnMTEuOCJF!5e0!3m2!1sen!2sid!4v1234567890" 
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
        <div class="w-12 h-12 bg-green-600 rounded-lg flex items-center justify-center">
          <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z"/>
          </svg>
        </div>
        <div class="text-left">
          <p class="text-sm text-gray-500">Supported by</p>
          <p class="font-semibold text-gray-800">Universitas Teknologi Nusantara</p>
        </div>
      </div>
    </div>
  </div>
</section>

{{-- Script khusus untuk Contact Section (tidak ada script khusus) --}}
<script>
  // Tidak ada script khusus untuk contact section
  // Google Maps sudah otomatis load dengan iframe
  // Semua animasi di-handle oleh global script di app.blade.php
</script>