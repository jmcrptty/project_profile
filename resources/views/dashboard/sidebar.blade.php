<aside id="sidebar" class="fixed inset-y-0 left-0 z-50 w-72 sidebar-gradient transform -translate-x-full transition-transform duration-300 ease-in-out lg:translate-x-0 lg:static">
    <div class="flex flex-col h-full">
        
        {{-- Logo & Brand --}}
        <div class="flex items-center justify-between h-20 px-6 border-b border-gray-700/50">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-gradient-to-br from-green-400 to-green-600 rounded-xl flex items-center justify-center shadow-lg shadow-green-500/30">
                    <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 3.5a1.5 1.5 0 013 0V4a1 1 0 001 1h3a1 1 0 011 1v3a1 1 0 01-1 1h-.5a1.5 1.5 0 000 3h.5a1 1 0 011 1v3a1 1 0 01-1 1h-3a1 1 0 01-1-1v-.5a1.5 1.5 0 00-3 0v.5a1 1 0 01-1 1H6a1 1 0 01-1-1v-3a1 1 0 00-1-1h-.5a1.5 1.5 0 010-3H4a1 1 0 001-1V6a1 1 0 011-1h3a1 1 0 001-1v-.5z"/>
                    </svg>
                </div>
                <div>
                    <h1 class="text-white font-bold text-lg">AgriTech</h1>
                    <p class="text-gray-400 text-xs">Admin Panel</p>
                </div>
            </div>
            <button id="closeSidebar" class="lg:hidden text-gray-400 hover:text-white transition">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>

        {{-- Navigation --}}
        <nav class="flex-1 px-4 py-6 overflow-y-auto">
            
            {{-- Dashboard --}}
            <a href="{{ route('dashboard') }}" class="nav-item active flex items-center px-4 py-3.5 text-white rounded-xl mb-1 group">
                <div class="w-10 h-10 bg-green-500/10 rounded-lg flex items-center justify-center mr-3 group-hover:bg-green-500/20 transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                    </svg>
                </div>
                <span class="font-medium">Dashboard</span>
            </a>

            {{-- Section Management --}}
            <div class="pt-6 pb-3">
                <p class="px-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Content Management</p>
            </div>

            <a href="{{ route('home.index') }}" class="nav-item flex items-center px-4 py-3.5 text-gray-300 rounded-xl mb-1 group">
                <div class="w-10 h-10 bg-white/5 rounded-lg flex items-center justify-center mr-3 group-hover:bg-white/10 transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4v16M17 4v16M3 8h4m10 0h4M3 12h18M3 16h4m10 0h4M4 20h16a1 1 0 001-1V5a1 1 0 00-1-1H4a1 1 0 00-1 1v14a1 1 0 001 1z"/>
                    </svg>
                </div>
                <span class="font-medium">Hero Section</span>
            </a>

            <a href="{{ route('about.index') }}" class="nav-item flex items-center px-4 py-3.5 text-gray-300 rounded-xl mb-1 group">
                <div class="w-10 h-10 bg-white/5 rounded-lg flex items-center justify-center mr-3 group-hover:bg-white/10 transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <span class="font-medium">About Section</span>
            </a>

            <a href="{{ route('gallery.index') }}" class="nav-item flex items-center px-4 py-3.5 text-gray-300 rounded-xl mb-1 group">
                <div class="w-10 h-10 bg-white/5 rounded-lg flex items-center justify-center mr-3 group-hover:bg-white/10 transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                </div>
                <span class="font-medium">Gallery</span>
            </a>

            <a href="{{ route('code.index') }}" class="nav-item flex items-center px-4 py-3.5 text-gray-300 rounded-xl mb-1 group">
                <div class="w-10 h-10 bg-white/5 rounded-lg flex items-center justify-center mr-3 group-hover:bg-white/10 transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/>
                    </svg>
                </div>
                <span class="font-medium">Code Section</span>
            </a>

            <a href="{{ route('contact.index') }}" class="nav-item flex items-center px-4 py-3.5 text-gray-300 rounded-xl mb-1 group">
                <div class="w-10 h-10 bg-white/5 rounded-lg flex items-center justify-center mr-3 group-hover:bg-white/10 transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                </div>
                <span class="font-medium">Contact Section</span>
            </a>

        </nav>

        {{-- User Profile --}}
        <div class="p-4 border-t border-gray-700/50">
            <div class="flex items-center px-4 py-3 bg-white/5 rounded-xl">
                <div class="relative">
                    <div class="w-11 h-11 rounded-xl bg-gradient-to-br from-green-400 to-green-600 flex items-center justify-center text-white font-bold text-lg shadow-lg">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </div>
                    <div class="absolute bottom-0 right-0 w-3 h-3 bg-green-400 rounded-full border-2 border-gray-800"></div>
                </div>
                <div class="ml-3 flex-1 min-w-0">
                    <p class="text-sm font-semibold text-white truncate">
                        {{ Auth::user()->name }}
                    </p>
                    <p class="text-xs text-gray-400 truncate">
                        {{ Auth::user()->email }}
                    </p>
                </div>
            </div>
        </div>

    </div>
</aside>