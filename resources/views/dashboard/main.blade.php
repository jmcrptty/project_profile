{{-- ================================================================ --}}
{{-- FILE: resources/views/dashboard/index.blade.php --}}
{{-- Ini file baru untuk halaman dashboard utama --}}
{{-- ================================================================ --}}

@extends('dashboard')

@section('content')

<main class="flex-1 overflow-y-auto bg-gray-50 p-6">
    
    {{-- Welcome Card --}}
    <div class="mb-8 fade-in-up">
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
                            Selamat Datang, {{ Auth::user()->name }}!
                        </h1>
                        <p class="text-green-100">Senang melihat Anda kembali di sistem kami</p>
                    </div>
                </div>
                
                <div class="flex items-center gap-6 text-sm">
                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                        </svg>
                        <span>{{ Auth::user()->email }}</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                        </svg>
                        <span>{{ \Carbon\Carbon::now()->translatedFormat('l, d F Y') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Stats Cards --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        
        {{-- Total Sections --}}
        <div class="card-shadow bg-white rounded-xl p-6">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 stat-card-green rounded-xl flex items-center justify-center shadow-lg">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                    </svg>
                </div>
                <span class="text-sm font-medium text-green-600 bg-green-50 px-3 py-1 rounded-full">+12%</span>
            </div>
            <h3 class="text-gray-500 text-sm font-medium mb-1">Total Sections</h3>
            <p class="text-3xl font-bold text-gray-800">6</p>
        </div>

        {{-- Gallery Items --}}
        <div class="card-shadow bg-white rounded-xl p-6">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 stat-card-blue rounded-xl flex items-center justify-center shadow-lg">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                </div>
                <span class="text-sm font-medium text-blue-600 bg-blue-50 px-3 py-1 rounded-full">+5</span>
            </div>
            <h3 class="text-gray-500 text-sm font-medium mb-1">Gallery Items</h3>
            <p class="text-3xl font-bold text-gray-800">24</p>
        </div>

        {{-- Code Snippets --}}
        <div class="card-shadow bg-white rounded-xl p-6">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 stat-card rounded-xl flex items-center justify-center shadow-lg">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/>
                    </svg>
                </div>
                <span class="text-sm font-medium text-purple-600 bg-purple-50 px-3 py-1 rounded-full">+3</span>
            </div>
            <h3 class="text-gray-500 text-sm font-medium mb-1">Code Snippets</h3>
            <p class="text-3xl font-bold text-gray-800">8</p>
        </div>

        {{-- Messages --}}
        <div class="card-shadow bg-white rounded-xl p-6">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 stat-card-orange rounded-xl flex items-center justify-center shadow-lg">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                </div>
                <span class="text-sm font-medium text-orange-600 bg-orange-50 px-3 py-1 rounded-full">New</span>
            </div>
            <h3 class="text-gray-500 text-sm font-medium mb-1">Messages</h3>
            <p class="text-3xl font-bold text-gray-800">15</p>
        </div>

    </div>

    {{-- Quick Actions --}}
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        
        {{-- Recent Activity --}}
        <div class="card-shadow bg-white rounded-xl p-6">
            <h2 class="text-lg font-bold text-gray-800 mb-4 flex items-center gap-2">
                <svg class="w-5 h-5 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                </svg>
                Recent Activity
            </h2>
            <div class="space-y-4">
                <div class="flex items-start gap-3 pb-3 border-b">
                    <div class="w-2 h-2 bg-green-500 rounded-full mt-2"></div>
                    <div class="flex-1">
                        <p class="text-sm font-medium text-gray-800">Gallery updated</p>
                        <p class="text-xs text-gray-500">2 hours ago</p>
                    </div>
                </div>
                <div class="flex items-start gap-3 pb-3 border-b">
                    <div class="w-2 h-2 bg-blue-500 rounded-full mt-2"></div>
                    <div class="flex-1">
                        <p class="text-sm font-medium text-gray-800">New message received</p>
                        <p class="text-xs text-gray-500">5 hours ago</p>
                    </div>
                </div>
                <div class="flex items-start gap-3">
                    <div class="w-2 h-2 bg-purple-500 rounded-full mt-2"></div>
                    <div class="flex-1">
                        <p class="text-sm font-medium text-gray-800">Code section modified</p>
                        <p class="text-xs text-gray-500">1 day ago</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Quick Links --}}
        <div class="card-shadow bg-white rounded-xl p-6">
            <h2 class="text-lg font-bold text-gray-800 mb-4 flex items-center gap-2">
                <svg class="w-5 h-5 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M11 3a1 1 0 100 2h2.586l-6.293 6.293a1 1 0 101.414 1.414L15 6.414V9a1 1 0 102 0V4a1 1 0 00-1-1h-5z"/>
                    <path d="M5 5a2 2 0 00-2 2v8a2 2 0 002 2h8a2 2 0 002-2v-3a1 1 0 10-2 0v3H5V7h3a1 1 0 000-2H5z"/>
                </svg>
                Quick Actions
            </h2>
            <div class="grid grid-cols-2 gap-3">
                <a href="#" class="flex items-center gap-3 p-3 bg-green-50 hover:bg-green-100 rounded-lg transition group">
                    <div class="w-10 h-10 bg-green-500 rounded-lg flex items-center justify-center group-hover:scale-110 transition">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                        </svg>
                    </div>
                    <span class="text-sm font-medium text-gray-700">Add Gallery</span>
                </a>
                <a href="#" class="flex items-center gap-3 p-3 bg-blue-50 hover:bg-blue-100 rounded-lg transition group">
                    <div class="w-10 h-10 bg-blue-500 rounded-lg flex items-center justify-center group-hover:scale-110 transition">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                        </svg>
                    </div>
                    <span class="text-sm font-medium text-gray-700">Edit Hero</span>
                </a>
                <a href="#" class="flex items-center gap-3 p-3 bg-purple-50 hover:bg-purple-100 rounded-lg transition group">
                    <div class="w-10 h-10 bg-purple-500 rounded-lg flex items-center justify-center group-hover:scale-110 transition">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                    </div>
                    <span class="text-sm font-medium text-gray-700">View Docs</span>
                </a>
                <a href="#" class="flex items-center gap-3 p-3 bg-orange-50 hover:bg-orange-100 rounded-lg transition group">
                    <div class="w-10 h-10 bg-orange-500 rounded-lg flex items-center justify-center group-hover:scale-110 transition">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                    </div>
                    <span class="text-sm font-medium text-gray-700">Settings</span>
                </a>
            </div>
        </div>

    </div>

</main>

@endsection