@extends('layout.default')
@section('title', 'Teachers List')
@push('styles')
    <style>
        .dataTables_wrapper .dataTables_paginate.paging_simple_numbers {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            margin-top: 1rem;
            flex-wrap: wrap;
        }
    </style>
@endpush
@section('content')
<div class="w-full p-4 lg:p-8">
        <div class="flex justify-between items-center pb-5">
            <div class="list-header">
                <div class="flex items-center justify-start">
                    <h2 class="font-normal text-2xl">Teacher List</h2>
                </div>
            </div>
            <div class="list-header">
                <a href="{{route('admin.teachers.create')}}"
                    class="rounded-md flex items-center no-underline bg-gray-700 text-white text-sm px-3 py-2 uppercase">Add
                    New Teacher</a>
            </div>
        </div>

        <div class="w-full rounded-md">
            <div class="table-default-container">
                
                <table id="teachers-table" class="table-auto w-full">
                    <thead>
                        <tr class="border-b">
                            <th class="py-2 px-4 text-left">First Name</th>
                            <th class="py-2 px-4 text-left">Last Name</th>
                            <th class="py-2 px-4 text-left">Status</th>
                            <th class="py-2 px-4 text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
  @push('scripts')
        <script>
            $('body').on('click', '.action-delete-btn', function (e) {
                e.preventDefault();
                var that = $(this);
                const deleteUrl = $(this).data('delete-url');
                const deleteId = $(this).data('student-id');
                Swal.fire({
                    title: 'Are you sure want to delete?',
                    icon: 'error',
                    showCancelButton: true,
                    confirmButtonText: 'YES, DELETE IT!',
                    cancelButtonText: 'NO, CANCEL'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: deleteUrl,
                            type: "POST",
                            data: {
                                "_token": "{{ csrf_token() }}",
                                'id': deleteId,
                            },
                            dataType: 'json',
                            success: function (data) {
                                if (data.success) {
                                    let tableRowLen = $(that).closest('tr').parent('tbody').find('tr').length;
                                    $(that).parents("tr").remove();
                                }
                                else {
                                    console.log('Error occured');
                                }
                            },
                            error: function (data) {
                                console.log(data.message);
                            }
                        });
                    }
                });
            });

            $(document).ready(function () {
                $('#teachers-table').DataTable({
                    processing: true,
                    serverSide: true,
                    lengthChange: false,
                    info: false,
                    ajax: "{{ route('admin.teachers.data') }}",
                    language: {
                        oPaginate: {
                            sNext: `
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>`,
                            sPrevious: `
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                                    </svg>`,
                            sFirst: `
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 17l-5-5m0 0l5-5m-5 5h12" />
                                    </svg>`,
                            sLast: `
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                    </svg>`
                        }
                    },
                    columns: [
                        { data: 'first_name', name: 'first_name' },
                        { data: 'last_name', name: 'last_name' },
                        { data: 'status', name: 'status' },
                        { data: 'actions', name: 'actions', orderable: false, searchable: false }
                    ],
                    columnDefs: [
                        {
                            targets: 0, 
                            className: '!py-3'
                        },
                        {
                            targets: 1,
                            className: '!py-3'
                        },
                        {
                            targets: 2, 
                            className: '!py-3'
                        }
                    ]
                });
            });
        </script>
    @endpush
@endsection