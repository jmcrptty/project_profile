{{-- FILE: resources/views/about.blade.php --}}
<section id="about" class="py-20 bg-gradient-to-b from-white to-gray-50">
  <div class="max-w-5xl mx-auto px-6">
    <h2 class="text-4xl font-light text-gray-800 text-center mb-16 tracking-wide animate-on-scroll fade-in-up">Tentang Proyek</h2>

    <!-- Background & Goals -->
    <div class="grid md:grid-cols-2 gap-16 mb-20">
      <div class="space-y-4 animate-on-scroll fade-in-left">
        <h3 class="text-xl font-medium text-gray-800 mb-3">Latar Belakang</h3>
        <p class="text-gray-600 leading-loose text-sm">
          Pertanian modern menghadapi tantangan besar: efisiensi, keberlanjutan, dan produktivitas.
          Dengan memanfaatkan teknologi Internet of Things (IoT), proyek ini bertujuan untuk
          memantau kondisi lingkungan pertanian secara real-time menggunakan sensor pintar yang terintegrasi
          dengan sistem monitoring berbasis cloud.
        </p>
      </div>
      <div class="space-y-4 animate-on-scroll fade-in-right">
        <h3 class="text-xl font-medium text-gray-800 mb-3">Tujuan Project</h3>
        <ul class="space-y-3 text-gray-600 text-sm">
          <li class="flex items-start gap-2">
            <span class="text-green-500 mt-0.5">✓</span>
            <span>Meningkatkan hasil panen dengan data berbasis sensor</span>
          </li>
          <li class="flex items-start gap-2">
            <span class="text-green-500 mt-0.5">✓</span>
            <span>Mengurangi pemborosan air melalui irigasi otomatis</span>
          </li>
          <li class="flex items-start gap-2">
            <span class="text-green-500 mt-0.5">✓</span>
            <span>Monitoring real-time melalui dashboard berbasis web</span>
          </li>
          <li class="flex items-start gap-2">
            <span class="text-green-500 mt-0.5">✓</span>
            <span>Mendukung pertanian berkelanjutan dan ramah lingkungan</span>
          </li>
        </ul>
      </div>
    </div>

    <!-- Dosen Section -->
    <div class="pt-12 border-t border-gray-200">
      <h2 class="text-3xl font-light text-gray-800 text-center mb-12 tracking-wide animate-on-scroll fade-in-up">
        Dosen Pembimbing
      </h2>

      <div class="relative mb-20" id="dosenCarouselSection">
        <button id="prevBtnDosen" 
                class="absolute left-0 top-1/2 -translate-y-1/2 -translate-x-4 w-10 h-10 bg-white shadow-lg rounded-full hover:bg-gray-50 transition-all z-10 flex items-center justify-center text-gray-600">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
          </svg>
        </button>

        <div class="overflow-hidden">
          <div id="carouselTrackDosen" class="flex gap-6 transition-transform duration-500 ease-out">
            
            <div class="min-w-[280px] bg-white border border-gray-100 rounded-3xl p-10 text-center hover:shadow-xl transition-shadow animate-on-scroll fade-in-up">
              <div class="w-32 h-32 mx-auto rounded-full bg-gradient-to-br from-yellow-400 to-yellow-500 flex items-center justify-center text-white text-3xl font-light mb-6 shadow-lg">
                AS
              </div>
              <h3 class="text-xl font-semibold text-gray-800 mb-2">Dr. Andi Saputra, S.T., M.Kom</h3>
              <p class="text-sm text-gray-500">Dosen Pembimbing Utama</p>
            </div>

            <div class="min-w-[280px] bg-white border border-gray-100 rounded-3xl p-10 text-center hover:shadow-xl transition-shadow animate-on-scroll fade-in-up" style="animation-delay: 0.1s">
              <div class="w-32 h-32 mx-auto rounded-full bg-gradient-to-br from-yellow-400 to-yellow-500 flex items-center justify-center text-white text-3xl font-light mb-6 shadow-lg">
                MY
              </div>
              <h3 class="text-xl font-semibold text-gray-800 mb-2">Prof. Maria Yuliana, Ph.D</h3>
              <p class="text-sm text-gray-500">Ahli IoT & Embedded Systems</p>
            </div>

            <div class="min-w-[280px] bg-white border border-gray-100 rounded-3xl p-10 text-center hover:shadow-xl transition-shadow animate-on-scroll fade-in-up" style="animation-delay: 0.2s">
              <div class="w-32 h-32 mx-auto rounded-full bg-gradient-to-br from-yellow-400 to-yellow-500 flex items-center justify-center text-white text-3xl font-light mb-6 shadow-lg">
                BP
              </div>
              <h3 class="text-xl font-semibold text-gray-800 mb-2">Ir. Budi Pranoto, M.T</h3>
              <p class="text-sm text-gray-500">Spesialis Hardware IoT</p>
            </div>

            <div class="min-w-[280px] bg-white border border-gray-100 rounded-3xl p-10 text-center hover:shadow-xl transition-shadow animate-on-scroll fade-in-up" style="animation-delay: 0.3s">
              <div class="w-32 h-32 mx-auto rounded-full bg-gradient-to-br from-yellow-400 to-yellow-500 flex items-center justify-center text-white text-3xl font-light mb-6 shadow-lg">
                SH
              </div>
              <h3 class="text-xl font-semibold text-gray-800 mb-2">Dr. Siti Hartini, M.Sc</h3>
              <p class="text-sm text-gray-500">Spesialis Data Analytics</p>
            </div>

          </div>
        </div>

        <button id="nextBtnDosen" 
                class="absolute right-0 top-1/2 -translate-y-1/2 translate-x-4 w-10 h-10 bg-white shadow-lg rounded-full hover:bg-gray-50 transition-all z-10 flex items-center justify-center text-gray-600">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
          </svg>
        </button>
      </div>

      <!-- Investor Section -->
      <h2 class="text-3xl font-light text-gray-800 text-center mb-12 tracking-wide animate-on-scroll fade-in-up">
        Investor
      </h2>

      <div class="relative">
        <button id="prevBtnInvestor" 
                class="absolute left-0 top-1/2 -translate-y-1/2 -translate-x-4 w-10 h-10 bg-white shadow-lg rounded-full hover:bg-gray-50 transition-all z-10 flex items-center justify-center text-gray-600">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
          </svg>
        </button>

        <div class="overflow-hidden">
          <div id="carouselTrackInvestor" class="flex gap-6 transition-transform duration-500 ease-out">
            
            <div class="min-w-[280px] bg-white border border-gray-100 rounded-3xl p-10 text-center hover:shadow-xl transition-shadow animate-on-scroll fade-in-up">
              <div class="w-32 h-32 mx-auto rounded-full bg-gradient-to-br from-green-500 to-green-600 flex items-center justify-center text-white text-2xl font-light mb-6 shadow-lg">
                AN
              </div>
              <h3 class="text-xl font-semibold text-gray-800 mb-2">PT. AgriTech Nusantara</h3>
              <p class="text-sm text-gray-500">Investor Utama</p>
            </div>

            <div class="min-w-[280px] bg-white border border-gray-100 rounded-3xl p-10 text-center hover:shadow-xl transition-shadow animate-on-scroll fade-in-up" style="animation-delay: 0.1s">
              <div class="w-32 h-32 mx-auto rounded-full bg-gradient-to-br from-green-500 to-green-600 flex items-center justify-center text-white text-2xl font-light mb-6 shadow-lg">
                SF
              </div>
              <h3 class="text-xl font-semibold text-gray-800 mb-2">CV. SmartFarm Indonesia</h3>
              <p class="text-sm text-gray-500">Investor Teknologi</p>
            </div>

            <div class="min-w-[280px] bg-white border border-gray-100 rounded-3xl p-10 text-center hover:shadow-xl transition-shadow animate-on-scroll fade-in-up" style="animation-delay: 0.2s">
              <div class="w-32 h-32 mx-auto rounded-full bg-gradient-to-br from-green-500 to-green-600 flex items-center justify-center text-white text-2xl font-light mb-6 shadow-lg">
                TA
              </div>
              <h3 class="text-xl font-semibold text-gray-800 mb-2">TechFarm Asia Ventures</h3>
              <p class="text-sm text-gray-500">Venture Capital</p>
            </div>

            <div class="min-w-[280px] bg-white border border-gray-100 rounded-3xl p-10 text-center hover:shadow-xl transition-shadow animate-on-scroll fade-in-up" style="animation-delay: 0.3s">
              <div class="w-32 h-32 mx-auto rounded-full bg-gradient-to-br from-green-500 to-green-600 flex items-center justify-center text-white text-2xl font-light mb-6 shadow-lg">
                GF
              </div>
              <h3 class="text-xl font-semibold text-gray-800 mb-2">Green Future Capital</h3>
              <p class="text-sm text-gray-500">Impact Investor</p>
            </div>

          </div>
        </div>

        <button id="nextBtnInvestor" 
                class="absolute right-0 top-1/2 -translate-y-1/2 translate-x-4 w-10 h-10 bg-white shadow-lg rounded-full hover:bg-gray-50 transition-all z-10 flex items-center justify-center text-gray-600">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
          </svg>
        </button>
      </div>
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
        // Carousel Dosen
        const trackDosen = document.getElementById('carouselTrackDosen');
        const prevBtnDosen = document.getElementById('prevBtnDosen');
        const nextBtnDosen = document.getElementById('nextBtnDosen');
        
        if (!trackDosen || !prevBtnDosen || !nextBtnDosen) return;
        
        const cardsDosen = trackDosen.children;
        const cardWidth = 280 + 24;
        const visibleCards = 3;
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

        // Carousel Investor
        const trackInvestor = document.getElementById('carouselTrackInvestor');
        const prevBtnInvestor = document.getElementById('prevBtnInvestor');
        const nextBtnInvestor = document.getElementById('nextBtnInvestor');
        
        if (!trackInvestor || !prevBtnInvestor || !nextBtnInvestor) return;
        
        const cardsInvestor = trackInvestor.children;
        const maxIndexInvestor = Math.max(0, cardsInvestor.length - visibleCards);
        let currentIndexInvestor = 0;

        function updateCarouselInvestor() {
          const offset = -currentIndexInvestor * cardWidth;
          trackInvestor.style.transform = `translateX(${offset}px)`;
          prevBtnInvestor.disabled = currentIndexInvestor === 0;
          nextBtnInvestor.disabled = currentIndexInvestor === maxIndexInvestor;
          prevBtnInvestor.style.opacity = currentIndexInvestor === 0 ? '0.3' : '1';
          nextBtnInvestor.style.opacity = currentIndexInvestor === maxIndexInvestor ? '0.3' : '1';
        }

        prevBtnInvestor.addEventListener('click', () => {
          if (currentIndexInvestor > 0) {
            currentIndexInvestor--;
            updateCarouselInvestor();
          }
        });

        nextBtnInvestor.addEventListener('click', () => {
          if (currentIndexInvestor < maxIndexInvestor) {
            currentIndexInvestor++;
            updateCarouselInvestor();
          }
        });

        updateCarouselInvestor();
      }
    }
  })();
</script>