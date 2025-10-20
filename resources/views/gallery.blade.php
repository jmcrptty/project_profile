{{-- FILE: resources/views/gallery.blade.php --}}
<section id="gallery" class="py-20 bg-white">
  <div class="max-w-6xl px-6 mx-auto">
    <h2 class="mb-4 text-4xl font-light tracking-wide text-center text-gray-800 animate-on-scroll fade-in-up">Galeri</h2>
    <p class="mb-12 text-center text-gray-600 animate-on-scroll fade-in-up" style="animation-delay: 0.1s">Dokumentasi pengembangan dan testing IoT Agriculture</p>

    <!-- Photo Gallery - Baris 1 -->
    <div class="relative mb-8">
      <button id="prevBtnRow1"
              class="absolute left-0 z-10 flex items-center justify-center w-10 h-10 text-gray-600 transition-all -translate-x-4 -translate-y-1/2 bg-white rounded-full shadow-lg top-1/2 hover:bg-gray-50">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
        </svg>
      </button>

      <div class="overflow-hidden">
        @if($photosRow1->isNotEmpty())
          <div id="galleryTrackRow1" class="flex gap-4 transition-transform duration-500 ease-out md:gap-6">
              @foreach($photosRow1 as $photo)
                  <div class="min-w-[calc(100%-16px)] sm:min-w-[calc(50%-12px)] md:min-w-[calc(33.333%-16px)] gallery-item relative bg-gray-200 rounded-2xl overflow-hidden animate-on-scroll fade-in-up flex-shrink-0" style="height: 200px;">
                      <img src="{{ $photo->image_url }}" alt="{{ $photo->deskripsi }}" class="object-cover w-full h-full">
                      <div class="absolute inset-0 flex items-end p-4 bg-gradient-to-t from-black/50 to-transparent">
                          <p class="text-sm text-white">{{ $photo->deskripsi }}</p>
                      </div>
                  </div>
              @endforeach
          </div>
        @else
            <div class="py-12 text-center text-gray-500 bg-gray-50 rounded-2xl">
                <p>Belum ada foto di baris pertama.</p>
            </div>
        @endif
      </div>

      <button id="nextBtnRow1"
              class="absolute right-0 z-10 flex items-center justify-center w-10 h-10 text-gray-600 transition-all translate-x-4 -translate-y-1/2 bg-white rounded-full shadow-lg top-1/2 hover:bg-gray-50">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
        </svg>
      </button>
    </div>

    <!-- Photo Gallery - Baris 2 -->
    <div class="relative mb-12">
      <button id="prevBtnRow2"
              class="absolute left-0 z-10 flex items-center justify-center w-10 h-10 text-gray-600 transition-all -translate-x-4 -translate-y-1/2 bg-white rounded-full shadow-lg top-1/2 hover:bg-gray-50">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
        </svg>
      </button>

      <div class="overflow-hidden">
        @if($photosRow2->isNotEmpty())
          <div id="galleryTrackRow2" class="flex gap-4 transition-transform duration-500 ease-out md:gap-6">
              @foreach($photosRow2 as $photo)
                  <div class="min-w-[calc(100%-16px)] sm:min-w-[calc(50%-12px)] md:min-w-[calc(33.333%-16px)] gallery-item relative bg-gray-200 rounded-2xl overflow-hidden animate-on-scroll fade-in-up flex-shrink-0" style="height: 200px;">
                      <img src="{{ $photo->image_url }}" alt="{{ $photo->deskripsi }}" class="object-cover w-full h-full">
                      <div class="absolute inset-0 flex items-end p-4 bg-gradient-to-t from-black/50 to-transparent">
                          <p class="text-sm text-white">{{ $photo->deskripsi }}</p>
                      </div>
                  </div>
              @endforeach
          </div>
        @else
            <div class="py-12 text-center text-gray-500 bg-gray-50 rounded-2xl">
                <p>Belum ada foto di baris kedua.</p>
            </div>
        @endif
      </div>

      <button id="nextBtnRow2"
              class="absolute right-0 z-10 flex items-center justify-center w-10 h-10 text-gray-600 transition-all translate-x-4 -translate-y-1/2 bg-white rounded-full shadow-lg top-1/2 hover:bg-gray-50">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
        </svg>
      </button>
    </div>

    <!-- Video Demo -->
    <div class="overflow-hidden bg-gray-900 rounded-2xl animate-on-scroll fade-in-up">
      <div class="aspect-video">
        <iframe 
            id="videoPreview"
            class="w-full h-full" 
            src="{{ $video->embed_url }}" 
            title="{{ $video->title }}" 
            frameborder="0" 
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
            allowfullscreen>
        </iframe>
      </div>
      <div class="p-6 bg-gray-800">
        <h3 class="mb-2 text-lg font-medium text-white">{{ $video->title }}</h3>
        <p class="text-sm text-gray-400">{{ $video->description }}</p>
      </div>
    </div>
  </div>
</section>

{{-- Script galery foto carousel - 2 baris terpisah --}}
<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Fungsi untuk inisialisasi carousel
        function initCarousel(trackId, prevBtnId, nextBtnId) {
            const track = document.getElementById(trackId);
            if (!track) return;

            const prevBtn = document.getElementById(prevBtnId);
            const nextBtn = document.getElementById(nextBtnId);

            const items = track.children;
            if (items.length === 0) return;

            let currentIndex = 0;

            function getCardWidth() {
                const gap = window.innerWidth < 768 ? 16 : 24;
                return items[0].offsetWidth + gap;
            }

            function updateCarousel() {
                const containerWidth = track.parentElement.offsetWidth;
                const totalContentWidth = track.scrollWidth;

                if (totalContentWidth <= containerWidth) {
                    // Center jika konten sedikit
                    track.style.justifyContent = 'center';
                    prevBtn.style.display = 'none';
                    nextBtn.style.display = 'none';
                } else {
                    // Carousel normal
                    track.style.justifyContent = 'flex-start';
                    prevBtn.style.display = 'flex';
                    nextBtn.style.display = 'flex';
                }

                const cardWidth = getCardWidth();
                const maxOffset = Math.max(0, totalContentWidth - containerWidth);

                let currentOffset = currentIndex * cardWidth;
                if (currentOffset > maxOffset) {
                    currentIndex = Math.floor(maxOffset / cardWidth);
                    currentOffset = currentIndex * cardWidth;
                }

                track.style.transform = `translateX(-${currentOffset}px)`;

                prevBtn.disabled = currentIndex === 0;
                nextBtn.disabled = currentOffset >= maxOffset - 2;

                prevBtn.style.opacity = prevBtn.disabled ? '0.3' : '1';
                nextBtn.style.opacity = nextBtn.disabled ? '0.3' : '1';
            }

            prevBtn.addEventListener('click', () => {
                if (currentIndex > 0) {
                    currentIndex--;
                    updateCarousel();
                }
            });

            nextBtn.addEventListener('click', () => {
                if (!nextBtn.disabled) {
                    currentIndex++;
                    updateCarousel();
                }
            });

            let resizeTimeout;
            window.addEventListener('resize', () => {
                clearTimeout(resizeTimeout);
                resizeTimeout = setTimeout(updateCarousel, 250);
            });

            setTimeout(updateCarousel, 100);
        }

        // Inisialisasi carousel untuk baris 1
        initCarousel('galleryTrackRow1', 'prevBtnRow1', 'nextBtnRow1');

        // Inisialisasi carousel untuk baris 2
        initCarousel('galleryTrackRow2', 'prevBtnRow2', 'nextBtnRow2');
    });
</script>