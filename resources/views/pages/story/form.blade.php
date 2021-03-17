<div class="px-4 py-5 bg-white space-y-6 sm:p-6">
    <div class="col-span-6">
        <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
        <input type="text" name="title" id="title" placeholder="Title" autocomplete="street-address" 
        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('title') border-red-500 @enderror"
        value="{{ old('title', $story->title) }}"
        >
        <x-forms.error field="title" />
    </div>

    <div>
        <label for="description" class="block text-sm font-medium text-gray-700">
            Description
        </label>
        <div class="mt-1">
            <textarea id="description" name="description" rows="3" 
            class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md @error('description') border-red-500 @enderror" placeholder="Description">
            {{ old('description', $story->description) }}
        </textarea>
            <x-forms.error field="description" />
        </div>
        <p class="mt-2 text-sm text-gray-500">
            Brief description for your story. URLs are hyperlinked.
        </p>
    </div>

    <div>
        <label for="type" class="block text-sm font-medium text-gray-700">Story Type</label>
        <select id="type" name="type" autocomplete="type" 
        class="mt-2 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
          <option value="">-</option>
          <option value="short" {{ old('type', $story->type) == 'Short' ? 'selected' : '' }}>Short</option>
          <option value="long" {{ old('type', $story->type) == 'Long' ? 'selected' : '' }}>Long</option>
        </select>
        <x-forms.error field="type" />
    </div>

    <div>
        <fieldset>
            <legend class="text-base font-medium text-gray-900">Tags</legend>
            <div class="flex flex-row mt-4 space-x-2">
                @foreach ($tags as $item)
                    <div class="flex items-start">
                        <div class="flex items-center h-5">
                            <input name="tags[]" value="{{ $item->id }}" type="checkbox" 
                            {{ in_array($item->id, old('tags', $story->tags->pluck('id')->toArray())) ? 'checked' : '' }}
                            class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded"
                            >
                        </div>
                        <div class="ml-2 text-sm">
                            <label for="comments" class="font-medium text-gray-700">{{ $item->title }}</label>
                        </div>
                    </div>
                @endforeach
            </div>
        </fieldset>
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700">
            Cover photo
        </label>
        @if($story->cover_image)
        <div>
            <img class="w-36" src="{{ asset('storage/stories/' . $story->cover_image) }}" alt="">
        </div>
        @endif
        <div class="mt-3 relative h-16 rounded-lg text-sm border-dashed border-2 border-gray-200 bg-white flex justify-center items-center hover:cursor-pointer">
            <label class="w-full block text-center text-gray-500 rounded cursor-pointer" for="customFile" x-data="{ files: null }">
                <input type="file" class="sr-only" id="customFile" name="cover_image" x-on:change="files = Object.values($event.target.files)">
                <span x-text="files ? files.map(file => file.name).join(', ') : 'Browse Image'"></span>
            </label>
        </div>
    </div>

    <div>
        <fieldset>
            <legend class="text-base font-medium text-gray-900">Status</legend>
            <div class="flex flex-row space-x-3 mt-2">
                <div class="flex items-center">
                    <input name="status" {{ 1 == old('type', $story->status) ? 'checked' : '' }} value="1" type="radio" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
                    <label for="active" class="ml-2 block text-sm font-medium text-gray-700">
                    Active
                    </label>
                </div>
                <div class="flex items-center">
                    <input name="status" {{ 0 == old('type', $story->status) ? 'checked' : '' }} value="0" type="radio" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
                    <label for="inactive" class="ml-2 block text-sm font-medium text-gray-700">
                    Inactive
                    </label>
                </div>
            </div>
        </fieldset>
    </div>
</div>