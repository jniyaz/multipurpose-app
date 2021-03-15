@extends('layouts.app')

@section('content')
    <div class="py-10">
        <section class="max-w-4xl p-6 mx-auto bg-white rounded-md shadow-md dark:bg-gray-800">
            <h2 class="text-lg font-semibold text-gray-700 capitalize dark:text-white">Account settings</h2>
            
            <form method="POST" action="{{ route('profile.update', [$profile]) }}">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
                    
                    <div>
                        <label class="text-gray-700 dark:text-gray-200" for="username">Name</label>
                        <input name="name" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:ring-indigo-500 focus:border-indigo-500" 
                        value="{{ old('name', $profile->user->name) }}" placeholder="Name">
                    </div>

                    <div>
                        <label class="text-gray-700 dark:text-gray-200" for="emailAddress">Email Address</label>
                        <input name="email" readonly type="email" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:ring-indigo-500 focus:border-indigo-500" 
                        value="{{ old('email', $profile->user->email) }}">
                    </div>

                    <div>
                        <label class="text-gray-700 dark:text-gray-200" for="phone">Phone</label>
                        <input name="phone" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:ring-indigo-500 focus:border-indigo-500" 
                        value="{{ old('phone', $profile->phone) }}" placeholder="Phone">
                    </div>

                    <div>
                        <label class="text-gray-700 dark:text-gray-200" for="website">Website</label>
                        <div class="mt-1 flex rounded-md shadow-sm">
                            <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">
                                http://
                            </span>
                            <input type="text" name="website" id="website" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" 
                            placeholder="www.example.com" value="{{ old('website', $profile->website) }}">
                        </div>
                    </div>

                    <div>
                        <label class="text-gray-700 dark:text-gray-200" for="address">Address</label>
                        <textarea id="address" name="address" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md" 
                        placeholder="Address">{{ old('address', $profile->address) }}</textarea>
                    </div>

                    {{-- <div>
                        <label class="text-gray-700 dark:text-gray-200" for="username">Bio</label>
                        <textarea id="about" name="about" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="About me">{{ $profile->website }}</textarea>
                    </div> --}}
                   
                </div>

                <div class="flex justify-end mt-6">
                    <button class="px-6 py-2 leading-5 text-white transition-colors duration-200 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">Save</button>
                </div>

            </form>
        </section>
    </div>
@endsection