@extends('layouts.home')

@section('title', 'City of Taguig Color Fun Run')

@section('content')
@include('components.alert')

<div class="max-w-7xl mx-auto mb-10 px-4">
    <div class="bg-white shadow-lg rounded-xl p-6 sm:p-8 border-l-4 border-blue-600 relative">
        <div class="text-center">
            <h1 class="text-2xl sm:text-3xl font-extrabold text-gray-800 mb-2 uppercase">
                🎨 Color Fun Run for Taguig Persons with Disability
            </h1>
            <p class="text-sm sm:text-base font-semibold text-yellow-600 mb-1">
                🌟 Join us in celebrating the 47th National Disability Rights (NDR) Week! 🌟
            </p>
            <p class="italic text-sm text-gray-700 mb-4">
                Theme: <span class="font-semibold">"Innovation for Inclusion: Building Inclusive Communities
                    Together"</span>
            </p>
            <p class="text-gray-700 text-sm sm:text-base mb-4">
                Let’s come together to promote physical and mental wellness for everyone because disability doesn’t
                define a
                person’s value.
                This celebration is all about creating awareness, embracing diversity, and inspiring communities to be
                more
                inclusive and empowering for all.
            </p>
        </div>
        <div class="flex justify-center px-4">
            <div class="max-w-lg bg-gray-50 rounded-md p-4 mb-5 border border-gray-200 lg:text-left text-center w-full">
                <p class="font-semibold text-blue-700 mb-1">📍 Location:</p>
                <p class="text-gray-800 text-sm">
                    <a href="https://www.google.com/maps/search/?api=1&query=TLC+Park,+Laguna+Lake+Highway,+Lower+Bicutan,+Taguig"
                        target="_blank" rel="noopener noreferrer" class="text-blue-600 hover:underline">
                        TLC Park, Laguna Lake Highway/C6 Road, Brgy. Lower Bicutan, Taguig
                    </a>
                </p>
                <p class="font-semibold text-blue-700 mt-3 mb-1">📅 Date:</p>
                <p class="text-gray-800 text-sm">August 3, 2025 (Sunday)</p>
                <p class="font-semibold text-blue-700 mt-3 mb-1">⏰ Time:</p>
                <p class="text-gray-800 text-sm">5:00 AM</p>
                <div class="mt-5 text-sm text-gray-700 bg-yellow-50 border border-yellow-200 rounded-md p-3">
                    <p>
                        Kindly note that all participants must present their unique QR code at the entrance to gain
                        access to the event area.
                        To obtain your QR code, please complete your registration using the button below. Thank you for
                        your cooperation.
                    </p>
                </div>
                <div class="mt-5 text-center">
                    <a href="#"
                        class="inline-block bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold px-6 py-2 rounded-md shadow transition duration-300">
                        Register for this Event
                    </a>
                </div>
            </div>
        </div>
        <div class="mb-4">
            <h3 class="font-bold text-green-700 mb-2">✅ REQUIREMENTS:</h3>
            <ul class="list-disc list-inside text-gray-700 text-sm space-y-1">
                <li><span class="font-semibold">PWD ID</span> or <span class="font-semibold">Valid ID</span> na may
                    address na Taguig.</li>
                <li><span class="font-semibold">Medical Certificate</span> para sa may medical conditions (high blood,
                    heart conditions, asthma, etc.) <span class="italic text-gray-500">OPTIONAL</span></li>
            </ul>
        </div>
        <div class="mb-4">
            <h3 class="font-bold text-pink-600 mb-2">📌 MGA PAALALA:</h3>
            <ul class="list-decimal list-inside text-gray-700 text-sm space-y-1">
                <li>Matulog at kumain nang sapat bago ang araw ng aktibidad.</li>
                <li>Magdala ng towel, tubig at pamalit na t-shirt.</li>
                <li>Pumunta nang maaga para sa registration at paghahanda bago ang aktibidad.</li>
                <li>Magmas na rin gamit ang tamang lakad at kalmadong kilos.</li>
                <li>Sumunod sa mga organizer, security at safety staff para sa ating seguridad.</li>
                <li>Lumapit sa mga First Aid Station para sa mga pangangailangang medikal.</li>
                <li>Uminom ng tubig sa mga water drinking stations kung nangangailangan.</li>
                <li>Itapon ang basura sa tamang lalagyan. Panatilihin nating malinis at maayos ang ating event site.
                </li>
            </ul>
        </div>
        <p class="mt-6 text-center text-pink-600 font-semibold text-sm sm:text-base">
            🎉 Let’s celebrate together and have fun! 🎉
        </p>
    </div>
</div>
@endsection