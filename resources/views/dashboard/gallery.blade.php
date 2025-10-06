{{-- FILE: resources/views/admin/gallery/edit.blade.php --}}
@extends('dashboard')

@section('content')

<main class="flex-1 overflow-y-auto bg-gray-50 p-6">
    <div class="max-w-6xl mx-auto space-y-6">
        
        {{-- Header --}}
        <div class="mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Edit Gallery Section</h2>
            <p class="text-gray-600 text-sm mt-1">Kelola foto dan video demo project</p>
        </div>

        {{-- Success Alert --}}
        @if(session('success'))
        <div class="bg-green-50 border border-green-200 text-green-800 rounded-lg p-4 flex items-center gap-3">
            <svg class="w-5 h-5 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
            </svg>
            <span class="font-medium">{{ session('success') }}</span>
        </div>
        @endif

        {{-- Stats --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="bg-gradient-to-br from-blue-500 to-blue-600 rounded-lg p-4 text-white">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-blue-100 text-xs font-medium">Total Foto</p>
                        <p class="text-2xl font-bold mt-1">{{ count($photos ?? []) }}</p>
                    </div>
                    <svg class="w-8 h-8 text-blue-200" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd"/>
                    </svg>
                </div>
            </div>

            <div class="bg-gradient-to-br from-purple-500 to-purple-600 rounded-lg p-4 text-white">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-purple-100 text-xs font-medium">Video Demo</p>
                        <p class="text-xl font-bold mt-1">1</p>
                    </div>
                    <svg class="w-8 h-8 text-purple-200" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M2 6a2 2 0 012-2h6a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V6zM14.553 7.106A1 1 0 0014 8v4a1 1 0 00.553.894l2 1A1 1 0 0018 13V7a1 1 0 00-1.447-.894l-2 1z"/>
                    </svg>
                </div>
            </div>

            <div class="bg-gradient-to-br from-green-500 to-green-600 rounded-lg p-4 text-white">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-green-100 text-xs font-medium">Status</p>
                        <p class="text-xl font-bold mt-1">Active</p>
                    </div>
                    <svg class="w-8 h-8 text-green-200" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                </div>
            </div>
        </div>

        {{-- Photo Gallery Grid --}}
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
            <div class="bg-gradient-to-r from-blue-50 to-indigo-50 px-6 py-4 border-b">
                <h3 class="text-lg font-semibold text-gray-800">Galeri Foto</h3>
                <p class="text-xs text-gray-500 mt-1">Klik foto untuk edit caption atau hapus</p>
            </div>

            <div class="p-6">
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                    
                    @forelse($photos ?? [] as $photo)
                    <div class="group relative aspect-square rounded-lg overflow-hidden border-2 border-gray-200 hover:border-green-500 transition">
                        <img src="{{ $photo->image_url }}" alt="{{ $photo->caption }}" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition">
                            <div class="absolute bottom-0 left-0 right-0 p-3">
                                <p class="text-white text-sm font-medium mb-2 line-clamp-2">{{ $photo->caption }}</p>
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
                    <div class="col-span-full text-center py-12">
                        <svg class="w-16 h-16 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                        <p class="text-gray-500">Belum ada foto di galeri</p>
                    </div>
                    @endforelse

                </div>
            </div>
        </div>

        {{-- Video Demo Section --}}
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
            <div class="bg-gradient-to-r from-purple-50 to-pink-50 px-6 py-4 border-b flex items-center justify-between">
                <h3 class="text-lg font-semibold text-gray-800">Video Demo</h3>
                <button onclick="openVideoModal()" class="px-4 py-2 bg-purple-600 hover:bg-purple-700 text-white text-sm rounded-lg transition">
                    Edit Video
                </button>
            </div>

            <div class="p-6">
                <div class="aspect-video rounded-lg overflow-hidden border bg-gray-900">
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
                    <div class="w-full h-full flex items-center justify-center text-gray-500">
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
                <div class="mt-4 p-4 bg-gray-800 rounded-lg">
                    <h4 class="font-semibold text-white mb-1">{{ $video->title }}</h4>
                    <p class="text-gray-400 text-sm">{{ $video->description }}</p>
                </div>
                @endif
            </div>
        </div>

    </div>
</main>

{{-- Edit Photo Modal --}}
<div id="photoModal" class="hidden fixed inset-0 bg-black/50 backdrop-blur-sm z-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-xl shadow-2xl max-w-2xl w-full">
        <div class="border-b px-6 py-4 flex items-center justify-between">
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

            <div class="grid md:grid-cols-2 gap-6">
                {{-- Preview --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Preview Foto</label>
                    <div class="aspect-square rounded-lg overflow-hidden border-2 border-gray-300">
                        <img id="photoPreviewImg" src="" alt="Preview" class="w-full h-full object-cover">
                    </div>
                </div>

                {{-- Form --}}
                <div class="space-y-4">
                    <div>
                        <label for="photoUrl" class="block text-sm font-semibold text-gray-700 mb-2">
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
                        <p class="text-xs text-gray-500 mt-1">Link foto dari internet atau upload</p>
                    </div>

                    <div>
                        <label for="photoCaption" class="block text-sm font-semibold text-gray-700 mb-2">
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

            <div class="flex justify-end gap-3 pt-6 border-t mt-6">
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
<div id="videoModal" class="hidden fixed inset-0 bg-black/50 backdrop-blur-sm z-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-xl shadow-2xl max-w-2xl w-full">
        <div class="border-b px-6 py-4 flex items-center justify-between">
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
                <label for="videoUrl" class="block text-sm font-semibold text-gray-700 mb-2">
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
                <p class="text-xs text-gray-500 mt-1">Link YouTube (akan otomatis dikonversi ke embed)</p>
            </div>

            <div>
                <label for="videoTitle" class="block text-sm font-semibold text-gray-700 mb-2">
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
                <label for="videoDescription" class="block text-sm font-semibold text-gray-700 mb-2">
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
// Photo Modal Functions
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