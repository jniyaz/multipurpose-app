<div
    class="w-full relative overflow-hidden md:flex mb-4 p-2 bg-white border-b-2 border-r-2 border-gray-200 sm:px-4 sm:py-4 md:px-4 sm:rounded-lg sm:shadow-sm">
    {{-- <span
        class="text-gray-700 bg-gray-300 px-3 py-1 font-light text-xs absolute right-0 top-0 rounded-bl capitalize">pending</span> --}}
    <div class="md:w-1/4"><a href="#">
            <img class="object-cover rounded-lg h-48 w-48" src="{{ asset('storage/stories/' . $story->cover_image) }}"
                alt="{{ $story->title }}">
        </a></div>
    <div class="md:w-3/4 max-w-full px-4 py-4">
        @foreach ($story->tags as $tag)
            <span
                class="text-blue-500 text-xs rounded-md bg-gray-200 hover:bg-gray-300 px-3 py-1 select-none">{{ $tag->title }}</span>
        @endforeach
        <h3 class="font-semibold text-gray-800 my-2 hover:underline text-lg"><a href="#">{{ $story->title }}</a>
        </h3>
        <div class="mb-4 w-full text-gray-700 text-sm">{{ Str::limit($story->description, 120) }}</div>
        <div class="flex items-center justify-between">
            <div class="text-sm text-gray-800 inline-flex items-center">
                <span class="mx-1">•</span><span class="text-xs font-light">{{ $story->created_at }}</span>
                <a href="#" class="hover:underline text-xs font-light ml-1">by {{ $story->user->name }}</a>
            </div>
            <div class="text-right">
                <div class="flex items-center"><a href="#"
                        class="bg-gray-200 hover:bg-gray-300 rounded-md px-2 py-1 text-blue-600 text-xs uppercase">Read
                        More </a>
                </div>
            </div>
        </div>
    </div>
</div>
