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
                        <p class="mt-1 text-xl font-bold">1</p>
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

        {{-- Photo Gallery Grid --}}
        <div class="overflow-hidden bg-white border border-gray-200 shadow-sm rounded-xl">
            <div class="flex items-center justify-between px-6 py-4 border-b bg-gradient-to-r from-blue-50 to-indigo-50">
                <div class="keterangan">
                    <h3 class="text-lg font-semibold text-gray-800">Galeri Foto</h3>
                    <p class="mt-1 text-xs text-gray-500">Klik foto untuk edit caption atau hapus</p>
                </div>
                <button onclick="openAddPhotoModal()" class="px-4 py-2 text-sm text-white transition bg-purple-600 rounded-lg hover:bg-purple-700">
                    Tambah Foto
                </button>
            </div>

            <div class="p-6">
                <div class="grid grid-cols-2 gap-4 md:grid-cols-3 lg:grid-cols-4">
                    
                    @forelse($photos ?? [] as $photo)
                    <div class="relative overflow-hidden transition border-2 border-gray-200 rounded-lg group aspect-square hover:border-green-500">
                        <img src="{{ $photo->image_url }}" alt="{{ $photo->caption }}" class="object-cover w-full h-full">
                        <div class="absolute inset-0 transition opacity-0 bg-gradient-to-t from-black/70 to-transparent group-hover:opacity-100">
                            <div class="absolute bottom-0 left-0 right-0 p-3">
                                <p class="mb-2 text-sm font-medium text-white line-clamp-2">{{ $photo->caption }}</p>
                                <div class="flex gap-2">
                                    <button onclick="editPhoto({{ $photo->id }}, '{{ $photo->image_url }}', '{{ $photo->caption }}')" class="flex-1 px-3 py-1.5 bg-blue-500 hover:bg-blue-600 text-white text-xs rounded transition">
                                        Edit
                                    </button>
                                    <form action="" method="POST" class="flex-1" onsubmit="return confirm('Yakin hapus foto ini?')">
                                        {{-- @csrf --}}
                                        {{-- @method('DELETE') --}}
                                        <input type="hidden" name="id" value="{{ $photo->id }}">
                                        <button type="submit" class="w-full px-3 py-1.5 bg-red-500 hover:bg-red-600 text-white text-xs rounded transition">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="py-12 text-center col-span-full">
                        <svg class="w-16 h-16 mx-auto mb-4 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                        <p class="text-gray-500">Belum ada foto di galeri</p>
                    </div>
                    @endforelse

                </div>
            </div>
        </div>

        {{-- Video Demo Section --}}
        <div class="overflow-hidden bg-white border border-gray-200 shadow-sm rounded-xl">
            <div class="flex items-center justify-between px-6 py-4 border-b bg-gradient-to-r from-purple-50 to-pink-50">
                <h3 class="text-lg font-semibold text-gray-800">Video Demo</h3>
                <button onclick="openVideoModal()" class="px-4 py-2 text-sm text-white transition bg-purple-600 rounded-lg hover:bg-purple-700">
                    Edit Video
                </button>
            </div>

            <div class="p-6">
                <div class="overflow-hidden bg-gray-900 border rounded-lg aspect-video">
                    @if(!empty($video->youtube_url ?? ''))
                    <iframe 
                        id="videoPreview"
                        class="w-full h-full" 
                        src="{{ $video->youtube_url }}" 
                        title="{{ $video->title ?? 'Demo Video' }}" 
                        frameborder="0" 
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen>
                    </iframe>
                    @else
                    <div class="flex items-center justify-center w-full h-full text-gray-500">
                        <div class="text-center">
                            <svg class="w-16 h-16 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                            </svg>
                            <p>Video belum diatur</p>
                        </div>
                    </div>
                    @endif
                </div>
                
                @if(!empty($video->title ?? ''))
                <div class="p-4 mt-4 bg-gray-800 rounded-lg">
                    <h4 class="mb-1 font-semibold text-white">{{ $video->title }}</h4>
                    <p class="text-sm text-gray-400">{{ $video->description }}</p>
                </div>
                @endif
            </div>
        </div>

    </div>
