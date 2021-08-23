@extends('layouts.app')

@section('title', 'Welcome')

@section('content')
    <main>
        <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
            <div class="px-4 py-6 sm:px-0">
                <div class="px-4 md:block">
                    <div class="pb-8 mt-auto">
                        <div class="text-center">
                            <h1 class="text-2xl md:text-3xl mb-8 mt-16 font-serif max-w-3xl mx-auto">The Progressive <span
                                    class="text-indigo-600">Multipurpose Laravel App</span>.</h1>

                            <div class="md:max-w-2xl mx-auto">
                                <p class="text-gray-800">
                                    MLApp focusing on helping you develop your very own personal strategies.
                                </p>
                            </div>

                            <div class="mb-6 mt-12">
                                <a href="{{ route('login') }}"
                                    class="py-2 px-4 md:py-4 md:px-6 border select-none hover:bg-gray-100 bg-white rounded shadow-lg text-indigo-800">
                                    Get Started <span>&rarr;</span> </a>
                            </div>
                            {{-- global helpers usage --}}
                            {{-- <div class="mb-6 mt-12">
                                {{ change_date_format('2021-05-30', 'd-m-Y') }} <br/>
                                {{ seconds_to_hours('3600') }}
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
