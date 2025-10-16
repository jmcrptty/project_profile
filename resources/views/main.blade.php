{{-- FILE: resources/views/layouts/app.blade.php --}}
<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Fun Coding with Mini Simulator</title>
  <link rel="icon"  href="img/Logo_project.ico" type="image/ico">
  
  {{-- Tailwind CSS CDN --}}
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/styles/github-dark.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/highlight.min.js"></script>
  
  <style>
    @import url('https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@300;400;500;600;700&family=Space+Grotesk:wght@400;500;600;700&display=swap');

    body {
      font-family: 'IBM Plex Sans', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
      letter-spacing: -0.01em;
    }

    h1, h2, h3, h4, h5, h6,
    .heading-font {
      font-family: 'Space Grotesk', 'IBM Plex Sans', sans-serif;
      letter-spacing: -0.02em;
    }
    
    .video-overlay {
      background: linear-gradient(to bottom, rgba(0,0,0,0.3), rgba(0,0,0,0.6));
    }
    
    .nav-blur {
      backdrop-filter: blur(10px);
      background: rgba(255, 255, 255, 0.1);
    }

    .nav-scrolled {
      background: rgba(255, 255, 255, 0.95);
      backdrop-filter: blur(10px);
      box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
    }

    .nav-scrolled a {
      color: #1f2937 !important;
    }

    .nav-scrolled .logo-text {
      color: #15803d !important;
    }

    .gallery-item {
      transition: transform 0.3s ease;
    }

    .gallery-item:hover {
      transform: scale(1.05);
    }

    /* Animations */
    @keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translateY(30px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    @keyframes fadeInLeft {
      from {
        opacity: 0;
        transform: translateX(-30px);
      }
      to {
        opacity: 1;
        transform: translateX(0);
      }
    }

    @keyframes fadeInRight {
      from {
        opacity: 0;
        transform: translateX(30px);
      }
      to {
        opacity: 1;
        transform: translateX(0);
      }
    }

    .animate-on-scroll {
      opacity: 0;
    }

    .animate-on-scroll.animated {
      animation-duration: 0.8s;
      animation-fill-mode: both;
    }

    .fade-in-up {
      animation-name: fadeInUp;
    }

    .fade-in-left {
      animation-name: fadeInLeft;
    }

    .fade-in-right {
      animation-name: fadeInRight;
    }
  </style>
</head>
<body class="bg-white">

  {{-- Include Semua Section --}}
  @include('nav')
  @include('home')
  @include('about')
  @include('gallery')
  @include('code')
  @include('contact')
  @include('footer')

  {{-- Global Scripts --}}
  <script>
    // Scroll Animation Observer (Global untuk semua section)
    const observerOptions = {
      threshold: 0.1,
      rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('animated');
          observer.unobserve(entry.target);
        }
      });
    }, observerOptions);

    document.querySelectorAll('.animate-on-scroll').forEach(el => {
      observer.observe(el);
    });

    // Navbar Scroll Effect (Global)
    const navbar = document.getElementById('navbar');
    window.addEventListener('scroll', () => {
      if (window.scrollY > 50) {
        navbar.classList.add('nav-scrolled');
        navbar.classList.remove('nav-blur');
      } else {
        navbar.classList.remove('nav-scrolled');
        navbar.classList.add('nav-blur');
      }
    });

    // Smooth Scroll (Global)
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
      anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
          target.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
      });
    });

    // Trigger Animations on Page Load untuk Hero Section
    window.addEventListener('load', () => {
      document.querySelectorAll('#home .animate-on-scroll').forEach(el => {
        el.classList.add('animated');
      });
    });
  </script>

</body>
</html>