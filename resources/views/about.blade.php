{{-- FILE: resources/views/about.blade.php --}}
<section id="about" class="py-20 bg-gradient-to-b from-white to-gray-50">
  <div class="max-w-7xl mx-auto px-6">
    <h2 class="text-5xl font-bold text-gray-800 text-center mb-20 tracking-tight animate-on-scroll fade-in-up">
      Tentang Proyek
    </h2>

    <!-- Background & Goals with Better Layout -->
    <div class="grid md:grid-cols-2 gap-12 mb-32">
      <!-- Latar Belakang -->
      <div class="bg-white rounded-2xl shadow-lg p-10 animate-on-scroll fade-in-left hover:shadow-2xl transition-shadow duration-300">
        <div class="flex items-center gap-3 mb-6">
          <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-xl flex items-center justify-center">
            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
            </svg>
          </div>
          <h3 class="text-2xl font-bold text-gray-800">Latar Belakang</h3>
        </div>
        <p class="text-gray-700 leading-relaxed text-justify" style="text-indent: 2em;">
          {{ $background->content ?? 'Belum ada latar belakang' }}
        </p>
      </div>

      <!-- Tujuan Project -->
      <div class="bg-white rounded-2xl shadow-lg p-10 animate-on-scroll fade-in-right hover:shadow-2xl transition-shadow duration-300">
        <div class="flex items-center gap-3 mb-6">
          <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-emerald-600 rounded-xl flex items-center justify-center">
            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/>
            </svg>
          </div>
          <h3 class="text-2xl font-bold text-gray-800">Tujuan Project</h3>
        </div>
        <ul class="space-y-4">
          @if($goals && $goals->content)
            @foreach($goals->goals_array as $goal)
            <li class="flex items-start gap-3 group">
              <span class="flex-shrink-0 w-6 h-6 bg-gradient-to-br from-green-400 to-emerald-500 rounded-full flex items-center justify-center mt-0.5 group-hover:scale-110 transition-transform">
                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                </svg>
              </span>
              <span class="text-gray-700 leading-relaxed">{{ $goal }}</span>
            </li>
            @endforeach
          @else
            <li class="text-gray-400 text-center py-4">Belum ada tujuan</li>
          @endif
        </ul>
      </div>
    </div>

    <!-- Tim Dosen Section -->
    <div class="mb-32">
      <div class="text-center mb-12">
        <h2 class="text-4xl font-bold text-gray-800 mb-3 animate-on-scroll fade-in-up">Tim Dosen</h2>
        <div class="w-24 h-1 bg-gradient-to-r from-yellow-400 to-yellow-600 mx-auto rounded-full"></div>
      </div>

      @if($dosens && $dosens->count() > 0)
      <div class="relative" id="dosenCarouselSection">
        <button id="prevBtnDosen"
                class="absolute left-0 top-1/2 -translate-y-1/2 -translate-x-6 w-12 h-12 bg-white shadow-xl rounded-full hover:bg-yellow-50 hover:scale-110 transition-all z-10 flex items-center justify-center text-yellow-600">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"/>
          </svg>
        </button>

        <div class="overflow-hidden px-4">
          <div id="carouselTrackDosen" class="flex gap-8 transition-transform duration-500 ease-out">

            @foreach($dosens as $index => $dosen)
            <div class="min-w-[340px] bg-white border-2 border-gray-100 rounded-3xl p-8 text-center hover:border-yellow-400 hover:shadow-2xl transition-all duration-300 animate-on-scroll fade-in-up group" style="animation-delay: {{ $index * 0.1 }}s">
              <div class="relative inline-block mb-6">
                @if($dosen->photo)
                <img src="{{ asset('storage/' . $dosen->photo) }}" alt="{{ $dosen->name }}" class="w-48 h-48 mx-auto rounded-2xl object-cover shadow-xl ring-4 ring-yellow-100 group-hover:ring-yellow-300 transition-all">
                @else
                <div class="w-48 h-48 mx-auto rounded-2xl bg-gradient-to-br from-yellow-400 to-yellow-600 flex items-center justify-center text-white text-5xl font-bold shadow-xl group-hover:scale-105 transition-transform">
                  {{ $dosen->initials }}
                </div>
                @endif
                <div class="absolute -bottom-3 left-1/2 -translate-x-1/2 bg-yellow-500 text-white px-4 py-1 rounded-full text-xs font-semibold shadow-lg">
                  Dosen
                </div>
              </div>
              <h3 class="text-xl font-bold text-gray-800 mb-2 group-hover:text-yellow-600 transition-colors">{{ $dosen->name }}</h3>
              <p class="text-sm text-gray-600 leading-relaxed">{{ $dosen->position }}</p>
            </div>
            @endforeach

          </div>
        </div>

        <button id="nextBtnDosen"
                class="absolute right-0 top-1/2 -translate-y-1/2 translate-x-6 w-12 h-12 bg-white shadow-xl rounded-full hover:bg-yellow-50 hover:scale-110 transition-all z-10 flex items-center justify-center text-yellow-600">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/>
          </svg>
        </button>
      </div>
      @else
      <p class="text-center text-gray-400 py-16 text-lg">Belum ada tim dosen</p>
      @endif
    </div>

    <!-- Tim Mahasiswa Section -->
    <div class="mb-32">
      <div class="text-center mb-12">
        <h2 class="text-4xl font-bold text-gray-800 mb-3 animate-on-scroll fade-in-up">Tim Mahasiswa</h2>
        <div class="w-24 h-1 bg-gradient-to-r from-blue-400 to-blue-600 mx-auto rounded-full"></div>
      </div>

      @if($mahasiswas && $mahasiswas->count() > 0)
      <div class="relative" id="mahasiswaCarouselSection">
        <button id="prevBtnMahasiswa"
                class="absolute left-0 top-1/2 -translate-y-1/2 -translate-x-6 w-12 h-12 bg-white shadow-xl rounded-full hover:bg-blue-50 hover:scale-110 transition-all z-10 flex items-center justify-center text-blue-600">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"/>
          </svg>
        </button>

        <div class="overflow-hidden px-4">
          <div id="carouselTrackMahasiswa" class="flex gap-8 transition-transform duration-500 ease-out">

            @foreach($mahasiswas as $index => $mahasiswa)
            <div class="min-w-[340px] bg-white border-2 border-gray-100 rounded-3xl p-8 text-center hover:border-blue-400 hover:shadow-2xl transition-all duration-300 animate-on-scroll fade-in-up group" style="animation-delay: {{ $index * 0.1 }}s">
              <div class="relative inline-block mb-6">
                @if($mahasiswa->photo)
                <img src="{{ asset('storage/' . $mahasiswa->photo) }}" alt="{{ $mahasiswa->name }}" class="w-48 h-48 mx-auto rounded-2xl object-cover shadow-xl ring-4 ring-blue-100 group-hover:ring-blue-300 transition-all">
                @else
                <div class="w-48 h-48 mx-auto rounded-2xl bg-gradient-to-br from-blue-500 to-blue-700 flex items-center justify-center text-white text-5xl font-bold shadow-xl group-hover:scale-105 transition-transform">
                  {{ $mahasiswa->initials }}
                </div>
                @endif
                <div class="absolute -bottom-3 left-1/2 -translate-x-1/2 bg-blue-500 text-white px-4 py-1 rounded-full text-xs font-semibold shadow-lg">
                  Mahasiswa
                </div>
              </div>
              <h3 class="text-xl font-bold text-gray-800 mb-2 group-hover:text-blue-600 transition-colors">{{ $mahasiswa->name }}</h3>
              <p class="text-sm text-gray-600 leading-relaxed">{{ $mahasiswa->role }}</p>
            </div>
            @endforeach

          </div>
        </div>

        <button id="nextBtnMahasiswa"
                class="absolute right-0 top-1/2 -translate-y-1/2 translate-x-6 w-12 h-12 bg-white shadow-xl rounded-full hover:bg-blue-50 hover:scale-110 transition-all z-10 flex items-center justify-center text-blue-600">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/>
          </svg>
        </button>
      </div>
      @else
      <p class="text-center text-gray-400 py-16 text-lg">Belum ada tim mahasiswa</p>
      @endif
    </div>

    <!-- Mitra Section -->
    <div>
      <div class="text-center mb-12">
        <h2 class="text-4xl font-bold text-gray-800 mb-3 animate-on-scroll fade-in-up">Mitra Kami</h2>
        <div class="w-24 h-1 bg-gradient-to-r from-green-400 to-green-600 mx-auto rounded-full"></div>
      </div>

      @if($mitra)
      <div class="flex justify-center animate-on-scroll fade-in-up">
        <div class="w-full max-w-xl bg-white border-2 border-gray-100 rounded-3xl p-12 text-center hover:border-green-400 hover:shadow-2xl transition-all duration-300 group">
          <div class="relative inline-block mb-8">
            @if($mitra->logo)
            <img src="{{ asset('storage/' . $mitra->logo) }}" alt="{{ $mitra->name }}" class="w-56 h-56 mx-auto rounded-2xl object-cover shadow-xl ring-4 ring-green-100 group-hover:ring-green-300 transition-all">
            @else
            <div class="w-56 h-56 mx-auto rounded-2xl bg-gradient-to-br from-green-500 to-green-700 flex items-center justify-center text-white text-6xl font-bold shadow-xl group-hover:scale-105 transition-transform">
              {{ $mitra->initials }}
            </div>
            @endif
            <div class="absolute -bottom-4 left-1/2 -translate-x-1/2 bg-green-500 text-white px-6 py-2 rounded-full text-sm font-semibold shadow-lg">
              {{ $mitra->mitra_type }}
            </div>
          </div>
          <h3 class="text-3xl font-bold text-gray-800 mb-6 group-hover:text-green-600 transition-colors">{{ $mitra->name }}</h3>
          <p class="text-gray-700 leading-relaxed text-justify px-4" style="text-indent: 2em;">
            {{ $mitra->description ?? 'Tidak ada deskripsi' }}
          </p>
        </div>
      </div>
      @else
      <p class="text-center text-gray-400 py-16 text-lg">Belum ada mitra</p>
      @endif
    </div>
  </div>
