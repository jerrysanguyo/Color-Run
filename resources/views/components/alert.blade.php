@if (session('success'))
<div x-data="{ show: true }" x-init="setTimeout(() => show = false, 5000)" x-show="show"
    x-transition:enter="transform ease-out duration-300" x-transition:enter-start="-translate-y-8 opacity-0"
    x-transition:enter-end="translate-y-0 opacity-100" x-transition:leave="transform ease-in duration-300"
    x-transition:leave-start="translate-y-0 opacity-100" x-transition:leave-end="-translate-y-8 opacity-0"
    class="fixed top-4 left-1/2 transform -translate-x-1/2 z-50 w-[90%] sm:w-auto max-w-md rounded-md bg-green-100 border border-green-400 text-green-800 px-4 py-3 text-sm shadow-lg">
    <div class="relative pr-6">
        <span>{{ session('success') }}</span>
        <button @click="show = false" class="absolute top-1 right-1 text-green-700 hover:text-green-900">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>
</div>
@endif

@if (session('failed'))
<div x-data="{ show: true }" x-init="setTimeout(() => show = false, 5000)" x-show="show"
    x-transition:enter="transform ease-out duration-300" x-transition:enter-start="-translate-y-8 opacity-0"
    x-transition:enter-end="translate-y-0 opacity-100" x-transition:leave="transform ease-in duration-300"
    x-transition:leave-start="translate-y-0 opacity-100" x-transition:leave-end="-translate-y-8 opacity-0"
    class="fixed top-4 left-1/2 transform -translate-x-1/2 z-50 w-[90%] sm:w-auto max-w-md rounded-md bg-red-100 border border-red-400 text-red-800 px-4 py-3 text-sm shadow-lg">
    <div class="relative pr-6">
        <span>{{ session('failed') }}</span>
        <button @click="show = false" class="absolute top-1 right-1 text-red-700 hover:text-red-900">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>
</div>
@endif