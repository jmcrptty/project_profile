{{-- FILE: resources/views/gallery.blade.php --}}
<section id="gallery" class="py-20 bg-white">
  <div class="max-w-6xl mx-auto px-6">
    <h2 class="text-4xl font-light text-gray-800 text-center mb-4 tracking-wide animate-on-scroll fade-in-up">Galeri</h2>
    <p class="text-center text-gray-600 mb-12 animate-on-scroll fade-in-up" style="animation-delay: 0.1s">Dokumentasi pengembangan dan testing IoT Agriculture</p>

    <!-- Photo Gallery with Navigation -->
    <div class="relative mb-12">
      <button id="prevBtnGallery" 
              class="absolute left-0 top-1/2 -translate-y-1/2 -translate-x-4 w-10 h-10 bg-white shadow-lg rounded-full hover:bg-gray-50 transition-all z-10 flex items-center justify-center text-gray-600">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
        </svg>
      </button>

      <div class="overflow-hidden">
        <div id="galleryTrack" class="flex gap-6 transition-transform duration-500 ease-out">
          
          <div class="min-w-[calc(33.333%-16px)] gallery-item relative h-64 bg-gray-200 rounded-2xl overflow-hidden animate-on-scroll fade-in-up">
            <img src="https://images.unsplash.com/photo-1530836369250-ef72a3f5cda8?w=600" alt="IoT Setup" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent flex items-end p-4">
              <p class="text-white text-sm">Instalasi Sensor IoT</p>
            </div>
          </div>

          <div class="min-w-[calc(33.333%-16px)] gallery-item relative h-64 bg-gray-200 rounded-2xl overflow-hidden animate-on-scroll fade-in-up" style="animation-delay: 0.1s">
            <img src="https://images.unsplash.com/photo-1625246333195-78d9c38ad449?w=600" alt="Dashboard" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent flex items-end p-4">
              <p class="text-white text-sm">Dashboard Monitoring</p>
            </div>
          </div>

          <div class="min-w-[calc(33.333%-16px)] gallery-item relative h-64 bg-gray-200 rounded-2xl overflow-hidden animate-on-scroll fade-in-up" style="animation-delay: 0.2s">
            <img src="https://images.unsplash.com/photo-1464226184884-fa280b87c399?w=600" alt="Field Test" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent flex items-end p-4">
              <p class="text-white text-sm">Testing di Lapangan</p>
            </div>
          </div>

          <div class="min-w-[calc(33.333%-16px)] gallery-item relative h-64 bg-gray-200 rounded-2xl overflow-hidden animate-on-scroll fade-in-up" style="animation-delay: 0.3s">
            <img src="https://images.unsplash.com/photo-1416879595882-3373a0480b5b?w=600" alt="Hardware" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent flex items-end p-4">
              <p class="text-white text-sm">Perangkat Hardware</p>
            </div>
          </div>

          <div class="min-w-[calc(33.333%-16px)] gallery-item relative h-64 bg-gray-200 rounded-2xl overflow-hidden animate-on-scroll fade-in-up" style="animation-delay: 0.4s">
            <img src="https://images.unsplash.com/photo-1574943320219-553eb213f72d?w=600" alt="Data Analysis" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent flex items-end p-4">
              <p class="text-white text-sm">Analisis Data Sensor</p>
            </div>
          </div>

          <div class="min-w-[calc(33.333%-16px)] gallery-item relative h-64 bg-gray-200 rounded-2xl overflow-hidden animate-on-scroll fade-in-up" style="animation-delay: 0.5s">
            <img src="https://images.unsplash.com/photo-1625246333195-78d9c38ad449?w=600" alt="Team Work" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent flex items-end p-4">
              <p class="text-white text-sm">Tim Development</p>
            </div>
          </div>

          <div class="min-w-[calc(33.333%-16px)] gallery-item relative h-64 bg-gray-200 rounded-2xl overflow-hidden animate-on-scroll fade-in-up" style="animation-delay: 0.6s">
            <img src="https://images.unsplash.com/photo-1592982537447-7440770cbfc9?w=600" alt="Circuit Board" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent flex items-end p-4">
              <p class="text-white text-sm">Rangkaian Elektronik</p>
            </div>
          </div>

          <div class="min-w-[calc(33.333%-16px)] gallery-item relative h-64 bg-gray-200 rounded-2xl overflow-hidden animate-on-scroll fade-in-up" style="animation-delay: 0.7s">
            <img src="https://images.unsplash.com/photo-1563207153-f403bf289096?w=600" alt="Mobile App" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent flex items-end p-4">
              <p class="text-white text-sm">Aplikasi Mobile</p>
            </div>
          </div>

          <div class="min-w-[calc(33.333%-16px)] gallery-item relative h-64 bg-gray-200 rounded-2xl overflow-hidden animate-on-scroll fade-in-up" style="animation-delay: 0.8s">
            <img src="https://images.unsplash.com/photo-1500382017468-9049fed747ef?w=600" alt="Green House" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent flex items-end p-4">
              <p class="text-white text-sm">Green House Monitoring</p>
            </div>
          </div>

          <div class="min-w-[calc(33.333%-16px)] gallery-item relative h-64 bg-gray-200 rounded-2xl overflow-hidden animate-on-scroll fade-in-up" style="animation-delay: 0.9s">
            <img src="https://images.unsplash.com/photo-1542601906990-b4d3fb778b09?w=600" alt="Sensor Installation" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent flex items-end p-4">
              <p class="text-white text-sm">Pemasangan Sensor</p>
            </div>
          </div>

        </div>
      </div>

      <button id="nextBtnGallery" 
              class="absolute right-0 top-1/2 -translate-y-1/2 translate-x-4 w-10 h-10 bg-white shadow-lg rounded-full hover:bg-gray-50 transition-all z-10 flex items-center justify-center text-gray-600">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
        </svg>
      </button>
    </div>

    <!-- Video Demo -->
    <div class="bg-gray-900 rounded-2xl overflow-hidden animate-on-scroll fade-in-up">
      <div class="aspect-video">
        <iframe 
          class="w-full h-full" 
          src="https://www.youtube.com/embed/dQw4w9WgXcQ" 
          title="Demo Project IoT Agriculture" 
          frameborder="0" 
          allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
          allowfullscreen>
        </iframe>
      </div>
      <div class="p-6 bg-gray-800">
        <h3 class="text-white text-lg font-medium mb-2">Demo Project IoT Agriculture</h3>
        <p class="text-gray-400 text-sm">Demonstrasi lengkap sistem monitoring dan kontrol otomatis pertanian menggunakan sensor IoT</p>
      </div>
    </div>
  </div>
