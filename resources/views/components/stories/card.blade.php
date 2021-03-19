<div class="p-4 w-full xs:w-1/2 sm:w-1/2 md:w-1/2 lg:w-1/4">
    <div class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden">
        <a href="{{ route('welcome.show.stories', [$story->id]) }}">
            <img class="lg:h-36 md:h-24 w-full object-cover object-center" src="{{ $story->thumbnail }}"
                alt="{{ $story->cover_image ? Str::slug($story->title, '-') : null }}" />
        </a>
        <div class="p-6">
            <h2 class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1">
                <span>{{ $story->tags->implode('title', ', ') }}</span>
            </h2>
            <h1 class="title-font text-lg font-medium text-gray-900 mb-3">
                <a href="{{ route('welcome.show.stories', [$story->id]) }}">{{ $story->title }}</a>
            </h1>
            <p class="leading-relaxed mb-3">{{ Str::limit($story->description, 20) }}</p>
            <div class="flex items-center justify-between flex-wrap ">
                <a href="#" class="inline-flex items-center">
                    <img alt="blog" src="https://dummyimage.com/103x103"
                        class="w-8 h-8 rounded-full flex-shrink-0 object-cover object-center">
                    <span class="flex-grow flex flex-col pl-2">
                        <span class="text-xs text-gray-500">{{ $story->user->name }}</span>
                    </span>
                </a>
                {{-- <span
                    class="text-gray-400 mr-3 inline-flex items-center lg:ml-auto md:ml-0 ml-auto leading-none text-sm pr-3 py-1">
                    <svg class="w-4 h-4 mr-1" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round"
                        stroke-linejoin="round" viewBox="0 0 24 24">
                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                        <circle cx="12" cy="12" r="3"></circle>
                    </svg>1.2K
                </span> --}}
            </div>
        </div>
    </div>
</div>
