{{-- FILE: resources/views/about.blade.php --}}
<section id="about" class="py-24 bg-slate-200">
  <div class="max-w-[1500px] mx-auto px-6">

    <!-- Section Title -->
    <div class="text-center mb-16 animate-on-scroll fade-in-up">
      <h2 class="text-4xl font-light text-gray-800 mb-3">Tentang Proyek</h2>
      <div class="w-16 h-0.5 bg-gray-800 mx-auto"></div>
    </div>

    <!-- Background & Goals -->
    <div class="grid md:grid-cols-2 gap-8 mb-24">

      <!-- Latar Belakang -->
      <div class="animate-on-scroll fade-in-left">
        <h3 class="text-xl font-medium text-gray-800 mb-4 pb-2 border-b border-slate-300">Latar Belakang</h3>
        <p class="text-gray-600 leading-relaxed text-justify">
          {{ $background->content ?? 'Belum ada latar belakang' }}
        </p>
      </div>

      <!-- Tujuan Project -->
      <div class="animate-on-scroll fade-in-right">
        <h3 class="text-xl font-medium text-gray-800 mb-4 pb-2 border-b border-slate-300">Tujuan Project</h3>
        <ul class="space-y-3">
          @if($goals && $goals->content)
            @foreach($goals->goals_array as $goal)
            <li class="flex items-start gap-3 text-gray-600">
              <span class="flex-shrink-0 w-1.5 h-1.5 bg-blue-600 rounded-full mt-2"></span>
              <span class="leading-relaxed">{{ $goal }}</span>
            </li>
            @endforeach
          @else
            <li class="text-gray-400">Belum ada tujuan</li>
          @endif
        </ul>
      </div>
    </div>


   <!-- Modul Section -->
<div class="mb-20 px-4">
  <div class="text-center animate-on-scroll fade-in-up">
    
    <h3 class="text-2xl md:text-3xl font-light text-gray-800 mb-4">
      Modul P-LT Fun Coding: Smart Farming
    </h3>

    <p class="text-gray-600 mb-6 max-w-2xl mx-auto text-sm md:text-base">
      Berikut ini adalah modul pembelajaran P-LT Fun Coding: Smart Farming
      yang dapat diakses dan diunduh secara langsung melalui Google Drive.
    </p>

    <!-- Button Download -->
    <a href="https://drive.google.com/file/d/1rjB6lZbxITXFykoAXq5E73qexbDbuoFi/view"
       target="_blank"
       class="inline-block bg-red-600 text-white px-6 py-3 rounded-lg
              text-sm md:text-base font-medium
              hover:bg-red-700 transition">
      Download Modul
    </a>

  </div>
