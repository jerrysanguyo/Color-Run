@extends('layouts.home')

@section('title', 'City of Taguig Color Fun Run')

@section('content')
@include('components.alert')
<div class="w-full min-h-screen bg-cover bg-center flex flex-col items-center justify-center px-4 mb-10">
    <div class="mb-3">
        <img src="{{ asset('images/city_logo.webp') }}" alt="Color Run Logo" class="h-20 sm:h-24 object-contain">
    </div>
    <div class="w-full max-w-lg bg-white rounded-lg shadow-md p-6 sm:p-8">
        <h1 class="text-2xl sm:text-3xl font-bold text-center text-gray-800 mb-2">
            Participant Registration
        </h1>
        <p class="text-xs sm:text-sm text-center text-gray-600 mb-5">
            Fill out the form below to register for the Color Fun Run event.<br>
            <span class="text-pink-600 font-medium">Note:</span> Adding a companion counts as <strong>+1 slot</strong>
        </p>

        <form x-data="{ loading: false }" x-on:submit="loading = true" action="{{ route('participants.store') }}"
            method="POST" class="space-y-4 relative"> @csrf
            <div>
                <label class="block mb-1 text-xs font-medium text-gray-700">Full Name</label>
                <input type="text" name="name" value="{{ old('name') }}"
                    class="w-full px-3 py-2 text-sm border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400 {{ $errors->has('name') ? 'border-red-500' : '' }}">
                @error('name')
                <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label class="block mb-1 text-xs font-medium text-gray-700">Age</label>
                <input type="number" name="age" value="{{ old('age') }}" min="1"
                    class="w-full px-3 py-2 text-sm border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400 {{ $errors->has('age') ? 'border-red-500' : '' }}">
                @error('age')
                <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label class="block mb-1 text-xs font-medium text-gray-700">Sex</label>
                <select name="sex"
                    class="w-full px-3 py-2 text-sm border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400 {{ $errors->has('sex') ? 'border-red-500' : '' }}">
                    <option value="">Select</option>
                    <option value="Male" {{ old('sex') == 'Male' ? 'selected' : '' }}>Male</option>
                    <option value="Female" {{ old('sex') == 'Female' ? 'selected' : '' }}>Female</option>
                    <option value="Prefer not to say" {{ old('sex') == 'Prefer not to say' ? 'selected' : '' }}>Prefer
                        not to say</option>
                </select>
                @error('sex')
                <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label class="block mb-1 text-xs font-medium text-gray-700">Email</label>
                <input type="email" name="email" value="{{ old('email') }}"
                    class="w-full px-3 py-2 text-sm border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400 {{ $errors->has('email') ? 'border-red-500' : '' }}">
                @error('email')
                <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label class="block mb-1 text-xs font-medium text-gray-700">Phone Number</label>
                <input type="text" name="phone" value="{{ old('phone') }}" maxlength="11"
                    class="w-full px-3 py-2 text-sm border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400 {{ $errors->has('phone') ? 'border-red-500' : '' }}">
                @error('phone')
                <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label class="block mb-1 text-xs font-medium text-gray-700">Shirt Size</label>
                <select name="shirt_size"
                    class="w-full px-3 py-2 text-sm border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400 {{ $errors->has('shirt_size') ? 'border-red-500' : '' }}">
                    <option value="">Select size</option>
                    <option value="XS" {{ old('shirt_size') == 'XS' ? 'selected' : '' }}>Extra small</option>
                    <option value="S" {{ old('shirt_size') == 'S' ? 'selected' : '' }}>Small</option>
                    <option value="M" {{ old('shirt_size') == 'M' ? 'selected' : '' }}>Medium</option>
                    <option value="L" {{ old('shirt_size') == 'L' ? 'selected' : '' }}>Large</option>
                    <option value="XL" {{ old('shirt_size') == 'XL' ? 'selected' : '' }}>Extra Large</option>
                    <option value="XXL" {{ old('shirt_size') == 'XXL' ? 'selected' : '' }}>Double Extra Large</option>
                    <option value="XXXL" {{ old('shirt_size') == 'XXXL' ? 'selected' : '' }}>Triple Extra Large</option>
                </select>
                @error('shirt_size')
                <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div x-data="{ hasCompanion: {{ old('has_companion') ? 'true' : 'false' }} }" class="space-y-2">
                <input type="hidden" name="has_companion" value="0">
                <label class="flex items-center space-x-2 text-sm text-gray-700">
                    <input type="checkbox" x-model="hasCompanion" name="has_companion" value="1"
                        {{ old('has_companion') ? 'checked' : '' }} class="text-pink-600">
                    <span>Do you have a companion?</span>
                </label>

                <div x-show="hasCompanion" x-transition>
                    <label class="block mb-1 text-xs font-medium text-gray-700">Companion Name</label>
                    <input type="text" name="companion_name" value="{{ old('companion_name') }}"
                        class="w-full px-3 py-2 text-sm border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400 {{ $errors->has('companion_name') ? 'border-red-500' : '' }}">
                    @error('companion_name')
                    <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div x-data="{ showConsentModal: false }">
                <button type="button" @click="showConsentModal = true"
                    class="w-full py-2.5 bg-blue-600 text-white text-sm font-semibold rounded-md transition duration-200 hover:scale-[1.01]  hover:bg-pink-700">
                    Submit Registration
                </button>
                @include('Participants.partial.consent')
                @include('components.loading')
            </div>
        </form>
        <p class="text-xs sm:text-sm text-center text-gray-600 mt-5">
            Already have a QR code?
            <a href="{{ route('generateQr.index') }}" class="text-blue-600 hover:underline font-medium">Generate
                again</a>
        </p>
    </div>
</div>
@endsection