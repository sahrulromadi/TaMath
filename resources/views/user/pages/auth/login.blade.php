@extends('user.app')

@section('content')
    <div class="flex justify-center items-center min-h-screen bg-gradient-to-r from-gray-100 via-gray-200 to-gray-300">
        <div class="w-full max-w-md bg-white p-8 rounded-lg shadow-lg">
            <h2 class="text-3xl font-semibold text-center text-gray-800 mb-6">Login</h2>

            <form method="POST" action="{{ route('login.store') }}">
                @csrf

                <!-- Email -->
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="email" name="email"
                        class="w-full p-3 mt-1 border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-400"
                        placeholder="Masukkan email Anda" value="{{ old('email') }}" required>
                    @error('email')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700">Kata Sandi</label>
                    <input type="password" id="password" name="password"
                        class="w-full p-3 mt-1 border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-400"
                        placeholder="Masukkan kata sandi Anda" required>
                    @error('password')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Remember Me -->
                <div class="flex items-center justify-between mb-4">
                    <label class="flex items-center text-sm text-gray-600">
                        <input type="checkbox" name="remember"
                            class="text-teal-400 border-gray-300 rounded focus:ring-teal-400">
                        <span class="ml-2">Ingat Saya</span>
                    </label>
                    <a href="#" class="text-sm text-teal-500 hover:underline">Lupa Kata Sandi?</a>
                </div>

                <!-- Login Button -->
                <div class="mb-4">
                    <button type="submit"
                        class="w-full py-3 bg-teal-500 text-white rounded-lg hover:bg-teal-600 transition-colors duration-300">
                        Login
                    </button>
                </div>

                <!-- Register Link -->
                <p class="text-center text-sm text-gray-600">
                    Belum punya akun? <a href="{{ route('register.index') }}" class="text-teal-500 hover:underline">Daftar
                        di
                        sini</a>.
                </p>
            </form>
        </div>
    </div>
@endsection
