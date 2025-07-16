<div x-show="showEditModal" x-cloak class="fixed inset-0 z-50 flex items-center justify-center">
    <div class="fixed inset-0 bg-black opacity-50" @click="showEditModal = false"></div>
    <div x-show="showEditModal" x-cloak x-transition:enter="transition ease-out duration-500"
        x-transition:enter-start="opacity-0 transform scale-90" x-transition:enter-end="opacity-100 transform scale-100"
        x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 transform scale-100"
        x-transition:leave-end="opacity-0 transform scale-90"
        class="bg-white rounded-xl shadow-lg z-10 p-6 w-full max-w-xl">
        <div class="flex justify-between items-center mb-4 border-b pb-2">
            <h2 class="text-xl font-bold text-pink-600">Update {{ $resource }}</h2>
            <button @click="showEditModal = false"
                class="text-gray-400 hover:text-pink-600 text-2xl leading-none">&times;</button>
        </div>
        @include('account.partial.form')
    </div>
</div>