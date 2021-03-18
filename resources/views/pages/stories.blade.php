@extends('layouts.app')

@section('content')
    <main class="bg-gray-100">
        <div class="flex flex-col">
            <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
                @foreach ($stories as $story)
                    <x-stories.hcard :story="$story" />
                @endforeach
            </div>
        </div>
    </main>
@endsection
