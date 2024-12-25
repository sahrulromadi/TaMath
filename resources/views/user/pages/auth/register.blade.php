@extends('user.app')

@section('content')
    <div
        class="flex justify-center items-center h-screen bg-gradient-to-r from-pink-100 via-teal-100 to-lime-100 text-gray-700">
        <div class="w-full max-w-md p-8 bg-white shadow-lg rounded-lg">
            <h2 class="text-3xl font-semibold text-center text-gray-800 mb-6">Daftar Akun Baru</h2>

            <!-- Form Register -->
            <form method="POST" action="{{ route('register.store') }}">
                @csrf

                <!-- Name -->
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
                    <input type="text" id="name" name="name"
                        class="w-full p-3 mt-1 border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-400"
                        value="{{ old('name') }}">
                    @error('name')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email -->
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="email" name="email"
                        class="w-full p-3 mt-1 border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-400"
                        value="{{ old('email') }}">
                    @error('email')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700">Kata Sandi</label>
                    <input type="password" id="password" name="password"
                        class="w-full p-3 mt-1 border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-400">
                    @error('password')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div class="mb-6">
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Konfirmasi Kata
                        Sandi</label>
                    <input type="password" id="password_confirmation" name="password_confirmation"
                        class="w-full p-3 mt-1 border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-400">
                </div>

                <!-- Submit Button -->
                <div class="mb-4 text-center">
                    <button type="submit"
                        class="w-full py-3 bg-teal-400 text-white rounded-lg hover:bg-teal-500 transition-colors duration-300">
                        Daftar
                    </button>
                </div>

                <!-- Login Redirect -->
                <div class="text-center text-sm">
                    <p>Sudah punya akun? <a href="{{ route('login.index') }}"
                            class="text-teal-500 hover:text-teal-700">Masuk di
                            sini</a></p>
                </div>
            </form>
        </div>
    </div>
@endsection
