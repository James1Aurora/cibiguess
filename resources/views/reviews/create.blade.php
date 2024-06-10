@extends('layouts.clearDark')
<head>
<link rel="icon" type="image/svg+xml" href="{{ asset('images/icon-cibiguess.svg') }}" />
</head>
@section('title', 'Create Review | Cibiguess')

@section('content')
    <main class="w-svw min-h-svh relative flex flex-col justify-center items-center overflow-hidden p-2 lg:p-1">
        <div class="absolute top-0 w-full">
            <div class="flex justify-between m-2">
                <a href="{{ route('review') }}"
                    class="inline-flex justify-center items-center gap-2 text-white border border-gray-500 bg-gray-800/50 hover:bg-gray-950/60 focus:ring-4 focus:ring-gray-600 font-medium rounded-md text-sm px-2 py-2.5 focus:outline-none transition ease-in-out duration-75">
                    <span class="material-symbols-outlined m-0 !text-xl">
                        home
                    </span>
                    <span class="hidden sm:block">Go back</span>
                </a>
            </div>
        </div>

        <section class="relative container max-w-xl mx-auto mt-16 sm:mt-0">
            <div class="absolute left-20 -top-60 p-64 -z-10">
                <div
                    class="relative flex place-items-center before:absolute before:h-[240px] before:w-[800px] before:rounded-full before:bg-gradient-to-br before:from-white/25 before:to-transparent before:blur-3xl before:content-[''] before:-z-20 after:absolute after:-z-20 after:h-[580px] after:w-[1300px] after:rounded-full after:-translate-x-1/3 after:blur-3xl after:bg-gradient-to-br after:from-purple-600/45 after:via-purple-800/35 after:content-[''] before:lg:h-[540px]">
                </div>
            </div>

            <div class="relative">
                <div class="bg-[#031821]/40 border border-gray-600 backdrop-blur-md rounded-lg p-2 sm:p-4">
                    <form action="{{ route('review.store') }}" method="POST">
                        @csrf
                        <div>
                            <div class="text-center">
                                <p class="tracking-tight font-semibold text-2xl">
                                    Let us know
                                    <span class="text-cyan-400">your review</span>
                                </p>
                                <p class="text-gray-400 mb-3">Give us your feedback and help us improve</p>
                            </div>

                            <div class="">
                                <div class="mt-4 mb-1">
                                    <p class="mb-2">Rating</p>
                                    <div class="flex flex-row-reverse justify-end items-center">
                                        @for ($i = 5; $i >= 1; $i--)
                                            <input id="hs-ratings-readonly-{{ $i }}" type="radio"
                                                class="peer -ms-5 size-5 bg-transparent border-0 text-transparent cursor-pointer appearance-none checked:bg-none focus:bg-none focus:ring-0 focus:ring-offset-0"
                                                name="rating" value="{{ $i }}"
                                                @if (old('rating') == $i) checked @endif>
                                            <label for="hs-ratings-readonly-{{ $i }}"
                                                class="peer-checked:text-yellow-400 text-gray-300 pointer-events-none">
                                                <svg class="flex-shrink-0 size-5" xmlns="http://www.w3.org/2000/svg"
                                                    width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                                    <path
                                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                    </path>
                                                </svg>
                                            </label>
                                        @endfor
                                    </div>
                                </div>
                                @error('rating')
                                    <div class="mb-1">
                                        <p class="text-red-300 text-sm">{{ $message }}</p>
                                    </div>
                                @enderror
                            </div>
                            <div class="my-4">
                                <div class="mb-1">
                                    <label for="message" class="w-fit font-medium">Message</label>
                                    <div class="mt-1">
                                        <textarea name="comment" id="comment" rows="5"
                                            class="w-full px-1.5 py-2 border-b bg-transparent border-gray-300 shadow-sm transition-colors ease-in-out duration-100 hover:border-cyan-200 focus:border-cyan-400 outline-none text-sm sm:text-base"
                                            placeholder="Your message...">{{ @old('comment') }}</textarea>
                                    </div>
                                </div>
                                @error('comment')
                                    <div class="mb-1">
                                        <p class="text-red-300 text-sm">{{ $message }}</p>
                                    </div>
                                @enderror
                            </div>
                            <div class="grid gap-2 grid-cols-2">
                                <a class="outline-none inline-flex justify-center items-center gap-2 text-white border border-gray-600 bg-gray-700 hover:bg-gray-800 focus:ring-1 focus:ring-gray-500 font-medium rounded-md text-sm px-5 py-2.5 focus:outline-none transition-all ease-in-out duration-150"
                                    href="{{ route('review') }}">
                                    Cancel
                                </a>
                                <button type="submit"
                                    class="outline-none inline-flex justify-center items-center gap-2 text-white border border-cyan-600 bg-cyan-700 hover:bg-cyan-800 focus:ring-1 focus:ring-cyan-500 font-medium rounded-md text-sm px-5 py-2.5 focus:outline-none transition-all ease-in-out duration-150">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="absolute right-20 -bottom-96 p-64 rotate-180 -z-10">
                <div
                    class="relative flex place-items-center before:absolute before:h-[240px] before:w-[500px] before:rounded-full before:bg-gradient-to-br before:from-white/25 before:to-transparent before:blur-3xl before:content-[''] before:-z-20 after:absolute after:-z-20 after:h-[580px] after:w-[1300px] after:rounded-full after:-translate-x-1/3 after:blur-3xl after:bg-gradient-to-br after:from-yellow-600/25 after:via-yellow-800/15 after:content-[''] before:lg:h-[540px];">
                </div>
            </div>
        </section>
    </main>
@endsection
