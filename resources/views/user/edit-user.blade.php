<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Edit User</title>
        <link rel="stylesheet" href="{{ asset('css/output.css') }}">
        <link rel="stylesheet" href="{{ asset('css/editUser.css') }}">
        <link
            rel="stylesheet"
            href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"
        />
    </head>
    <body>
        <!-- SIDEBAR -->
        <div
            class="bg-white group sidebar fixed h-full w-[78px] z-10 transition-all duration-500 ease-in-out px-3.5 py-1.5 left-0 top-0 border border-r border-gray-300 [&.open]:w-[250px] hidden sm:block"
        >
            <div class="h-[60px] flex justify-between items-center relative">
                <div>
                    <p
                        class="text-2xl font-bold opacity-0 transition-all duration-75 ease-in-out group-[.open]:opacity-100"
                    >
                        CibiGuess
                    </p>
                </div>
                <i
                    class="material-symbols-outlined h-[60px] min-w-[50px] !leading-[60px] text-center absolute -translate-y-2/4 !text-xl transition-all duration-500 ease-in-out cursor-pointer right-0 top-2/4"
                    id="btn"
                    >menu</i
                >
            </div>
            <!-- <p
                class="text-sm opacity-0 transition-all duration-75 ease-in-out hidden group-[.open]:opacity-100 group-[.open]:block"
            >
                Sistem Informasi Sign Language Augmented Reality
            </p> -->
            <ul class="h-full mt-5">
                <li class="group/nav-link relative mx-0 my-2">
                    <a
                        href="template-dashboard.html"
                        class="flex h-full w-full items-center no-underline transition-all duration-500 ease-in-out rounded-lg group-hover/nav-link:bg-cyan-500 group-hover/nav-link:text-white"
                    >
                        <i
                            class="material-symbols-outlined h-[50px] min-w-[47px] !text-xl text-center !leading-[50px]"
                            >window</i
                        >
                        <span
                            class="whitespace-nowrap opacity-0 pointer-events-none text-sm group-[.open]:opacity-100 group-[.open]:pointer-events-auto"
                            >Dashboard</span
                        >
                    </a>
                    <span
                        class="bg-white absolute z-10 shadow-lg rounded text-sm opacity-0 whitespace-nowrap pointer-events-none transition-all duration-500 ease-in-out px-3 py-1.5 left-[calc(100%_+_15px)] -top-5 group-[.open]:hidden group-hover/nav-link:opacity-100 group-hover/nav-link:pointer-events-auto group-hover/nav-link:-translate-y-2/4 group-hover/nav-link:top-2/4"
                        >Dashboard</span
                    >
                </li>
                <li class="group/nav-link relative mx-0 my-2">
                    <a
                        href="#"
                        class="flex h-full w-full items-center no-underline transition-all duration-500 ease-in-out rounded-lg group-hover/nav-link:bg-cyan-500 group-hover/nav-link:text-white"
                    >
                        <i
                            class="material-symbols-outlined h-[50px] min-w-[47px] !text-xl text-center !leading-[50px]"
                            >location_on</i
                        >
                        <span
                            class="whitespace-nowrap opacity-0 pointer-events-none text-sm group-[.open]:opacity-100 group-[.open]:pointer-events-auto"
                            >Map</span
                        >
                    </a>
                    <span
                        class="bg-white absolute z-10 shadow-lg rounded text-sm opacity-0 whitespace-nowrap pointer-events-none transition-all duration-500 ease-in-out px-3 py-1.5 left-[calc(100%_+_15px)] -top-5 group-[.open]:hidden group-hover/nav-link:opacity-100 group-hover/nav-link:pointer-events-auto group-hover/nav-link:-translate-y-2/4 group-hover/nav-link:top-2/4"
                        >Map</span
                    >
                </li>
                <li class="group/nav-link relative mx-0 my-2">
                    <a
                        href="{{ url('/users') }}"
                        class="bg-cyan-500 text-white flex h-full w-full items-center no-underline transition-all duration-500 ease-in-out rounded-lg group-hover/nav-link:bg-cyan-500 group-hover/nav-link:text-white"
                    >
                        <i
                            class="material-symbols-outlined filled h-[50px] min-w-[47px] !text-xl text-center !leading-[50px]"
                            >account_box</i
                        >
                        <span
                        class="whitespace-nowrap opacity-0 pointer-events-none text-sm group-[.open]:opacity-100 group-[.open]:pointer-events-auto"
                        >User</span
                        >
                    </a>
                    <span
                        class="bg-white absolute z-10 shadow-lg rounded text-sm opacity-0 whitespace-nowrap pointer-events-none transition-all duration-500 ease-in-out px-3 py-1.5 left-[calc(100%_+_15px)] -top-5 group-[.open]:hidden group-hover/nav-link:opacity-100 group-hover/nav-link:pointer-events-auto group-hover/nav-link:-translate-y-2/4 group-hover/nav-link:top-2/4"
                        >User</span
                    >
                </li>
                <li class="group/nav-link relative mx-0 my-2">
                    <a
                        href="#"
                        class="flex h-full w-full items-center no-underline transition-all duration-500 ease-in-out rounded-lg group-hover/nav-link:bg-cyan-500 group-hover/nav-link:text-white"
                    >
                        <i
                            class="material-symbols-outlined h-[50px] min-w-[47px] !text-xl text-center !leading-[50px]"
                            >local_police</i
                        >
                        <span
                            class="whitespace-nowrap opacity-0 pointer-events-none text-sm group-[.open]:opacity-100 group-[.open]:pointer-events-auto"
                            >Badge</span
                        >
                    </a>
                    <span
                        class="bg-white absolute z-10 shadow-lg rounded text-sm opacity-0 whitespace-nowrap pointer-events-none transition-all duration-500 ease-in-out px-3 py-1.5 left-[calc(100%_+_15px)] -top-5 group-[.open]:hidden group-hover/nav-link:opacity-100 group-hover/nav-link:pointer-events-auto group-hover/nav-link:-translate-y-2/4 group-hover/nav-link:top-2/4"
                        >Badge</span
                    >
                </li>
                <li
                    class="mx-0 my-2 fixed h-[60px] w-[78px] transition-all duration-[0.5s] ease-[ease] overflow-hidden px-3.5 py-2.5 left-0 -bottom-2 group-[.open]:w-[250px] group-[.open]:border-t group-[.open]:border-gray-300"
                >
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
                    <a href="#">
                        <i
                            class="material-symbols-outlined text-white bg-cyan-500 !text-xl h-[60px] min-w-[50px] text-center !leading-[60px] absolute -translate-y-2/4 w-full transition-all duration-500 ease-in-out right-0 top-2/4 group-[.open]:w-[50px] group-[.open]:bg-none "
                            id="log_out"
                            >logout</i
                        >
                    </a>
                </li>
            </ul>
        </div>

        <!-- BOTTOM BAR -->
        <div
            class="fixed bottom-0 border-t border-gray-300 grid grid-cols-4 w-full h-16 bg-white z-20 sm:hidden"
        >
            <a
                href="template-dashboard.html"
                class="flex flex-col justify-center items-center transition-colors duration-200 ease-in-out hover:text-cyan-500"
            >
                <span class="material-symbols-outlined"> home </span>
                <p class="text-xs">Home</p>
            </a>
            <a
                href="#"
                class="flex flex-col justify-center items-center transition-colors duration-200 ease-in-out hover:text-cyan-500"
            >
                <span class="material-symbols-outlined"> location_on </span>
                <p class="text-xs">Map</p>
            </a>
            <a
                href="{{ url('/users') }}"
                class="flex flex-col justify-center items-center transition-colors duration-200 ease-in-out text-cyan-500 hover:text-cyan-500"
            >
                <span class="material-symbols-outlined filled"> account_box </span>
                <p class="text-xs">User</p>
            </a>
            <a
                href="#"
                class="flex flex-col justify-center items-center transition-colors duration-200 ease-in-out hover:text-cyan-500"
            >
                <span class="material-symbols-outlined"> local_police </span>
                <p class="text-xs">Badge</p>
            </a>
        </div>

        <section class="group" id="sideContent">
            <div
                class="relative min-h-screen left-0 w-full transition-all duration-500 ease-in-out z-0 top-0 p-4 sm:group-[.open]:w-[calc(100%_-_250px)] sm:group-[.open]:left-[250px] sm:left-[78px] sm:w-[calc(100%_-_78px)]"
            >
                <section class="mx-auto max-w-7xl mb-4">
                    <div class="header">
                        <div class="t-header">
                            <p>EDIT USER
                            </p>
                        </div>
                    </div>

                    @if (Session::has('fail'))
                        <span class="alert alert-danger p-2">{{Session::get('fail')}}</span>
                    @endif

                    <br>

                    <div class="form-section">

                        <form action="{{ route('EditUser')}}" method="post">
                        @csrf

                            <label class="form-control w-full max-w-xs">
                                <div class="label">
                                    <span class="label-text">Username</span>
                                </div>
                                <input type="text" name="name" value="{{$user->name}}" placeholder="Username..." class="input input-bordered w-full max-w-xs" />
                                @error('name')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror

                            </label>
                            <label class="form-control w-full max-w-xs">
                                <div class="label">
                                    <span class="label-text">E-mail</span>
                                </div>
                                <input type="text" name="email" value="{{$user->email}}" placeholder="E-mail..." class="input input-bordered w-full max-w-xs" />
                                @error('email')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </label>

                            <div class="button-btn">
                                <button class="btn btn-outline">Submit</button>
                                {{-- <button class="btn btn-outline">Cancel</button> --}}
                                <a href="/users" class="btn btn-outline">Cancel</a>
                            </div>

                        </form>
                    </div>

                </section>
            </div>
        </section>

                <!-- MARGIN FOR BOTTOM NAVIGATION -->
                <div class="h-10 w-full sm:hidden"></div>
            </div>
        </section>

        <script src="{{ ('js/sidebar.js') }}"></script>
    </body>
</html>
