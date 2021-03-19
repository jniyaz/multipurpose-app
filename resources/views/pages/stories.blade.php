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
                            <div class="flex mt-2 ml-6 items-center justify-end">
                                <div class="relative">
                                    <select
                                        class="rounded border appearance-none border-gray-300 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500 text-base pl-3 pr-10">
                                        <option>All</option>
                                        <option>Short</option>
                                        <option>Long</option>
                                    </select>
                                    <span
                                        class="absolute right-0 top-0 h-full w-10 text-center text-gray-600 pointer-events-none flex items-center justify-center">
                                        <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="2" class="w-4 h-4" viewBox="0 0 24 24">
                                            <path d="M6 9l6 6 6-6"></path>
                                        </svg>
                                    </span>
                                </div>
                                <span class="ml-2">
                                    <button type="button"
                                        class="flex ml-auto text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">Apply</button>
                                </span>
                            </div>
                        </div>
                        <div class="flex flex-wrap">
                            @foreach ($stories as $story)
                                <x-stories.hcard :story="$story" />
                            @endforeach
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </main>
@endsection
