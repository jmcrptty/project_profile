{{-- FILE: resources/views/gallery.blade.php --}}
<section id="gallery" class="py-20 bg-white">
  <div class="max-w-6xl px-6 mx-auto">
    <h2 class="mb-4 text-4xl font-light tracking-wide text-center text-gray-800 animate-on-scroll fade-in-up">Galeri</h2>
    <p class="mb-12 text-center text-gray-600 animate-on-scroll fade-in-up" style="animation-delay: 0.1s">Dokumentasi pengembangan dan testing IoT Agriculture</p>

    <!-- Photo Gallery with Navigation -->
    <div class="relative mb-12">
      <button id="prevBtnGallery" 
              class="absolute left-0 z-10 flex items-center justify-center w-10 h-10 text-gray-600 transition-all -translate-x-4 -translate-y-1/2 bg-white rounded-full shadow-lg top-1/2 hover:bg-gray-50">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
        </svg>
      </button>

      <div class="overflow-hidden">
        @if($photos->isNotEmpty())
          <div id="galleryTrack" class="flex gap-4 transition-transform duration-500 ease-out md:gap-6">
              @foreach($photos as $photo)
                  <div class="min-w-[calc(100%-16px)] sm:min-w-[calc(50%-12px)] md:min-w-[calc(33.333%-16px)] gallery-item relative aspect-[1280/853] bg-gray-200 rounded-2xl overflow-hidden animate-on-scroll fade-in-up flex-shrink-0">
                      <img src="{{ $photo->image_url }}" alt="{{ $photo->deskripsi }}" class="object-cover w-full h-full">
                      <div class="absolute inset-0 flex items-end p-4 bg-gradient-to-t from-black/50 to-transparent">
                          <p class="text-sm text-white">{{ $photo->deskripsi }}</p>
                      </div>
                  </div>
              @endforeach
          </div>
        @else
            <div class="py-12 text-center text-gray-500 bg-gray-50 rounded-2xl">
                <p>Belum ada foto yang diunggah di galeri.</p>
            </div>
        @endif
      </div>

      <button id="nextBtnGallery" 
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

{{-- Script galery foto carousel --}}
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const galleryTrack = document.getElementById('galleryTrack');
        if (!galleryTrack) return; 

        const prevBtnGallery = document.getElementById('prevBtnGallery');
        const nextBtnGallery = document.getElementById('nextBtnGallery');
        
        const galleryItems = galleryTrack.children;
        if (galleryItems.length === 0) return;

        let galleryIndex = 0;
        
        function getGalleryCardWidth() {
            const gap = window.innerWidth < 768 ? 16 : 24; // 4 (md:6) * 4px
            return galleryItems[0].offsetWidth + gap;
        }
        
        function updateGalleryCarousel() {
            const containerWidth = galleryTrack.parentElement.offsetWidth;
            const totalContentWidth = galleryTrack.scrollWidth;
            
            if (totalContentWidth <= containerWidth) {
                // center kalo sedikit
                galleryTrack.style.justifyContent = 'center';
                prevBtnGallery.style.display = 'none';
                nextBtnGallery.style.display = 'none';
            } else {
                // carousel pada umumnya
                galleryTrack.style.justifyContent = 'flex-start';
                prevBtnGallery.style.display = 'flex';
                nextBtnGallery.style.display = 'flex';
            }
            
            const cardWidth = getGalleryCardWidth();
            
            const maxOffset = Math.max(0, totalContentWidth - containerWidth);
            
            let currentOffset = galleryIndex * cardWidth;
            if (currentOffset > maxOffset) {
                galleryIndex = Math.floor(maxOffset / cardWidth);
                currentOffset = galleryIndex * cardWidth;
            }

            galleryTrack.style.transform = `translateX(-${currentOffset}px)`;
            
            prevBtnGallery.disabled = galleryIndex === 0;
            nextBtnGallery.disabled = currentOffset >= maxOffset - 2;
            
            prevBtnGallery.style.opacity = prevBtnGallery.disabled ? '0.3' : '1';
            nextBtnGallery.style.opacity = nextBtnGallery.disabled ? '0.3' : '1';
        }

        prevBtnGallery.addEventListener('click', () => {
            if (galleryIndex > 0) {
                galleryIndex--;
                updateGalleryCarousel();
            }
        });

        nextBtnGallery.addEventListener('click', () => {
            if (!nextBtnGallery.disabled) {
                galleryIndex++;
                updateGalleryCarousel();
            }
        });
        
        let resizeTimeout;
        window.addEventListener('resize', () => {
            clearTimeout(resizeTimeout);
            resizeTimeout = setTimeout(updateGalleryCarousel, 250);
        });
        
        setTimeout(updateGalleryCarousel, 100);
    });
</script>