</main>

{{-- Add Photo --}}
<div id="addPhotoModal" class="fixed inset-0 z-50 flex items-center justify-center hidden p-4 bg-black/50 backdrop-blur-sm">
    {{-- PERUBAHAN: max-w-2xl pada modal container diubah menjadi max-w-3xl untuk mengakomodasi lebar yang lebih besar --}}
    <div class="w-full max-w-3xl bg-white shadow-2xl rounded-xl"> 
        <div class="flex items-center justify-between px-6 py-4 border-b">
            <h3 class="text-xl font-bold text-gray-800">Tambah & Crop Foto</h3>
            <button onclick="closeAddPhotoModal()" class="text-gray-400 hover:text-gray-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>

        <form id="addPhotoForm" action="{{-- route upload Anda --}}" method="POST" class="p-6">
            @csrf
            
            {{-- PERUBAHAN: grid-cols-2 diubah menjadi grid-cols-3 untuk memberikan ruang ekstra pada preview --}}
            <div class="grid gap-6 md:grid-cols-3"> 
                {{-- Area Crop --}}
                {{-- PERUBAHAN: Colspan 2 untuk membuat preview lebih lebar (2/3 dari lebar modal) --}}
                <div class="md:col-span-2"> 
                    <label class="block mb-2 text-sm font-semibold text-gray-700">Area Crop</label>
                    <div class="w-full bg-gray-100 min-h-[400px]">
                        <img id="imageToCrop" src="" alt="Preview">
                    </div>
                </div>

                {{-- Form Fields --}}
                <div> {{-- Ini akan otomatis mengambil 1/3 lebar sisanya --}}
                    <div class="space-y-4">
                        <div>
                            <label for="photoFile" class="block mb-2 text-sm font-semibold text-gray-700">Pilih File Foto</label>
                            <input 
                                type="file" 
                                id="photoFile" 
                                name="photo_file"
                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none file:mr-4 file:py-2.5 file:px-4 file:rounded-l-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100"
                                required
                                accept="image/*"
                                onchange="updatePreview(this)"
                            >
                            <p class="mt-1 text-xs text-gray-500">Pilih gambar untuk memulai cropping.</p>
                        </div>

                        <div>
                            <label for="addPhotoCaption" class="block mb-2 text-sm font-semibold text-gray-700">Caption</label>
                            {{-- PERBAIKAN: Menambahkan class 'border' dan 'border-gray-300' yang hilang --}}
                            <textarea 
                                id="addPhotoCaption" 
                                name="caption"
                                rows="4"
                                class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 resize-none"
                                placeholder="Deskripsi foto..."
                                required
                            ></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex justify-end gap-3 pt-6 mt-6 border-t">
                <button type="button" onclick="closeAddPhotoModal()" class="px-6 py-2.5 border text-gray-700 hover:bg-gray-50 rounded-lg">Batal</button>
                <button type="button" id="submitCrop" class="px-6 py-2.5 bg-blue-600 hover:bg-blue-700 text-white rounded-lg">Simpan Foto</button>
            </div>
        </form>
    </div>
</div>

