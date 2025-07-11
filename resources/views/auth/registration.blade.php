@extends('layouts.auth.login')

@section('title', 'Color Run Registration')

@section('content')
<div class="w-full min-h-screen bg-cover bg-center flex flex-col items-center justify-center px-4">
    <div class="mb-3">
        <img src="{{ asset('images/city_logo.webp') }}" alt="Color Run Logo" class="h-20 sm:h-24 object-contain">
    </div>
    <div class="w-full max-w-lg bg-white rounded-lg shadow-md p-6 sm:p-8">
        <h1 class="text-2xl sm:text-3xl font-bold text-center text-gray-800 mb-2">
            Taguig Color Run Registration
        </h1>
        <p class="text-xs sm:text-sm text-center text-gray-600 mb-5">
            Create your account to participate in the Taguig Color Run. Stay updated and manage your event info online.
        </p>

        <form action="#" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block mb-1 text-xs font-medium text-gray-700">Full Name</label>
                <input type="text" name="name" value="{{ old('name') }}"
                    class="w-full px-3 py-2 text-sm border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400">
                @error('name')
                <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label class="block mb-1 text-xs font-medium text-gray-700">Email</label>
                <input type="email" name="email" value="{{ old('email') }}"
                    class="w-full px-3 py-2 text-sm border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400">
                @error('email')
                <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label class="block mb-1 text-xs font-medium text-gray-700">Contact Number</label>
                <input type="text" name="contact" value="{{ old('contact') }}"
                    class="w-full px-3 py-2 text-sm border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400">
                @error('contact')
                <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div x-data="{ show: false }" class="relative">
                <label class="block mb-1 text-xs font-medium text-gray-700">Password</label>
                <input :type="show ? 'text' : 'password'" name="password"
                    class="w-full px-3 py-2 pr-10 text-sm border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400">
                <div class="absolute top-8 right-3 text-gray-500 cursor-pointer" @click="show = !show">
                    <svg x-show="!show" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 
                              9.542 7-1.274 4.057-5.064 7-9.542 7-4.478 
                              0-8.268-2.943-9.542-7z" />
                    </svg>
                    <svg x-show="show" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 
                              0112 19c-4.478 0-8.268-2.943-9.542-7a10.056 
                              10.056 0 012.155-3.292m3.384-2.343A9.953 
                              9.953 0 0112 5c4.478 0 8.268 2.943 
                              9.542 7a9.977 9.977 0 01-1.249 
                              2.527M15 12a3 3 0 11-6 0 3 3 0 
                              016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3l18 18" />
                    </svg>
                </div>
                @error('password')
                <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div x-data="{ show: false }" class="relative">
                <label class="block mb-1 text-xs font-medium text-gray-700">Confirm Password</label>
                <input :type="show ? 'text' : 'password'" name="password_confirmation"
                    class="w-full px-3 py-2 pr-10 text-sm border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400">
                <div class="absolute top-8 right-3 text-gray-500 cursor-pointer" @click="show = !show">
                    <svg x-show="!show" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 
                              9.542 7-1.274 4.057-5.064 7-9.542 7-4.478 
                              0-8.268-2.943-9.542-7z" />
                    </svg>
                    <svg x-show="show" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 
                              0112 19c-4.478 0-8.268-2.943-9.542-7a10.056 
                              10.056 0 012.155-3.292m3.384-2.343A9.953 
                              9.953 0 0112 5c4.478 0 8.268 2.943 
                              9.542 7a9.977 9.977 0 01-1.249 
                              2.527M15 12a3 3 0 11-6 0 3 3 0 
                              016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3l18 18" />
                    </svg>
                </div>
            </div>
            <button type="submit"
                class="w-full py-2.5 bg-blue-600 text-white text-sm font-semibold rounded-md transition duration-200 hover:scale-[1.01] hover:bg-blue-700">
                Register Now
            </button>
        </form>
        <p class="text-xs sm:text-sm text-center text-gray-600 mt-5">
            Already registered?
            <a href="#" class="text-blue-600 hover:underline font-medium">Sign In</a>
        </p>
    </div>
</div>
@endsection