@extends('layouts.admin')

@section('title', 'User List | CibiGuess')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/userList.css') }}">
@endsection

@section('content')
    <section class="group" id="sideContent">
        <section class="mx-auto max-w-7xl mb-4">
            <div class="bg-cyan-600 rounded-lg p-3 h-28 flex justify-between mb-3">
                <p class="text-white font-semibold tracking-tighter text-xl">Daftar User
                </p>
                <a href="{{ route('users.add') }}" class="btn btn-primary btn-sm float-end">Add New</a>
            </div>

            <div class="bg-white border border-gray-300 rounded-lg p-2">
                <div>
                    <input type="text" class="input" placeholder="Cari nama user...">
                    <!-- <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"> -->
                    <button class="search-btn">
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z" />
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
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $loop->iteration }}
                                            </th>
                                            <td class="px-6 py-4">
                                                {{ $item->name }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $item->email }}
                                            </td>
                                            <td class="px-6 py-4">
                                                <button type="button"
                                                    class="text-yellow-400  border border-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-yellow-300 dark:text-yellow-300 dark: dark:hover:bg-yellow-400 dark:focus:ring-yellow-900">
                                                    <a href="{{ route('users.edit', $item->id) }}">
                                                        <svg class="w-6 h-6 text-gray-800 dark:text-white"
                                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                            width="24" height="24" fill="none"
                                                            viewBox="0 0 24 24">
                                                            <path stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="2"
                                                                d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z" />
                                                        </svg>
                                                    </a>
                                                </button>
                                                <button type="button"
                                                    class="text-red-700  border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-red-500 dark:text-red-500 dark: dark:hover:bg-red-600 dark:focus:ring-red-900">
                                                    <a href="{{ route('users.delete', $item->id) }}">
                                                        <svg class="w-[20px] h-[20px] text-gray-800 dark:text-white"
                                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                            width="24" height="24" fill="none"
                                                            viewBox="0 0 24 24">
                                                            <path stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="2"
                                                                d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z" />
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
    </section>
@endsection
