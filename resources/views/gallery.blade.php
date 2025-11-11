{{-- FILE: resources/views/gallery.blade.php --}}
<section id="gallery" class="pt-8 pb-20 bg-gradient-to-b from-gray-900 to-slate-900">
  <div class="max-w-[1500px] px-6 mx-auto">
    <h2 class="mb-4 text-4xl font-light tracking-wide text-center text-white animate-on-scroll fade-in-up">Galeri</h2>
    <p class="mb-12 text-center text-gray-300 animate-on-scroll fade-in-up" style="animation-delay: 0.1s">Dokumentasi pengembangan dan testing IoT Agriculture</p>

    {{-- SECTION: FOTO KEGIATAN --}}
    <div class="mb-16">
      <div class="flex items-center gap-3 mb-6">
        <svg class="w-6 h-6 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
          <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd"/>
        </svg>
        <h3 class="text-2xl font-semibold text-white">Foto Kegiatan</h3>
      </div>

      <!-- Photo Gallery - 2 Rows Carousel (3 photos per view, Auto-slide) -->
    @if($photos->isNotEmpty())
      @php
        // Bagi foto menjadi 2 baris
        $photosRow1 = $photos->filter(function($photo, $index) {
            return $index % 2 == 0; // Index genap: 0, 2, 4, 6...
        })->values();

        $photosRow2 = $photos->filter(function($photo, $index) {
            return $index % 2 != 0; // Index ganjil: 1, 3, 5, 7...
        })->values();
      @endphp

      <!-- Baris 1 -->
      @if($photosRow1->isNotEmpty())
      <div class="relative mb-8">
        <button id="prevBtnPhoto1" class="absolute left-0 z-10 flex items-center justify-center w-12 h-12 text-gray-300 transition-all bg-gray-800 border border-gray-600 rounded-full shadow-xl -translate-y-1/2 top-1/2 hover:bg-gray-700 hover:text-white" style="left: -20px;">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"/>
          </svg>
        </button>

        <div class="overflow-hidden">
          <div id="photoTrack1" class="flex gap-0 sm:gap-4 md:gap-6 transition-transform duration-700 ease-out">
            @foreach($photosRow1 as $photo)
              <div class="relative flex-shrink-0 overflow-hidden bg-gray-800 border border-gray-700 shadow-xl group rounded-2xl hover:shadow-2xl hover:border-blue-500 w-full sm:w-[45%] md:w-[45%] lg:w-[32%]">
                <div class="aspect-[4/3] overflow-hidden">
                  <img src="{{ $photo->image_url }}" alt="{{ $photo->deskripsi }}" class="object-cover w-full h-full transition-transform duration-700 group-hover:scale-110">
                </div>
                <div class="p-4 md:p-6 bg-gray-800">
                  <p class="text-sm md:text-base font-semibold leading-relaxed text-white">{{ $photo->deskripsi }}</p>
                </div>
              </div>
            @endforeach
          </div>
        </div>

        <button id="nextBtnPhoto1" class="absolute right-0 z-10 flex items-center justify-center w-12 h-12 text-gray-300 transition-all bg-gray-800 border border-gray-600 rounded-full shadow-xl -translate-y-1/2 top-1/2 hover:bg-gray-700 hover:text-white" style="right: -20px;">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/>
          </svg>
        </button>
      </div>
      @endif

      <!-- Baris 2 -->
      @if($photosRow2->isNotEmpty())
      <div class="relative">
        <button id="prevBtnPhoto2" class="absolute left-0 z-10 flex items-center justify-center w-12 h-12 text-gray-300 transition-all bg-gray-800 border border-gray-600 rounded-full shadow-xl -translate-y-1/2 top-1/2 hover:bg-gray-700 hover:text-white" style="left: -20px;">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"/>
          </svg>
        </button>

        <div class="overflow-hidden">
          <div id="photoTrack2" class="flex gap-0 sm:gap-4 md:gap-6 transition-transform duration-700 ease-out">
            @foreach($photosRow2 as $photo)
              <div class="relative flex-shrink-0 overflow-hidden bg-gray-800 border border-gray-700 shadow-xl group rounded-2xl hover:shadow-2xl hover:border-blue-500 w-full sm:w-[45%] md:w-[45%] lg:w-[32%]">
                <div class="aspect-[4/3] overflow-hidden">
                  <img src="{{ $photo->image_url }}" alt="{{ $photo->deskripsi }}" class="object-cover w-full h-full transition-transform duration-700 group-hover:scale-110">
                </div>
                <div class="p-4 md:p-6 bg-gray-800">
                  <p class="text-sm md:text-base font-semibold leading-relaxed text-white">{{ $photo->deskripsi }}</p>
                </div>
              </div>
            @endforeach
          </div>
        </div>

        <button id="nextBtnPhoto2" class="absolute right-0 z-10 flex items-center justify-center w-12 h-12 text-gray-300 transition-all bg-gray-800 border border-gray-600 rounded-full shadow-xl -translate-y-1/2 top-1/2 hover:bg-gray-700 hover:text-white" style="right: -20px;">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/>
          </svg>
        </button>
      </div>
      @endif

    @else
      <div class="py-16 text-center bg-gray-800 border border-gray-700 rounded-2xl">
        <svg class="w-16 h-16 mx-auto mb-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
        </svg>
        <p class="font-medium text-gray-300">Belum ada foto kegiatan.</p>
        <p class="mt-1 text-sm text-gray-500">Foto akan segera ditambahkan.</p>
      </div>
    @endif
    </div>

    {{-- SECTION: VIDEO KEGIATAN --}}
    <div>
      <div class="flex items-center gap-3 mb-6">
        <svg class="w-6 h-6 text-purple-500" fill="currentColor" viewBox="0 0 20 20">
          <path d="M2 6a2 2 0 012-2h6a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V6zM14.553 7.106A1 1 0 0014 8v4a1 1 0 00.553.894l2 1A1 1 0 0018 13V7a1 1 0 00-1.447-.894l-2 1z"/>
        </svg>
        <h3 class="text-2xl font-semibold text-white">Video Kegiatan</h3>
      </div>

      <!-- Video Demo Section -->
    @if($videos && count($videos) > 0)
      @if(count($videos) == 1)
        {{-- Jika hanya 1 video, tampilkan besar --}}
        <div class="overflow-hidden bg-gray-800 border border-gray-700 rounded-2xl animate-on-scroll fade-in-up shadow-xl">
          <div class="aspect-video">
            <iframe
                class="w-full h-full"
                src="{{ $videos->first()->embed_url }}"
                title="{{ $videos->first()->title }}"
                frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen>
            </iframe>
          </div>
          <div class="p-6 bg-gray-800 border-t border-gray-700">
            <h3 class="mb-2 text-lg font-medium text-white">{{ $videos->first()->title }}</h3>
            <p class="text-sm text-gray-300">{{ $videos->first()->description }}</p>
          </div>
        </div>
      @elseif(count($videos) == 2)
        {{-- Jika 2 video, tampilkan sejajar dalam 1 container besar --}}
        <div class="grid grid-cols-1 gap-8 md:grid-cols-2">
          @foreach($videos as $videoItem)
            <div class="overflow-hidden transition-transform duration-300 bg-gray-800 border border-gray-700 rounded-2xl hover:scale-105 hover:border-blue-500 animate-on-scroll fade-in-up shadow-xl" style="animation-delay: {{ $loop->index * 0.15 }}s">
              <div class="aspect-video">
                <iframe
                    class="w-full h-full"
                    src="{{ $videoItem->embed_url }}"
                    title="{{ $videoItem->title }}"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen>
                </iframe>
              </div>
              <div class="p-5 bg-gray-800 border-t border-gray-700">
                <h3 class="mb-2 text-base font-medium text-white">{{ $videoItem->title }}</h3>
                <p class="text-sm leading-relaxed text-gray-300 line-clamp-3">{{ $videoItem->description }}</p>
              </div>
            </div>
          @endforeach
        </div>
      @else
        {{-- Jika ada 3+ video, tampilkan dalam grid responsive --}}
        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
          @foreach($videos as $videoItem)
            <div class="overflow-hidden transition-transform duration-300 bg-gray-800 border border-gray-700 rounded-xl hover:scale-105 hover:border-blue-500 animate-on-scroll fade-in-up shadow-xl" style="animation-delay: {{ $loop->index * 0.1 }}s">
              <div class="aspect-video">
                <iframe
                    class="w-full h-full"
                    src="{{ $videoItem->embed_url }}"
                    title="{{ $videoItem->title }}"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen>
                </iframe>
              </div>
              <div class="p-4 bg-gray-800 border-t border-gray-700">
                <h3 class="mb-1 text-base font-medium text-white line-clamp-1">{{ $videoItem->title }}</h3>
                <p class="text-xs text-gray-300 line-clamp-2">{{ $videoItem->description }}</p>
              </div>
            </div>
          @endforeach
        </div>
      @endif
    @else
      {{-- Jika tidak ada video --}}
      <div class="py-16 text-center bg-gray-800 border border-gray-700 rounded-2xl animate-on-scroll fade-in-up">
        <svg class="w-16 h-16 mx-auto mb-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/>
        </svg>
        <p class="font-medium text-gray-300">Belum ada video kegiatan.</p>
        <p class="mt-1 text-sm text-gray-500">Video akan segera ditambahkan.</p>
      </div>
    @endif
    </div>

  </div>
