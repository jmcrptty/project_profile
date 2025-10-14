{{-- FILE: resources/views/dashboard/home.blade.php --}}
@extends('dashboard')

@section('content')

<main class="flex-1 overflow-y-auto bg-gray-50 p-6">
    <div class="max-w-6xl mx-auto">
        
        {{-- Header --}}
        <div class="mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Kelola Home Section</h2>
            <p class="text-gray-600 text-sm mt-1">Update konten halaman utama website</p>
        </div>

        {{-- Alert Success --}}
        @if(session('success'))
        <div class="mb-6 bg-green-50 border border-green-200 text-green-800 rounded-lg p-4 flex items-center gap-3 animate-slideIn">
            <svg class="w-5 h-5 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
            </svg>
            <span class="font-medium">{{ session('success') }}</span>
        </div>
        @endif

        {{-- Alert Error --}}
        @if(session('error'))
        <div class="mb-6 bg-red-50 border border-red-200 text-red-800 rounded-lg p-4 flex items-center gap-3 animate-slideIn">
            <svg class="w-5 h-5 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
            </svg>
            <span class="font-medium">{{ session('error') }}</span>
        </div>
        @endif

        {{-- Validation Errors --}}
        @if($errors->any())
        <div class="mb-6 bg-red-50 border border-red-200 text-red-800 rounded-lg p-4">
            <div class="flex items-start gap-3">
                <svg class="w-5 h-5 text-red-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                </svg>
                <div>
                    <p class="font-semibold mb-2">Terjadi kesalahan validasi:</p>
                    <ul class="list-disc list-inside space-y-1">
                        @foreach($errors->all() as $error)
                            <li class="text-sm">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        @endif

        @php
            $home = App\Models\Home::first();
        @endphp

        {{-- Preview Card dengan Data --}}
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden mb-6">
            <div class="aspect-video bg-gray-900 relative overflow-hidden">
                @if($home && $home->media_type === 'video' && $home->video_url)
                    @php
                        $isYouTube = strpos($home->video_url, 'youtube.com/embed/') !== false || 
                                     strpos($home->video_url, 'youtube.com/watch') !== false || 
                                     strpos($home->video_url, 'youtu.be') !== false;
                    @endphp
                    
                    @if($isYouTube)
                        {{-- YouTube Embed --}}
                        <iframe 
                            src="{{ $home->video_url }}" 
                            class="w-full h-full" 
                            frameborder="0" 
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                            allowfullscreen>
                        </iframe>
                    @else
                        {{-- Regular Video MP4 --}}
                        <video autoplay muted loop playsinline class="w-full h-full object-cover">
                            <source src="{{ $home->video_url }}" type="video/mp4">
                        </video>
                    @endif
                    
                    <div class="absolute top-4 right-4 bg-black/70 backdrop-blur-sm px-3 py-1.5 rounded-full flex items-center gap-2">
                        <div class="w-2 h-2 bg-red-500 rounded-full animate-pulse"></div>
                        <span class="text-white text-xs font-medium">{{ $isYouTube ? 'YouTube Video' : 'Video Background' }}</span>
                    </div>
                @elseif($home && $home->media_type === 'images' && $home->images && count($home->images) > 0)
                    <div id="imageSlider" class="w-full h-full relative">
                        @foreach($home->images as $index => $image)
                        <img src="{{ asset('storage/' . $image) }}" 
                             alt="Slide {{ $index + 1 }}" 
                             class="slider-image w-full h-full object-cover absolute inset-0 transition-opacity duration-1000 {{ $index === 0 ? 'opacity-100' : 'opacity-0' }}">
                        @endforeach
                    </div>
                    <div class="absolute top-4 right-4 bg-black/70 backdrop-blur-sm px-3 py-1.5 rounded-full flex items-center gap-2">
                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                        <span class="text-white text-xs font-medium">{{ count($home->images) }} Gambar</span>
                    </div>
                    <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 flex gap-2">
                        @foreach($home->images as $index => $image)
                        <div class="slider-dot w-2 h-2 rounded-full {{ $index === 0 ? 'bg-white' : 'bg-white/40' }} transition-all"></div>
                        @endforeach
                    </div>
                @else
                    <div class="w-full h-full flex items-center justify-center text-gray-500">
                        <div class="text-center">
                            <svg class="w-20 h-20 mx-auto mb-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                            <p class="text-sm">Belum ada media</p>
                        </div>
                    </div>
                @endif

                <div class="absolute inset-0 bg-gradient-to-b from-transparent to-black/50"></div>
                
                <div class="absolute bottom-0 left-0 right-0 p-8 text-white">
                    <p class="text-sm tracking-wider uppercase mb-2 opacity-80">{{ $home->subtitle ?? 'Subtitle belum diisi' }}</p>
                    <h1 class="text-3xl font-light mb-2">{{ $home->title ?? 'Title belum diisi' }}</h1>
                    <p class="text-sm opacity-90">{{ $home ? Str::limit($home->description, 100) : 'Description belum diisi' }}</p>
                </div>
            </div>
        </div>

        {{-- 1. Media Section dengan Preview --}}
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden mb-4">
            <div class="p-6">
                <div class="flex justify-between items-start mb-4">
                    <div class="flex-1">
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">Media Background</h3>
                        @if($home)
                            <div class="inline-flex items-center gap-2 px-3 py-1.5 bg-blue-50 text-blue-700 rounded-lg text-sm">
                                @if($home->media_type === 'video')
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M2 6a2 2 0 012-2h6a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V6zM14.553 7.106A1 1 0 0014 8v4a1 1 0 00.553.894l2 1A1 1 0 0018 13V7a1 1 0 00-1.447-.894l-2 1z"/>
                                    </svg>
                                    <span class="font-medium">Video Background</span>
                                @else
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd"/>
                                    </svg>
                                    <span class="font-medium">Slideshow Images ({{ $home->images ? count($home->images) : 0 }})</span>
                                @endif
                            </div>
                        @else
                            <p class="text-sm text-gray-500">Belum ada data media</p>
                        @endif
                    </div>
                    <button onclick="openModal('mediaModal')" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg text-sm font-medium transition flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                        </svg>
                        Edit Media
                    </button>
                </div>

                {{-- Preview Media dalam card --}}
                @if($home)
                <div class="mt-4 border-t pt-4">
                    @if($home->media_type === 'video' && $home->video_url)
                        @php
                            $isYouTube = strpos($home->video_url, 'youtube.com/embed/') !== false || 
                                         strpos($home->video_url, 'youtube.com/watch') !== false || 
                                         strpos($home->video_url, 'youtu.be') !== false;
                        @endphp
                        <div class="space-y-2">
                            <p class="text-xs font-semibold text-gray-500 uppercase tracking-wide">
                                Preview {{ $isYouTube ? 'YouTube Video' : 'Video' }}
                            </p>
                            <div class="aspect-video bg-gray-900 rounded-lg overflow-hidden">
                                @if($isYouTube)
                                    <iframe 
                                        src="{{ $home->video_url }}" 
                                        class="w-full h-full" 
                                        frameborder="0" 
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                        allowfullscreen>
                                    </iframe>
                                @else
                                    <video muted loop playsinline class="w-full h-full object-cover" controls>
                                        <source src="{{ $home->video_url }}" type="video/mp4">
                                    </video>
                                @endif
                            </div>
                            <p class="text-xs text-gray-500 truncate">{{ $home->video_url }}</p>
                        </div>
                    @elseif($home->media_type === 'images' && $home->images && count($home->images) > 0)
                        <div class="space-y-2">
                            <p class="text-xs font-semibold text-gray-500 uppercase tracking-wide">Preview Gambar</p>
                            <div class="grid grid-cols-4 gap-2">
                                @foreach($home->images as $image)
                                <div class="aspect-square bg-gray-100 rounded-lg overflow-hidden border border-gray-200">
                                    <img src="{{ asset('storage/' . $image) }}" alt="Preview" class="w-full h-full object-cover hover:scale-110 transition-transform duration-300">
                                </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
                @endif
            </div>
        </div>

        {{-- 2. Subtitle Section --}}
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden mb-4">
            <div class="p-6 flex justify-between items-start">
                <div class="flex-1">
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Subtitle / Tag Line</h3>
                    <p class="text-gray-600">{{ $home->subtitle ?? 'Belum ada subtitle' }}</p>
                </div>
                <button onclick="openModal('subtitleModal')" class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg text-sm font-medium transition">
                    Edit
                </button>
            </div>
        </div>

        {{-- 3. Title Section --}}
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden mb-4">
            <div class="p-6 flex justify-between items-start">
                <div class="flex-1">
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Judul Utama</h3>
                    <p class="text-gray-600">{{ $home->title ?? 'Belum ada title' }}</p>
                </div>
                <button onclick="openModal('titleModal')" class="px-4 py-2 bg-purple-600 hover:bg-purple-700 text-white rounded-lg text-sm font-medium transition">
                    Edit
                </button>
            </div>
        </div>

        {{-- 4. Description Section --}}
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden mb-4">
            <div class="p-6 flex justify-between items-start">
                <div class="flex-1">
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Deskripsi</h3>
                    <p class="text-gray-600">{{ $home->description ?? 'Belum ada deskripsi' }}</p>
                </div>
                <button onclick="openModal('descriptionModal')" class="px-4 py-2 bg-orange-600 hover:bg-orange-700 text-white rounded-lg text-sm font-medium transition">
                    Edit
                </button>
            </div>
        </div>

        {{-- 5. Button Section --}}
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden mb-4">
            <div class="p-6 flex justify-between items-start">
                <div class="flex-1">
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Tombol CTA</h3>
                    <p class="text-sm text-gray-600"><span class="font-medium">Text:</span> {{ $home->button_text ?? 'Belum ada' }}</p>
                    <p class="text-sm text-gray-600"><span class="font-medium">Link:</span> {{ $home->button_link ?? 'Belum ada' }}</p>
                </div>
                <button onclick="openModal('buttonModal')" class="px-4 py-2 bg-cyan-600 hover:bg-cyan-700 text-white rounded-lg text-sm font-medium transition">
                    Edit
                </button>
            </div>
        </div>

    </div>
