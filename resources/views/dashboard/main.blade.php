{{-- FILE: resources/views/admin/dashboard/index.blade.php --}}
@extends('dashboard')

@section('content')

<main class="flex-1 overflow-y-auto bg-gray-50 p-6">
    
    {{-- Welcome Section --}}
    <div class="mb-8">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-gray-900 mb-1">
                    Selamat Datang, {{ Auth::user()->name ?? 'Admin' }}! 👋
                </h1>
                <p class="text-gray-500">Kelola konten Fun Coding with Mini Simulator</p>
            </div>
            <a href="/" target="_blank" class="hidden md:flex items-center gap-2 px-4 py-2.5 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-lg hover:shadow-lg transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                </svg>
                <span class="font-medium">Lihat Website</span>
            </a>
        </div>
    </div>

    {{-- Statistics Cards --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">

        {{-- Total Gallery Photos --}}
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-md transition">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                </div>
            </div>
            <div>
                <p class="text-3xl font-bold text-gray-900 mb-1">{{ $totalGalleryPhotos }}</p>
                <p class="text-sm text-gray-500">Foto Galeri</p>
            </div>
        </div>

        {{-- Total Dosen --}}
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-md transition">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-yellow-100 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                    </svg>
                </div>
            </div>
            <div>
                <p class="text-3xl font-bold text-gray-900 mb-1">{{ $totalDosens }}</p>
                <p class="text-sm text-gray-500">Dosen Peneliti</p>
            </div>
        </div>

        {{-- Total Mahasiswa --}}
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-md transition">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                </div>
            </div>
            <div>
                <p class="text-3xl font-bold text-gray-900 mb-1">{{ $totalMahasiswas }}</p>
                <p class="text-sm text-gray-500">Tim Mahasiswa</p>
            </div>
        </div>

        {{-- Total Mitra --}}
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-md transition">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                </div>
            </div>
            <div>
                <p class="text-3xl font-bold text-gray-900 mb-1">{{ $totalMitras }}</p>
                <p class="text-sm text-gray-500">Mitra Kerjasama</p>
            </div>
        </div>

    </div>

    {{-- Content Preview Section --}}
    <div class="mb-6">
        <div class="flex items-center justify-between mb-4">
            <h2 class="text-xl font-semibold text-gray-800">Preview Konten</h2>
            <p class="text-sm text-gray-500">Data terbaru dari setiap kategori</p>
        </div>
    </div>

    {{-- Content Preview Grid --}}
    <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-4 gap-6 mb-8">
        
        {{-- Gallery Preview --}}
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
            <div class="bg-gradient-to-r from-blue-50 to-indigo-50 px-6 py-4 border-b flex items-center justify-between">
                <h2 class="text-lg font-bold text-gray-800 flex items-center gap-2">
                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                    Galeri Foto
                </h2>
                <a href="{{ route('gallery.index') }}" class="text-sm text-blue-600 hover:text-blue-700 font-medium">
                    Kelola →
                </a>
            </div>
            <div class="p-6">
                @if($galleryPhotos->count() > 0)
                    <div class="grid grid-cols-2 gap-3">
                        @foreach($galleryPhotos as $photo)
                            <div class="aspect-square rounded-lg overflow-hidden border-2 border-gray-200 hover:border-blue-500 transition group">
                                <img src="{{ $photo->image_url }}" alt="{{ $photo->deskripsi ?? 'Gallery' }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-300">
                            </div>
                        @endforeach
                    </div>

                    @if($totalGalleryPhotos > 4)
                        <p class="text-center text-sm text-gray-500 mt-4">+{{ $totalGalleryPhotos - 4 }} foto lainnya</p>
                    @endif
                @else
                    <div class="text-center py-8 text-gray-400">
                        <svg class="w-16 h-16 mx-auto mb-3 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                        <p class="text-sm">Belum ada foto di galeri</p>
                    </div>
                @endif
            </div>
        </div>

        {{-- Dosen Peneliti Preview --}}
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
            <div class="bg-gradient-to-r from-yellow-50 to-amber-50 px-6 py-4 border-b flex items-center justify-between">
                <h2 class="text-lg font-bold text-gray-800 flex items-center gap-2">
                    <svg class="w-5 h-5 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                    </svg>
                    Dosen Peneliti
                </h2>
                <a href="{{ route('about.index') }}" class="text-sm text-yellow-600 hover:text-yellow-700 font-medium">
                    Kelola →
                </a>
            </div>
            <div class="p-6">
                @if($dosens->count() > 0)
                    <div class="space-y-3">
                        @foreach($dosens as $dosen)
                            <div class="flex items-center gap-3 p-3 bg-gray-50 rounded-lg hover:bg-gray-100 transition">
                                @if($dosen->photo)
                                    <img src="{{ $dosen->photo_url }}" alt="{{ $dosen->name }}" class="w-12 h-12 rounded-lg object-cover shadow">
                                @else
                                    <div class="w-12 h-12 rounded-lg bg-gradient-to-br from-yellow-400 to-yellow-500 flex items-center justify-center text-white text-sm font-semibold shadow">
                                        {{ $dosen->initials }}
                                    </div>
                                @endif
                                <div class="flex-1 min-w-0">
                                    <p class="font-semibold text-gray-800 text-sm truncate">{{ $dosen->name }}</p>
                                    <p class="text-xs text-gray-500 truncate">{{ $dosen->position ?? $dosen->role }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    @if($totalDosens > 4)
                        <p class="text-center text-sm text-gray-500 mt-4">+{{ $totalDosens - 4 }} dosen lainnya</p>
                    @endif
                @else
                    <div class="text-center py-8 text-gray-400">
                        <svg class="w-16 h-16 mx-auto mb-3 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                        </svg>
                        <p class="text-sm">Belum ada data dosen</p>
                    </div>
                @endif
            </div>
        </div>

        {{-- Tim Mahasiswa Preview --}}
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
            <div class="bg-gradient-to-r from-purple-50 to-violet-50 px-6 py-4 border-b flex items-center justify-between">
                <h2 class="text-lg font-bold text-gray-800 flex items-center gap-2">
                    <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                    </svg>
                    Tim Mahasiswa
                </h2>
                <a href="{{ route('about.index') }}" class="text-sm text-purple-600 hover:text-purple-700 font-medium">
                    Kelola →
                </a>
            </div>
            <div class="p-6">
                @if($mahasiswas->count() > 0)
                    <div class="space-y-3">
                        @foreach($mahasiswas as $mahasiswa)
                            <div class="flex items-center gap-3 p-3 bg-gray-50 rounded-lg hover:bg-gray-100 transition">
                                @if($mahasiswa->photo)
                                    <img src="{{ $mahasiswa->photo_url }}" alt="{{ $mahasiswa->name }}" class="w-12 h-12 rounded-lg object-cover shadow">
                                @else
                                    <div class="w-12 h-12 rounded-lg bg-gradient-to-br from-purple-400 to-purple-500 flex items-center justify-center text-white text-sm font-semibold shadow">
                                        {{ $mahasiswa->initials }}
                                    </div>
                                @endif
                                <div class="flex-1 min-w-0">
                                    <p class="font-semibold text-gray-800 text-sm truncate">{{ $mahasiswa->name }}</p>
                                    <p class="text-xs text-gray-500 truncate">{{ $mahasiswa->position ?? $mahasiswa->role }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    @if($totalMahasiswas > 4)
                        <p class="text-center text-sm text-gray-500 mt-4">+{{ $totalMahasiswas - 4 }} mahasiswa lainnya</p>
                    @endif
                @else
                    <div class="text-center py-8 text-gray-400">
                        <svg class="w-16 h-16 mx-auto mb-3 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                        </svg>
                        <p class="text-sm">Belum ada data mahasiswa</p>
                    </div>
                @endif
            </div>
        </div>

        {{-- Mitra Preview --}}
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
            <div class="bg-gradient-to-r from-emerald-50 to-green-50 px-6 py-4 border-b flex items-center justify-between">
                <h2 class="text-lg font-bold text-gray-800 flex items-center gap-2">
                    <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                    Mitra
                </h2>
                <a href="{{ route('about.index') }}" class="text-sm text-emerald-600 hover:text-emerald-700 font-medium">
                    Kelola →
                </a>
            </div>
            <div class="p-6">
                @if($mitras->count() > 0)
                    <div class="space-y-3">
                        @foreach($mitras as $mitra)
                            <div class="flex items-center gap-3 p-3 bg-gray-50 rounded-lg hover:bg-gray-100 transition">
                                @if($mitra->logo)
                                    <img src="{{ $mitra->logo_url }}" alt="{{ $mitra->name }}" class="w-12 h-12 rounded-lg object-cover shadow">
                                @else
                                    <div class="w-12 h-12 rounded-lg bg-gradient-to-br from-green-500 to-green-600 flex items-center justify-center text-white text-sm font-semibold shadow">
                                        {{ $mitra->initials }}
                                    </div>
                                @endif
                                <div class="flex-1 min-w-0">
                                    <p class="font-semibold text-gray-800 text-sm truncate">{{ $mitra->name }}</p>
                                    <p class="text-xs text-gray-500 truncate">{{ $mitra->mitra_type ?? 'Mitra' }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    @if($totalMitras > 4)
                        <p class="text-center text-sm text-gray-500 mt-4">+{{ $totalMitras - 4 }} mitra lainnya</p>
                    @endif
                @else
                    <div class="text-center py-8 text-gray-400">
                        <svg class="w-16 h-16 mx-auto mb-3 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                        <p class="text-sm">Belum ada data mitra</p>
                    </div>
                @endif
            </div>
        </div>

    </div>

</main>

@endsection