{{-- FILE: resources/views/nav.blade.php --}}
<nav id="navbar" class="fixed w-full z-50 nav-blur border-b border-white/10 transition-all duration-300">
  <div class="max-w-7xl mx-auto px-6 py-4">
    <div class="flex items-center justify-between">
      
      <!-- Logo -->
      <div class="flex items-center gap-3">
        <!-- 3 Logo Sejajar -->
        <div class="flex items-center gap-2">
          <img src="{{ asset('img/Bima1.png') }}" alt="Bima 1" class="h-10 w-auto object-contain">
          <img src="{{ asset('img/Bima2.png') }}" alt="Bima 2" class="h-10 w-auto object-contain">
          <img src="{{ asset('img/project.png') }}" alt="Proyek" class="h-10 w-auto object-contain">
        </div>
        <span class="text-gray-800 logo-text font-semibold text-lg tracking-wide">Fun Coding Mini Simulator</span>
      </div>

      <!-- Desktop Menu -->
      <div class="hidden md:flex items-center gap-8 text-gray-800 text-sm">
        <a href="#home" class="hover:text-gray-600 transition">Beranda</a>
        <a href="#about" class="hover:text-gray-600 transition">Tentang</a>
        <a href="#gallery" class="hover:text-gray-600 transition">Galeri</a>
        <a href="#code" class="hover:text-gray-600 transition">Kode Project</a>
        <a href="#contact" class="hover:text-gray-600 transition">Kontak</a>
      </div>

      <!-- Mobile Menu Button -->
      <button id="mobileMenuBtn" class="md:hidden p-2 text-gray-800 hover:bg-gray-100 rounded-lg transition">
        <svg id="menuIcon" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
        </svg>
        <svg id="closeIcon" class="w-6 h-6 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
        </svg>
      </button>
    </div>

    <!-- Mobile Menu Dropdown -->
    <div id="mobileMenu" class="hidden md:hidden mt-4 pb-4">
      <div class="flex flex-col space-y-3 text-gray-800 text-sm">
        <a href="#home" class="hover:text-gray-600 transition py-2 px-4 hover:bg-gray-100 rounded-lg">Beranda</a>
        <a href="#about" class="hover:text-gray-600 transition py-2 px-4 hover:bg-gray-100 rounded-lg">Tentang</a>
        <a href="#gallery" class="hover:text-gray-600 transition py-2 px-4 hover:bg-gray-100 rounded-lg">Galeri</a>
        <a href="#code" class="hover:text-gray-600 transition py-2 px-4 hover:bg-gray-100 rounded-lg">Kode Project</a>
        <a href="#contact" class="hover:text-gray-600 transition py-2 px-4 hover:bg-gray-100 rounded-lg">Kontak</a>
      </div>
    </div>
  </div>
</nav>

{{-- Script khusus untuk Navbar (Mobile Menu Toggle) --}}
<script>
  // Mobile Menu Toggle
  const mobileMenuBtn = document.getElementById('mobileMenuBtn');
  const mobileMenu = document.getElementById('mobileMenu');
  const menuIcon = document.getElementById('menuIcon');
  const closeIcon = document.getElementById('closeIcon');

  mobileMenuBtn.addEventListener('click', () => {
    mobileMenu.classList.toggle('hidden');
    menuIcon.classList.toggle('hidden');
    closeIcon.classList.toggle('hidden');
  });

  // Close mobile menu when clicking on a link
  const mobileLinks = mobileMenu.querySelectorAll('a');
  mobileLinks.forEach(link => {
    link.addEventListener('click', () => {
      mobileMenu.classList.add('hidden');
      menuIcon.classList.remove('hidden');
      closeIcon.classList.add('hidden');
    });
  });

  // Close mobile menu when clicking outside
  document.addEventListener('click', (e) => {
    if (!mobileMenuBtn.contains(e.target) && !mobileMenu.contains(e.target)) {
      mobileMenu.classList.add('hidden');
      menuIcon.classList.remove('hidden');
      closeIcon.classList.add('hidden');
    }
  });
</script>