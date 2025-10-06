{{-- FILE: resources/views/footer.blade.php --}}
<footer class="bg-gray-900 text-white py-12">
  <div class="max-w-6xl mx-auto px-6">
    <div class="grid md:grid-cols-3 gap-8 mb-8">
      
      <!-- Brand & Description -->
      <div>
        <div class="flex items-center gap-3 mb-4">
          <div class="w-10 h-10 bg-green-600 rounded-lg flex items-center justify-center">
            <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
              <path d="M10 3.5a1.5 1.5 0 013 0V4a1 1 0 001 1h3a1 1 0 011 1v3a1 1 0 01-1 1h-.5a1.5 1.5 0 000 3h.5a1 1 0 011 1v3a1 1 0 01-1 1h-3a1 1 0 01-1-1v-.5a1.5 1.5 0 00-3 0v.5a1 1 0 01-1 1H6a1 1 0 01-1-1v-3a1 1 0 00-1-1h-.5a1.5 1.5 0 010-3H4a1 1 0 001-1V6a1 1 0 011-1h3a1 1 0 001-1v-.5z"/>
            </svg>
          </div>
          <span class="font-semibold text-lg">AGRITECH IoT</span>
        </div>
        <p class="text-gray-400 text-sm">Meningkatkan produktivitas pertanian dengan teknologi IoT modern</p>
      </div>
      
      <!-- Quick Links -->
      <div>
        <h3 class="font-semibold mb-4">Quick Links</h3>
        <ul class="space-y-2 text-sm text-gray-400">
          <li><a href="#home" class="hover:text-white transition">Beranda</a></li>
          <li><a href="#about" class="hover:text-white transition">Tentang</a></li>
          <li><a href="#gallery" class="hover:text-white transition">Galeri</a></li>
          <li><a href="#code" class="hover:text-white transition">Kode Project</a></li>
          <li><a href="#contact" class="hover:text-white transition">Kontak</a></li>
        </ul>
      </div>
      
      <!-- Social Media -->
      <div>
        <h3 class="font-semibold mb-4">Follow Us</h3>
        <div class="flex gap-3">
          <a href="#" class="w-10 h-10 bg-gray-800 rounded-lg flex items-center justify-center hover:bg-green-600 transition" aria-label="Facebook">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
              <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
            </svg>
          </a>
          <a href="#" class="w-10 h-10 bg-gray-800 rounded-lg flex items-center justify-center hover:bg-green-600 transition" aria-label="Twitter">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
              <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
            </svg>
          </a>
          <a href="#" class="w-10 h-10 bg-gray-800 rounded-lg flex items-center justify-center hover:bg-green-600 transition" aria-label="GitHub">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
              <path d="M12 0C5.374 0 0 5.373 0 12c0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23A11.509 11.509 0 0112 5.803c1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576C20.566 21.797 24 17.3 24 12c0-6.627-5.373-12-12-12z"/>
            </svg>
          </a>
        </div>
      </div>
    </div>
    
    <!-- Copyright -->
    <div class="border-t border-gray-800 pt-8 text-center text-sm text-gray-400">
      <p>&copy; <span id="currentYear"></span> AgriTech IoT Project. All rights reserved. | Universitas Teknologi Nusantara</p>
    </div>
  </div>
</footer>

{{-- Script khusus untuk Footer (Dynamic Year) --}}
<script>
  // Set current year dynamically
  document.getElementById('currentYear').textContent = new Date().getFullYear();
</script>