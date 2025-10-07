{{-- FILE: resources/views/admin/dashboard/index.blade.php --}}
@extends('dashboard')

@section('content')

<main class="flex-1 overflow-y-auto bg-gray-50 p-6">
    
    {{-- Welcome Card --}}
    <div class="mb-8">
        <div class="bg-gradient-to-r from-green-600 via-emerald-600 to-teal-600 rounded-2xl shadow-xl p-8 text-white relative overflow-hidden">
            {{-- Decorative Elements --}}
            <div class="absolute top-0 right-0 w-64 h-64 bg-white/10 rounded-full -mr-32 -mt-32"></div>
            <div class="absolute bottom-0 left-0 w-48 h-48 bg-white/10 rounded-full -ml-24 -mb-24"></div>
            
            <div class="relative z-10">
                <div class="flex items-center gap-4 mb-4">
                    <div class="w-16 h-16 bg-white/20 backdrop-blur-sm rounded-2xl flex items-center justify-center border-2 border-white/30">
                        <span class="text-3xl">👋</span>
                    </div>
                    <div>
                        <h1 class="text-3xl font-bold mb-1">
                            {{-- TODO Backend: Tampilkan nama user yang login --}}
                            Selamat Datang, {{ Auth::user()->name ?? 'Admin' }}!
                        </h1>
                        <p class="text-green-100">Kelola konten website IoT Agriculture</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Content Preview Grid --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
        
        {{-- Gallery Preview --}}
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
            <div class="bg-gradient-to-r from-blue-50 to-indigo-50 px-6 py-4 border-b flex items-center justify-between">
                <h2 class="text-lg font-bold text-gray-800 flex items-center gap-2">
                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                    Galeri Foto
                </h2>
                <a href="/admin/gallery" class="text-sm text-blue-600 hover:text-blue-700 font-medium">
                    Lihat Semua →
                </a>
            </div>
            <div class="p-6">
                {{-- TODO Backend: Loop gallery photos disini, tampilkan 6 foto pertama --}}
                {{-- Contoh: @foreach($galleryPhotos->take(6) as $photo) --}}
                
                <div class="grid grid-cols-3 gap-3">
                    {{-- Sample photo 1 --}}
                    <div class="aspect-square rounded-lg overflow-hidden border-2 border-gray-200 hover:border-blue-500 transition group">
                        <img src="https://images.unsplash.com/photo-1530836369250-ef72a3f5cda8?w=400" alt="Gallery" class="w-full h-full object-cover group-hover:scale-110 transition duration-300">
                    </div>
                    
                    {{-- Sample photo 2 --}}
                    <div class="aspect-square rounded-lg overflow-hidden border-2 border-gray-200 hover:border-blue-500 transition group">
                        <img src="https://images.unsplash.com/photo-1625246333195-78d9c38ad449?w=400" alt="Gallery" class="w-full h-full object-cover group-hover:scale-110 transition duration-300">
                    </div>
                    
                    {{-- Sample photo 3 --}}
                    <div class="aspect-square rounded-lg overflow-hidden border-2 border-gray-200 hover:border-blue-500 transition group">
                        <img src="https://images.unsplash.com/photo-1464226184884-fa280b87c399?w=400" alt="Gallery" class="w-full h-full object-cover group-hover:scale-110 transition duration-300">
                    </div>
                    
                    {{-- Sample photo 4 --}}
                    <div class="aspect-square rounded-lg overflow-hidden border-2 border-gray-200 hover:border-blue-500 transition group">
                        <img src="https://images.unsplash.com/photo-1416879595882-3373a0480b5b?w=400" alt="Gallery" class="w-full h-full object-cover group-hover:scale-110 transition duration-300">
                    </div>
                    
                    {{-- Sample photo 5 --}}
                    <div class="aspect-square rounded-lg overflow-hidden border-2 border-gray-200 hover:border-blue-500 transition group">
                        <img src="https://images.unsplash.com/photo-1574943320219-553eb213f72d?w=400" alt="Gallery" class="w-full h-full object-cover group-hover:scale-110 transition duration-300">
                    </div>
                    
                    {{-- Sample photo 6 --}}
                    <div class="aspect-square rounded-lg overflow-hidden border-2 border-gray-200 hover:border-blue-500 transition group">
                        <img src="https://images.unsplash.com/photo-1592982537447-7440770cbfc9?w=400" alt="Gallery" class="w-full h-full object-cover group-hover:scale-110 transition duration-300">
                    </div>
                </div>
                
                {{-- TODO Backend: Tampilkan jumlah foto tersisa jika > 6 --}}
                {{-- <p class="text-center text-sm text-gray-500 mt-4">+{{ count($galleryPhotos) - 6 }} foto lainnya</p> --}}
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
                <a href="/admin/about" class="text-sm text-yellow-600 hover:text-yellow-700 font-medium">
                    Kelola →
                </a>
            </div>
            <div class="p-6">
                {{-- TODO Backend: Loop dosen disini, tampilkan 4 dosen pertama --}}
                {{-- Contoh: @foreach($dosens->take(4) as $dosen) --}}
                
                <div class="space-y-3">
                    {{-- Sample Dosen 1 --}}
                    <div class="flex items-center gap-3 p-3 bg-gray-50 rounded-lg hover:bg-gray-100 transition">
                        <div class="w-12 h-12 rounded-lg bg-gradient-to-br from-yellow-400 to-yellow-500 flex items-center justify-center text-white text-sm font-semibold shadow">
                            AS
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="font-semibold text-gray-800 text-sm truncate">Dr. Andi Saputra, S.T., M.Kom</p>
                            <p class="text-xs text-gray-500 truncate">Dosen Pembimbing Utama</p>
                        </div>
                    </div>
                    
                    {{-- Sample Dosen 2 --}}
                    <div class="flex items-center gap-3 p-3 bg-gray-50 rounded-lg hover:bg-gray-100 transition">
                        <div class="w-12 h-12 rounded-lg bg-gradient-to-br from-yellow-400 to-yellow-500 flex items-center justify-center text-white text-sm font-semibold shadow">
                            MY
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="font-semibold text-gray-800 text-sm truncate">Prof. Maria Yuliana, Ph.D</p>
                            <p class="text-xs text-gray-500 truncate">Ahli IoT & Embedded Systems</p>
                        </div>
                    </div>
                    
                    {{-- Sample Dosen 3 --}}
                    <div class="flex items-center gap-3 p-3 bg-gray-50 rounded-lg hover:bg-gray-100 transition">
                        <div class="w-12 h-12 rounded-lg bg-gradient-to-br from-yellow-400 to-yellow-500 flex items-center justify-center text-white text-sm font-semibold shadow">
                            RH
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="font-semibold text-gray-800 text-sm truncate">Dr. Rizki Hermawan, M.T.</p>
                            <p class="text-xs text-gray-500 truncate">Ahli Pertanian Digital</p>
                        </div>
                    </div>
                    
                    {{-- Sample Dosen 4 --}}
                    <div class="flex items-center gap-3 p-3 bg-gray-50 rounded-lg hover:bg-gray-100 transition">
                        <div class="w-12 h-12 rounded-lg bg-gradient-to-br from-yellow-400 to-yellow-500 flex items-center justify-center text-white text-sm font-semibold shadow">
                            SF
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="font-semibold text-gray-800 text-sm truncate">Siti Fatimah, S.Kom., M.Sc</p>
                            <p class="text-xs text-gray-500 truncate">Dosen Pendamping</p>
                        </div>
                    </div>
                </div>
                
                {{-- TODO Backend: Tampilkan jumlah dosen tersisa jika > 4 --}}
                {{-- <p class="text-center text-sm text-gray-500 mt-4">+{{ count($dosens) - 4 }} dosen lainnya</p> --}}
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
                <a href="/admin/about" class="text-sm text-emerald-600 hover:text-emerald-700 font-medium">
                    Kelola →
                </a>
            </div>
            <div class="p-6">
                {{-- TODO Backend: Loop mitra/investor disini, tampilkan 4 mitra pertama --}}
                {{-- Contoh: @foreach($mitra->take(4) as $item) --}}
                
                <div class="space-y-3">
                    {{-- Sample Mitra 1 --}}
                    <div class="flex items-center gap-3 p-3 bg-gray-50 rounded-lg hover:bg-gray-100 transition">
                        <div class="w-12 h-12 rounded-lg bg-gradient-to-br from-green-500 to-green-600 flex items-center justify-center text-white text-sm font-semibold shadow">
                            AN
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="font-semibold text-gray-800 text-sm truncate">PT. AgriTech Nusantara</p>
                            <p class="text-xs text-gray-500 truncate">Mitra Utama</p>
                        </div>
                    </div>
                    
                    {{-- Sample Mitra 2 --}}
                    <div class="flex items-center gap-3 p-3 bg-gray-50 rounded-lg hover:bg-gray-100 transition">
                        <div class="w-12 h-12 rounded-lg bg-gradient-to-br from-green-500 to-green-600 flex items-center justify-center text-white text-sm font-semibold shadow">
                            SF
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="font-semibold text-gray-800 text-sm truncate">CV. SmartFarm Indonesia</p>
                            <p class="text-xs text-gray-500 truncate">Mitra Teknologi</p>
                        </div>
                    </div>
                    
                    {{-- Sample Mitra 3 --}}
                    <div class="flex items-center gap-3 p-3 bg-gray-50 rounded-lg hover:bg-gray-100 transition">
                        <div class="w-12 h-12 rounded-lg bg-gradient-to-br from-green-500 to-green-600 flex items-center justify-center text-white text-sm font-semibold shadow">
                            KT
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="font-semibold text-gray-800 text-sm truncate">Koperasi Tani Sejahtera</p>
                            <p class="text-xs text-gray-500 truncate">Mitra Lapangan</p>
                        </div>
                    </div>
                    
                    {{-- Sample Mitra 4 --}}
                    <div class="flex items-center gap-3 p-3 bg-gray-50 rounded-lg hover:bg-gray-100 transition">
                        <div class="w-12 h-12 rounded-lg bg-gradient-to-br from-green-500 to-green-600 flex items-center justify-center text-white text-sm font-semibold shadow">
                            ID
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="font-semibold text-gray-800 text-sm truncate">IoT Development Center</p>
                            <p class="text-xs text-gray-500 truncate">Mitra Riset</p>
                        </div>
                    </div>
                </div>
                
                {{-- TODO Backend: Tampilkan jumlah mitra tersisa jika > 4 --}}
                {{-- <p class="text-center text-sm text-gray-500 mt-4">+{{ count($mitra) - 4 }} mitra lainnya</p> --}}
            </div>
        </div>

    </div>

</main>

@endsection