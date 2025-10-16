<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - Fun Coding with Mini Simulator</title>
  <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');
    body {
      font-family: 'Inter', sans-serif;
      background: linear-gradient(135deg, #3b82f6 0%, #8b5cf6 100%);
    }
  </style>
</head>
<body class="flex items-center justify-center min-h-screen">

  {{-- Card Utama --}}
  <div class="w-full max-w-md bg-white rounded-3xl shadow-xl p-10 border border-gray-100">
    
    {{-- Logo / Judul --}}
    <div class="text-center mb-8">
      <div class="flex items-center justify-center gap-2 mb-3">
        <img src="{{ asset('images/bima1.png') }}" alt="Bima 1" class="h-10 w-auto object-contain">
        <img src="{{ asset('images/bima2.png') }}" alt="Bima 2" class="h-10 w-auto object-contain">
        <img src="{{ asset('images/proyek.png') }}" alt="Proyek" class="h-10 w-auto object-contain">
      </div>
      <h1 class="text-2xl font-bold text-gray-800">Fun Coding with Mini Simulator</h1>
      <p class="text-gray-500 text-sm">Masuk ke akun Anda untuk melanjutkan</p>
    </div>

    {{-- Session Status --}}
    @if (session('status'))
      <div class="mb-4 p-3 rounded-lg bg-green-100 text-green-700 text-sm text-center">
        {{ session('status') }}
      </div>
    @endif

    {{-- Form Login --}}
    <form method="POST" action="{{ route('login') }}" class="space-y-6">
      @csrf
 
      {{-- Email --}}
      <div>
        <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username"
          placeholder="Email"
          class="w-full px-4 py-3 rounded-xl border border-gray-300 shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition placeholder-gray-400">
        @error('email')
          <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
        @enderror
      </div>

      {{-- Password --}}
      <div>
        <input id="password" type="password" name="password" required autocomplete="current-password"
          placeholder="Password"
          class="w-full px-4 py-3 rounded-xl border border-gray-300 shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition placeholder-gray-400">
        @error('password')
          <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
        @enderror
      </div>

      {{-- Remember Me --}}
      <div class="flex items-center">
        <input id="remember_me" type="checkbox" name="remember"
          class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500">
        <label for="remember_me" class="ml-2 text-sm text-gray-600">Ingat saya</label>
      </div>

      {{-- Tombol --}}
      <div class="flex items-center justify-between">
        @if (Route::has('password.request'))
          <a href="{{ route('password.request') }}" class="text-sm text-blue-700 hover:underline">
            Lupa password?
          </a>
        @endif

        <button type="submit"
          class="px-6 py-2.5 bg-gradient-to-r from-blue-600 to-purple-600 text-white text-sm font-semibold rounded-xl shadow-md hover:from-blue-700 hover:to-purple-700 focus:ring-2 focus:ring-blue-500 transition">
          Masuk
        </button>
      </div>
    </form>

    {{-- Register Link --}}
    @if (Route::has('register'))
      <p class="mt-8 text-center text-sm text-gray-600">
        Belum punya akun?
        <a href="{{ route('register') }}" class="text-blue-700 font-semibold hover:underline">Daftar</a>
      </p>
    @endif
  </div>

</body>
</html>
