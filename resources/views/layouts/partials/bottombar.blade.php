<div class="fixed bottom-0 border-t border-gray-300 grid grid-cols-5 w-full h-16 bg-white z-20 sm:hidden">
    <a href="{{ route('home') }}"
        class="flex flex-col justify-center items-center transition-colors duration-200 ease-in-out hover:text-cyan-500 @if (request()->is('ad')) text-cyan-500 @endif">
        <span class="material-symbols-outlined @if (request()->is('ad')) filled @endif"> home </span>
        <p class="text-xs">Home</p>
    </a>
    <a href="#"
        class="flex flex-col justify-center items-center transition-colors duration-200 ease-in-out hover:text-cyan-500 @if (request()->is('ad/questions*')) text-cyan-500 @endif">
        <span class="material-symbols-outlined @if (request()->is('ad/questions*')) filled @endif"> location_on </span>
        <p class="text-xs">Question</p>
    </a>
    <a href="#"
        class="flex flex-col justify-center items-center transition-colors duration-200 ease-in-out hover:text-cyan-500 @if (request()->is('ad/minimaps*')) text-cyan-500 @endif">
        <span class="material-symbols-outlined @if (request()->is('ad/minimaps*')) filled @endif"> map </span>
        <p class="text-xs">Mini Map</p>
    </a>
    <a href="#"
        class="flex flex-col justify-center items-center transition-colors duration-200 ease-in-out hover:text-cyan-500 @if (request()->is('ad/users*')) text-cyan-500 @endif">
        <span class="material-symbols-outlined @if (request()->is('ad/users*')) filled @endif"> account_box </span>
        <p class="text-xs">User</p>
    </a>
    <a href="#"
        class="flex flex-col justify-center items-center transition-colors duration-200 ease-in-out hover:text-cyan-500 @if (request()->is('ad/badges*')) text-cyan-500 @endif">
        <span class="material-symbols-outlined @if (request()->is('ad/badges*')) filled @endif"> local_police </span>
        <p class="text-xs">Badge</p>
    </a>
</div>
