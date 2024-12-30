<div class="absolute top-6 left-6 z-50">
    <a href="{{ $route ?? url()->previous() }}"
        class="w-12 h-12 
              bg-white bg-opacity-20 
              backdrop-blur-lg 
              rounded-full 
              flex 
              items-center 
              justify-center 
              text-white 
              hover:bg-opacity-30 
              transition 
              duration-300 
              transform 
              hover:scale-110 
              shadow-lg">
        <i class="fas fa-arrow-left text-xl"></i>
    </a>
</div>
