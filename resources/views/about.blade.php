{{-- FILE: resources/views/about.blade.php --}}
<section id="about" class="py-24 bg-white">
  <div class="max-w-6xl mx-auto px-6">

    <!-- Section Title -->
    <div class="text-center mb-16 animate-on-scroll fade-in-up">
      <h2 class="text-4xl font-light text-gray-800 mb-3">Tentang Proyek</h2>
      <div class="w-16 h-0.5 bg-gray-800 mx-auto"></div>
    </div>

    <!-- Background & Goals -->
    <div class="grid md:grid-cols-2 gap-8 mb-24">

      <!-- Latar Belakang -->
      <div class="animate-on-scroll fade-in-left">
        <h3 class="text-xl font-medium text-gray-800 mb-4 pb-2 border-b border-gray-200">Latar Belakang</h3>
        <p class="text-gray-600 leading-relaxed text-justify">
          {{ $background->content ?? 'Belum ada latar belakang' }}
        </p>
      </div>

      <!-- Tujuan Project -->
      <div class="animate-on-scroll fade-in-right">
        <h3 class="text-xl font-medium text-gray-800 mb-4 pb-2 border-b border-gray-200">Tujuan Project</h3>
        <ul class="space-y-3">
          @if($goals && $goals->content)
            @foreach($goals->goals_array as $goal)
            <li class="flex items-start gap-3 text-gray-600">
              <span class="flex-shrink-0 w-1.5 h-1.5 bg-gray-800 rounded-full mt-2"></span>
              <span class="leading-relaxed">{{ $goal }}</span>
            </li>
            @endforeach
          @else
            <li class="text-gray-400">Belum ada tujuan</li>
          @endif
        </ul>
      </div>
    </div>

    <!-- Tim Dosen Section -->
    <div class="mb-20">
      <div class="text-center mb-12 animate-on-scroll fade-in-up">
        <h3 class="text-2xl font-light text-gray-800 mb-3">Tim Dosen</h3>
        <div class="w-12 h-0.5 bg-gray-800 mx-auto"></div>
      </div>

      @if($dosens && $dosens->count() > 0)
      <div class="relative" id="dosenCarouselSection">
        <button id="prevBtnDosen"
                class="absolute left-0 top-1/2 -translate-y-1/2 -translate-x-4 w-10 h-10 bg-white border border-gray-300 rounded-full hover:bg-gray-50 transition z-10 flex items-center justify-center text-gray-600">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
          </svg>
        </button>

        <div class="overflow-hidden">
          <div id="carouselTrackDosen" class="flex gap-6 transition-transform duration-500 ease-out">

            @foreach($dosens as $index => $dosen)
            <div onclick="openModal('dosen', {{ json_encode($dosen) }})" class="min-w-[280px] bg-white border border-gray-200 rounded-lg p-6 text-center hover:border-gray-400 transition animate-on-scroll fade-in-up group cursor-pointer" style="animation-delay: {{ $index * 0.1 }}s">
              @if($dosen->photo)
              <img src="{{ asset('storage/' . $dosen->photo) }}" alt="{{ $dosen->name }}" class="w-32 h-32 mx-auto rounded-full object-cover mb-4 border-2 border-gray-200">
              @else
              <div class="w-32 h-32 mx-auto rounded-full bg-gray-800 flex items-center justify-center text-white text-3xl font-light mb-4">
                {{ $dosen->initials }}
              </div>
              @endif
              <h4 class="text-lg font-medium text-gray-800 mb-1">{{ $dosen->name }}</h4>
              <p class="text-sm text-gray-500">{{ $dosen->position }}</p>
            </div>
            @endforeach

          </div>
        </div>

        <button id="nextBtnDosen"
                class="absolute right-0 top-1/2 -translate-y-1/2 translate-x-4 w-10 h-10 bg-white border border-gray-300 rounded-full hover:bg-gray-50 transition z-10 flex items-center justify-center text-gray-600">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
                class="absolute left-0 top-1/2 -translate-y-1/2 -translate-x-4 w-10 h-10 bg-white border border-gray-300 rounded-full hover:bg-gray-50 transition z-10 flex items-center justify-center text-gray-600">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
          </svg>
        </button>

        <div class="overflow-hidden">
          <div id="carouselTrackMahasiswa" class="flex gap-6 transition-transform duration-500 ease-out">

            @foreach($mahasiswas as $index => $mahasiswa)
            <div onclick="openModal('mahasiswa', {{ json_encode($mahasiswa) }})" class="min-w-[280px] bg-white border border-gray-200 rounded-lg p-6 text-center hover:border-gray-400 transition animate-on-scroll fade-in-up group cursor-pointer" style="animation-delay: {{ $index * 0.1 }}s">
              @if($mahasiswa->photo)
              <img src="{{ asset('storage/' . $mahasiswa->photo) }}" alt="{{ $mahasiswa->name }}" class="w-32 h-32 mx-auto rounded-full object-cover mb-4 border-2 border-gray-200">
              @else
              <div class="w-32 h-32 mx-auto rounded-full bg-gray-800 flex items-center justify-center text-white text-3xl font-light mb-4">
                {{ $mahasiswa->initials }}
              </div>
              @endif
              <h4 class="text-lg font-medium text-gray-800 mb-1">{{ $mahasiswa->name }}</h4>
              <p class="text-sm text-gray-500">{{ $mahasiswa->role }}</p>
            </div>
            @endforeach

          </div>
        </div>

        <button id="nextBtnMahasiswa"
                class="absolute right-0 top-1/2 -translate-y-1/2 translate-x-4 w-10 h-10 bg-white border border-gray-300 rounded-full hover:bg-gray-50 transition z-10 flex items-center justify-center text-gray-600">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
      <div class="flex justify-center animate-on-scroll fade-in-up">
        <div onclick="openModal('mitra', {{ json_encode($mitra) }})" class="w-full max-w-md bg-white border border-gray-200 rounded-lg p-8 text-center hover:border-gray-400 transition cursor-pointer">
          @if($mitra->logo)
          <img src="{{ asset('storage/' . $mitra->logo) }}" alt="{{ $mitra->name }}" class="w-40 h-40 mx-auto rounded-lg object-cover mb-6 border border-gray-200">
          @else
          <div class="w-40 h-40 mx-auto rounded-lg bg-gray-800 flex items-center justify-center text-white text-4xl font-light mb-6">
            {{ $mitra->initials }}
          </div>
          @endif
          <h4 class="text-xl font-medium text-gray-800 mb-2">{{ $mitra->name }}</h4>
          <p class="text-xs text-gray-500 mb-4">{{ $mitra->mitra_type }}</p>
          <p class="text-sm text-gray-600 leading-relaxed text-justify">
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
        const cardWidth = 280 + 24; // card width + gap

        // Responsive visible cards
        function getVisibleCards() {
          const width = window.innerWidth;
          if (width < 640) return 1; // mobile
          if (width < 1024) return 2; // tablet
          return 3; // desktop
        }

        let visibleCards = getVisibleCards();

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

        // Handle window resize
        window.addEventListener('resize', () => {
          visibleCards = getVisibleCards();
          if (trackDosen) {
            const maxIndexDosen = Math.max(0, trackDosen.children.length - visibleCards);
            currentIndexDosen = Math.min(currentIndexDosen, maxIndexDosen);
            const offset = -currentIndexDosen * cardWidth;
            trackDosen.style.transform = `translateX(${offset}px)`;
            prevBtnDosen.disabled = currentIndexDosen === 0;
            nextBtnDosen.disabled = currentIndexDosen === maxIndexDosen;
            prevBtnDosen.style.opacity = currentIndexDosen === 0 ? '0.3' : '1';
            nextBtnDosen.style.opacity = currentIndexDosen === maxIndexDosen ? '0.3' : '1';
          }
          if (trackMahasiswa) {
            const maxIndexMahasiswa = Math.max(0, trackMahasiswa.children.length - visibleCards);
            currentIndexMahasiswa = Math.min(currentIndexMahasiswa, maxIndexMahasiswa);
            const offset = -currentIndexMahasiswa * cardWidth;
            trackMahasiswa.style.transform = `translateX(${offset}px)`;
            prevBtnMahasiswa.disabled = currentIndexMahasiswa === 0;
            nextBtnMahasiswa.disabled = currentIndexMahasiswa === maxIndexMahasiswa;
            prevBtnMahasiswa.style.opacity = currentIndexMahasiswa === 0 ? '0.3' : '1';
            nextBtnMahasiswa.style.opacity = currentIndexMahasiswa === maxIndexMahasiswa ? '0.3' : '1';
          }
        });
      }
    }
  })();
</script>