</div>



    
 <div class="mb-20">
      <div class="text-center mb-12 animate-on-scroll fade-in-up">
        <h3 class="text-2xl font-light text-gray-800 mb-3">Tim Dosen</h3>
        <div class="w-12 h-0.5 bg-gray-800 mx-auto"></div>
      </div>

      @if($dosens && $dosens->count() > 0)
      <div class="relative" id="dosenCarouselSection">
        <button id="prevBtnDosen"
                class="absolute left-0 top-1/2 -translate-y-1/2 -translate-x-4 w-12 h-12 bg-slate-200 border border-slate-300 rounded-full hover:bg-slate-300 transition z-10 flex items-center justify-center text-gray-700 shadow-md">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
          </svg>
        </button>

        <div class="overflow-hidden mx-auto" style="max-width: 1200px;">
          <div id="carouselTrackDosen" class="flex gap-0 sm:gap-4 md:gap-6 transition-transform duration-500 ease-out">

            @foreach($dosens as $index => $dosen)
            <div onclick="openModal('dosen', {{ json_encode($dosen) }})" class="flex-shrink-0 w-full sm:w-[calc(50%-8px)] md:w-[340px] lg:w-[380px] bg-slate-200 border border-slate-300 rounded-lg p-5 md:p-6 lg:p-7 text-center hover:border-blue-600 transition animate-on-scroll fade-in-up group cursor-pointer shadow-md hover:shadow-lg" style="animation-delay: {{ $index * 0.1 }}s">
              @if($dosen->photo)
              <img src="{{ asset('storage/' . $dosen->photo) }}" alt="{{ $dosen->name }}" class="w-40 md:w-44 lg:w-48 h-40 md:h-44 lg:h-48 mx-auto rounded-full object-cover mb-5 md:mb-6 lg:mb-6 border-4 border-slate-300">
              @else
              <div class="w-40 md:w-44 lg:w-48 h-40 md:h-44 lg:h-48 mx-auto rounded-full bg-slate-300 flex items-center justify-center text-gray-700 text-4xl md:text-5xl lg:text-6xl font-light mb-5 md:mb-6 lg:mb-6">
                {{ $dosen->initials }}
              </div>
              @endif
              <h4 class="text-lg md:text-xl lg:text-xl font-medium text-gray-800 mb-2">{{ $dosen->name }}</h4>
              <p class="text-sm md:text-base lg:text-base text-gray-600">{{ $dosen->position }}</p>
            </div>
            @endforeach

          </div>
        </div>

        <button id="nextBtnDosen"
                class="absolute right-0 top-1/2 -translate-y-1/2 translate-x-4 w-12 h-12 bg-slate-200 border border-slate-300 rounded-full hover:bg-slate-300 transition z-10 flex items-center justify-center text-gray-700 shadow-md">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
          </svg>
        </button>
      </div>
      @else
      <p class="text-center text-gray-400 py-12">Belum ada tim dosen</p>
      @endif
    </div>

    <!-- Tim Mahasiswa Section -->
    <div class="mb-20">
      <div class="text-center mb-12 animate-on-scroll fade-in-up">
        <h3 class="text-2xl font-light text-gray-800 mb-3">Tim Mahasiswa</h3>
        <div class="w-12 h-0.5 bg-gray-800 mx-auto"></div>
      </div>

      @if($mahasiswas && $mahasiswas->count() > 0)
      <div class="relative" id="mahasiswaCarouselSection">
        <button id="prevBtnMahasiswa"
                class="absolute left-0 top-1/2 -translate-y-1/2 -translate-x-4 w-12 h-12 bg-slate-200 border border-slate-300 rounded-full hover:bg-slate-300 transition z-10 flex items-center justify-center text-gray-700 shadow-md">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
          </svg>
        </button>

        <div class="overflow-hidden mx-auto" style="max-width: 1200px;">
          <div id="carouselTrackMahasiswa" class="flex gap-0 sm:gap-4 md:gap-6 transition-transform duration-500 ease-out">

            @foreach($mahasiswas as $index => $mahasiswa)
            <div onclick="openModal('mahasiswa', {{ json_encode($mahasiswa) }})" class="flex-shrink-0 w-full sm:w-[calc(50%-8px)] md:w-[340px] lg:w-[380px] bg-slate-200 border border-slate-300 rounded-lg p-5 md:p-6 lg:p-7 text-center hover:border-blue-600 transition animate-on-scroll fade-in-up group cursor-pointer shadow-md hover:shadow-lg" style="animation-delay: {{ $index * 0.1 }}s">
              @if($mahasiswa->photo)
              <img src="{{ asset('storage/' . $mahasiswa->photo) }}" alt="{{ $mahasiswa->name }}" class="w-40 md:w-44 lg:w-48 h-40 md:h-44 lg:h-48 mx-auto rounded-full object-cover mb-5 md:mb-6 lg:mb-6 border-4 border-slate-300">
              @else
              <div class="w-40 md:w-44 lg:w-48 h-40 md:h-44 lg:h-48 mx-auto rounded-full bg-slate-300 flex items-center justify-center text-gray-700 text-4xl md:text-5xl lg:text-6xl font-light mb-5 md:mb-6 lg:mb-6">
                {{ $mahasiswa->initials }}
              </div>
              @endif
              <h4 class="text-lg md:text-xl lg:text-xl font-medium text-gray-800 mb-2">{{ $mahasiswa->name }}</h4>
              <p class="text-sm md:text-base lg:text-base text-gray-600">{{ $mahasiswa->role }}</p>
            </div>
            @endforeach

          </div>
        </div>

        <button id="nextBtnMahasiswa"
                class="absolute right-0 top-1/2 -translate-y-1/2 translate-x-4 w-12 h-12 bg-slate-200 border border-slate-300 rounded-full hover:bg-slate-300 transition z-10 flex items-center justify-center text-gray-700 shadow-md">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
          </svg>
        </button>
      </div>
      @else
      <p class="text-center text-gray-400 py-12">Belum ada tim mahasiswa</p>
      @endif
    </div>

    <!-- Mitra Section -->
    <div>
      <div class="text-center mb-12 animate-on-scroll fade-in-up">
        <h3 class="text-2xl font-light text-gray-800 mb-3">Mitra Kami</h3>
        <div class="w-12 h-0.5 bg-gray-800 mx-auto"></div>
      </div>

      @if($mitra)
      <div class="flex justify-center animate-on-scroll fade-in-up px-4">
        <div onclick="openModal('mitra', {{ json_encode($mitra) }})" class="w-full max-w-sm md:max-w-md lg:max-w-lg bg-slate-200 border border-slate-300 rounded-lg p-6 md:p-7 lg:p-8 text-center hover:border-blue-600 transition cursor-pointer shadow-md hover:shadow-lg">
          @if($mitra->logo)
          <img src="{{ asset('storage/' . $mitra->logo) }}" alt="{{ $mitra->name }}" class="w-40 md:w-44 lg:w-48 h-40 md:h-44 lg:h-48 mx-auto rounded-lg object-cover mb-5 md:mb-6 lg:mb-6 border-4 border-slate-300">
          @else
          <div class="w-40 md:w-44 lg:w-48 h-40 md:h-44 lg:h-48 mx-auto rounded-lg bg-slate-300 flex items-center justify-center text-gray-700 text-4xl md:text-5xl lg:text-6xl font-light mb-5 md:mb-6 lg:mb-6">
            {{ $mitra->initials }}
          </div>
          @endif
          <h4 class="text-xl md:text-xl lg:text-2xl font-medium text-gray-800 mb-2">{{ $mitra->name }}</h4>
          <p class="text-xs md:text-sm lg:text-sm text-gray-500 mb-3 md:mb-4 lg:mb-4">{{ $mitra->mitra_type }}</p>
          <p class="text-sm md:text-base lg:text-base text-gray-600 leading-relaxed">
            {{ $mitra->description ?? 'Tidak ada deskripsi' }}
          </p>
        </div>
      </div>
      @else
      <p class="text-center text-gray-400 py-12">Belum ada mitra</p>
      @endif
    </div>
  </div>
