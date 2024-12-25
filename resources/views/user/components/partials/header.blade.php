<header class="bg-blue-600 text-white py-4 px-6">
    <nav class="flex justify-between items-center">
        <div class="text-lg font-semibold">
            <a href="#" class="hover:text-gray-300">TaMath</a>
        </div>
        <div class="space-x-6">
            <a href="{{ route('home') }}" class="hover:text-gray-300">Home</a>

            @auth
                <!-- Tombol Logout -->
                <button id="logoutButton" class="hover:text-gray-300">Logout</button>
            @endauth

            @guest
                <a href="{{ route('login.index') }}" class="hover:text-gray-300">Login</a>
                <a href="{{ route('register.index') }}" class="hover:text-gray-300">Register</a>
            @endguest
        </div>
    </nav>
</header>

{{-- include modal logout --}}
@include('user.components.modal.modal-logout')
