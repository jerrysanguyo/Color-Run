@extends('layouts.home')

@section('title', 'Enter Your Email')

@section('content')
<div class="w-full min-h-screen flex flex-col items-center justify-center px-4">
    <div class="mb-3">
        <img src="{{ asset('images/city_logo.webp') }}" alt="City of Taguig Logo" class="h-20 sm:h-24 object-contain">
    </div>
    <div class="w-full max-w-md bg-white border border-gray-200 shadow-md rounded-xl p-6 sm:p-8">
        <h2 class="text-2xl font-bold text-center text-gray-800 mb-2">Enter Your Email</h2>
        <p class="text-sm text-center text-gray-600 mb-6">
            Please provide your email address to continue.
        </p>
        <form x-data="{ loading: false }" x-on:submit="loading = true" method="POST"
            action="{{ route('generateQr.check') }}" class="space-y-4">
            @csrf
            <div>
                <label class="block mb-1 text-sm font-medium text-gray-700">Email Address</label>
                <input type="email" name="email" value="{{ old('email') }}"
                    class="w-full px-3 py-2 text-sm border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400 {{ $errors->has('email') ? 'border-red-500' : '' }}"
                    placeholder="example@domain.com" required>
                @error('email')
                <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="text-center">
                <button type="submit"
                    class="w-full py-2.5 bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold rounded-md transition">
                    Continue
                </button>
            </div>
            @include('components.loading')
        </form>
        <p class="text-xs sm:text-sm text-center text-gray-600 mt-5">
            <a href="{{ route('welcome') }}" class="text-blue-600 hover:underline font-medium">Back to Welcome</a>
        </p>
    </div>
</div>
@endsection