{{-- Edit Photo Modal --}}
<div id="photoModal" class="fixed inset-0 z-50 flex items-center justify-center hidden p-4 bg-black/50 backdrop-blur-sm">
    <div class="w-full max-w-2xl bg-white shadow-2xl rounded-xl">
        <div class="flex items-center justify-between px-6 py-4 border-b">
            <h3 class="text-xl font-bold text-gray-800">Edit Foto</h3>
            <button onclick="closePhotoModal()" class="text-gray-400 hover:text-gray-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>

        <form id="photoForm" action="" method="POST" class="p-6">
            {{-- @csrf --}}
            {{-- @method('PUT') --}}
            <input type="hidden" name="id" id="photoId">

            <div class="grid gap-6 md:grid-cols-2">
                {{-- Preview --}}
                <div>
                    <label class="block mb-2 text-sm font-semibold text-gray-700">Preview Foto</label>
                    <div class="overflow-hidden border-2 border-gray-300 rounded-lg aspect-square">
                        <img id="photoPreviewImg" src="" alt="Preview" class="object-cover w-full h-full">
                    </div>
                </div>

                {{-- Form --}}
                <div class="space-y-4">
                    <div>
                        <label for="photoUrl" class="block mb-2 text-sm font-semibold text-gray-700">
                            URL Foto <span class="text-red-500">*</span>
                        </label>
                        <input 
                            type="url" 
                            id="photoUrl" 
                            name="image_url"
                            class="w-full px-4 py-2.5 border rounded-lg focus:ring-2 focus:ring-blue-500"
                            placeholder="https://example.com/image.jpg"
                            required
                            onchange="updatePhotoPreview()"
                        >
                        <p class="mt-1 text-xs text-gray-500">Link foto dari internet atau upload</p>
                    </div>

                    <div>
                        <label for="photoCaption" class="block mb-2 text-sm font-semibold text-gray-700">
                            Caption <span class="text-red-500">*</span>
                        </label>
                        <textarea 
                            id="photoCaption" 
                            name="caption"
                            rows="4"
                            class="w-full px-4 py-2.5 border rounded-lg focus:ring-2 focus:ring-blue-500 resize-none"
                            placeholder="Deskripsi foto..."
                            required
                        ></textarea>
                    </div>
                </div>
            </div>

            <div class="flex justify-end gap-3 pt-6 mt-6 border-t">
                <button type="button" onclick="closePhotoModal()" class="px-6 py-2.5 border text-gray-700 hover:bg-gray-50 rounded-lg">
                    Batal
                </button>
                <button type="submit" class="px-6 py-2.5 bg-blue-600 hover:bg-blue-700 text-white rounded-lg">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>

