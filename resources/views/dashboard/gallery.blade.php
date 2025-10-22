{{-- FILE: resources/views/admin/gallery/edit.blade.php --}}
@extends('dashboard')

@section('content')

<main class="flex-1 p-6 overflow-y-auto bg-gray-50">
    <div class="max-w-6xl mx-auto space-y-6">
        
        {{-- Header --}}
        <div class="mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Edit Gallery Section</h2>
            <p class="mt-1 text-sm text-gray-600">Kelola foto dan video demo project</p>
        </div>

        {{-- Success Alert --}}
        @if(session('success'))
        <div class="flex items-center gap-3 p-4 text-green-800 border border-green-200 rounded-lg bg-green-50">
            <svg class="w-5 h-5 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
            </svg>
            <span class="font-medium">{{ session('success') }}</span>
        </div>
        @endif

        {{-- Stats --}}
        <div class="grid grid-cols-1 gap-4 md:grid-cols-3">
            <div class="p-4 text-white rounded-lg bg-gradient-to-br from-blue-500 to-blue-600">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs font-medium text-blue-100">Total Foto</p>
                        <p class="mt-1 text-2xl font-bold">{{ count($photos ?? []) }}</p>
                    </div>
                    <svg class="w-8 h-8 text-blue-200" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd"/>
                    </svg>
                </div>
            </div>

            <div class="p-4 text-white rounded-lg bg-gradient-to-br from-purple-500 to-purple-600">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs font-medium text-purple-100">Video Demo</p>
                        <p class="mt-1 text-xl font-bold">{{ count($videos ?? []) }}</p>
                    </div>
                    <svg class="w-8 h-8 text-purple-200" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M2 6a2 2 0 012-2h6a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V6zM14.553 7.106A1 1 0 0014 8v4a1 1 0 00.553.894l2 1A1 1 0 0018 13V7a1 1 0 00-1.447-.894l-2 1z"/>
                    </svg>
                </div>
            </div>

            <div class="p-4 text-white rounded-lg bg-gradient-to-br from-green-500 to-green-600">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs font-medium text-green-100">Status</p>
                        <p class="mt-1 text-xl font-bold">Active</p>
                    </div>
                    <svg class="w-8 h-8 text-green-200" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                </div>
            </div>
        </div>

        {{-- Success Alert: Upload Foto --}}
        @if(session('success-foto'))
        <div class="flex items-center gap-3 p-4 text-green-800 border border-green-200 rounded-lg bg-green-50">
            <svg class="w-5 h-5 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
            </svg>
            <span class="font-medium">{{ session('success-foto') }}</span>
        </div>
        @endif

        {{-- Photo Gallery Grid --}}
        <div class="overflow-hidden bg-white border border-gray-200 shadow-sm rounded-xl">
            <div class="flex items-center justify-between px-6 py-4 border-b bg-gradient-to-r from-blue-50 to-indigo-50">
                <div class="keterangan">
                    <h3 class="text-lg font-semibold text-gray-800">Galeri Foto</h3>
                    <p class="mt-1 text-xs text-gray-500">Klik foto untuk edit caption atau hapus</p>
                </div>
                <button onclick="openAddPhotoModal()" class="px-4 py-2 text-sm text-white transition bg-blue-600 rounded-lg hover:bg-blue-700">
                    + Tambah Foto
                </button>
            </div>

            <div class="p-6">
                <div class="grid grid-cols-2 gap-4 md:grid-cols-3 lg:grid-cols-4">
                    
                    @forelse($photos ?? [] as $photo)
                    <div class="relative overflow-hidden transition border-2 border-gray-200 rounded-lg group aspect-[1280/853] hover:border-green-500">
                        <img src="{{ $photo->image_url }}" alt="{{ $photo->deskripsi }}" class="object-cover w-full h-full">
                        <div class="absolute inset-0 transition opacity-0 bg-gradient-to-t from-black/70 to-transparent group-hover:opacity-100">
                            <div class="absolute bottom-0 left-0 right-0 p-3">
                                <p class="mb-2 text-sm font-medium text-white line-clamp-2">{{ $photo->deskripsi }}</p>
                                <div class="flex gap-2">
                                    <button
                                        onclick="openEditPhotoModal(
                                            {{ $photo->id }},
                                            '{{ $photo->image_url }}',
                                            '{{ addslashes($photo->deskripsi) }}',
                                            '{{ route('gallery.foto-galeri.update', $photo->id) }}'
                                        )"
                                        class="w-full px-3 py-1.5 bg-blue-500 hover:bg-blue-600 text-white text-xs rounded transition">
                                        Edit
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                        <div class="py-12 text-center col-span-full">
                            <svg class="w-16 h-16 mx-auto mb-4 text-red-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                            </svg>
                            <p class="font-semibold text-gray-700">Data galeri tidak ditemukan.</p>
                            <p class="mt-1 text-sm text-gray-500">Terjadi kesalahan atau database seeder belum dijalankan.</p>
                        </div>
                    @endforelse

                </div>
            </div>
        </div>

        {{-- Video Demo Section --}}
        <div class="overflow-hidden bg-white border border-gray-200 shadow-sm rounded-xl">
            <div class="flex items-center justify-between px-6 py-4 border-b bg-gradient-to-r from-purple-50 to-pink-50">
                <h3 class="text-lg font-semibold text-gray-800">Video Demo</h3>

                <button onclick="openAddVideoModal()" class="px-4 py-2 text-sm text-white transition bg-indigo-600 rounded-lg hover:bg-indigo-700">
                    + Tambah Video
                </button>
            </div>

            <div class="p-6">
                @if($videos && count($videos) > 0)
                    {{-- Jika ada 2 video atau lebih, tampilkan sejajar kiri-kanan --}}
                    @if(count($videos) >= 2)
                        <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                            @foreach($videos as $videoItem)
                            <div class="space-y-4">
                                <div class="overflow-hidden bg-gray-900 border rounded-lg aspect-video">
                                    <iframe
                                        class="w-full h-full"
                                        src="{{ $videoItem->embed_url }}"
                                        title="{{ $videoItem->title }}"
                                        frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                        allowfullscreen>
                                    </iframe>
                                </div>

                                <div class="p-4 bg-gray-800 rounded-lg">
                                    <h4 class="mb-1 font-semibold text-white">{{ $videoItem->title }}</h4>
                                    <p class="text-sm text-gray-400">{{ $videoItem->description }}</p>
                                </div>

                                <div class="flex gap-2">
                                    <button
                                        onclick="openEditVideoModal({{ $videoItem->id }}, '{{ $videoItem->youtube_url }}', '{{ addslashes($videoItem->title) }}', '{{ addslashes($videoItem->description) }}', '{{ route('gallery.videogaleri.update', $videoItem->id) }}')"
                                        class="flex-1 px-3 py-2 text-sm text-white transition bg-blue-600 rounded-lg hover:bg-blue-700">
                                        Edit Video
                                    </button>
                                    <button
                                        onclick="deleteVideo({{ $videoItem->id }}, '{{ route('gallery.videogaleri.destroy', $videoItem->id) }}')"
                                        class="flex-1 px-3 py-2 text-sm text-white transition bg-red-600 rounded-lg hover:bg-red-700">
                                        Hapus
                                    </button>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    @else
                        {{-- Jika hanya 1 video, tampilkan besar --}}
                        @foreach($videos as $videoItem)
                        <div class="space-y-4">
                            <div class="overflow-hidden bg-gray-900 border rounded-lg aspect-video">
                                <iframe
                                    class="w-full h-full"
                                    src="{{ $videoItem->embed_url }}"
                                    title="{{ $videoItem->title }}"
                                    frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen>
                                </iframe>
                            </div>

                            <div class="p-4 bg-gray-800 rounded-lg">
                                <h4 class="mb-1 font-semibold text-white">{{ $videoItem->title }}</h4>
                                <p class="text-sm text-gray-400">{{ $videoItem->description }}</p>
                            </div>

                            <div class="flex gap-2">
                                <button
                                    onclick="openEditVideoModal({{ $videoItem->id }}, '{{ $videoItem->youtube_url }}', '{{ addslashes($videoItem->title) }}', '{{ addslashes($videoItem->description) }}', '{{ route('gallery.videogaleri.update', $videoItem->id) }}')"
                                    class="flex-1 px-3 py-2 text-sm text-white transition bg-blue-600 rounded-lg hover:bg-blue-700">
                                    Edit Video
                                </button>
                                <button
                                    onclick="deleteVideo({{ $videoItem->id }}, '{{ route('gallery.videogaleri.destroy', $videoItem->id) }}')"
                                    class="flex-1 px-3 py-2 text-sm text-white transition bg-red-600 rounded-lg hover:bg-red-700">
                                    Hapus
                                </button>
                            </div>
                        </div>
                        @endforeach
                    @endif
                @else
                    {{-- Jika tidak ada video --}}
                    <div class="py-12 text-center">
                        <svg class="w-16 h-16 mx-auto mb-4 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                        </svg>
                        <p class="font-semibold text-gray-700">Belum ada video demo.</p>
                        <p class="mt-1 text-sm text-gray-500">Klik tombol "Tambah Video" untuk menambahkan video.</p>
                    </div>
                @endif
            </div>
        </div>

    </div>
