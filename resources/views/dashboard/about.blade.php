{{-- FILE: resources/views/admin/about/edit.blade.php --}}
@extends('dashboard')

@section('content')

<main class="flex-1 overflow-y-auto bg-gray-50 p-6">
    <div class="max-w-7xl mx-auto space-y-6">
        
        {{-- Header --}}
        <div class="mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Edit About Section</h2>
            <p class="text-gray-600 text-sm mt-1">Kelola latar belakang, tujuan, tim dosen, tim mahasiswa dan mitra</p>
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

        <div class="grid lg:grid-cols-2 gap-6">

            {{-- CARD 1: Latar Belakang --}}
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                <div class="bg-gradient-to-r from-blue-50 to-indigo-50 px-6 py-4 border-b">
                    <h3 class="text-lg font-semibold text-gray-800 flex items-center gap-2">
                        <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                        Latar Belakang
                    </h3>
                </div>
                <form action="{{ route('admin.about.background.update') }}" method="POST" class="p-6">
                    @csrf
                    @method('PUT')
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Isi Latar Belakang</label>
                        <textarea 
                            name="content" 
                            rows="8"
                            class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent resize-none"
                            placeholder="Tuliskan latar belakang project..."
                            required
                        >{{ old('content', $background->content ?? '') }}</textarea>
                        <p class="text-xs text-gray-500 mt-1">Jelaskan latar belakang pembuatan project ini</p>
                    </div>
                    <div class="mt-4">
                        <button type="submit" class="w-full px-4 py-2.5 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-medium transition">
                            Simpan Latar Belakang
                        </button>
                    </div>
                </form>
            </div>

            {{-- CARD 2: Tujuan Project --}}
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                <div class="bg-gradient-to-r from-green-50 to-emerald-50 px-6 py-4 border-b">
                    <h3 class="text-lg font-semibold text-gray-800 flex items-center gap-2">
                        <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                        </svg>
                        Tujuan Project
                    </h3>
                </div>
                <form action="{{ route('admin.about.goals.update') }}" method="POST" class="p-6">
                    @csrf
                    @method('PUT')
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Daftar Tujuan (satu per baris)</label>
                        <textarea 
                            name="goals" 
                            rows="8"
                            class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent resize-none"
                            placeholder="Meningkatkan hasil panen&#10;Mengurangi pemborosan air&#10;..."
                            required
                        >{{ old('goals', $goals->content ?? '') }}</textarea>
                        <p class="text-xs text-gray-500 mt-1">Tulis setiap tujuan di baris baru</p>
                    </div>
                    <div class="mt-4">
                        <button type="submit" class="w-full px-4 py-2.5 bg-green-600 hover:bg-green-700 text-white rounded-lg font-medium transition">
                            Simpan Tujuan
                        </button>
                    </div>
                </form>
            </div>

        </div>

        {{-- CARD 3: Tim Dosen --}}
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
            <div class="bg-gradient-to-r from-yellow-50 to-amber-50 px-6 py-4 border-b flex items-center justify-between">
                <h3 class="text-lg font-semibold text-gray-800 flex items-center gap-2">
                    <svg class="w-5 h-5 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                    </svg>
                    Tim Dosen
                </h3>
                <button onclick="openDosenModal()" class="px-4 py-2 bg-yellow-600 hover:bg-yellow-700 text-white text-sm rounded-lg transition">
                    + Tambah Dosen
                </button>
            </div>
            <div class="p-6">
                <div class="grid md:grid-cols-3 lg:grid-cols-4 gap-4" id="dosenList">
                    @forelse($dosens ?? [] as $dosen)
                    <div class="group border border-gray-200 rounded-xl p-5 hover:border-yellow-400 hover:shadow-lg transition-all duration-300">
                        <div class="flex flex-col items-center text-center">
                            @if(!empty($dosen->photo))
                            <img src="{{ asset('storage/' . $dosen->photo) }}" alt="{{ $dosen->name }}" class="w-20 h-20 rounded-full object-cover shadow-md mb-3 ring-2 ring-yellow-100">
                            @else
                            <div class="w-20 h-20 rounded-full bg-gradient-to-br from-yellow-400 to-yellow-600 flex items-center justify-center text-white text-xl font-bold shadow-md mb-3">
                                {{ strtoupper(substr($dosen->name, 0, 2)) }}
                            </div>
                            @endif
                            <div class="flex-1 mb-4">
                                <p class="font-semibold text-gray-800 mb-1">{{ $dosen->name }}</p>
                                <p class="text-xs text-gray-500">{{ $dosen->position }}</p>
                            </div>
                        </div>
                        <div class="flex gap-2 justify-center pt-3 border-t border-gray-100">
                            <button onclick="editDosen({{ $dosen->id }}, '{{ addslashes($dosen->name) }}', '{{ addslashes($dosen->position) }}', '{{ $dosen->photo ? asset('storage/' . $dosen->photo) : '' }}')" class="p-2 bg-blue-50 hover:bg-blue-100 text-blue-600 rounded-lg transition-colors" title="Edit">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                </svg>
                            </button>
                            <form action="{{ route('admin.about.dosen.destroy', $dosen->id) }}" method="POST" onsubmit="return confirm('Yakin hapus dosen ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="p-2 bg-red-50 hover:bg-red-100 text-red-600 rounded-lg transition-colors" title="Hapus">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>
                    @empty
                    <p class="text-gray-500 text-sm col-span-full text-center py-12">Belum ada tim dosen</p>
                    @endforelse
                </div>
            </div>
        </div>

        {{-- CARD 4: Tim Mahasiswa --}}
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
            <div class="bg-gradient-to-r from-blue-50 to-sky-50 px-6 py-4 border-b flex items-center justify-between">
                <h3 class="text-lg font-semibold text-gray-800 flex items-center gap-2">
                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                    </svg>
                    Tim Mahasiswa
                </h3>
                <button onclick="openMahasiswaModal()" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm rounded-lg transition">
                    + Tambah Mahasiswa
                </button>
            </div>
            <div class="p-6">
                <div class="grid md:grid-cols-3 lg:grid-cols-4 gap-4" id="mahasiswaList">
                    @forelse($mahasiswas ?? [] as $mahasiswa)
                    <div class="group border border-gray-200 rounded-xl p-5 hover:border-blue-400 hover:shadow-lg transition-all duration-300">
                        <div class="flex flex-col items-center text-center">
                            @if(!empty($mahasiswa->photo))
                            <img src="{{ asset('storage/' . $mahasiswa->photo) }}" alt="{{ $mahasiswa->name }}" class="w-20 h-20 rounded-full object-cover shadow-md mb-3 ring-2 ring-blue-100">
                            @else
                            <div class="w-20 h-20 rounded-full bg-gradient-to-br from-blue-500 to-blue-700 flex items-center justify-center text-white text-xl font-bold shadow-md mb-3">
                                {{ strtoupper(substr($mahasiswa->name, 0, 2)) }}
                            </div>
                            @endif
                            <div class="flex-1 mb-4">
                                <p class="font-semibold text-gray-800 mb-1">{{ $mahasiswa->name }}</p>
                                <p class="text-xs text-gray-500">{{ $mahasiswa->role }}</p>
                            </div>
                        </div>
                        <div class="flex gap-2 justify-center pt-3 border-t border-gray-100">
                            <button onclick="editMahasiswa({{ $mahasiswa->id }}, '{{ addslashes($mahasiswa->name) }}', '{{ addslashes($mahasiswa->role) }}', '{{ $mahasiswa->photo ? asset('storage/' . $mahasiswa->photo) : '' }}')" class="p-2 bg-blue-50 hover:bg-blue-100 text-blue-600 rounded-lg transition-colors" title="Edit">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                </svg>
                            </button>
                            <form action="{{ route('admin.about.mahasiswa.destroy', $mahasiswa->id) }}" method="POST" onsubmit="return confirm('Yakin hapus mahasiswa ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="p-2 bg-red-50 hover:bg-red-100 text-red-600 rounded-lg transition-colors" title="Hapus">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>
                    @empty
                    <p class="text-gray-500 text-sm col-span-full text-center py-12">Belum ada tim mahasiswa</p>
                    @endforelse
                </div>
            </div>
        </div>

        {{-- CARD 5: Mitra --}}
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
            <div class="bg-gradient-to-r from-emerald-50 to-green-50 px-6 py-4 border-b">
                <h3 class="text-lg font-semibold text-gray-800 flex items-center gap-2">
                    <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                    Mitra
                </h3>
            </div>
            <form action="{{ route('admin.about.mitra.update') }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-4">
                @csrf
                @method('PUT')
                
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Logo Mitra</label>
                    <input 
                        type="file" 
                        name="logo" 
                        id="mitraLogo"
                        accept="image/*"
                        class="w-full px-4 py-2.5 border rounded-lg focus:ring-2 focus:ring-emerald-500"
                        onchange="previewMitraLogo(event)"
                    >
                    <div id="mitraLogoPreview" class="mt-3 {{ !empty($mitra->logo ?? '') ? '' : 'hidden' }}">
                        <img src="{{ !empty($mitra->logo ?? '') ? asset('storage/' . $mitra->logo) : '' }}" alt="Preview" class="w-24 h-24 rounded-lg object-cover border-2 border-emerald-500">
                    </div>
                    <p class="text-xs text-gray-500 mt-1">Format: JPG, PNG, maksimal 2MB</p>
                </div>
                
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Mitra <span class="text-red-500">*</span></label>
                    <input 
                        type="text" 
                        name="name" 
                        class="w-full px-4 py-2.5 border rounded-lg focus:ring-2 focus:ring-emerald-500"
                        placeholder="PT. AgriTech Nusantara"
                        value="{{ old('name', $mitra->name ?? '') }}"
                        required
                    >
                </div>
                
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Tipe Mitra <span class="text-red-500">*</span></label>
                    <input
                        type="text"
                        name="mitra_type"
                        class="w-full px-4 py-2.5 border rounded-lg focus:ring-2 focus:ring-emerald-500"
                        placeholder="Mitra Utama"
                        value="{{ old('mitra_type', $mitra->mitra_type ?? '') }}"
                        required
                    >
                </div>
                
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Deskripsi</label>
                    <textarea 
                        name="description" 
                        rows="3"
                        class="w-full px-4 py-2.5 border rounded-lg focus:ring-2 focus:ring-emerald-500 resize-none"
                        placeholder="Perusahaan teknologi pertanian terkemuka..."
                    >{{ old('description', $mitra->description ?? '') }}</textarea>
                </div>
                
                <div class="flex justify-end pt-4">
                    <button type="submit" class="px-6 py-2.5 bg-emerald-600 hover:bg-emerald-700 text-white rounded-lg font-medium transition">
                        Simpan Mitra
                    </button>
                </div>
            </form>
        </div>

    </div>
