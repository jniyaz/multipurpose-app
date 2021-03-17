@extends('layouts.app')

@section('content')
<div class="bg-gray-100">
    <x-shared.page-title title="Create Story" />

    <div class="py-10">
        <section class="max-w-4xl p-6 mx-auto bg-white rounded-md shadow-md dark:bg-gray-800">
            <form action="{{ route('story.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @include('pages.story.form')
                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                    <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Save
                    </button>
                </div>
            </form>
        </section>
    </div>
</div>
@endsection