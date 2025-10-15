{{-- FILE: resources/views/components/home-section.blade.php --}}

@php
    $home = App\Models\Home::where('is_active', true)->first();
@endphp

@if($home)
<section id="home" class="relative h-screen overflow-hidden">

    @if($home->media_type === 'video' && $home->video_url)
        @php
            // Fungsi untuk extract YouTube Video ID
            function getYouTubeVideoId($url) {
                $videoId = '';
                if (preg_match('/youtube\.com\/watch\?v=([^\&\?\/]+)/', $url, $matches)) {
                    $videoId = $matches[1];
                } elseif (preg_match('/youtube\.com\/embed\/([^\&\?\/]+)/', $url, $matches)) {
                    $videoId = $matches[1];
                } elseif (preg_match('/youtu\.be\/([^\&\?\/]+)/', $url, $matches)) {
                    $videoId = $matches[1];
                } elseif (preg_match('/youtube\.com\/v\/([^\&\?\/]+)/', $url, $matches)) {
                    $videoId = $matches[1];
                }
                return $videoId;
            }

            $isYouTube = strpos($home->video_url, 'youtube.com') !== false ||
                         strpos($home->video_url, 'youtu.be') !== false;
            $videoId = $isYouTube ? getYouTubeVideoId($home->video_url) : '';
        @endphp

        {{-- Video Background --}}
        @if($isYouTube && $videoId)
            {{-- YouTube Video Background dengan IFrame API --}}
            <div id="youtube-background" class="absolute inset-0 w-full h-full overflow-hidden pointer-events-none">
                <div id="youtube-player" class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2"
                     style="width: 100vw; height: 56.25vw; min-height: 100vh; min-width: 177.77vh;"></div>
            </div>
        @else
            {{-- Regular Video MP4 Background --}}
            <video autoplay muted loop playsinline class="absolute inset-0 w-full h-full object-cover">
                <source src="{{ $home->video_url }}" type="video/mp4">
            </video>
        @endif
    @else
        {{-- Image Slideshow Background --}}
        <div class="absolute inset-0 w-full h-full">
            <div class="slideshow-container h-full">
                @foreach($home->images as $index => $image)
                <div class="slide {{ $index === 0 ? 'active' : '' }} absolute inset-0 w-full h-full">
                    <img src="{{ asset('storage/' . $image) }}" alt="Slide {{ $index + 1 }}" class="w-full h-full object-cover">
                </div>
                @endforeach
            </div>
        </div>
    @endif

    {{-- Overlay --}}
    <div class="absolute inset-0 video-overlay"></div>

    {{-- Hero Content --}}
    <div class="relative z-10 h-full flex items-center justify-center text-center px-6">
        <div class="max-w-4xl">
            <p class="text-white/80 text-sm tracking-[0.3em] mb-6 uppercase animate-on-scroll fade-in-up" style="animation-delay: 0.2s">
                {{ $home->subtitle }}
            </p>
            <h1 class="text-5xl md:text-7xl font-light text-white mb-6 leading-tight animate-on-scroll fade-in-up" style="animation-delay: 0.4s">
                {!! nl2br(e($home->title)) !!}
            </h1>
            <p class="text-white/90 text-lg mb-8 max-w-2xl mx-auto animate-on-scroll fade-in-up" style="animation-delay: 0.6s">
                {{ $home->description }}
            </p>
            <a href="{{ $home->button_link }}" class="inline-block px-8 py-3 bg-white/10 backdrop-blur-sm border border-white/30 text-white rounded-full hover:bg-white/20 transition text-sm tracking-wide animate-on-scroll fade-in-up" style="animation-delay: 0.8s">
                {{ $home->button_text }}
            </a>
        </div>
    </div>

    {{-- Scroll Indicator --}}
    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 z-10">
        <div class="w-6 h-10 border-2 border-white/50 rounded-full flex justify-center p-2">
            <div class="w-1 h-3 bg-white/70 rounded-full animate-bounce"></div>
        </div>
    </div>
</section>

<style>
/* Slideshow Styles */
.slide {
    opacity: 0;
    transition: opacity 1.5s ease-in-out;
}

.slide.active {
    opacity: 1;
}

/* Video Overlay */
.video-overlay {
    background: linear-gradient(
        to bottom,
        rgba(0, 0, 0, 0.3) 0%,
        rgba(0, 0, 0, 0.5) 100%
    );
}

/* Animation Classes */
.animate-on-scroll {
    opacity: 0;
    transform: translateY(20px);
}

.fade-in-up {
    animation: fadeInUp 0.8s ease-out forwards;
}

@keyframes fadeInUp {
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
</style>

<script>
@if($home->media_type === 'video' && $home->video_url)
    @php
        $isYouTube = strpos($home->video_url, 'youtube.com') !== false ||
                     strpos($home->video_url, 'youtu.be') !== false;
        $videoId = $isYouTube ? getYouTubeVideoId($home->video_url) : '';
    @endphp

    @if($isYouTube && $videoId)
    // YouTube IFrame API
    var tag = document.createElement('script');
    tag.src = "https://www.youtube.com/iframe_api";
    var firstScriptTag = document.getElementsByTagName('script')[0];
    firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

    var player;
    function onYouTubeIframeAPIReady() {
        player = new YT.Player('youtube-player', {
            videoId: '{{ $videoId }}',
            playerVars: {
                autoplay: 1,
                controls: 0,
                showinfo: 0,
                modestbranding: 1,
                loop: 1,
                fs: 0,
                cc_load_policy: 0,
                iv_load_policy: 3,
                autohide: 1,
                mute: 1,
                playsinline: 1,
                rel: 0,
                enablejsapi: 1,
                playlist: '{{ $videoId }}' // Required untuk loop
            },
            events: {
                'onReady': onPlayerReady,
                'onStateChange': onPlayerStateChange
            }
        });
    }

    function onPlayerReady(event) {
        event.target.mute();
        event.target.playVideo();
    }

    function onPlayerStateChange(event) {
        // Jika video selesai (ended), putar lagi dari awal
        if (event.data === YT.PlayerState.ENDED) {
            player.seekTo(0);
            player.playVideo();
        }
    }
    @endif
@endif

@if($home->media_type === 'images' && $home->images && count($home->images) > 1)
// Slideshow Script
document.addEventListener('DOMContentLoaded', function() {
    const slides = document.querySelectorAll('.slide');
    let currentSlide = 0;
    const slideInterval = 5000; // 5 seconds

    function showSlide(index) {
        slides.forEach(slide => slide.classList.remove('active'));
        slides[index].classList.add('active');
    }

    function nextSlide() {
        currentSlide = (currentSlide + 1) % slides.length;
        showSlide(currentSlide);
    }

    // Auto advance slides
    setInterval(nextSlide, slideInterval);

    // Initialize first slide
    showSlide(0);
});
@endif

// Scroll Animation Observer
document.addEventListener('DOMContentLoaded', function() {
    const animatedElements = document.querySelectorAll('.animate-on-scroll');

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, {
        threshold: 0.1
    });

    animatedElements.forEach(el => observer.observe(el));
});
</script>
@endif
