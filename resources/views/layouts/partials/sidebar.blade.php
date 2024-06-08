<div
    class="bg-white group sidebar fixed h-full w-[78px] z-10 transition-all duration-500 ease-in-out px-3.5 py-1.5 left-0 top-0 border border-r border-gray-300 [&.open]:w-[250px] hidden sm:block">
    <div class="h-[60px] flex justify-between items-center relative">
        <div>
            <a href="{{ route('home') }}"
                class="text-2xl font-bold opacity-0 transition-all duration-75 ease-in-out group-[.open]:opacity-100">
                CibiGuess
            </a>
        </div>
        <i class="material-symbols-outlined h-[60px] min-w-[50px] !leading-[60px] text-center absolute -translate-y-2/4 !text-xl transition-all duration-500 ease-in-out cursor-pointer right-0 top-2/4"
            id="btn">menu</i>
    </div>
    <ul class="h-full mt-5">
        <li class="group/nav-link relative mx-0 my-2">
            <a href="{{ route('dashboard') }}"
                class="flex h-full w-full items-center no-underline transition-all duration-500 ease-in-out rounded-lg group-hover/nav-link:bg-cyan-500 group-hover/nav-link:text-white @if (request()->is('ad')) bg-cyan-500 text-white @endif">
                <i
                    class="material-symbols-outlined h-[50px] min-w-[47px] !text-xl text-center !leading-[50px] @if (request()->is('ad')) filled @endif">window</i>
                <span
                    class="whitespace-nowrap opacity-0 pointer-events-none text-sm group-[.open]:opacity-100 group-[.open]:pointer-events-auto">Dashboard</span>
            </a>
            <span
                class="bg-white absolute z-10 shadow-lg rounded text-sm opacity-0 whitespace-nowrap pointer-events-none transition-all duration-500 ease-in-out px-3 py-1.5 left-[calc(100%_+_15px)] -top-5 group-[.open]:hidden group-hover/nav-link:opacity-100 group-hover/nav-link:pointer-events-auto group-hover/nav-link:-translate-y-2/4 group-hover/nav-link:top-2/4">Dashboard</span>
        </li>
        <li class="group/nav-link relative mx-0 my-2">
            <a href="{{ route('daftar-maps') }}"
                class="flex h-full w-full items-center no-underline transition-all duration-500 ease-in-out rounded-lg group-hover/nav-link:bg-cyan-500 group-hover/nav-link:text-white @if (request()->is('ad/questions*')) bg-cyan-500 text-white @endif">
                <i
                    class="material-symbols-outlined h-[50px] min-w-[47px] !text-xl text-center !leading-[50px] @if (request()->is('ad/questions*')) filled @endif">location_on</i>
                <span
                    class="whitespace-nowrap opacity-0 pointer-events-none text-sm group-[.open]:opacity-100 group-[.open]:pointer-events-auto">Question</span>
            </a>
            <span
                class="bg-white absolute z-10 shadow-lg rounded text-sm opacity-0 whitespace-nowrap pointer-events-none transition-all duration-500 ease-in-out px-3 py-1.5 left-[calc(100%_+_15px)] -top-5 group-[.open]:hidden group-hover/nav-link:opacity-100 group-hover/nav-link:pointer-events-auto group-hover/nav-link:-translate-y-2/4 group-hover/nav-link:top-2/4">Question</span>
        </li>
        <li class="group/nav-link relative mx-0 my-2">
            <a href="{{ route('minimaps') }}"
                class="flex h-full w-full items-center no-underline transition-all duration-500 ease-in-out rounded-lg group-hover/nav-link:bg-cyan-500 group-hover/nav-link:text-white @if (request()->is('ad/minimaps*')) bg-cyan-500 text-white @endif">
                <i
                    class="material-symbols-outlined h-[50px] min-w-[47px] !text-xl text-center !leading-[50px] @if (request()->is('ad/minimaps*')) filled @endif">map</i>
                <span
                    class="whitespace-nowrap opacity-0 pointer-events-none text-sm group-[.open]:opacity-100 group-[.open]:pointer-events-auto">Mini
                    Map</span>
            </a>
            <span
                class="bg-white absolute z-10 shadow-lg rounded text-sm opacity-0 whitespace-nowrap pointer-events-none transition-all duration-500 ease-in-out px-3 py-1.5 left-[calc(100%_+_15px)] -top-5 group-[.open]:hidden group-hover/nav-link:opacity-100 group-hover/nav-link:pointer-events-auto group-hover/nav-link:-translate-y-2/4 group-hover/nav-link:top-2/4">Mini
                Map</span>
        </li>
        <li class="group/nav-link relative mx-0 my-2">
            <a href="{{ route('users') }}"
                class="flex h-full w-full items-center no-underline transition-all duration-500 ease-in-out rounded-lg group-hover/nav-link:bg-cyan-500 group-hover/nav-link:text-white @if (request()->is('ad/users*')) bg-cyan-500 text-white @endif">
                <i
                    class="material-symbols-outlined h-[50px] min-w-[47px] !text-xl text-center !leading-[50px] @if (request()->is('ad/users*')) filled @endif">account_box</i>
                <span
                    class="whitespace-nowrap opacity-0 pointer-events-none text-sm group-[.open]:opacity-100 group-[.open]:pointer-events-auto">User</span>
            </a>
            <span
                class="bg-white absolute z-10 shadow-lg rounded text-sm opacity-0 whitespace-nowrap pointer-events-none transition-all duration-500 ease-in-out px-3 py-1.5 left-[calc(100%_+_15px)] -top-5 group-[.open]:hidden group-hover/nav-link:opacity-100 group-hover/nav-link:pointer-events-auto group-hover/nav-link:-translate-y-2/4 group-hover/nav-link:top-2/4">User</span>
        </li>
        <li class="group/nav-link relative mx-0 my-2">
            <a href="{{ route('badge') }}"
                class="flex h-full w-full items-center no-underline transition-all duration-500 ease-in-out rounded-lg group-hover/nav-link:bg-cyan-500 group-hover/nav-link:text-white @if (request()->is('ad/badges*')) bg-cyan-500 text-white @endif">
                <i
                    class="material-symbols-outlined h-[50px] min-w-[47px] !text-xl text-center !leading-[50px] @if (request()->is('ad/badges*')) filled @endif">local_police</i>
                <span
                    class="whitespace-nowrap opacity-0 pointer-events-none text-sm group-[.open]:opacity-100 group-[.open]:pointer-events-auto">Badge</span>
            </a>
            <span
                class="bg-white absolute z-10 shadow-lg rounded text-sm opacity-0 whitespace-nowrap pointer-events-none transition-all duration-500 ease-in-out px-3 py-1.5 left-[calc(100%_+_15px)] -top-5 group-[.open]:hidden group-hover/nav-link:opacity-100 group-hover/nav-link:pointer-events-auto group-hover/nav-link:-translate-y-2/4 group-hover/nav-link:top-2/4">Badge</span>
        </li>
        <li
            class="mx-0 my-2 fixed h-[60px] w-[78px] transition-all duration-[0.5s] ease-[ease] overflow-hidden px-3.5 py-2.5 left-0 -bottom-2 group-[.open]:w-[250px] group-[.open]:border-t group-[.open]:border-gray-300">
            <div class="flex items-center flex-nowrap">
                <div>
                    <div class="text-sm whitespace-nowrap">
                        Akwan Cakra
                    </div>
                    <div class="text-xs whitespace-nowrap">
                        Administrator
                    </div>
                </div>
            </div>
            <a href="{{ route('login') }}">
                <i class="material-symbols-outlined text-white bg-cyan-500 !text-xl h-[60px] min-w-[50px] text-center !leading-[60px] absolute -translate-y-2/4 w-full transition-all duration-500 ease-in-out right-0 top-2/4 group-[.open]:w-[50px] group-[.open]:bg-none "
                    id="log_out">logout</i>
            </a>
        </li>
    </ul>
</div>
