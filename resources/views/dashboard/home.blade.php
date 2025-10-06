{{-- FILE: resources/views/admin/home/edit.blade.php --}}
@extends('dashboard')

@section('content')

<main class="flex-1 overflow-y-auto bg-gray-50 p-6">
    <div class="max-w-6xl mx-auto">
        
        {{-- Header --}}
        <div class="mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Edit Home Section</h2>
            <p class="text-gray-600 text-sm mt-1">Kelola konten halaman utama website</p>
        </div>

        {{-- Form Card --}}
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
            
            <div class="bg-gradient-to-r from-green-50 to-emerald-50 px-6 py-4 border-b">
                <h3 class="text-lg font-semibold text-gray-800">Form Edit Konten</h3>
            </div>

            {{-- Alert Success --}}
            @if(session('success'))
            <div class="mx-6 mt-6 bg-green-50 border border-green-200 text-green-800 rounded-lg p-4 flex items-center gap-3">
                <svg class="w-5 h-5 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
                <span class="font-medium">{{ session('success') }}</span>
            </div>
            @endif

            <form action="" method="POST" class="p-6">
                @csrf
                @method('PUT')

                <div class="space-y-6">

                    {{-- Video URL Section --}}
                    <div class="pb-6 border-b">
                        <label class="block text-sm font-semibold text-gray-700 mb-3">
                            URL Video <span class="text-red-500">*</span>
                        </label>
                        
                        <div class="grid md:grid-cols-2 gap-4">
                            {{-- Input URL --}}
                            <div>
                                <input 
                                    type="url" 
                                    name="video_url" 
                                    id="videoUrl"
                                    value="{{ old('video_url', $homeSection->video_url ?? '') }}"
                                    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent @error('video_url') border-red-500 @enderror"
                                    placeholder="https://example.com/video.mp4"
                                    required
                                >
                                @error('video_url')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                                <p class="text-xs text-gray-500 mt-2">Format: .mp4, .webm atau YouTube embed URL</p>
                            </div>

                            {{-- Video Preview --}}
                            <div>
                                <div class="aspect-video bg-gray-900 rounded-lg overflow-hidden border-2 border-gray-300">
                                    <!-- Video tag untuk file video langsung (.mp4, .webm) -->
                                    <video id="videoPreview" class="w-full h-full object-cover hidden" muted loop>
                                        <source src="" type="video/mp4">
                                    </video>
                                    <!-- Iframe untuk YouTube -->
                                    <iframe id="youtubePreview" class="w-full h-full hidden" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                    <!-- Placeholder saat kosong -->
                                    <div id="videoPlaceholder" class="w-full h-full flex items-center justify-center text-gray-500">
                                        <div class="text-center">
                                            <svg class="w-16 h-16 mx-auto mb-2 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                                            </svg>
                                            <p class="text-sm">Preview akan muncul di sini</p>
                                        </div>
                                    </div>
                                </div>
                                <p class="text-xs text-gray-500 mt-2 text-center">Preview Video</p>
                            </div>
                        </div>
                    </div>

                    {{-- Subtitle --}}
                    <div>
                        <label for="subtitle" class="block text-sm font-semibold text-gray-700 mb-2">
                            Subtitle / Tag Line <span class="text-red-500">*</span>
                        </label>
                        <input 
                            type="text" 
                            name="subtitle" 
                            id="subtitle"
                            value="{{ old('subtitle', $homeSection->subtitle ?? '') }}"
                            class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent @error('subtitle') border-red-500 @enderror"
                            placeholder="Contoh: Smart Agriculture IoT Project"
                            required
                        >
                        @error('subtitle')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                        <p class="text-xs text-gray-500 mt-1">Teks kecil di atas judul utama</p>
                    </div>

                    {{-- Main Title --}}
                    <div>
                        <label for="title" class="block text-sm font-semibold text-gray-700 mb-2">
                            Judul Utama <span class="text-red-500">*</span>
                        </label>
                        <textarea 
                            name="title" 
                            id="title"
                            rows="2"
                            class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent resize-none @error('title') border-red-500 @enderror"
                            placeholder="Contoh: Meningkatkan Hasil Pertanian Dengan Sensor Pintar"
                            required
                        >{{ old('title', $homeSection->title ?? '') }}</textarea>
                        @error('title')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                        <p class="text-xs text-gray-500 mt-1">Judul besar yang menarik perhatian</p>
                    </div>

                    {{-- Description --}}
                    <div>
                        <label for="description" class="block text-sm font-semibold text-gray-700 mb-2">
                            Deskripsi <span class="text-red-500">*</span>
                        </label>
                        <textarea 
                            name="description" 
                            id="description"
                            rows="3"
                            class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent resize-none @error('description') border-red-500 @enderror"
                            placeholder="Contoh: Monitoring real-time kondisi lingkungan pertanian untuk produktivitas maksimal"
                            required
                        >{{ old('description', $homeSection->description ?? '') }}</textarea>
                        @error('description')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                        <p class="text-xs text-gray-500 mt-1">Penjelasan singkat tentang project</p>
                    </div>

                    {{-- Button Settings --}}
                    <div class="grid md:grid-cols-2 gap-4">
                        <div>
                            <label for="button_text" class="block text-sm font-semibold text-gray-700 mb-2">
                                Teks Tombol <span class="text-red-500">*</span>
                            </label>
                            <input 
                                type="text" 
                                name="button_text" 
                                id="button_text"
                                value="{{ old('button_text', $homeSection->button_text ?? '') }}"
                                class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent @error('button_text') border-red-500 @enderror"
                                placeholder="Contoh: Jelajahi Proyek"
                                required
                            >
                            @error('button_text')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="button_link" class="block text-sm font-semibold text-gray-700 mb-2">
                                Link Tombol <span class="text-red-500">*</span>
                            </label>
                            <input 
                                type="text" 
                                name="button_link" 
                                id="button_link"
                                value="{{ old('button_link', $homeSection->button_link ?? '') }}"
                                class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent @error('button_link') border-red-500 @enderror"
                                placeholder="Contoh: #about"
                                required
                            >
                            @error('button_link')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    {{-- Submit Button --}}
                    <div class="flex justify-end gap-3 pt-6 border-t">
                        <a href="/admin/dashboard" class="px-6 py-2.5 border border-gray-300 text-gray-700 hover:bg-gray-50 rounded-lg font-medium transition">
                            Batal
                        </a>
                        <button type="submit" class="px-6 py-2.5 bg-green-600 hover:bg-green-700 text-white rounded-lg font-medium transition flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            Simpan Perubahan
                        </button>
                    </div>

                </div>
            </form>

        </div>

        {{-- Info Card --}}
        <div class="mt-6 bg-blue-50 border border-blue-200 rounded-lg p-4">
            <div class="flex gap-3">
                <svg class="w-5 h-5 text-blue-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                </svg>
                <div class="text-sm text-blue-800">
                    <p class="font-semibold mb-1">Tips:</p>
                    <ul class="list-disc list-inside space-y-1 text-blue-700">
                        <li>Gunakan video dengan ukuran file yang tidak terlalu besar (max 10MB)</li>
                        <li>Resolusi video yang disarankan: 1920x1080 (Full HD)</li>
                        <li>Format video: MP4, WebM</li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