</section>

{{-- Script khusus untuk About Section --}}
<script>
  (function() {
    // Wait for DOM to be fully loaded
    if (document.readyState === 'loading') {
      document.addEventListener('DOMContentLoaded', initAboutCarousels);
    } else {
      initAboutCarousels();
    }

    function initAboutCarousels() {
      const dosenSection = document.getElementById('dosenCarouselSection');
      let carouselInitialized = false;

      // Setup Intersection Observer
      const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
          if (entry.isIntersecting && !carouselInitialized) {
            setupCarousels();
            carouselInitialized = true;
          }
        });
      }, {
        threshold: 0.1,
        rootMargin: '50px'
      });

      // Start observing
      if (dosenSection) {
        observer.observe(dosenSection);
      }

      function setupCarousels() {
        const cardWidth = 340 + 32; // card width + gap
        const visibleCards = 3;

        // Carousel Tim Dosen
        const trackDosen = document.getElementById('carouselTrackDosen');
        const prevBtnDosen = document.getElementById('prevBtnDosen');
        const nextBtnDosen = document.getElementById('nextBtnDosen');

        if (trackDosen && prevBtnDosen && nextBtnDosen) {
          const cardsDosen = trackDosen.children;
          const maxIndexDosen = Math.max(0, cardsDosen.length - visibleCards);
          let currentIndexDosen = 0;

          function updateCarouselDosen() {
            const offset = -currentIndexDosen * cardWidth;
            trackDosen.style.transform = `translateX(${offset}px)`;
            prevBtnDosen.disabled = currentIndexDosen === 0;
            nextBtnDosen.disabled = currentIndexDosen === maxIndexDosen;
            prevBtnDosen.style.opacity = currentIndexDosen === 0 ? '0.3' : '1';
            nextBtnDosen.style.opacity = currentIndexDosen === maxIndexDosen ? '0.3' : '1';
          }

          prevBtnDosen.addEventListener('click', () => {
            if (currentIndexDosen > 0) {
              currentIndexDosen--;
              updateCarouselDosen();
            }
          });

          nextBtnDosen.addEventListener('click', () => {
            if (currentIndexDosen < maxIndexDosen) {
              currentIndexDosen++;
              updateCarouselDosen();
            }
          });

          updateCarouselDosen();
        }

        // Carousel Tim Mahasiswa
        const trackMahasiswa = document.getElementById('carouselTrackMahasiswa');
        const prevBtnMahasiswa = document.getElementById('prevBtnMahasiswa');
        const nextBtnMahasiswa = document.getElementById('nextBtnMahasiswa');

        if (trackMahasiswa && prevBtnMahasiswa && nextBtnMahasiswa) {
          const cardsMahasiswa = trackMahasiswa.children;
          const maxIndexMahasiswa = Math.max(0, cardsMahasiswa.length - visibleCards);
          let currentIndexMahasiswa = 0;

          function updateCarouselMahasiswa() {
            const offset = -currentIndexMahasiswa * cardWidth;
            trackMahasiswa.style.transform = `translateX(${offset}px)`;
            prevBtnMahasiswa.disabled = currentIndexMahasiswa === 0;
            nextBtnMahasiswa.disabled = currentIndexMahasiswa === maxIndexMahasiswa;
            prevBtnMahasiswa.style.opacity = currentIndexMahasiswa === 0 ? '0.3' : '1';
            nextBtnMahasiswa.style.opacity = currentIndexMahasiswa === maxIndexMahasiswa ? '0.3' : '1';
          }

          prevBtnMahasiswa.addEventListener('click', () => {
            if (currentIndexMahasiswa > 0) {
              currentIndexMahasiswa--;
              updateCarouselMahasiswa();
            }
          });

          nextBtnMahasiswa.addEventListener('click', () => {
            if (currentIndexMahasiswa < maxIndexMahasiswa) {
              currentIndexMahasiswa++;
              updateCarouselMahasiswa();
            }
          });

          updateCarouselMahasiswa();
        }
      }
    }
  })();
</script>