</main>

{{-- Modal Dosen --}}
<div id="dosenModal" class="hidden fixed inset-0 bg-black/50 backdrop-blur-sm z-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-xl shadow-2xl max-w-lg w-full">
        <div class="border-b px-6 py-4 flex items-center justify-between">
            <h3 class="text-xl font-bold text-gray-800" id="dosenModalTitle">Tambah Tim Dosen</h3>
            <button onclick="closeDosenModal()" class="text-gray-400 hover:text-gray-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
        <form id="dosenForm" action="{{ route('admin.about.dosen.store') }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-4">
            @csrf
            <input type="hidden" name="_method" id="dosenMethod" value="POST">
            
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Foto Profil</label>
                <input 
                    type="file" 
                    name="photo" 
                    id="dosenPhoto"
                    accept="image/*"
                    class="w-full px-4 py-2.5 border rounded-lg focus:ring-2 focus:ring-yellow-500"
                    onchange="previewDosenPhoto(event)"
                >
                <div id="dosenPhotoPreview" class="mt-3 hidden">
                    <img src="" alt="Preview" class="w-24 h-24 rounded-lg object-cover border-2 border-yellow-500">
                </div>
                <p class="text-xs text-gray-500 mt-1">Format: JPG, PNG, maksimal 2MB</p>
            </div>
            
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Lengkap <span class="text-red-500">*</span></label>
                <input 
                    type="text" 
                    name="name" 
                    id="dosenName"
                    class="w-full px-4 py-2.5 border rounded-lg focus:ring-2 focus:ring-yellow-500"
                    placeholder="Dr. Nama Dosen, S.T., M.Kom"
                    required
                >
            </div>
            
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Jabatan/Posisi <span class="text-red-500">*</span></label>
                <input 
                    type="text" 
                    name="position" 
                    id="dosenPosition"
                    class="w-full px-4 py-2.5 border rounded-lg focus:ring-2 focus:ring-yellow-500"
                    placeholder="Dosen Pembimbing Utama"
                    required
                >
            </div>
            
            <div class="flex justify-end gap-3 pt-4 border-t">
                <button type="button" onclick="closeDosenModal()" class="px-6 py-2.5 border text-gray-700 hover:bg-gray-50 rounded-lg">Batal</button>
                <button type="submit" class="px-6 py-2.5 bg-yellow-600 hover:bg-yellow-700 text-white rounded-lg">Simpan</button>
            </div>
        </form>
    </div>
