@extends('layouts.home')

@section('title', 'Registered Participants')

@section('content')
@include('components.alert')
<div class="max-w-7xl mx-auto px-4 py-10 mt-10">
    <h1 class="text-2xl sm:text-3xl font-extrabold text-center text-blue-700 mb-8">
        🎽 {{ $total }} Registered Participants
    </h1>
    <div class="w-full mb-6 px-4">
        <div x-data="{ showModal: false }"
            class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mx-auto">
            <div class="relative w-full sm:w-3/4">
                <input type="text" name="search" placeholder="Search by name..." value="{{ $search }}"
                    data-search-url="{{ route('participant.search') }}"
                    class="w-full lg:w-[200px] md:w-[200px] pl-10 pr-4 py-2 border border-gray-300 rounded-lg shadow text-sm focus:outline-none focus:ring-2 focus:ring-blue-500" />
                <div class="absolute left-3 top-2.5 text-gray-400">
                    <i class="fas fa-search"></i>
                </div>
            </div>
            <div class="w-full sm:w-auto">
                <button @click="showModal = true"
                    class="w-full sm:w-auto px-4 py-2 text-sm font-medium text-white bg-pink-600 hover:bg-pink-700 rounded-lg shadow transition duration-200">
                    Edit Slot
                </button>
            </div>
            @include('dashboard.partial.slot-modal')
        </div>
    </div>

    <div class="overflow-x-auto shadow-xl rounded-lg border border-gray-200 bg-white">
        <table class="w-full table-auto sm:table-fixed text-sm text-left text-gray-700">
            <thead class="bg-blue-100 text-blue-800 text-xs font-semibold uppercase tracking-wide">
                <tr>
                    <th class="px-4 py-3 w-48">Name</th>
                    <th class="px-4 py-3 w-48">Companion</th>
                    <th class="px-4 py-3 hidden sm:table-cell">Age</th>
                    <th class="px-4 py-3 hidden sm:table-cell">Sex</th>
                    <th class="px-4 py-3 hidden md:table-cell">Email</th>
                    <th class="px-4 py-3 hidden md:table-cell">Phone</th>
                    <th class="px-4 py-3 hidden lg:table-cell">Shirt Size</th>
                    <th class="px-4 py-3 hidden lg:table-cell">Status</th>
                </tr>
            </thead>
            <tbody id="participants-tbody" class="divide-y divide-gray-200">
                @include('dashboard.partials.participants-table')
            </tbody>
        </table>
    </div>
    <div class="mt-6 flex justify-center">
        {{ $participants->links() }}
    </div>
</div>
@endsection

@push('scripts')
<script>
const searchInput = document.querySelector('input[name="search"]');
const tbody = document.querySelector('#participants-tbody');
const searchUrl = searchInput.dataset.searchUrl;

let timeout = null;

searchInput.addEventListener('input', function() {
    clearTimeout(timeout);
    timeout = setTimeout(() => {
        fetch(`${searchUrl}?search=${encodeURIComponent(this.value)}`)
            .then(response => response.json())
            .then(data => {
                tbody.innerHTML = data.table;
            })
            .catch(err => console.error('Search error:', err));
    }, 300);
});
</script>
@endpush