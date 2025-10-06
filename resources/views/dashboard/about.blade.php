{{-- FILE: resources/views/admin/about/edit.blade.php --}}
@extends('dashboard')

@section('content')

<main class="flex-1 overflow-y-auto bg-gray-50 p-6">
    <div class="max-w-6xl mx-auto space-y-6">
        
        {{-- Header --}}
        <div class="mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Edit About Section</h2>
            <p class="text-gray-600 text-sm mt-1">Kelola latar belakang, tujuan, dosen pembimbing dan investor</p>
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
                <form action="" method="POST" class="p-6">
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
                <form action="" method="POST" class="p-6">
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

        {{-- CARD 3: Dosen Pembimbing --}}
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
            <div class="bg-gradient-to-r from-yellow-50 to-amber-50 px-6 py-4 border-b flex items-center justify-between">
                <h3 class="text-lg font-semibold text-gray-800 flex items-center gap-2">
                    <svg class="w-5 h-5 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                    </svg>
                    Dosen Pembimbing
                </h3>
                <button onclick="openDosenModal()" class="px-4 py-2 bg-yellow-600 hover:bg-yellow-700 text-white text-sm rounded-lg transition">
                    + Tambah Dosen
                </button>
            </div>
            <div class="p-6">
                <div class="grid md:grid-cols-2 gap-4" id="dosenList">
                    @forelse($dosens ?? [] as $dosen)
                    <div class="border border-gray-200 rounded-lg p-4 hover:border-yellow-500 transition">
                        <div class="flex items-center gap-3 mb-3">
                            @if(!empty($dosen->photo))
                            <img src="{{ $dosen->photo }}" alt="{{ $dosen->name }}" class="w-12 h-12 rounded-lg object-cover shadow">
                            @else
                            <div class="w-12 h-12 rounded-lg bg-gradient-to-br from-yellow-400 to-yellow-500 flex items-center justify-center text-white text-sm font-semibold shadow">
                                {{ strtoupper(substr($dosen->name, 0, 2)) }}
                            </div>
                            @endif
                            <div class="flex-1">
                                <p class="font-semibold text-gray-800">{{ $dosen->name }}</p>
                                <p class="text-xs text-gray-500">{{ $dosen->position }}</p>
                            </div>
                        </div>
                        <div class="flex gap-2">
                            <button onclick="editDosen({{ $dosen->id }}, '{{ $dosen->name }}', '{{ $dosen->position }}', '{{ $dosen->photo ?? '' }}')" class="flex-1 px-3 py-1.5 bg-blue-500 hover:bg-blue-600 text-white text-xs rounded">
                                Edit
                            </button>
                            <form action="" method="POST" class="flex-1" onsubmit="return confirm('Yakin hapus dosen ini?')">
                                {{-- @csrf --}}
                                {{-- @method('DELETE') --}}
                                <button type="submit" class="w-full px-3 py-1.5 bg-red-500 hover:bg-red-600 text-white text-xs rounded">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                    @empty
                    <p class="text-gray-500 text-sm col-span-2 text-center py-8">Belum ada dosen pembimbing</p>
                    @endforelse
                </div>
            </div>
        </div>

        {{-- CARD 4: Investor --}}
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
            <div class="bg-gradient-to-r from-emerald-50 to-green-50 px-6 py-4 border-b flex items-center justify-between">
                <h3 class="text-lg font-semibold text-gray-800 flex items-center gap-2">
                    <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                    Investor
                </h3>
                <button onclick="openInvestorModal()" class="px-4 py-2 bg-emerald-600 hover:bg-emerald-700 text-white text-sm rounded-lg transition">
                    + Tambah Investor
                </button>
            </div>
            <div class="p-6">
                <div class="grid md:grid-cols-2 gap-4" id="investorList">
                    @forelse($investors ?? [] as $investor)
                    <div class="border border-gray-200 rounded-lg p-4 hover:border-emerald-500 transition">
                        <div class="flex items-center gap-3 mb-3">
                            @if(!empty($investor->logo))
                            <img src="{{ $investor->logo }}" alt="{{ $investor->name }}" class="w-12 h-12 rounded-lg object-cover shadow">
                            @else
                            <div class="w-12 h-12 rounded-lg bg-gradient-to-br from-green-500 to-green-600 flex items-center justify-center text-white text-sm font-semibold shadow">
                                {{ strtoupper(substr($investor->name, 0, 2)) }}
                            </div>
                            @endif
                            <div class="flex-1">
                                <p class="font-semibold text-gray-800">{{ $investor->name }}</p>
                                <p class="text-xs text-gray-500">{{ $investor->description }}</p>
                            </div>
                        </div>
                        <div class="flex gap-2">
                            <button onclick="editInvestor({{ $investor->id }}, '{{ $investor->name }}', '{{ $investor->description }}', '{{ $investor->logo ?? '' }}')" class="flex-1 px-3 py-1.5 bg-blue-500 hover:bg-blue-600 text-white text-xs rounded">
                                Edit
                            </button>
                            <form action="" method="POST" class="flex-1" onsubmit="return confirm('Yakin hapus investor ini?')">
                                {{-- @csrf --}}
                                {{-- @method('DELETE') --}}
                                <button type="submit" class="w-full px-3 py-1.5 bg-red-500 hover:bg-red-600 text-white text-xs rounded">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                    @empty
                    <p class="text-gray-500 text-sm col-span-2 text-center py-8">Belum ada investor</p>
                    @endforelse
                </div>
            </div>
        </div>

    </div>
</main>

