@extends('layout.default')
@section('title', 'Student List')
@section('content')

    <div class="w-full p-4 lg:p-8">
        <div class="flex justify-between items-center pb-5">
            <div class="list-header">
                <div class="flex items-center justify-start">
                    <h2 class="font-normal text-2xl">Student List</h2>
                </div>
            </div>
            <div class="list-header">
                <a href="{{route('admin.students.create')}}"
                    class="rounded-md flex items-center no-underline bg-gray-700 text-white text-sm px-3 py-2 uppercase">Add
                    New Student</a>
            </div>
        </div>

        <!-- Student List Table -->
        <div class="w-full rounded-md">
            <table class="w-full table-auto border-collapse" id="student_table">
                <thead>
                    <tr class="border-b">
                        <th class="py-2 px-4 text-left">Name</th>
                        <th class="py-2 px-4 text-left">Status</th>
                        <th class="py-2 px-4 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody id="student-data">
                    @include('pages.portal.admin.student.partials-list')
                </tbody>
            </table>
            <div id="loader" style="display: none; text-align: center;">Loading...</div>
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

            let page = 1;
            let loading = false;
            let allDataLoaded = false;

            function loadMoreStudents(autoLoad = false) {
                if (loading || allDataLoaded) return;
                loading = true;
                $('#loader').show();
                page++;
                $.ajax({
                    url: "{{ route('admin.students.index') }}?page=" + page,
                    type: "GET",
                    success: function (data) {
                        if (data.trim() === '') {
                            allDataLoaded = true;
                            $(window).off('scroll');
                            $('#student_table').after('<div class="text-center py-4 text-gray-500">No more students found.</div>');
                        } else {
                            $('#student-data').append(data);
                            if (autoLoad) {
                                checkScrollable();
                            }
                        }
                    },
                    complete: function () {
                        loading = false;
                        $('#loader').hide();
                    }
                });
            }


            function checkScrollable() {
                if ($(document).height() <= $(window).height() + 100 && !allDataLoaded) {
                    loadMoreStudents(true);
                }
            }

            $(window).scroll(function () {
                if ($(window).scrollTop() + $(window).height() >= $(document).height() - 100) {
                    loadMoreStudents();
                }
            });

            $(document).ready(function () {
                checkScrollable();
            });
        </script>
    @endpush
@endsection