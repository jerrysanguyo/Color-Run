@extends('layouts.home')

@section('title', 'Your Ticket')

@section('content')
@include('components.alert')
<div class="w-full min-h-screen flex flex-col items-center justify-center px-4 pt-10 mb-10">
    <div class="mb-4">
        <img src="{{ asset('images/city_logo.webp') }}" alt="City of Taguig Logo" class="h-20 sm:h-24 object-contain">
    </div>
    <div class="w-full max-w-md bg-white rounded-3xl shadow-xl border border-gray-300 overflow-hidden relative">
        <div class="bg-gradient-to-r from-blue-600 to-blue-500 text-white text-center py-5 px-6 rounded-t-3xl">
            <h2 class="text-xl font-extrabold uppercase tracking-widest">🎨 Color Fun Run 2025</h2>
            <p class="text-sm mt-1 font-medium">City of Taguig – Persons with Disability Event</p>
        </div>
        <div class="bg-gray-50 p-6 space-y-5">
            <div class="flex justify-center">
                <div class="border-2 border-dashed border-blue-300 p-2 rounded-xl bg-white">
                    <img src="{{ asset($participant->qr->qr_code) }}" alt="QR Code"
                        class="w-40 h-40 object-contain rounded-lg">
                </div>
            </div>
            <div class="text-center text-gray-700 text-sm space-y-1">
                <p>
                    <i class="fas fa-user text-pink-600 mr-1"></i>
                    <span class="font-semibold">Full Name:</span> {{ $participant->name }} - <span class="uppercase">{{ $participant->participant_type }}</span>
                </p>

                <p>
                    <i class="fas fa-calendar-check text-pink-600 mr-1"></i>
                    <span class="font-semibold">Registered On:</span> {{ $participant->created_at->format('F d, Y') }}
                </p>

                <p>
                    <i class="fas fa-route text-pink-600 mr-1"></i>
                    <span class="font-semibold">Kilometer:</span> {{ $participant->kilometer }}
                </p>

                <p>
                    <i class="fas fa-shirt text-pink-600 mr-1"></i>
                    <span class="font-semibold">Shirt size:</span> {{ $participant->shirt_size }}
                </p>

                @if ($participant->companion && $participant->companion->name)
                <p>
                    <i class="fas fa-user-friends text-pink-600 mr-1"></i>
                    <span class="font-semibold">Companion Name:</span> {{ $participant->companion->name }}
                </p>
                <p>
                    <i class="fas fa-shirt text-pink-600 mr-1"></i>
                    <span class="font-semibold">Companion Shirt size:</span> {{ $participant->companion->shirt_size }}
                </p>
                @endif

                @auth
                <p>
                    <i class="fas fa-clock text-pink-600 mr-1"></i>
                    <span class="font-semibold">Time In:</span>
                    {{ optional($participant->clockIn)->created_at?->format('F d, Y - h:i A') ?? 'N/A' }}
                </p>

                <p>
                    <i class="fas fa-user-check text-pink-600 mr-1"></i>
                    <span class="font-semibold">Scanned By:</span>
                    {{ optional($participant->clockIn?->scannedBy)->name ?? 'N/A' }}
                </p>
                @endauth
            </div>
        </div>
        <div class="bg-white border-t px-6 py-4 text-center text-xs text-gray-500 space-y-2">
            <p>Please present this ticket with your QR code at the entrance for verification. This serves as your
                official event pass.</p>
            @auth
            <a href="{{ route(Auth::user()->getRoleNames()->first() . '.verifyQr.index') }}"
                class="inline-block mt-1 text-blue-600 font-semibold hover:underline transition">
                👉 Go to QR Verification
            </a>
            @else
            <a href="{{ route('welcome') }}"
                class="inline-block mt-1 text-blue-600 font-semibold hover:underline transition">
                👉 View Full Event Details
            </a>
            @endauth
        </div>
    </div>
</div>
@endsection