</main>

{{-- kalau sewaktu-waktu ada revisi delete dan tambah, refer back to "minor change on gallery" commit on backend branch --}}

{{-- Add Photo Modal --}}
<div id="addPhotoModal" class="fixed inset-0 z-50 flex items-center justify-center hidden p-4 bg-black/50 backdrop-blur-sm">
    <div class="w-full max-w-3xl bg-white shadow-2xl rounded-xl">
        <div class="flex items-center justify-between px-6 py-4 border-b">
            <h3 class="text-xl font-bold text-gray-800">Tambah Foto Baru</h3>
            <button onclick="closeAddPhotoModal()" class="text-gray-400 hover:text-gray-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>

        <form id="addPhotoForm" action="{{ route('gallery.foto-galeri.store') }}" method="POST" class="p-6">
            @csrf

            <div class="space-y-6">
                <div>
                    <label class="block mb-2 text-sm font-semibold text-gray-700">Area Preview & Crop</label>
                    <div class="w-full bg-gray-100 border-2 border-dashed rounded-lg min-h-[400px]">
                        <img
                            id="addImageToCrop"
                            src='data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" class="w-full h-full text-gray-400" viewBox="0 0 640 426" fill="currentColor"><path d="M560 64H80a48 48 0 00-48 48v200a48 48 0 0048 48h480a48 48 0 0048-48V112a48 48 0 00-48-48zm-80 64a48 48 0 11-96 0 48 48 0 0196 0zm-352 96l80-80a16 16 0 0122.62 0l114.63 114.63a16 16 0 0022.62 0L464 200.25a16 16 0 0122.62 0L528 241.37V304H128z" opacity="0.4"></path><text x="50%" y="90%" dominant-baseline="middle" text-anchor="middle" font-family="sans-serif" font-size="24" fill="%239ca3af">Pilih gambar untuk memulai</text></svg>'
                            alt="Preview"
                            class="object-contain w-full h-full"
                        >
                    </div>
                </div>

                <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                    <div>
                        <label for="addPhotoFile" class="block mb-2 text-sm font-semibold text-gray-700">Pilih Foto <span class="text-red-500">*</span></label>
                        <input
                            type="file"
                            id="addPhotoFile"
                            name="photo_file"
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none file:mr-4 file:py-2.5 file:px-4 file:rounded-l-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100"
                            accept="image/*"
                            required
                        >
                        <p class="mt-1 text-xs text-gray-500">Format: JPG, JPEG, PNG, GIF</p>
                    </div>

                    <div>
                        <label for="addPhotoCaption" class="block mb-2 text-sm font-semibold text-gray-700">Caption <span class="text-red-500">*</span></label>
                        <textarea
                            id="addPhotoCaption"
                            name="caption"
                            rows="4"
                            class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 resize-none"
                            placeholder="Deskripsi foto..."
                            maxlength="100"
                        ></textarea>

                        <input type="hidden" name="cropped_image_data" id="addCroppedImageData">
                    </div>
                </div>
            </div>

            <div class="flex justify-end gap-3 pt-6 mt-6 border-t">
                <button type="button" onclick="closeAddPhotoModal()" class="px-6 py-2.5 border text-gray-700 hover:bg-gray-50 rounded-lg">Batal</button>
                <button type="button" id="submitAdd" class="px-6 py-2.5 bg-blue-600 hover:bg-blue-700 text-white rounded-lg">Tambah Foto</button>
            </div>
        </form>
    </div>