</div>

{{-- Modal Mahasiswa --}}
<div id="mahasiswaModal" class="hidden fixed inset-0 bg-black/50 backdrop-blur-sm z-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-xl shadow-2xl max-w-lg w-full">
        <div class="border-b px-6 py-4 flex items-center justify-between">
            <h3 class="text-xl font-bold text-gray-800" id="mahasiswaModalTitle">Tambah Tim Mahasiswa</h3>
            <button onclick="closeMahasiswaModal()" class="text-gray-400 hover:text-gray-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
        <form id="mahasiswaForm" action="{{ route('admin.about.mahasiswa.store') }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-4">
            @csrf
            <input type="hidden" name="_method" id="mahasiswaMethod" value="POST">
            
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Foto Profil</label>
                <input 
                    type="file" 
                    name="photo" 
                    id="mahasiswaPhoto"
                    accept="image/*"
                    class="w-full px-4 py-2.5 border rounded-lg focus:ring-2 focus:ring-blue-500"
                    onchange="previewMahasiswaPhoto(event)"
                >
                <div id="mahasiswaPhotoPreview" class="mt-3 hidden">
                    <img src="" alt="Preview" class="w-24 h-24 rounded-lg object-cover border-2 border-blue-500">
                </div>
                <p class="text-xs text-gray-500 mt-1">Format: JPG, PNG, maksimal 2MB</p>
            </div>
            
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Lengkap <span class="text-red-500">*</span></label>
                <input
                    type="text"
                    name="name"
                    id="mahasiswaName"
                    class="w-full px-4 py-2.5 border rounded-lg focus:ring-2 focus:ring-blue-500"
                    placeholder="Nama Mahasiswa"
                    required
                >
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Role/Posisi <span class="text-red-500">*</span></label>
                <input
                    type="text"
                    name="role"
                    id="mahasiswaRole"
                    class="w-full px-4 py-2.5 border rounded-lg focus:ring-2 focus:ring-blue-500"
                    placeholder="Full Stack Developer"
                    required
                >
            </div>
            
            <div class="flex justify-end gap-3 pt-4 border-t">
                <button type="button" onclick="closeMahasiswaModal()" class="px-6 py-2.5 border text-gray-700 hover:bg-gray-50 rounded-lg">Batal</button>
                <button type="submit" class="px-6 py-2.5 bg-blue-600 hover:bg-blue-700 text-white rounded-lg">Simpan</button>
            </div>
        </form>
    </div>
