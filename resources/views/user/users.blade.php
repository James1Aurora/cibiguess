<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>User List</title>
        <link rel="stylesheet" href="{{ asset('css/userList.css') }}" >
        <link rel="stylesheet" href="{{ asset('css/output.css') }}">
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
                            <p>DAFTAR USER
                                <a href="/add-user" class="btn btn-success btn-sm float-end">Add New</a>
                            </p>
                        </div>
                    </div>
                    
                    <br>
                    <div class="table-section">
                        <div>
                            <input type="text" class="input" placeholder="Cari nama user...">
                            <!-- <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"> -->
                            <button class="search-btn">
                                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z"/>
                                </svg>
                            </button>
                        </div>
                        <div class="main">
                            <div class="relative overflow-x-auto">
                                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    <thead class="text-xs text-gray-900 uppercase dark:text-gray-400">
                                        <tr>
                                            <th scope="col" class="px-6 py-3">
                                                #
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Username
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Email
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Action
                                            </th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                    @if (count($all_users) > 0)
                                        @foreach ($all_users as $item)

                                        <tr class="bg-transparant dark:bg-gray-800">
                                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $loop->iteration }}
                                            </th>
                                            <td class="px-6 py-4">
                                                {{$item->name}}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{$item->email}}
                                            </td>
                                            <td class="px-6 py-4">
                                                <button type="button" class="text-yellow-400  border border-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-yellow-300 dark:text-yellow-300 dark: dark:hover:bg-yellow-400 dark:focus:ring-yellow-900">
                                                    <a href="/edit-user  {{$item->id}}">
                                                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z"/>
                                                        </svg>
                                                    </a>
                                                </button>
                                                <button type="button" class="text-red-700  border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-red-500 dark:text-red-500 dark: dark:hover:bg-red-600 dark:focus:ring-red-900">
                                                    <a href="/delete/ {{$item->id}}">
                                                        <svg class="w-[20px] h-[20px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                                                        </svg>
                                                    </a>
                                                </button>
                                            </td>
                                        </tr>

                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="8">No User Found!</td>
                                        </tr>
                                    @endif

                                    </tbody>
                                </table>
                            </div>
                            <div class="join">
                                <a href="#" class="join-item btn btn-active">1</a>
                                <a href="#" class="join-item btn">2</a>
                                <a href="#" class="join-item btn">3</a>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </section>

                <!-- MARGIN FOR BOTTOM NAVIGATION -->
                <div class="h-10 w-full sm:hidden"></div>
            </div>
        </section>

        <script src="{{ asset('js/sidebar.js') }}"></script>
    </body>
</html>
