{{-- FILE: resources/views/nav.blade.php --}}
<nav id="navbar" class="fixed w-full z-50 transition-all duration-300">
  <div class="max-w-7xl mx-auto px-6 py-4">
    <div class="flex items-center justify-between">

      <!-- Logo -->
      <div class="flex items-center gap-2 md:gap-3 flex-1 md:flex-initial overflow-hidden">
        <!-- 3 Logo Sejajar -->
        <div class="flex items-center gap-1 md:gap-2 flex-shrink-0">
          <img src="{{ asset('img/Bima1.png') }}" alt="Bima 1" class="h-8 md:h-10 w-auto object-contain">
          <img src="{{ asset('img/Bima2.png') }}" alt="Bima 2" class="h-8 md:h-10 w-auto object-contain">
          <img src="{{ asset('img/project.png') }}" alt="Proyek" class="h-8 md:h-10 w-auto object-contain">
        </div>
        <span id="navbarText" class="logo-text heading-font font-semibold text-sm md:text-lg tracking-wide truncate transition-colors duration-300 text-white">Fun Coding Mini Simulator</span>
      </div>

      <!-- Desktop Menu -->
      <div id="navbarMenu" class="hidden md:flex items-center gap-8 text-sm font-medium transition-colors duration-300 text-white">
        <a href="#home" class="nav-link transition">Beranda</a>
        <a href="#about" class="nav-link transition">Tentang</a>
        <a href="#gallery" class="nav-link transition">Galeri</a>
        <a href="#code" class="nav-link transition">Kode Project</a>
        <a href="#contact" class="nav-link transition">Kontak</a>
      </div>

      <!-- Mobile Menu Button -->
      <button id="mobileMenuBtn" class="md:hidden p-2 rounded-lg transition nav-mobile-btn text-white">
        <svg id="menuIcon" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
        </svg>
        <svg id="closeIcon" class="w-6 h-6 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
        </svg>
      </button>
    </div>

    <!-- Mobile Menu Dropdown -->
    <div id="mobileMenu" class="hidden md:hidden mt-4 pb-4 bg-gray-900 rounded-lg">
      <div class="flex flex-col space-y-3 text-sm font-medium p-4">
        <a href="#home" class="nav-link-mobile transition py-2 px-4 rounded-lg text-white hover:bg-gray-800">Beranda</a>
        <a href="#about" class="nav-link-mobile transition py-2 px-4 rounded-lg text-white hover:bg-gray-800">Tentang</a>
        <a href="#gallery" class="nav-link-mobile transition py-2 px-4 rounded-lg text-white hover:bg-gray-800">Galeri</a>
        <a href="#code" class="nav-link-mobile transition py-2 px-4 rounded-lg text-white hover:bg-gray-800">Kode Project</a>
        <a href="#contact" class="nav-link-mobile transition py-2 px-4 rounded-lg text-white hover:bg-gray-800">Kontak</a>
      </div>
    </div>
  </div>
</nav>

{{-- Script khusus untuk Navbar (Mobile Menu Toggle & Scroll Effect) --}}
<script>
  // Navbar Elements
  const navbar = document.getElementById('navbar');
  const navbarText = document.getElementById('navbarText');
  const navbarMenu = document.getElementById('navbarMenu');
  const mobileMenuBtn = document.getElementById('mobileMenuBtn');
  const mobileMenu = document.getElementById('mobileMenu');
  const menuIcon = document.getElementById('menuIcon');
  const closeIcon = document.getElementById('closeIcon');
  const navLinks = document.querySelectorAll('.nav-link');
  const navLinksMobile = document.querySelectorAll('.nav-link-mobile');

  // Scroll Effect - Change navbar background only
  window.addEventListener('scroll', () => {
    if (window.scrollY > 50) {
      // Scrolled - Gray-900 background
      navbar.classList.add('bg-gray-900', 'border-b', 'border-gray-800', 'shadow-lg');
      navbar.classList.remove('bg-transparent');
    } else {
      // Top - Transparent background
      navbar.classList.remove('bg-gray-900', 'border-b', 'border-gray-800', 'shadow-lg');
      navbar.classList.add('bg-transparent');
    }
  });

  // Mobile Menu Toggle
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