</section>

{{-- Script for Photo Carousel with Auto-slide (1 photo at a time, Responsive) --}}
<script>
document.addEventListener('DOMContentLoaded', () => {
    function initPhotoCarousel(trackId, prevBtnId, nextBtnId, autoSlide = true) {
        const track = document.getElementById(trackId);
        const prevBtn = document.getElementById(prevBtnId);
        const nextBtn = document.getElementById(nextBtnId);

        if (!track || !prevBtn || !nextBtn) return;

        const cards = track.children;
        const totalCards = cards.length;
        let currentIndex = 0;
        let autoSlideInterval;

        // Fungsi untuk mendapatkan jumlah foto yang terlihat berdasarkan ukuran layar
        function getVisibleCards() {
            const width = window.innerWidth;
            if (width < 640) return 1; // mobile: 1 foto
            if (width < 1024) return 2; // tablet: 2 foto
            return 3; // desktop: 3 foto
        }

        // Fungsi untuk mendapatkan lebar card + gap dari DOM
        function getCardWidth() {
            if (cards.length === 0) return 0;
            const card = cards[0];
            const cardRect = card.getBoundingClientRect();
            const computedStyle = window.getComputedStyle(track);
            const gap = parseFloat(computedStyle.gap) || 0;
            return cardRect.width + gap;
        }

        function updateCarousel() {
            // Dapatkan lebar card secara dinamis dari DOM
            const cardWidth = getCardWidth();
            const visibleCards = getVisibleCards();

            // Slide per 1 foto (offset berdasarkan index)
            const offset = currentIndex * cardWidth;
            track.style.transform = `translateX(-${offset}px)`;

            // Update button states - berhenti di foto terakhir tanpa space kosong
            // maxIndex = totalCards - visibleCards (agar selalu terlihat penuh)
            const maxIndex = Math.max(0, totalCards - visibleCards);

            prevBtn.style.opacity = currentIndex === 0 ? '0.3' : '1';
            prevBtn.style.cursor = currentIndex === 0 ? 'not-allowed' : 'pointer';
            prevBtn.disabled = currentIndex === 0;

            nextBtn.style.opacity = currentIndex >= maxIndex ? '0.3' : '1';
            nextBtn.style.cursor = currentIndex >= maxIndex ? 'not-allowed' : 'pointer';
            nextBtn.disabled = currentIndex >= maxIndex;
        }

        function nextSlide() {
            const visibleCards = getVisibleCards();
            const maxIndex = Math.max(0, totalCards - visibleCards);

            // Berhenti di foto terakhir (tidak loop)
            if (currentIndex < maxIndex) {
                currentIndex++;
                updateCarousel();
            } else {
                // Berhenti auto-slide saat mencapai akhir
                if (autoSlide) {
                    clearInterval(autoSlideInterval);
                }
            }
        }

        function prevSlide() {
            if (currentIndex > 0) {
                currentIndex--;
                updateCarousel();
                // Restart auto-slide jika sebelumnya berhenti
                if (autoSlide && !autoSlideInterval) {
                    startAutoSlide();
                }
            }
        }

        // Button click handlers
        nextBtn.addEventListener('click', () => {
            nextSlide();
            // Reset auto-slide timer when manually clicked
            if (autoSlide && autoSlideInterval) {
                clearInterval(autoSlideInterval);
                startAutoSlide();
            }
        });

        prevBtn.addEventListener('click', () => {
            prevSlide();
            // Reset auto-slide timer when manually clicked
            if (autoSlide && autoSlideInterval) {
                clearInterval(autoSlideInterval);
                startAutoSlide();
            }
        });

        // Auto-slide functionality
        function startAutoSlide() {
            if (!autoSlide) return;
            autoSlideInterval = setInterval(() => {
                nextSlide();
            }, 5000); // Slide every 5 seconds
        }

        // Pause auto-slide on hover
        track.addEventListener('mouseenter', () => {
            if (autoSlide && autoSlideInterval) clearInterval(autoSlideInterval);
        });

        track.addEventListener('mouseleave', () => {
            // Hanya restart jika belum sampai akhir
            const visibleCards = getVisibleCards();
            const maxIndex = Math.max(0, totalCards - visibleCards);
            if (autoSlide && currentIndex < maxIndex) {
                startAutoSlide();
            }
        });

        // Responsive: update on window resize
        let resizeTimeout;
        window.addEventListener('resize', () => {
            clearTimeout(resizeTimeout);
            resizeTimeout = setTimeout(() => {
                // Reset ke index 0 jika current index melebihi batas baru
                const visibleCards = getVisibleCards();
                const maxIndex = Math.max(0, totalCards - visibleCards);
                if (currentIndex > maxIndex) {
                    currentIndex = maxIndex;
                }
                updateCarousel();

                // Restart auto-slide jika belum di akhir
                if (autoSlide && currentIndex < maxIndex && !autoSlideInterval) {
                    startAutoSlide();
                }
            }, 250);
        });

        // Initialize
        updateCarousel();
        const visibleCards = getVisibleCards();
        if (autoSlide && totalCards > visibleCards) {
            startAutoSlide();
        }
    }

    // Initialize both rows with auto-slide enabled
    initPhotoCarousel('photoTrack1', 'prevBtnPhoto1', 'nextBtnPhoto1', true);
    initPhotoCarousel('photoTrack2', 'prevBtnPhoto2', 'nextBtnPhoto2', true);
});
</script>