</div>

{{-- Edit Photo Modal --}}
<div id="editPhotoModal" class="fixed inset-0 z-50 flex items-center justify-center hidden p-4 bg-black/50 backdrop-blur-sm">
    <div class="w-full max-w-3xl bg-white shadow-2xl rounded-xl">
        <div class="flex items-center justify-between px-6 py-4 border-b">
            <h3 class="text-xl font-bold text-gray-800">Edit Foto & Caption</h3>
            <button onclick="closeEditPhotoModal()" class="text-gray-400 hover:text-gray-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>

        {{-- The form's action will be set dynamically by JavaScript --}}
        <form id="editPhotoForm" action="" method="POST" class="p-6">
            @csrf
            @method('PUT') 
            
            <div class="space-y-6"> 
                <div>
                    <label class="block mb-2 text-sm font-semibold text-gray-700">Area Preview & Crop</label>
                    <div class="w-full bg-gray-100 border-2 border-dashed rounded-lg min-h-[400px]">
                        <img 
                            id="editImageToCrop" 
                            src='data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" class="w-full h-full text-gray-400" viewBox="0 0 640 426" fill="currentColor"><path d="M560 64H80a48 48 0 00-48 48v200a48 48 0 0048 48h480a48 48 0 0048-48V112a48 48 0 00-48-48zm-80 64a48 48 0 11-96 0 48 48 0 0196 0zm-352 96l80-80a16 16 0 0122.62 0l114.63 114.63a16 16 0 0022.62 0L464 200.25a16 16 0 0122.62 0L528 241.37V304H128z" opacity="0.4"></path><text x="50%" y="90%" dominant-baseline="middle" text-anchor="middle" font-family="sans-serif" font-size="24" fill="%239ca3af">Pilih gambar untuk memulai</text></svg>'
                            alt="Preview"
                            class="object-contain w-full h-full"
                        >
                    </div>
                </div>
                
                <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                    <div>
                        <label for="editPhotoFile" class="block mb-2 text-sm font-semibold text-gray-700">Ganti Foto (Opsional)</label>
                        <input 
                            type="file" 
                            id="editPhotoFile" 
                            name="photo_file"
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none file:mr-4 file:py-2.5 file:px-4 file:rounded-l-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100"
                            accept="image/*"
                        >
                        <p class="mt-1 text-xs text-gray-500">Pilih file baru jika ingin mengganti foto yang ada.</p>
                    </div>

                    <div>
                        <label for="editPhotoCaption" class="block mb-2 text-sm font-semibold text-gray-700">Caption</label>
                        <textarea 
                            id="editPhotoCaption" 
                            name="caption"
                            rows="4"
                            class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 resize-none"
                            placeholder="Deskripsi foto..."
                            required
                            maxlength="100"
                        ></textarea>
                        
                        <input type="hidden" name="cropped_image_data" id="editCroppedImageData">
                    </div>
                </div>
            </div>

            <div class="flex justify-end gap-3 pt-6 mt-6 border-t">
                <button type="button" onclick="closeEditPhotoModal()" class="px-6 py-2.5 border text-gray-700 hover:bg-gray-50 rounded-lg">Batal</button>
                <button type="button" id="submitEdit" class="px-6 py-2.5 bg-blue-600 hover:bg-blue-700 text-white rounded-lg">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>



{{-- Add Video Modal --}}
<div id="addVideoModal" class="fixed inset-0 z-50 flex items-center justify-center hidden p-4 bg-black/50 backdrop-blur-sm">
    <div class="w-full max-w-2xl bg-white shadow-2xl rounded-xl">
        <div class="flex items-center justify-between px-6 py-4 border-b">
            <h3 class="text-xl font-bold text-gray-800">Tambah Video Demo</h3>
            <button onclick="closeAddVideoModal()" class="text-gray-400 hover:text-gray-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>

        <form id="addVideoForm" action="{{ route('gallery.videogaleri.store') }}" method="POST" class="p-6 space-y-4">
            @csrf

            <div>
                <label for="addVideoUrl" class="block mb-2 text-sm font-semibold text-gray-700">YouTube URL <span class="text-red-500">*</span></label>
                <input type="url" id="addVideoUrl" name="youtube_url" class="w-full px-4 py-2 border border-gray-300 rounded-lg" placeholder="https://www.youtube.com/watch?v=..." required>
            </div>

            <div>
                <label for="addVideoTitle" class="block mb-2 text-sm font-semibold text-gray-700">Judul Video <span class="text-red-500">*</span></label>
                <input type="text" id="addVideoTitle" name="title" class="w-full px-4 py-2 border border-gray-300 rounded-lg" placeholder="Judul video demo..." required>
            </div>

            <div>
                <label for="addVideoDescription" class="block mb-2 text-sm font-semibold text-gray-700">Deskripsi Video <span class="text-red-500">*</span></label>
                <textarea id="addVideoDescription" name="description" rows="4" class="w-full px-4 py-2 border border-gray-300 rounded-lg resize-none" placeholder="Deskripsi video demo..." required></textarea>
            </div>

            <div class="flex justify-end gap-3 pt-4 mt-4 border-t">
                <button type="button" onclick="closeAddVideoModal()" class="px-6 py-2.5 border text-gray-700 rounded-lg">Batal</button>
                <button type="submit" class="px-6 py-2.5 bg-indigo-600 text-white rounded-lg">Tambah Video</button>
            </div>
        </form>
    </div>
</div>

{{-- Edit Video Modal --}}
<div id="editVideoModal" class="fixed inset-0 z-50 flex items-center justify-center hidden p-4 bg-black/50 backdrop-blur-sm">
    <div class="w-full max-w-2xl bg-white shadow-2xl rounded-xl">
        <div class="flex items-center justify-between px-6 py-4 border-b">
            <h3 class="text-xl font-bold text-gray-800">Edit Video Demo</h3>
            <button onclick="closeEditVideoModal()" class="text-gray-400 hover:text-gray-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>

        <form id="editVideoForm" action="" method="POST" class="p-6 space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label for="editVideoUrl" class="block mb-2 text-sm font-semibold text-gray-700">YouTube URL <span class="text-red-500">*</span></label>
                <input type="url" id="editVideoUrl" name="youtube_url" class="w-full px-4 py-2 border border-gray-300 rounded-lg" required>
            </div>

            <div>
                <label for="editVideoTitle" class="block mb-2 text-sm font-semibold text-gray-700">Judul Video <span class="text-red-500">*</span></label>
                <input type="text" id="editVideoTitle" name="title" class="w-full px-4 py-2 border border-gray-300 rounded-lg" required>
            </div>

            <div>
                <label for="editVideoDescription" class="block mb-2 text-sm font-semibold text-gray-700">Deskripsi Video <span class="text-red-500">*</span></label>
                <textarea id="editVideoDescription" name="description" rows="4" class="w-full px-4 py-2 border border-gray-300 rounded-lg resize-none" required></textarea>
            </div>

            <div class="flex justify-end gap-3 pt-4 mt-4 border-t">
                <button type="button" onclick="closeEditVideoModal()" class="px-6 py-2.5 border text-gray-700 rounded-lg">Batal</button>
                <button type="submit" class="px-6 py-2.5 bg-indigo-600 text-white rounded-lg">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>

<script>

    // 0. Add Photo Modal
    const addModal = document.getElementById('addPhotoModal');
    const addForm = document.getElementById('addPhotoForm');
    const addFileInput = document.getElementById('addPhotoFile');
    const addImage = document.getElementById('addImageToCrop');
    const addCaptionInput = document.getElementById('addPhotoCaption');
    const addCroppedImage = document.getElementById('addCroppedImageData');
    const submitAddButton = document.getElementById('submitAdd');
    let addCropper;

    // Add Photo Modal -> Open
    function openAddPhotoModal() {
        addModal.classList.remove('hidden');
    }

    // Add Photo Modal -> Close and Cleanse Data
    function closeAddPhotoModal() {
        addModal.classList.add('hidden');
        addFileInput.value = '';
        addCaptionInput.value = '';
        addCroppedImage.value = '';
        addImage.src = 'data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" class="w-full h-full text-gray-400" viewBox="0 0 640 426" fill="currentColor"><path d="M560 64H80a48 48 0 00-48 48v200a48 48 0 0048 48h480a48 48 0 0048-48V112a48 48 0 00-48-48zm-80 64a48 48 0 11-96 0 48 48 0 0196 0zm-352 96l80-80a16 16 0 0122.62 0l114.63 114.63a16 16 0 0022.62 0L464 200.25a16 16 0 0122.62 0L528 241.37V304H128z" opacity="0.4"></path><text x="50%" y="50%" dominant-baseline="middle" text-anchor="middle" font-family="sans-serif" font-size="24" fill="%239ca3af">Pilih gambar untuk memulai</text></svg>';

        if (addCropper) {
            addCropper.destroy();
            addCropper = null;
        }
    }

    // Add Photo Modal -> Listen for file selection to initialize cropper
    addFileInput.addEventListener('change', function(e) {
        const files = e.target.files;
        if (files && files.length > 0) {
            const reader = new FileReader();
            reader.onload = function(event) {
                addImage.src = event.target.result;

                if (addCropper) {
                    addCropper.destroy();
                }

                addCropper = new Cropper(addImage, {
                    aspectRatio: 1280 / 853,
                    viewMode: 1,
                    dragMode: 'crop',
                    guides: true,
                    background: false,
                    autoCropArea: 0.9,
                    movable: false,
                    toggleDragModeOnDblclick: false,
                });
            };
            reader.readAsDataURL(files[0]);
        }
    });

    // Add Photo Modal -> Handle form submission
    submitAddButton.addEventListener('click', function() {
        if (!addCropper) {
            alert('Silakan pilih foto terlebih dahulu!');
            return;
        }

        this.disabled = true;
        this.innerText = 'Menyimpan...';

        const canvas = addCropper.getCroppedCanvas({
            width: 1280,
            height: 853,
            imageSmoothingQuality: 'high',
        });

        canvas.toBlob(function(blob) {
            const reader = new FileReader();
            reader.readAsDataURL(blob);
            reader.onloadend = function() {
                const base64data = reader.result;
                addCroppedImage.value = base64data;
                addForm.submit();
            };
        }, 'image/jpeg', 0.9);
    });

    // 1. Edit Photo Modal
    const editModal = document.getElementById('editPhotoModal');
    const editForm = document.getElementById('editPhotoForm');
    const editFileInput = document.getElementById('editPhotoFile');
    const editImage = document.getElementById('editImageToCrop');
    const editCaptionInput = document.getElementById('editPhotoCaption');
    const editCroppedImage = document.getElementById('editCroppedImageData');
    const submitEditButton = document.getElementById('submitEdit');
    let editCropper;

    // Edit Photo Modal -> Open and Populate Data
    function openEditPhotoModal(id, imageUrl, caption, updateUrl) { 
        editForm.action = updateUrl;
        editCaptionInput.value = caption;
        
        // if image source is not empty...
        if (imageUrl) {
            editImage.src = imageUrl;
        }

        editModal.classList.remove('hidden');
    }

    // Edit Photo Modal -> Close and Cleanse Data
    function closeEditPhotoModal() {
        editModal.classList.add('hidden');
        editFileInput.value = '';
        editCroppedImage.value = '';

        // display thos svg instead
        editImage.src = 'data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" class="w-full h-full text-gray-400" viewBox="0 0 640 426" fill="currentColor"><path d="M560 64H80a48 48 0 00-48 48v200a48 48 0 0048 48h480a48 48 0 0048-48V112a48 48 0 00-48-48zm-80 64a48 48 0 11-96 0 48 48 0 0196 0zm-352 96l80-80a16 16 0 0122.62 0l114.63 114.63a16 16 0 0022.62 0L464 200.25a16 16 0 0122.62 0L528 241.37V304H128z" opacity="0.4"></path><text x="50%" y="50%" dominant-baseline="middle" text-anchor="middle" font-family="sans-serif" font-size="24" fill="%239ca3af">Memuat Gambar...</text></svg>';

        if (editCropper) {
            editCropper.destroy();
            editCropper = null;
        }
    }

    // Edit Photo Modal -> Listen for new file selection to initialize cropper
    editFileInput.addEventListener('change', function(e) {
        const files = e.target.files;
        if (files && files.length > 0) {
            const reader = new FileReader();
            reader.onload = function(event) {
                editImage.src = event.target.result;
                
                // destroy first if exist
                if (editCropper) {
                    editCropper.destroy();
                }

                // new cropper.js 
                editCropper = new Cropper(editImage, {
                    aspectRatio: 1280 / 853,
                    viewMode: 1,
                    dragMode: 'crop',
                    guides: true,
                    background: false,
                    autoCropArea: 0.9,
                    movable: false,
                    toggleDragModeOnDblclick: false,
                });
            };
            reader.readAsDataURL(files[0]);
        }
    });

    // Edit Photo Modal -> Handle form submission
    submitEditButton.addEventListener('click', function() {
        this.disabled = true;
        this.innerText = 'Menyimpan...';

        // new image
        if (editCropper) {
            const canvas = editCropper.getCroppedCanvas({
                width: 1280,
                height: 853,
                imageSmoothingQuality: 'high',
            });

            canvas.toBlob(function(blob) {
                const reader = new FileReader();
                reader.readAsDataURL(blob);
                reader.onloadend = function() {
                    const base64data = reader.result;
                    editCroppedImage.value = base64data;
                    editForm.submit();
                };
            }, 'image/jpeg', 0.9);
        } 

        // no new image (cuma caption)
        else {
            editCroppedImage.value = ''; // Ensure the cropped data is empty
            editForm.submit(); // Submit the form as is
        }
    });

    // 3. Video Modal Functions

    const addVideoModal = document.getElementById('addVideoModal');
    const editVideoModal = document.getElementById('editVideoModal');
    const editVideoForm = document.getElementById('editVideoForm');

    // Add Video Modal -> Open
    function openAddVideoModal() {
        addVideoModal.classList.remove('hidden');
    }

    // Add Video Modal -> Close
    function closeAddVideoModal() {
        addVideoModal.classList.add('hidden');
        document.getElementById('addVideoForm').reset();
    }

    // Edit Video Modal -> Open and Populate Data
    function openEditVideoModal(id, youtubeUrl, title, description, updateUrl) {
        editVideoForm.action = updateUrl;
        document.getElementById('editVideoUrl').value = youtubeUrl;
        document.getElementById('editVideoTitle').value = title;
        document.getElementById('editVideoDescription').value = description;
        editVideoModal.classList.remove('hidden');
    }

    // Edit Video Modal -> Close
    function closeEditVideoModal() {
        editVideoModal.classList.add('hidden');
    }

    // Delete Video Function
    function deleteVideo(id, deleteUrl) {
        if (confirm('Apakah Anda yakin ingin menghapus video ini?')) {
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = deleteUrl;

            const csrfToken = document.createElement('input');
            csrfToken.type = 'hidden';
            csrfToken.name = '_token';
            csrfToken.value = '{{ csrf_token() }}';
            form.appendChild(csrfToken);

            const methodField = document.createElement('input');
            methodField.type = 'hidden';
            methodField.name = '_method';
            methodField.value = 'DELETE';
            form.appendChild(methodField);

            document.body.appendChild(form);
            form.submit();
        }
    }

    // Close modals on ESC
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeAddPhotoModal();
            closeEditPhotoModal();
            closeAddVideoModal();
            closeEditVideoModal();
        }
    });

    // Close modals on outside click
    document.querySelectorAll('[id$="Modal"]').forEach(modal => {
        modal.addEventListener('click', function(e) {
            if (e.target === this) this.classList.add('hidden');
        });
    });
</script>

@endsection