</section>

{{-- Modal untuk Detail Card --}}
<div id="detailModal" class="hidden fixed inset-0 bg-black/50 backdrop-blur-sm z-50 flex items-center justify-center p-4" onclick="closeModal(event)">
  <div class="bg-white rounded-2xl shadow-2xl max-w-lg w-full transform transition-all" onclick="event.stopPropagation()">
    {{-- Modal Content will be injected here --}}
    <div id="modalContent"></div>
  </div>
</div>

{{-- Script khusus untuk About Section --}}
<script>
  // Modal Functions
  function openModal(type, data) {
    const modal = document.getElementById('detailModal');
    const modalContent = document.getElementById('modalContent');

    let content = '';

    if (type === 'dosen') {
      const photoUrl = data.photo ? `/storage/${data.photo}` : null;
      const initials = data.name.split(' ').map(word => word[0]).join('');

      content = `
        <div class="p-8">
          <div class="flex justify-between items-start mb-6">
            <h3 class="text-2xl font-medium text-gray-800">Detail Dosen</h3>
            <button onclick="closeModal()" class="text-gray-400 hover:text-gray-600 transition">
              <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
              </svg>
            </button>
          </div>
          <div class="text-center">
            ${photoUrl
              ? `<img src="${photoUrl}" alt="${data.name}" class="w-72 h-72 mx-auto rounded-full object-cover mb-6 border-4 border-gray-200 shadow-lg">`
              : `<div class="w-72 h-72 mx-auto rounded-full bg-gray-800 flex items-center justify-center text-white text-8xl font-light mb-6 shadow-lg">${initials}</div>`
            }
            <h4 class="text-2xl font-semibold text-gray-800 mb-2">${data.name}</h4>
            <p class="text-gray-600 mb-4">${data.position}</p>
            <div class="inline-block px-4 py-1 bg-gray-100 text-gray-700 rounded-full text-sm">Dosen</div>
          </div>
        </div>
      `;
    } else if (type === 'mahasiswa') {
      const photoUrl = data.photo ? `/storage/${data.photo}` : null;
      const initials = data.name.split(' ').map(word => word[0]).join('');

      content = `
        <div class="p-8">
          <div class="flex justify-between items-start mb-6">
            <h3 class="text-2xl font-medium text-gray-800">Detail Mahasiswa</h3>
            <button onclick="closeModal()" class="text-gray-400 hover:text-gray-600 transition">
              <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
              </svg>
            </button>
          </div>
          <div class="text-center">
            ${photoUrl
              ? `<img src="${photoUrl}" alt="${data.name}" class="w-72 h-72 mx-auto rounded-full object-cover mb-6 border-4 border-gray-200 shadow-lg">`
              : `<div class="w-72 h-72 mx-auto rounded-full bg-gray-800 flex items-center justify-center text-white text-8xl font-light mb-6 shadow-lg">${initials}</div>`
            }
            <h4 class="text-2xl font-semibold text-gray-800 mb-2">${data.name}</h4>
            <p class="text-gray-600 mb-4">${data.role}</p>
            <div class="inline-block px-4 py-1 bg-gray-100 text-gray-700 rounded-full text-sm">Mahasiswa</div>
          </div>
        </div>
      `;
    } else if (type === 'mitra') {
      const logoUrl = data.logo ? `/storage/${data.logo}` : null;
      const initials = data.name.split(' ').map(word => word[0]).join('');

      content = `
        <div class="p-8">
          <div class="flex justify-between items-start mb-6">
            <h3 class="text-2xl font-medium text-gray-800">Detail Mitra</h3>
            <button onclick="closeModal()" class="text-gray-400 hover:text-gray-600 transition">
              <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
              </svg>
            </button>
          </div>
          <div class="text-center">
            ${logoUrl
              ? `<img src="${logoUrl}" alt="${data.name}" class="w-80 h-80 mx-auto rounded-lg object-cover mb-6 border-4 border-gray-200 shadow-lg">`
              : `<div class="w-80 h-80 mx-auto rounded-lg bg-gray-800 flex items-center justify-center text-white text-8xl font-light mb-6 shadow-lg">${initials}</div>`
            }
            <h4 class="text-3xl font-semibold text-gray-800 mb-2">${data.name}</h4>
            <p class="text-sm text-gray-500 mb-4">${data.mitra_type || 'Mitra'}</p>
            ${data.description ? `<p class="text-gray-600 leading-relaxed text-justify mt-6">${data.description}</p>` : ''}
          </div>
        </div>
      `;
    }

    modalContent.innerHTML = content;
    modal.classList.remove('hidden');
    document.body.style.overflow = 'hidden';
  }

  function closeModal(event) {
    if (event && event.target !== event.currentTarget) return;

    const modal = document.getElementById('detailModal');
    modal.classList.add('hidden');
    document.body.style.overflow = '';
  }

  // Close modal on ESC key
  document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
      closeModal();
    }
  });

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
        // Responsive visible cards
        function getVisibleCards() {
          const width = window.innerWidth;
          if (width < 640) return 1; // mobile
          if (width < 1024) return 2; // tablet
          return 3; // desktop
        }

        // Get actual card width from DOM
        function getCardWidth(track) {
          if (!track || !track.children[0]) return 474; // fallback
          const card = track.children[0];
          const cardRect = card.getBoundingClientRect();
          const computedStyle = window.getComputedStyle(track);
          const gap = parseFloat(computedStyle.gap) || 0;
          return cardRect.width + gap;
        }

        let visibleCards = getVisibleCards();

        // Carousel Tim Dosen
        const trackDosen = document.getElementById('carouselTrackDosen');
        const prevBtnDosen = document.getElementById('prevBtnDosen');
        const nextBtnDosen = document.getElementById('nextBtnDosen');

        if (trackDosen && prevBtnDosen && nextBtnDosen) {
          const cardsDosen = trackDosen.children;
          const totalCardsDosen = cardsDosen.length;
          let currentPageDosen = 0;

          // Calculate max pages (setiap page tampil 3 card)
          const maxPagesDosen = Math.ceil(totalCardsDosen / visibleCards) - 1;

          function updateCarouselDosen() {
            // Slide sebesar 3 card sekaligus
            const cardWidth = getCardWidth(trackDosen);
            const offset = -currentPageDosen * cardWidth * visibleCards;
            trackDosen.style.transform = `translateX(${offset}px)`;
            prevBtnDosen.disabled = currentPageDosen === 0;
            nextBtnDosen.disabled = currentPageDosen >= maxPagesDosen;
            prevBtnDosen.style.opacity = currentPageDosen === 0 ? '0.3' : '1';
            nextBtnDosen.style.opacity = currentPageDosen >= maxPagesDosen ? '0.3' : '1';
          }

          prevBtnDosen.addEventListener('click', () => {
            if (currentPageDosen > 0) {
              currentPageDosen--;
              updateCarouselDosen();
            }
          });

          nextBtnDosen.addEventListener('click', () => {
            if (currentPageDosen < maxPagesDosen) {
              currentPageDosen++;
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
          const totalCardsMahasiswa = cardsMahasiswa.length;
          let currentPageMahasiswa = 0;

          // Calculate max pages (setiap page tampil 3 card)
          const maxPagesMahasiswa = Math.ceil(totalCardsMahasiswa / visibleCards) - 1;

          function updateCarouselMahasiswa() {
            // Slide sebesar 3 card sekaligus
            const cardWidth = getCardWidth(trackMahasiswa);
            const offset = -currentPageMahasiswa * cardWidth * visibleCards;
            trackMahasiswa.style.transform = `translateX(${offset}px)`;
            prevBtnMahasiswa.disabled = currentPageMahasiswa === 0;
            nextBtnMahasiswa.disabled = currentPageMahasiswa >= maxPagesMahasiswa;
            prevBtnMahasiswa.style.opacity = currentPageMahasiswa === 0 ? '0.3' : '1';
            nextBtnMahasiswa.style.opacity = currentPageMahasiswa >= maxPagesMahasiswa ? '0.3' : '1';
          }

          prevBtnMahasiswa.addEventListener('click', () => {
            if (currentPageMahasiswa > 0) {
              currentPageMahasiswa--;
              updateCarouselMahasiswa();
            }
          });

          nextBtnMahasiswa.addEventListener('click', () => {
            if (currentPageMahasiswa < maxPagesMahasiswa) {
              currentPageMahasiswa++;
              updateCarouselMahasiswa();
            }
          });

          updateCarouselMahasiswa();
        }

        // Handle window resize
        window.addEventListener('resize', () => {
          visibleCards = getVisibleCards();
          if (trackDosen) {
            const cardWidthDosen = getCardWidth(trackDosen);
            const totalCardsDosen = trackDosen.children.length;
            const maxPagesDosen = Math.ceil(totalCardsDosen / visibleCards) - 1;
            currentPageDosen = Math.min(currentPageDosen, maxPagesDosen);
            const offset = -currentPageDosen * cardWidthDosen * visibleCards;
            trackDosen.style.transform = `translateX(${offset}px)`;
            prevBtnDosen.disabled = currentPageDosen === 0;
            nextBtnDosen.disabled = currentPageDosen >= maxPagesDosen;
            prevBtnDosen.style.opacity = currentPageDosen === 0 ? '0.3' : '1';
            nextBtnDosen.style.opacity = currentPageDosen >= maxPagesDosen ? '0.3' : '1';
          }
          if (trackMahasiswa) {
            const cardWidthMahasiswa = getCardWidth(trackMahasiswa);
            const totalCardsMahasiswa = trackMahasiswa.children.length;
            const maxPagesMahasiswa = Math.ceil(totalCardsMahasiswa / visibleCards) - 1;
            currentPageMahasiswa = Math.min(currentPageMahasiswa, maxPagesMahasiswa);
            const offset = -currentPageMahasiswa * cardWidthMahasiswa * visibleCards;
            trackMahasiswa.style.transform = `translateX(${offset}px)`;
            prevBtnMahasiswa.disabled = currentPageMahasiswa === 0;
            nextBtnMahasiswa.disabled = currentPageMahasiswa >= maxPagesMahasiswa;
            prevBtnMahasiswa.style.opacity = currentPageMahasiswa === 0 ? '0.3' : '1';
            nextBtnMahasiswa.style.opacity = currentPageMahasiswa >= maxPagesMahasiswa ? '0.3' : '1';
          }
        });
      }
    }
  })();
</script>
