@extends('layouts.home')

@section('title', 'Your Ticket')

@section('content')
<div class="w-full min-h-screen flex flex-col items-center justify-center px-4 pt-10">
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
                <p><span class="font-semibold">👤 Full Name:</span> {{ $participant->name }}</p>
                <p><span class="font-semibold">🎂 Age:</span> {{ $participant->age }}</p>
                <p><span class="font-semibold">🚻 Sex:</span> {{ $participant->sex }}</p>
                <p><span class="font-semibold">📧 Email:</span> {{ $participant->email }}</p>
                <p><span class="font-semibold">📱 Phone:</span> {{ $participant->phone }}</p>
                <p><span class="font-semibold">👕 Shirt Size:</span> {{ $participant->shirt_size }}</p>
            </div>
        </div>
        <div class="bg-white border-t px-6 py-4 text-center text-xs text-gray-500">
            Please present this ticket with your QR code at the entrance for verification. This serves as your official
            event pass.
        </div>
    </div>
</div>
@endsection