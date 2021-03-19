@extends('layouts.app')

@section('title', 'Stories')

@section('content')
    <main class="bg-gray-100">
        <div class="flex flex-col">
            <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
                <section class="text-gray-600 body-font">
                    <div class="container px-4 py-4 mx-auto">
                        <div class="text-center mb-6">
                            <h1 class="sm:text-3xl text-2xl font-medium title-font text-gray-900 mb-4">All Stories</h1>
                            <p class="text-base leading-relaxed xl:w-2/4 lg:w-3/4 mx-auto text-gray-500s">
                                We have hundreds of great stories for you to share.</p>
                            <div class="flex mt-6 justify-center">
                                <div class="w-16 h-1 rounded-full bg-indigo-500 inline-flex"></div>
                            </div>
                        </div>
                        @if (count($stories) > 0)
                            {{-- Filter --}}
                            <div class="flex mt-2 ml-6 items-center justify-end">
                                <div x-data="{ isOpen: false, type: 'All' }" class="relative inline-block text-left">
                                    <div>
                                        <button @click="isOpen = !isOpen" @keydown.escape="isOpen = false" type="button"
                                            class="inline-flex justify-center w-full rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-indigo-500"
                                            id="options-menu" aria-expanded="true" aria-haspopup="true">
                                            <span>Filter</span>
                                            <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </div>

                                    <div x-show="isOpen" @click.away="isOpen = false"
                                        class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none"
                                        role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                                        <div class="py-1" role="none">
                                            <a href="{{ route('welcome.stories') }}"
                                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900"
                                                role="menuitem">All</a>
                                            <a href="{{ route('welcome.stories', ['type' => 'short']) }}"
                                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900"
                                                role="menuitem">Short</a>
                                            <a href="{{ route('welcome.stories', ['type' => 'long']) }}"
                                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900"
                                                role="menuitem">Long</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="flex flex-wrap">
                                @foreach ($stories as $story)
                                    <x-stories.card :story="$story" />
                                @endforeach
                            </div>
                            <div>
                                {{ $stories->withQueryString()->links() }}
                            </div>
                        @else
                            <div class="md:max-w-2xl mx-auto">
                                <p class="text-gray-800">
                                    No stories available.
                                </p>
                            </div>

                            <div class="mb-6 mt-12">
                                <a href="{{ route('login') }}"
                                    class="py-2 px-4 md:py-4 md:px-6 border select-none hover:bg-gray-100 bg-white rounded shadow-lg text-indigo-800">
                                    Create new story <span>&rarr;</span> </a>
                            </div>
                        @endif
                    </div>
                </section>
            </div>
        </div>
    </main>
@endsection