{{-- Modal Dosen --}}
<div id="dosenModal" class="hidden fixed inset-0 bg-black/50 backdrop-blur-sm z-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-xl shadow-2xl max-w-lg w-full">
        <div class="border-b px-6 py-4 flex items-center justify-between">
            <h3 class="text-xl font-bold text-gray-800" id="dosenModalTitle">Tambah Dosen Pembimbing</h3>
            <button onclick="closeDosenModal()" class="text-gray-400 hover:text-gray-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
        <form id="dosenForm" action="" method="POST" enctype="multipart/form-data" class="p-6 space-y-4">
            {{-- @csrf --}}
            <input type="hidden" name="_method" id="dosenMethod" value="POST">
            <input type="hidden" name="id" id="dosenId">
            
            {{-- Upload Foto Dosen --}}
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

{{-- Modal Investor --}}
<div id="investorModal" class="hidden fixed inset-0 bg-black/50 backdrop-blur-sm z-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-xl shadow-2xl max-w-lg w-full">
        <div class="border-b px-6 py-4 flex items-center justify-between">
            <h3 class="text-xl font-bold text-gray-800" id="investorModalTitle">Tambah Investor</h3>
            <button onclick="closeInvestorModal()" class="text-gray-400 hover:text-gray-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
        <form id="investorForm" action="" method="POST" enctype="multipart/form-data" class="p-6 space-y-4">
            {{-- @csrf --}}
            <input type="hidden" name="_method" id="investorMethod" value="POST">
            <input type="hidden" name="id" id="investorId">
            
            {{-- Upload Logo Investor --}}
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Logo Perusahaan</label>
                <input 
                    type="file" 
                    name="logo" 
                    id="investorLogo"
                    accept="image/*"
                    class="w-full px-4 py-2.5 border rounded-lg focus:ring-2 focus:ring-emerald-500"
                    onchange="previewInvestorLogo(event)"
                >
                <div id="investorLogoPreview" class="mt-3 hidden">
                    <img src="" alt="Preview" class="w-24 h-24 rounded-lg object-cover border-2 border-emerald-500">
                </div>
                <p class="text-xs text-gray-500 mt-1">Format: JPG, PNG, maksimal 2MB</p>
            </div>
            
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Investor <span class="text-red-500">*</span></label>
                <input 
                    type="text" 
                    name="name" 
                    id="investorName"
                    class="w-full px-4 py-2.5 border rounded-lg focus:ring-2 focus:ring-emerald-500"
                    placeholder="PT. Nama Perusahaan"
                    required
                >
            </div>
            
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Deskripsi <span class="text-red-500">*</span></label>
                <input 
                    type="text" 
                    name="description" 
                    id="investorDescription"
                    class="w-full px-4 py-2.5 border rounded-lg focus:ring-2 focus:ring-emerald-500"
                    placeholder="Investor Utama"
                    required
                >
            </div>
            
            <div class="flex justify-end gap-3 pt-4 border-t">
                <button type="button" onclick="closeInvestorModal()" class="px-6 py-2.5 border text-gray-700 hover:bg-gray-50 rounded-lg">Batal</button>
                <button type="submit" class="px-6 py-2.5 bg-emerald-600 hover:bg-emerald-700 text-white rounded-lg">Simpan</button>
            </div>
        </form>
    </div>
</div>

<script>
// Preview Foto Dosen
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

// Preview Logo Investor
function previewInvestorLogo(event) {
    const file = event.target.files[0];
    const preview = document.getElementById('investorLogoPreview');
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
    document.getElementById('dosenModalTitle').textContent = 'Tambah Dosen Pembimbing';
    document.getElementById('dosenForm').action = '';
    document.getElementById('dosenMethod').value = 'POST';
    document.getElementById('dosenId').value = '';
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
    document.getElementById('dosenModalTitle').textContent = 'Edit Dosen Pembimbing';
    document.getElementById('dosenForm').action = '';
    document.getElementById('dosenMethod').value = 'PUT';
    document.getElementById('dosenId').value = id;
    document.getElementById('dosenName').value = name;
    document.getElementById('dosenPosition').value = position;
    
    // Show existing photo if available
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

// Investor Modal Functions
function openInvestorModal() {
    document.getElementById('investorModalTitle').textContent = 'Tambah Investor';
    document.getElementById('investorForm').action = '';
    document.getElementById('investorMethod').value = 'POST';
    document.getElementById('investorId').value = '';
    document.getElementById('investorName').value = '';
    document.getElementById('investorDescription').value = '';
    document.getElementById('investorLogo').value = '';
    document.getElementById('investorLogoPreview').classList.add('hidden');
    document.getElementById('investorModal').classList.remove('hidden');
}

function closeInvestorModal() {
    document.getElementById('investorModal').classList.add('hidden');
}

function editInvestor(id, name, description, logo = '') {
    document.getElementById('investorModalTitle').textContent = 'Edit Investor';
    document.getElementById('investorForm').action = '';
    document.getElementById('investorMethod').value = 'PUT';
    document.getElementById('investorId').value = id;
    document.getElementById('investorName').value = name;
    document.getElementById('investorDescription').value = description;
    
    // Show existing logo if available
    const preview = document.getElementById('investorLogoPreview');
    const img = preview.querySelector('img');
    if (logo) {
        img.src = logo;
        preview.classList.remove('hidden');
    } else {
        preview.classList.add('hidden');
    }
    
    document.getElementById('investorModal').classList.remove('hidden');
}

// Close modals on ESC
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeDosenModal();
        closeInvestorModal();
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