{{-- Edit Video Modal --}}
<div id="videoModal" class="fixed inset-0 z-50 flex items-center justify-center hidden p-4 bg-black/50 backdrop-blur-sm">
    <div class="w-full max-w-2xl bg-white shadow-2xl rounded-xl">
        <div class="flex items-center justify-between px-6 py-4 border-b">
            <h3 class="text-xl font-bold text-gray-800">Edit Video Demo</h3>
            <button onclick="closeVideoModal()" class="text-gray-400 hover:text-gray-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>

        <form action="" method="POST" class="p-6 space-y-4">
            {{-- @csrf --}}
            {{-- @method('PUT') --}}

            <div>
                <label for="videoUrl" class="block mb-2 text-sm font-semibold text-gray-700">
                    YouTube URL <span class="text-red-500">*</span>
                </label>
                <input 
                    type="url" 
                    id="videoUrl" 
                    name="youtube_url"
                    value="{{ old('youtube_url', $video->youtube_url ?? '') }}"
                    class="w-full px-4 py-2.5 border rounded-lg focus:ring-2 focus:ring-purple-500"
                    placeholder="https://www.youtube.com/watch?v=..."
                    required
                >
                <p class="mt-1 text-xs text-gray-500">Link YouTube (akan otomatis dikonversi ke embed)</p>
            </div>

            <div>
                <label for="videoTitle" class="block mb-2 text-sm font-semibold text-gray-700">
                    Judul Video <span class="text-red-500">*</span>
                </label>
                <input 
                    type="text" 
                    id="videoTitle" 
                    name="title"
                    value="{{ old('title', $video->title ?? '') }}"
                    class="w-full px-4 py-2.5 border rounded-lg focus:ring-2 focus:ring-purple-500"
                    placeholder="Demo Project IoT Agriculture"
                    required
                >
            </div>

            <div>
                <label for="videoDescription" class="block mb-2 text-sm font-semibold text-gray-700">
                    Deskripsi Video <span class="text-red-500">*</span>
                </label>
                <textarea 
                    id="videoDescription" 
                    name="description"
                    rows="3"
                    class="w-full px-4 py-2.5 border rounded-lg focus:ring-2 focus:ring-purple-500 resize-none"
                    placeholder="Deskripsi tentang video..."
                    required
                >{{ old('description', $video->description ?? '') }}</textarea>
            </div>

            <div class="flex justify-end gap-3 pt-4 border-t">
                <button type="button" onclick="closeVideoModal()" class="px-6 py-2.5 border text-gray-700 hover:bg-gray-50 rounded-lg">
                    Batal
                </button>
                <button type="submit" class="px-6 py-2.5 bg-purple-600 hover:bg-purple-700 text-white rounded-lg">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    
    const modal = document.getElementById('addPhotoModal');
    const image = document.getElementById('imageToCrop');
    const fileInput = document.getElementById('photoFile');
    const submitButton = document.getElementById('submitCrop');
    const form = document.getElementById('addPhotoForm');
    const hiddenInput = document.getElementById('croppedImageData');
    let cropper;

    // Fungsi untuk membuka modal
    function openAddPhotoModal() {
        modal.classList.remove('hidden');
    }

    // Fungsi untuk menutup modal dan membersihkan state
    function closeAddPhotoModal() {
        modal.classList.add('hidden');
        fileInput.value = ''; // Reset input file
        image.src = ''; // Hapus gambar
        if (cropper) {
            cropper.destroy(); // Hancurkan instance cropper
            cropper = null; // Pastikan variabel bersih
        }
    }

    // Event listener saat file dipilih
    fileInput.addEventListener('change', function(e) {
        const files = e.target.files;
        if (files && files.length > 0) {
            const reader = new FileReader();
            reader.onload = function(event) {
                image.src = event.target.result;
                
                if (cropper) {
                    cropper.destroy();
                }

                // Inisialisasi Cropper.js dengan konfigurasi baru
                cropper = new Cropper(image, {
                    aspectRatio: 1280 / 853, // Rasio 3:2
                    viewMode: 0,
                    guides: true,
                    background: false,
                    autoCropArea: 0.9,
                });
            };
            reader.readAsDataURL(files[0]);
        }
    });

    // Event listener untuk tombol 'Simpan Foto'
    submitButton.addEventListener('click', function() {
        if (!cropper) {
            alert('Silakan pilih gambar terlebih dahulu.');
            return;
        }

        // Tambahkan feedback ke pengguna
        this.disabled = true;
        this.innerText = 'Menyimpan...';

        // Ambil canvas dengan resolusi output yang baru
        const canvas = cropper.getCroppedCanvas({
            width: 1280,
            height: 853,
            imageSmoothingQuality: 'high',
        });

        canvas.toBlob(function(blob) {
            const reader = new FileReader();
            reader.readAsDataURL(blob);
            reader.onloadend = function() {
                const base64data = reader.result;
                hiddenInput.value = base64data;
                form.submit();
            };
        }, 'image/jpeg', 0.9);
    });

    // Edit Photo Modal Functions
    function editPhoto(id, imageUrl, caption) {
        document.getElementById('photoId').value = id;
        document.getElementById('photoUrl').value = imageUrl;
        document.getElementById('photoCaption').value = caption;
        document.getElementById('photoPreviewImg').src = imageUrl;
        document.getElementById('photoModal').classList.remove('hidden');
    }

    function closePhotoModal() {
        document.getElementById('photoModal').classList.add('hidden');
    }

    function updatePhotoPreview() {
        const url = document.getElementById('photoUrl').value;
        if (url) {
            document.getElementById('photoPreviewImg').src = url;
        }
    }

    // Video Modal Functions
    function openVideoModal() {
        document.getElementById('videoModal').classList.remove('hidden');
    }

    function closeVideoModal() {
        document.getElementById('videoModal').classList.add('hidden');
    }

    // Close modals on ESC
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closePhotoModal();
            closeVideoModal();
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