@extends('layouts.home')

@section('title', 'Registered Participants')

@section('content')
<div
    class="w-full bg-white p-8 rounded-lg shadow-lg border border-gray-200 overflow-auto max-h-[85vh] min-h-[85vh] mt-20">
    <div class="flex justify-between items-center mb-5 overflow-auto">
        <h1 class="text-3xl font-bold mb-2 text-center text-gray-800">{{ $page_title }} records</h1>
        @unless ($resource === 'feedback')
        <div x-data="{ showModal: false }">
            <button @click="showModal = true"
                class="px-5 py-2 text-white bg-pink-600 rounded-lg hover:bg-pink-700 hover:text-white border border-pink-700 transition-colors">
                <i class="fa-solid fa-plus"></i> Add {{ $page_title }}
            </button>
            @include('account.create')
        </div>
        @endunless
    </div>

    @include('components.alert')
    <table class="min-w-full border border-gray-200 shadow-lg rounded-lg" id="{{ $resource }}-table">
        <thead class="bg-pink-600">
            <tr class="text-white uppercase text-md leading-normal">
                @foreach ($columns as $column)
                <th class="py-3 px-4 cursor-pointer">{{ $column }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody class="text-gray-700 text-sm font-normal text-center">
            @foreach ($data as $record)
            <tr class="border border-gray-200 hover:bg-pink-50 transition-colors">
                <td class="py-2 px-4">{{ $record->id ?? '' }}</td>
                <td class="py-2 px-4">{{ $record->name ?? '' }}</td>
                <td class="py-2 px-4">
                    <div class="inline-flex items-center space-x-2">
                        <div x-data="{ showEditModal: false }">
                            <button @click="showEditModal = true"
                                class="inline-block p-2 bg-blue-100 text-blue-500 hover:bg-blue-200 hover:text-blue-700 rounded transition-colors"
                                title="Edit">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </button>
                            @include('account.edit')
                        </div>
                        <div x-data="{ showDeleteModal: false }">
                            <button @click="showDeleteModal = true"
                                class="inline-block p-2 bg-red-100 text-red-500 hover:bg-red-200 hover:text-red-700 rounded transition-colors"
                                title="Delete">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                            @include('account.destroy')
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
@push('scripts')
<script>
$(document).ready(function() {
    $('#{{ $resource }}-table').DataTable({
        processing: true,
        serverSide: false,
        pageLength: 10,
        order: [
            [0, 'desc']
        ],
        dom: '<"flex justify-between items-center mb-2"lf>rt<"flex justify-between items-center mt-4"ip>',
        initComplete: function() {
            const $searchInput = $('div.dataTables_filter input');
            $searchInput.addClass(
                'ml-2 px-4 py-1 border border-gray-300 rounded focus:outline-none focus:ring focus:ring-pink-500 focus:ring-opacity-50'
            );
            const $lengthSelect = $('div.dataTables_length select');
            $lengthSelect.addClass(
                'px-4 py-1 my-2 border border-gray-300 rounded focus:outline-none focus:ring focus:ring-pink-500 focus:ring-opacity-50'
            );
        },
        drawCallback: function() {
            const $paginateButtons = $('div.dataTables_paginate .paginate_button');
            $paginateButtons.addClass(
                'px-4 py-2 text-black rounded-lg hover:bg-pink-100 disabled:opacity-50 disabled:cursor-not-allowed transition-colors'
            );
            const $currentPage = $('div.dataTables_paginate .paginate_button.current');
            $currentPage.removeClass('bg-gray-700 text-white');
            $currentPage.addClass(
                'bg-pink-600 text-white px-4 m-2 py-2 rounded-lg transition-colors hover:bg-pink-700'
            );
        }
    });
});
</script>
@endpush