</div>

<script>
// Preview Functions
function previewDosenPhoto(event) {
    const file = event.target.files[0];
    const preview = document.getElementById('dosenPhotoPreview');
    const img = preview.querySelector('img');
    
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            img.src = e.target.result;
            preview.classList.remove('hidden');
        }
        reader.readAsDataURL(file);
    }
}

function previewMahasiswaPhoto(event) {
    const file = event.target.files[0];
    const preview = document.getElementById('mahasiswaPhotoPreview');
    const img = preview.querySelector('img');
    
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            img.src = e.target.result;
            preview.classList.remove('hidden');
        }
        reader.readAsDataURL(file);
    }
}

function previewMitraLogo(event) {
    const file = event.target.files[0];
    const preview = document.getElementById('mitraLogoPreview');
    const img = preview.querySelector('img');
    
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            img.src = e.target.result;
            preview.classList.remove('hidden');
        }
        reader.readAsDataURL(file);
    }
}

// Dosen Modal Functions
function openDosenModal() {
    document.getElementById('dosenModalTitle').textContent = 'Tambah Tim Dosen';
    document.getElementById('dosenForm').action = "{{ route('admin.about.dosen.store') }}";
    document.getElementById('dosenMethod').value = 'POST';
    document.getElementById('dosenName').value = '';
    document.getElementById('dosenPosition').value = '';
    document.getElementById('dosenPhoto').value = '';
    document.getElementById('dosenPhotoPreview').classList.add('hidden');
    document.getElementById('dosenModal').classList.remove('hidden');
}

