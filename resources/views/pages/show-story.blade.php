@extends('layouts.app')

@section('title', $story->title)

@section('content')
    <div class="bg-gray-100 min-h-screen">
        <div class="flex justify-center">
            <div class="max-w-xl w-full mt-6 md:mt-10 mx-2">
                <div class="bg-white md:shadow-md mb-4 border md:border-0">
                    <div
                        class="flex justify-between items-center bg-gray-100 px-4 py-4 text-center border-t-4 border-indigo-500 md:rounded-t">
                        <div>
                            <h3 class="text-lg leading-6 font-medium text-gray-900">
                                {{ $story->title }}
                            </h3>
                        </div>
                        <div>
                            <a href="{{ route('welcome.stories') }}">
                                <span>
                                    <button type="button"
                                        class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        <svg class="-ml-1 h-5 w-5 text-gray-500" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M7.707 3.293a1 1 0 010 1.414L5.414 7H11a7 7 0 017 7v2a1 1 0 11-2 0v-2a5 5 0 00-5-5H5.414l2.293 2.293a1 1 0 11-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </span>
                            </a>
                        </div>
                    </div>
                    <div class="flex pt-6 px-4 md:px-8 pb-8 border-t justify-center">
                        <img class="h-60 object-cover object-center"
                            src="{{ asset('storage/stories/' . $story->cover_image) }}"
                            alt="{{ $story->cover_image ? Str::slug($story->title, '-') : null }}" />
                    </div>
                    <div class="pt-6 px-4 md:px-8 pb-8 border-t">
                        <div class="mb-2">
                            <span class="text-gray-500 bg-gray-200 h-10 rounded px-2 py-1 text-xs select-none">
                                {{ $story->tags->implode('title', ', ') }}
                            </span>
                        </div>
                        <div>{{ $story->description }}</div>
                    </div>
                    <div class="pt-6 px-4 md:px-8 pb-8 border-t">
                        <div class="flex items-center justify-between">
                            <div class="text-xs text-gray-500 inline-flex items-center">
                                <a href="#">
                                    <img alt="blog" src="https://dummyimage.com/103x103"
                                        class="w-8 h-8 mr-2 rounded-full flex-shrink-0 object-cover object-center">
                                </a>
                                By <a href="#" class="ml-1 hover:underline">{{ $story->user->name }}</a> <span
                                    class="ml-1">at {{ $story->created_at }}</span>
                            </div>

                            <div class="text-right">
                                <span class="text-gray-500 text-xs">Type: {{ $story->type }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
