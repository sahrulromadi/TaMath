<header class="absolute top-0 right-0 p-6 z-50">
    <div class="relative">
        <button id="profileDropdown"
            class="flex items-center space-x-2 
                                             bg-white bg-opacity-20 
                                             backdrop-blur-lg 
                                             rounded-full 
                                             px-4 py-2 
                                             text-white 
                                             hover:bg-opacity-30 
                                             transition 
                                             duration-300">
            <img src="{{ Auth::user()->picture ? Storage::url(Auth::user()->picture) : asset('assets/user/img/avatar.png') }}"
                alt="Profile" class="w-10 h-10 rounded-full object-cover">
            <span></span>
            <i class="fas fa-chevron-down ml-2"></i>
        </button>

        {{-- Dropdown Menu --}}
        <div id="dropdownMenu"
            class="absolute right-0 mt-2 w-56 
                    bg-white bg-opacity-20 
                    backdrop-blur-lg 
                    rounded-2xl 
                    shadow-2xl 
                    overflow-hidden 
                    transform 
                    scale-0 
                    origin-top-right 
                    transition-all 
                    duration-300 
                    ease-in-out">
            <div class="py-1">

                @if (auth()->user()->role === 'admin')
                    <a href="{{ route('admin.dashboard') }}"
                        class="px-4 py-3 
                      text-white 
                      hover:bg-white hover:bg-opacity-20 
                      transition 
                      duration-300 
                      flex 
                      items-center 
                      space-x-3">
                        <i class="fa-solid fa-lock"></i>
                        <span>Dashboard</span>
                    </a>
                @endauth

                <a href="{{ route('profile.edit', auth()->user()->id) }}"
                    class="px-4 py-3 
                          text-white 
                          hover:bg-white hover:bg-opacity-20 
                          transition 
                          duration-300 
                          flex 
                          items-center 
                          space-x-3">
                    <i class="fas fa-user"></i>
                    <span>Edit Profil</span>
                </a>

                <div class="border-t border-white border-opacity-20 my-1"></div>

                <button id="logoutButton"
                    class="w-full text-left px-4 py-3 
                                   text-white 
                                   hover:bg-red-500 hover:bg-opacity-50 
                                   transition 
                                   duration-300 
                                   flex 
                                   items-center 
                                   space-x-3">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Keluar</span>
                </button>

        </div>
    </div>
</div>
</header>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const profileDropdown = document.getElementById('profileDropdown');
        const dropdownMenu = document.getElementById('dropdownMenu');

        // Toggle Dropdown
        profileDropdown.addEventListener('click', (e) => {
            e.stopPropagation();
            dropdownMenu.classList.toggle('scale-0');
        });

        // Tutup dropdown saat klik di luar
        document.addEventListener('click', (e) => {
            if (!profileDropdown.contains(e.target)) {
                dropdownMenu.classList.add('scale-0');
            }
        });
    });
</script>

@include('user.components.modal.logout')
