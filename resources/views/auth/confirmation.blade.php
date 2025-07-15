@extends('layouts.auth.login')

@section('title', 'otp confirmation page')

@section('content')
@include('components.alert')
<div class="w-full min-h-screen bg-cover bg-center flex flex-col items-center justify-center px-4">
    <div class="mb-3">
        <img src="{{ asset('images/city_logo.webp') }}" alt="City Logo" class="h-20 sm:h-24 object-contain">
    </div>
    <div class="w-full max-w-md bg-white rounded-lg shadow-md p-6 sm:p-8">
        <h2 class="text-2xl sm:text-3xl font-bold text-center text-gray-800 mb-2">OTP Verification</h2>
        <p class="text-xs sm:text-sm text-center text-gray-600 mb-5">
            We've sent a one-time password (OTP) to your email. Please enter it below to verify your account.
        </p>
        <form x-data="{ loading: false }" x-on:submit="loading = true" method="POST" action="{{ route('confimation.store', $user->id) }}" class="space-y-4">
            @csrf
            <div>
                <label class="block mb-1 text-xs font-medium text-gray-700">Enter OTP</label>
                <input type="text" name="otp" maxlength="6" autocomplete="off"
                    class="w-full px-3 py-2 text-sm tracking-widest uppercase border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400"
                    placeholder="e.g., 123456">
                @error('otp')
                <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit"
                class="w-full py-2.5 bg-blue-600 text-white text-sm font-semibold rounded-md transition duration-200 hover:scale-[1.01] hover:bg-blue-700">
                Confirm OTP
            </button>
            @include('components.loading')
        </form>
        <p class="text-xs sm:text-sm text-center text-gray-600 mt-5">
            Didn't receive the code?
            <a href="#" class="text-blue-600 hover:underline font-medium">Resend OTP</a>
        </p>
    </div>
</div>
@endsection