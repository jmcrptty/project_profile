<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - Smart Agriculture IoT</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');
    body {
      font-family: 'Inter', sans-serif;
      background: linear-gradient(135deg, #16a34a 0%, #065f46 100%);
    }
  </style>
</head>
<body class="flex items-center justify-center min-h-screen">

  {{-- Card Utama --}}
  <div class="w-full max-w-md bg-white rounded-3xl shadow-xl p-10 border border-gray-100">
    
    {{-- Logo / Judul --}}
    <div class="text-center mb-8">
      <h1 class="text-2xl font-bold text-gray-800">Smart Agriculture IoT</h1>
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
          class="w-full px-4 py-3 rounded-xl border border-gray-300 shadow-sm focus:ring-2 focus:ring-green-500 focus:border-green-500 transition placeholder-gray-400">
        @error('email')
          <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
        @enderror
      </div>

      {{-- Password --}}
      <div>
        <input id="password" type="password" name="password" required autocomplete="current-password"
          placeholder="Password"
          class="w-full px-4 py-3 rounded-xl border border-gray-300 shadow-sm focus:ring-2 focus:ring-green-500 focus:border-green-500 transition placeholder-gray-400">
        @error('password')
          <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
        @enderror
      </div>

      {{-- Remember Me --}}
      <div class="flex items-center">
        <input id="remember_me" type="checkbox" name="remember"
          class="rounded border-gray-300 text-green-600 shadow-sm focus:ring-green-500">
        <label for="remember_me" class="ml-2 text-sm text-gray-600">Ingat saya</label>
      </div>

      {{-- Tombol --}}
      <div class="flex items-center justify-between">
        @if (Route::has('password.request'))
          <a href="{{ route('password.request') }}" class="text-sm text-green-700 hover:underline">
            Lupa password?
          </a>
        @endif

        <button type="submit"
          class="px-6 py-2.5 bg-gradient-to-r from-green-600 to-emerald-500 text-white text-sm font-semibold rounded-xl shadow-md hover:from-green-700 hover:to-emerald-600 focus:ring-2 focus:ring-green-500 transition">
          Masuk
        </button>
      </div>
    </form>

    {{-- Register Link --}}
    @if (Route::has('register'))
      <p class="mt-8 text-center text-sm text-gray-600">
        Belum punya akun?
        <a href="{{ route('register') }}" class="text-green-700 font-semibold hover:underline">Daftar</a>
      </p>
    @endif
  </div>

</body>
</html>