</section>

{{-- Script khusus untuk Gallery Section (Gallery Carousel) --}}
<script>
  // Gallery Carousel
  const galleryTrack = document.getElementById('galleryTrack');
  const prevBtnGallery = document.getElementById('prevBtnGallery');
  const nextBtnGallery = document.getElementById('nextBtnGallery');
  
  const galleryItems = galleryTrack.children;
  let galleryIndex = 0;
  
  function getGalleryCardWidth() {
    return galleryItems[0].offsetWidth + 24; // card width + gap
  }
  
  function getVisibleGalleryCards() {
    const containerWidth = galleryTrack.parentElement.offsetWidth;
    const cardWidth = getGalleryCardWidth();
    return Math.floor(containerWidth / cardWidth);
  }
  
  function getMaxGalleryIndex() {
    return Math.max(0, galleryItems.length - getVisibleGalleryCards());
  }

  function updateGalleryCarousel() {
    const cardWidth = getGalleryCardWidth();
    const offset = -galleryIndex * cardWidth;
    galleryTrack.style.transform = `translateX(${offset}px)`;
    
    const maxIndex = getMaxGalleryIndex();
    
    prevBtnGallery.disabled = galleryIndex === 0;
    nextBtnGallery.disabled = galleryIndex === maxIndex;
    
    prevBtnGallery.style.opacity = galleryIndex === 0 ? '0.3' : '1';
    nextBtnGallery.style.opacity = galleryIndex === maxIndex ? '0.3' : '1';
  }

  prevBtnGallery.addEventListener('click', () => {
    if (galleryIndex > 0) {
      galleryIndex--;
      updateGalleryCarousel();
    }
  });

  nextBtnGallery.addEventListener('click', () => {
    if (galleryIndex < getMaxGalleryIndex()) {
      galleryIndex++;
      updateGalleryCarousel();
    }
  });

  // Update gallery on window resize
  window.addEventListener('resize', () => {
    galleryIndex = Math.min(galleryIndex, getMaxGalleryIndex());
    updateGalleryCarousel();
  });

  updateGalleryCarousel();
</script>