</main>

<script>
// Live Preview Video - Support YouTube dan Video Langsung
const videoUrlInput = document.getElementById('videoUrl');
const videoPreview = document.getElementById('videoPreview');
const youtubePreview = document.getElementById('youtubePreview');
const videoPlaceholder = document.getElementById('videoPlaceholder');

if (videoUrlInput && videoPreview && youtubePreview) {
    
    // Function untuk ekstrak YouTube video ID
    function getYouTubeVideoId(url) {
        const regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|&v=)([^#&?]*).*/;
        const match = url.match(regExp);
        return (match && match[2].length === 11) ? match[2] : null;
    }

    // Function untuk cek apakah URL adalah YouTube
    function isYouTubeUrl(url) {
        return url.includes('youtube.com') || url.includes('youtu.be');
    }

    // Function untuk update video preview
    function updateVideoPreview() {
        const url = videoUrlInput.value.trim();
        
        if (!url) {
            // Tampilkan placeholder jika kosong
            videoPreview.classList.add('hidden');
            youtubePreview.classList.add('hidden');
            videoPlaceholder.classList.remove('hidden');
            return;
        }

        // Sembunyikan placeholder
        videoPlaceholder.classList.add('hidden');

        // Cek apakah YouTube URL
        if (isYouTubeUrl(url)) {
            // Tampilkan YouTube iframe, sembunyikan video tag
            videoPreview.classList.add('hidden');
            youtubePreview.classList.remove('hidden');

            // Ekstrak video ID dan buat embed URL
            const videoId = getYouTubeVideoId(url);
            if (videoId) {
                youtubePreview.src = `https://www.youtube.com/embed/${videoId}?autoplay=1&mute=1`;
            } else {
                // Jika sudah format embed, langsung gunakan
                if (url.includes('embed')) {
                    youtubePreview.src = url;
                } else {
                    youtubePreview.src = url;
                }
            }
        } else {
            // Tampilkan video tag, sembunyikan YouTube iframe
            youtubePreview.classList.add('hidden');
            videoPreview.classList.remove('hidden');

            // Update source video untuk file video langsung
            videoPreview.src = url;
            videoPreview.load();
            
            // Coba play video
            videoPreview.play().catch(e => {
                console.log('Video preview error:', e);
            });
        }
    }

    // Event listener untuk live preview saat mengetik
    videoUrlInput.addEventListener('input', function() {
        updateVideoPreview();
    });

    // Event listener dengan delay saat user selesai mengetik
    let typingTimer;
    videoUrlInput.addEventListener('keyup', function() {
        clearTimeout(typingTimer);
        typingTimer = setTimeout(updateVideoPreview, 500);
    });

    // Load preview saat halaman pertama kali dibuka (jika ada value)
    if (videoUrlInput.value) {
        updateVideoPreview();
    }
}
</script>

@endsection