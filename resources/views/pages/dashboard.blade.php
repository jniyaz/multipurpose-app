@extends('layouts.app')

@section('content')
<x-shared.page-title title="Dashboard" />
<main>
  <div class="flex justify-center h-full">
    <div class="max-w-xl w-full md:mt-24 mx-2">
      <div class="bg-white md:shadow-md mb-4 border md:border-0">
        <div class="bg-gray-100 px-4 py-4 text-center border-t-4 border-indigo-500 md:rounded-t">
          <h1 class="font-semibold">
            Welcome {{ auth()->user()->name }},
          </h1>
        </div>
  
        <div class="pt-6 px-4 md:px-8 pb-8 border-t">
          <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras tincidunt semper mauris et feugiat. Morbi ornare eleifend tellus, semper tincidunt augue tincidunt et.
          </p>
        </div>
      </div>
    </div>
  </div>
</main>
@endsection