</main>

{{-- MODAL 1: Edit Media --}}
<div id="mediaModal" class="fixed inset-0 bg-black/50 backdrop-blur-sm z-50 hidden flex items-center justify-center p-4">
    <div class="bg-white rounded-xl shadow-2xl max-w-3xl w-full max-h-[90vh] overflow-y-auto">
        <div class="sticky top-0 bg-white border-b px-6 py-4 flex justify-between items-center z-10">
            <h3 class="text-xl font-bold text-gray-800">Edit Media Background</h3>
            <button onclick="closeModal('mediaModal')" class="text-gray-400 hover:text-gray-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
        
        <form action="{{ route('home.media') }}" method="POST" enctype="multipart/form-data" id="mediaForm" class="p-6">
            @csrf
            <div class="space-y-6">
                
                {{-- Switch Button Minimalis --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-3">Pilih Tipe Media</label>
                    <div class="inline-flex bg-gray-100 rounded-lg p-1">
                        <button type="button" 
                                onclick="switchMediaType('video')" 
                                id="videoBtn"
                                class="media-switch-btn px-4 py-2 rounded-md text-sm font-medium transition-all {{ ($home && $home->media_type === 'video') || !$home ? 'bg-white text-blue-600 shadow-sm' : 'text-gray-600 hover:text-gray-800' }}">
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M2 6a2 2 0 012-2h6a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V6zM14.553 7.106A1 1 0 0014 8v4a1 1 0 00.553.894l2 1A1 1 0 0018 13V7a1 1 0 00-1.447-.894l-2 1z"/>
                                </svg>
                                Video
                            </div>
                        </button>
                        <button type="button" 
                                onclick="switchMediaType('images')" 
                                id="imagesBtn"
                                class="media-switch-btn px-4 py-2 rounded-md text-sm font-medium transition-all {{ $home && $home->media_type === 'images' ? 'bg-white text-blue-600 shadow-sm' : 'text-gray-600 hover:text-gray-800' }}">
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd"/>
                                </svg>
                                Slideshow
                            </div>
                        </button>
                    </div>
                    <input type="hidden" name="media_type" id="mediaTypeInput" value="{{ $home->media_type ?? 'video' }}">
                </div>

                {{-- Video Section --}}
                <div id="videoSectionModal" style="display: {{ ($home && $home->media_type === 'video') || !$home ? 'block' : 'none' }}">
                    <div class="space-y-3">
                        <label class="block text-sm font-semibold text-gray-700">URL Video</label>
                        <input type="url" 
                               name="video_url" 
                               id="videoUrlInput"
                               value="{{ $home->video_url ?? '' }}" 
                               class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" 
                               placeholder="https://www.youtube.com/watch?v=xxxxx atau https://example.com/video.mp4">
                        <p class="text-xs text-gray-500">
                            <strong>Support:</strong><br>
                            • YouTube: https://youtube.com/watch?v=xxxxx atau https://youtu.be/xxxxx<br>
                            • Video MP4: URL langsung ke file .mp4
                        </p>
                        
                        {{-- Video Preview --}}
                        @if($home && $home->media_type === 'video' && $home->video_url)
                            @php
                                $isYouTube = strpos($home->video_url, 'youtube.com/embed/') !== false || 
                                             strpos($home->video_url, 'youtube.com/watch') !== false || 
                                             strpos($home->video_url, 'youtu.be') !== false;
                            @endphp
                            <div class="mt-3 bg-gray-50 rounded-lg p-3 border border-gray-200">
                                <p class="text-xs font-semibold text-gray-600 mb-2">
                                    Preview {{ $isYouTube ? 'YouTube Video' : 'Video' }} Saat Ini:
                                </p>
                                <div class="aspect-video bg-gray-900 rounded-lg overflow-hidden">
                                    @if($isYouTube)
                                        <iframe 
                                            src="{{ $home->video_url }}" 
                                            class="w-full h-full" 
                                            frameborder="0" 
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                            allowfullscreen>
                                        </iframe>
                                    @else
                                        <video muted loop playsinline class="w-full h-full object-cover" controls>
                                            <source src="{{ $home->video_url }}" type="video/mp4">
                                        </video>
                                    @endif
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

                {{-- Images Section --}}
                <div id="imagesSectionModal" style="display: {{ $home && $home->media_type === 'images' ? 'block' : 'none' }}">
                    <div class="space-y-3">
                        @if($home && $home->images && count($home->images) > 0)
                        <div class="bg-gray-50 rounded-lg p-4 border border-gray-200">
                            <div class="flex justify-between items-center mb-3">
                                <label class="block text-sm font-semibold text-gray-700">Gambar Saat Ini</label>
                                <span class="text-xs text-gray-500">{{ count($home->images) }} gambar</span>
                            </div>
                            <div class="grid grid-cols-4 gap-3">
                                @foreach($home->images as $index => $image)
                                <div class="relative group">
                                    <div class="aspect-square bg-gray-200 rounded-lg overflow-hidden border-2 border-gray-300">
                                        <img src="{{ asset('storage/' . $image) }}" class="w-full h-full object-cover">
                                    </div>
                                    <button type="button" 
                                            onclick="deleteImage({{ $index }})" 
                                            class="absolute -top-2 -right-2 bg-red-500 hover:bg-red-600 text-white p-1.5 rounded-full opacity-0 group-hover:opacity-100 transition-all shadow-lg">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                        </svg>
                                    </button>
                                    <div class="absolute bottom-1 right-1 bg-black/70 text-white text-xs px-2 py-0.5 rounded">
                                        {{ $index + 1 }}
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endif
                        
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Upload Gambar Baru
                                @php
                                    $hasEnoughImages = $home && $home->images && count($home->images) >= 3;
                                @endphp
                                @if(!$hasEnoughImages)
                                    <span class="text-red-500">*</span>
                                @endif
                            </label>
                            
                            {{-- Alert Info Upload --}}
                            <div class="mb-3 bg-blue-50 border border-blue-200 rounded-lg p-3">
                                <div class="flex gap-2">
                                    <svg class="w-5 h-5 text-blue-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                                    </svg>
                                    <div class="text-xs text-blue-800">
                                        <p class="font-semibold mb-1">Tips Upload Gambar Berkualitas:</p>
                                        <ul class="space-y-0.5 ml-3 list-disc">
                                            <li>Max <strong>5MB per file</strong> untuk kualitas HD</li>
                                            <li>Minimal 3 gambar, maksimal 10 gambar</li>
                                            <li>Format: JPG, PNG, WEBP</li>
                                            <li>Resolusi ideal: 1920x1080px</li>
                                            @if($hasEnoughImages)
                                            <li class="text-green-700 font-semibold">✓ Anda sudah punya {{ count($home->images) }} gambar. Upload baru akan mengganti semua gambar lama.</li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center hover:border-blue-400 transition-colors">
                                <svg class="w-12 h-12 mx-auto text-gray-400 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
                                </svg>
                                <input type="file" 
                                       name="images[]" 
                                       multiple 
                                       accept="image/jpeg,image/png,image/jpg,image/webp" 
                                       id="imageInput"
                                       class="hidden"
                                       onchange="validateAndPreviewImages(this)">
                                <label for="imageInput" class="cursor-pointer">
                                    <span class="text-blue-600 hover:text-blue-700 font-medium">Klik untuk upload</span>
                                    <span class="text-gray-500"> atau drag & drop</span>
                                </label>
                                <p class="text-xs text-gray-500 mt-2">
                                    JPG, PNG, WEBP (Max 5MB per file)
                                    @if($hasEnoughImages)
                                     - Opsional (sudah ada {{ count($home->images) }} gambar)
                                    @else
                                     - <strong class="text-red-600">Minimal 3 gambar wajib</strong>
                                    @endif
                                </p>
                            </div>
                            
                            {{-- Warning/Success Alert --}}
                            <div id="uploadWarning" class="hidden mt-2 p-3 rounded-lg">
                                <p class="text-xs"></p>
                            </div>
                            
                            {{-- Preview Container --}}
                            <div id="imagePreviewContainer" class="mt-3 grid grid-cols-4 gap-2 hidden"></div>
                        </div>
                    </div>
                </div>

                <div class="flex justify-end gap-3 pt-4 border-t">
                    <button type="button" onclick="closeModal('mediaModal')" class="px-5 py-2.5 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 font-medium transition">
                        Batal
                    </button>
                    <button type="submit" id="submitBtn" class="px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-medium transition flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        Simpan Perubahan
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

{{-- MODAL 2: Edit Subtitle --}}
<div id="subtitleModal" class="fixed inset-0 bg-black/50 backdrop-blur-sm z-50 hidden flex items-center justify-center p-4">
    <div class="bg-white rounded-xl shadow-2xl max-w-lg w-full">
        <div class="border-b px-6 py-4 flex justify-between items-center">
            <h3 class="text-xl font-bold text-gray-800">Edit Subtitle</h3>
            <button onclick="closeModal('subtitleModal')" class="text-gray-400 hover:text-gray-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
        <form action="{{ route('home.subtitle') }}" method="POST" class="p-6">
            @csrf
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Subtitle</label>
                    <input type="text" name="subtitle" value="{{ $home->subtitle ?? '' }}" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500" placeholder="Smart Agriculture IoT Project" required>
                </div>
                <div class="flex justify-end gap-3">
                    <button type="button" onclick="closeModal('subtitleModal')" class="px-4 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50">Batal</button>
                    <button type="submit" class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>

{{-- MODAL 3: Edit Title --}}
<div id="titleModal" class="fixed inset-0 bg-black/50 backdrop-blur-sm z-50 hidden flex items-center justify-center p-4">
    <div class="bg-white rounded-xl shadow-2xl max-w-lg w-full">
        <div class="border-b px-6 py-4 flex justify-between items-center">
            <h3 class="text-xl font-bold text-gray-800">Edit Judul Utama</h3>
            <button onclick="closeModal('titleModal')" class="text-gray-400 hover:text-gray-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
        <form action="{{ route('home.title') }}" method="POST" class="p-6">
            @csrf
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Judul</label>
                    <textarea name="title" rows="2" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 resize-none" placeholder="Meningkatkan Hasil Pertanian..." required>{{ $home->title ?? '' }}</textarea>
                </div>
                <div class="flex justify-end gap-3">
                    <button type="button" onclick="closeModal('titleModal')" class="px-4 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50">Batal</button>
                    <button type="submit" class="px-4 py-2 bg-purple-600 hover:bg-purple-700 text-white rounded-lg">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>

{{-- MODAL 4: Edit Description --}}
<div id="descriptionModal" class="fixed inset-0 bg-black/50 backdrop-blur-sm z-50 hidden flex items-center justify-center p-4">
    <div class="bg-white rounded-xl shadow-2xl max-w-lg w-full">
        <div class="border-b px-6 py-4 flex justify-between items-center">
            <h3 class="text-xl font-bold text-gray-800">Edit Deskripsi</h3>
            <button onclick="closeModal('descriptionModal')" class="text-gray-400 hover:text-gray-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
        <form action="{{ route('home.description') }}" method="POST" class="p-6">
            @csrf
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Deskripsi</label>
                    <textarea name="description" rows="3" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 resize-none" placeholder="Monitoring real-time..." required>{{ $home->description ?? '' }}</textarea>
                </div>
                <div class="flex justify-end gap-3">
                    <button type="button" onclick="closeModal('descriptionModal')" class="px-4 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50">Batal</button>
                    <button type="submit" class="px-4 py-2 bg-orange-600 hover:bg-orange-700 text-white rounded-lg">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>

{{-- MODAL 5: Edit Button --}}
<div id="buttonModal" class="fixed inset-0 bg-black/50 backdrop-blur-sm z-50 hidden flex items-center justify-center p-4">
    <div class="bg-white rounded-xl shadow-2xl max-w-lg w-full">
        <div class="border-b px-6 py-4 flex justify-between items-center">
            <h3 class="text-xl font-bold text-gray-800">Edit Tombol CTA</h3>
            <button onclick="closeModal('buttonModal')" class="text-gray-400 hover:text-gray-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
        <form action="{{ route('home.button') }}" method="POST" class="p-6">
            @csrf
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Teks Tombol</label>
                    <input type="text" name="button_text" value="{{ $home->button_text ?? '' }}" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-cyan-500" placeholder="Jelajahi Proyek" required>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Link Tombol</label>
                    <input type="text" name="button_link" value="{{ $home->button_link ?? '' }}" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-cyan-500" placeholder="#about" required>
                </div>
                <div class="flex justify-end gap-3">
                    <button type="button" onclick="closeModal('buttonModal')" class="px-4 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50">Batal</button>
                    <button type="submit" class="px-4 py-2 bg-cyan-600 hover:bg-cyan-700 text-white rounded-lg">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>

<style>
@keyframes slideIn {
    from { transform: translateY(-20px); opacity: 0; }
    to { transform: translateY(0); opacity: 1; }
}
.animate-slideIn {
    animation: slideIn 0.3s ease-out;
}
</style>

<script>
// ==========================================
// IMAGE SLIDER FOR PREVIEW
// ==========================================
let currentSlide = 0;
const slides = document.querySelectorAll('.slider-image');
const dots = document.querySelectorAll('.slider-dot');

if (slides.length > 1) {
    setInterval(() => {
        slides[currentSlide].classList.remove('opacity-100');
        slides[currentSlide].classList.add('opacity-0');
        dots[currentSlide].classList.remove('bg-white');
        dots[currentSlide].classList.add('bg-white/40');
        
        currentSlide = (currentSlide + 1) % slides.length;
        
        slides[currentSlide].classList.remove('opacity-0');
        slides[currentSlide].classList.add('opacity-100');
        dots[currentSlide].classList.remove('bg-white/40');
        dots[currentSlide].classList.add('bg-white');
    }, 3000);
}

// ==========================================
// MODAL FUNCTIONS
// ==========================================
function openModal(modalId) {
    document.getElementById(modalId).classList.remove('hidden');
    document.getElementById(modalId).classList.add('flex');
    document.body.style.overflow = 'hidden';
}

function closeModal(modalId) {
    document.getElementById(modalId).classList.add('hidden');
    document.getElementById(modalId).classList.remove('flex');
    document.body.style.overflow = 'auto';
    
    // Reset preview jika close modal media
    if(modalId === 'mediaModal') {
        const container = document.getElementById('imagePreviewContainer');
        const warning = document.getElementById('uploadWarning');
        const imageInput = document.getElementById('imageInput');
        
        if(container) container.innerHTML = '';
        if(container) container.classList.add('hidden');
        if(warning) warning.classList.add('hidden');
        if(imageInput) imageInput.value = '';
    }
}

// Close modal when clicking outside
document.querySelectorAll('[id$="Modal"]').forEach(modal => {
    modal.addEventListener('click', function(e) {
        if (e.target === this) {
            closeModal(this.id);
        }
    });
});

// ==========================================
// SWITCH MEDIA TYPE
// ==========================================
function switchMediaType(type) {
    document.getElementById('mediaTypeInput').value = type;
    
    const videoBtn = document.getElementById('videoBtn');
    const imagesBtn = document.getElementById('imagesBtn');
    const videoSection = document.getElementById('videoSectionModal');
    const imagesSection = document.getElementById('imagesSectionModal');
    
    if (type === 'video') {
        videoBtn.classList.add('bg-white', 'text-blue-600', 'shadow-sm');
        videoBtn.classList.remove('text-gray-600');
        imagesBtn.classList.remove('bg-white', 'text-blue-600', 'shadow-sm');
        imagesBtn.classList.add('text-gray-600');
        
        videoSection.style.display = 'block';
        imagesSection.style.display = 'none';
        
        // Reset image input
        const imageInput = document.getElementById('imageInput');
        if(imageInput) imageInput.value = '';
        
        const container = document.getElementById('imagePreviewContainer');
        if(container) {
            container.innerHTML = '';
            container.classList.add('hidden');
        }
        
        const warning = document.getElementById('uploadWarning');
        if(warning) warning.classList.add('hidden');
        
    } else {
        imagesBtn.classList.add('bg-white', 'text-blue-600', 'shadow-sm');
        imagesBtn.classList.remove('text-gray-600');
        videoBtn.classList.remove('bg-white', 'text-blue-600', 'shadow-sm');
        videoBtn.classList.add('text-gray-600');
        
        videoSection.style.display = 'none';
        imagesSection.style.display = 'block';
    }
}

// ==========================================
// VALIDATE AND PREVIEW IMAGES
// ==========================================
function validateAndPreviewImages(input) {
    const container = document.getElementById('imagePreviewContainer');
    const warning = document.getElementById('uploadWarning');
    const maxSize = 5 * 1024 * 1024; // 5MB in bytes
    const maxFiles = 10;
    const minFiles = 3;
    
    container.innerHTML = '';
    warning.classList.add('hidden');
    warning.className = 'hidden mt-2 p-3 rounded-lg'; // Reset classes
    
    if (!input.files || input.files.length === 0) {
        container.classList.add('hidden');
        return;
    }
    
    // Validasi jumlah file
    if (input.files.length < minFiles) {
        warning.classList.remove('hidden');
        warning.classList.add('bg-yellow-50', 'border', 'border-yellow-200');
        warning.querySelector('p').className = 'text-xs text-yellow-800';
        warning.querySelector('p').textContent = `⚠️ Minimal ${minFiles} gambar diperlukan. Anda memilih ${input.files.length} gambar.`;
        container.classList.add('hidden');
        return; // JANGAN reset input.value agar user bisa tambah lagi
    }
    
    if (input.files.length > maxFiles) {
        warning.classList.remove('hidden');
        warning.classList.add('bg-yellow-50', 'border', 'border-yellow-200');
        warning.querySelector('p').className = 'text-xs text-yellow-800';
        warning.querySelector('p').textContent = `⚠️ Maksimal ${maxFiles} gambar. Anda memilih ${input.files.length} gambar.`;
        container.classList.add('hidden');
        input.value = ''; // Reset karena melebihi batas
        return;
    }
    
    // Validasi ukuran dan tipe file
    let hasError = false;
    let errorMessages = [];
    
    Array.from(input.files).forEach((file, index) => {
        // Check file size
        if (file.size > maxSize) {
            hasError = true;
            const sizeMB = (file.size / 1024 / 1024).toFixed(2);
            errorMessages.push(`File "${file.name}" terlalu besar (${sizeMB}MB). Max 5MB per file.`);
        }
        
        // Check file type
        const validTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/webp'];
        if (!validTypes.includes(file.type)) {
            hasError = true;
            errorMessages.push(`File "${file.name}" bukan format yang valid. Gunakan JPG, PNG, atau WEBP.`);
        }
    });
    
    if (hasError) {
        warning.classList.remove('hidden');
        warning.classList.add('bg-red-50', 'border', 'border-red-200');
        warning.querySelector('p').className = 'text-xs text-red-800';
        warning.querySelector('p').innerHTML = '❌ ' + errorMessages.join('<br>');
        container.classList.add('hidden');
        input.value = ''; // Reset karena ada error
        return;
    }
    
    // Show success message
    warning.classList.remove('hidden');
    warning.classList.add('bg-green-50', 'border', 'border-green-200');
    warning.querySelector('p').className = 'text-xs text-green-800 font-medium';
    warning.querySelector('p').innerHTML = `✅ ${input.files.length} gambar siap diupload. Total ukuran: ${formatBytes(getTotalSize(input.files))}`;
    
    // Preview images
    container.classList.remove('hidden');
    
    Array.from(input.files).forEach((file, index) => {
        const reader = new FileReader();
        reader.onload = function(e) {
            const div = document.createElement('div');
            div.className = 'relative aspect-square bg-gray-100 rounded-lg overflow-hidden border-2 border-green-300';
            div.innerHTML = `
                <img src="${e.target.result}" class="w-full h-full object-cover">
                <div class="absolute top-1 left-1 bg-green-600 text-white text-xs px-2 py-0.5 rounded">
                    ${formatBytes(file.size)}
                </div>
                <div class="absolute bottom-1 right-1 bg-blue-600 text-white text-xs px-2 py-0.5 rounded">
                    #${index + 1}
                </div>
            `;
            container.appendChild(div);
        };
        reader.readAsDataURL(file);
    });
}

// Helper: Format bytes
function formatBytes(bytes) {
    if (bytes === 0) return '0 B';
    const k = 1024;
    const sizes = ['B', 'KB', 'MB'];
    const i = Math.floor(Math.log(bytes) / Math.log(k));
    return Math.round(bytes / Math.pow(k, i) * 100) / 100 + ' ' + sizes[i];
}

// Helper: Get total size
function getTotalSize(files) {
    let total = 0;
    Array.from(files).forEach(file => {
        total += file.size;
    });
    return total;
}

// ==========================================
// DELETE IMAGE
// ==========================================
function deleteImage(index) {
    if (!confirm('Yakin ingin menghapus gambar ini?')) return;
    
    fetch('{{ route("home.deleteImage") }}', {
        method: 'DELETE',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({ index: index })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            location.reload();
        } else {
            alert(data.message || 'Terjadi kesalahan');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Terjadi kesalahan saat menghapus gambar');
    });
}
</script>

@endsection