function closeDosenModal() {
    document.getElementById('dosenModal').classList.add('hidden');
}

function editDosen(id, name, position, photo = '') {
    document.getElementById('dosenModalTitle').textContent = 'Edit Tim Dosen';
    document.getElementById('dosenForm').action = "{{ url('admin/about/dosen') }}/" + id;
    document.getElementById('dosenMethod').value = 'PUT';
    document.getElementById('dosenName').value = name;
    document.getElementById('dosenPosition').value = position;
    
    const preview = document.getElementById('dosenPhotoPreview');
    const img = preview.querySelector('img');
    if (photo) {
        img.src = photo;
        preview.classList.remove('hidden');
    } else {
        preview.classList.add('hidden');
    }
    
    document.getElementById('dosenModal').classList.remove('hidden');
}

// Mahasiswa Modal Functions
function openMahasiswaModal() {
    document.getElementById('mahasiswaModalTitle').textContent = 'Tambah Tim Mahasiswa';
    document.getElementById('mahasiswaForm').action = "{{ route('admin.about.mahasiswa.store') }}";
    document.getElementById('mahasiswaMethod').value = 'POST';
    document.getElementById('mahasiswaName').value = '';
    document.getElementById('mahasiswaRole').value = '';
    document.getElementById('mahasiswaPhoto').value = '';
    document.getElementById('mahasiswaPhotoPreview').classList.add('hidden');
    document.getElementById('mahasiswaModal').classList.remove('hidden');
}

function closeMahasiswaModal() {
    document.getElementById('mahasiswaModal').classList.add('hidden');
}

function editMahasiswa(id, name, role, photo = '') {
    document.getElementById('mahasiswaModalTitle').textContent = 'Edit Tim Mahasiswa';
    document.getElementById('mahasiswaForm').action = "{{ url('admin/about/mahasiswa') }}/" + id;
    document.getElementById('mahasiswaMethod').value = 'PUT';
    document.getElementById('mahasiswaName').value = name;
    document.getElementById('mahasiswaRole').value = role;

    const preview = document.getElementById('mahasiswaPhotoPreview');
    const img = preview.querySelector('img');
    if (photo) {
        img.src = photo;
        preview.classList.remove('hidden');
    } else {
        preview.classList.add('hidden');
    }

    document.getElementById('mahasiswaModal').classList.remove('hidden');
}

// Close modals on ESC
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeDosenModal();
        closeMahasiswaModal();
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