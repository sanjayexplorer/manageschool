@extends('layout.default')
@section('title', 'Students Attendance')
@push('styles')
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.14.1/themes/base/jquery-ui.css">
@endpush
@section('content')

    <div class="w-full p-4 lg:p-8">
        <div class="flex justify-between items-center pb-5">
            <div class="list-header w-full lg:w-1/2">
                <div class="flex items-center justify-start">
                    <a href="{{route('admin.attendance.index')}}" class="p-1"><img src="{{asset('images/arrow.svg')}}"
                            alt="Back Button"></a>
                    <h2 class="font-normal text-2xl">
                        {{ str_replace(' ', '-', Helper::getClassById($classId)) }}/Section/{{Helper::getSectionById($sectionId)}}
                    </h2>
                </div>
            </div>
            <div class="list-header hidden lg:block w-1/2">
                <form action="{{route('admin.class.students', $classId)}}" method="GET">
                    @csrf
                    <div class="flex items-end gap-2">
                        <div class="flex w-[80%] gap-2">
                            <div class="w-1/2">
                                <label for="section_id" class="text-sm text-gray-600 block">Section</label>
                                <select name="section_id" id="section_id"
                                    class="w-full p-3 border border-gray-300 rounded-md text-base text-gray-700 outline-none cursor-pointer">
                                    @foreach($sections as $section)
                                        <option value="{{ $section->id }}" @if(strcmp($sectionId, $section->id) == 0) selected
                                        @endif>Section {{ $section->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="w-1/2">
                                <label for="date" class="text-sm text-gray-600 block">Date</label>
                                <input type="text" name="date" id="date"
                                    class="w-full p-3 border border-gray-300 rounded-md text-base text-gray-700 outline-none cursor-pointer"
                                    value="{{$attendanceDate}}" readonly />
                            </div>
                        </div>
                        <div class="flex items-center gap-2 w-[20%]">
                            <button type="submit"
                                class="p-3 bg-gray-700 text-white text-base border-none rounded-md cursor-pointer transition-all duration-300 w-full sm:w-auto sm:mx-auto uppercase hover:bg-gray-600">
                                Search
                            </button>

                            <button type="reset"
                                class="p-3 bg-gray-400 text-white text-base border-none rounded-md cursor-pointer transition-all duration-300 w-full sm:w-auto sm:mx-auto uppercase hover:bg-gray-600">
                                Clear
                            </button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
        <div class="w-full rounded-md overflow-auto relative">
            <div class="w-[60%]">
                <form action="{{ route('admin.class.attendance.store') }}" method="POST" id="attendance-store">
                    @csrf
                    <table class="min-w-full table-auto" id="student_table">
                        <thead>
                            <tr>
                                <th class="px-4 py-3 text-left">Student Name</th>
                                <th class="px-4 py-3">Late</th>
                                <th class="px-4 py-3">Absent</th>
                                <th class="px-4 py-3">Present</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white" id="student-data">
                            @include('pages.portal.admin.attendance.students.partials-list')
                        </tbody>
                    </table>
                </form>
                <div id="loader" class="w-full py-6 flex justify-center items-center hidden">
                    <img src="{{ asset('images/spinner-2.gif') }}" alt="Loading..." class="w-10 h-10">
                </div>
            </div>
            <div class="w-[30%] fixed bottom-6 right-6 z-50 transition-all">
                <div class="bg-white p-4 rounded-md shadow-lg space-y-4">

                    <h2 class="text-xl font-semibold text-gray-800">Attendance Summary</h2>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-600">Total Students:</span>
                        <span id="remaining-students" class="font-bold text-gray-800">{{ count($section->students) }}</span>
                    </div>

                    <div class="flex justify-between">
                        <span class="text-green-600">Present:</span>
                        <span id="present-students" class="font-bold text-green-700">{{ $summary['present'] }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-red-600">Absent:</span>
                        <span id="absent-students" class="font-bold text-red-700">{{ $summary['absent'] }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-yellow-600">Late:</span>
                        <span id="late-students" class="font-bold text-yellow-700">{{ $summary['late'] }}</span>
                    </div>
                    <div class="text-right">
                        <button type="button" id="attendanceSave"
                            class="bg-gray-700 text-white px-4 py-2 rounded-md shadow hover:bg-[#A73335] transition-all">
                            SUBMIT
                        </button>
                    </div>

                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script src="https://code.jquery.com/ui/1.14.1/jquery-ui.js"></script>
        <script>
            let page = 2;;
            let classId = "{{ $classId }}";
            let loading = false;
            let allDataLoaded = false;

            function loadMoreStudents(autoLoad = false) {
                if (loading || allDataLoaded) return;
                loading = true;
                $('#loader').removeClass('hidden');
                $.ajax({
                    url: "{{ route('admin.class.students', parameters: ['classId' => '__id__']) }}".replace('__id__', classId) + '?page=' + page,
                    type: "GET",
                    success: function (data) {
                        if (data.trim() === '') {
                            allDataLoaded = true;
                            $(window).off('scroll');
                            if (!$('#no-more-students').length) {
                                $('#student_table').after('<div id="no-more-students" class="text-center py-4 text-gray-500">No more students found.</div>');
                            }
                        } else {
                            $('#student-data').append(data);
                            page++;
                            if (autoLoad) checkScrollable();
                        }
                    },
                    complete: function () {
                        loading = false;
                        $('#loader').addClass('hidden');
                    },
                    error: function () {
                        loading = false;
                        $('#loader').addClass('hidden');
                    }
                });
            }

            function checkScrollable() {
                if ($(document).height() <= $(window).height() + 100 && !allDataLoaded) {
                    loadMoreStudents(true);
                }
            }

            $(window).on('scroll', function () {
                if ($(window).scrollTop() + $(window).height() >= $(document).height() - 100) {
                    loadMoreStudents();
                }
            });

            $(document).ready(function () {
                checkScrollable();
                collectSummary();
            });


            new AirDatepicker('#date', {
                autoClose: true,
                dateFormat: 'yyyy-MM-dd',
                locale: {
                    days: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
                    daysShort: ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"],
                    daysMin: ["Su", "Mo", "Tu", "We", "Th", "Fr", "Sa"],
                    months: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
                    monthsShort: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                    today: "Today",
                    clear: "Clear",
                    firstDay: 0
                },
            });

            // $('.attendance_radio').on('click', function () {
            //     let row = $(this).closest('tr');
            //     let radios = row.find('input[type=radio]');
            //     let isChecked = radios.is(':checked');
            //     if (isChecked) {
            //         row.find('.error-message').empty();
            //     }
            // });

            // let hasErrors = false;
            // let firstErrorElement = null;
            // $('#student_table tbody tr').each(function () {
            //     let row = $(this);
            //     let radios = row.find('input[type=radio]');
            //     let studentId = radios.first().attr('name');
            //     let isChecked = radios.is(':checked');
            //     if (!isChecked) {
            //         hasErrors = true;
            //         if (!firstErrorElement) {
            //             firstErrorElement = row;
            //         }
            //         row.find('.error-message').html('Attendance required');
            //     } else {
            //         row.find('.error-message').empty();
            //     }
            // });

            // if (hasErrors) {
            //     if (firstErrorElement) {
            //         $("html, body").animate({
            //             scrollTop: firstErrorElement.offset().top - 150
            //         }, 500);
            //     }
            //     return false;
            // }



            function collectSummary() {
                let summary = {
                    present: 0,
                    absent: 0,
                    late: 0
                };
                $('.attendance_radio:checked').each(function () {
                    const value = $(this).val();
                    if (summary.hasOwnProperty(value)) {
                        summary[value]++;
                    }
                });
                
                $('#present-students').text(summary.present);
                $('#absent-students').text(summary.absent);
                $('#late-students').text(summary.late);


                const totalStudents = {{ count($section->students) }};
                const marked = summary.present + summary.absent + summary.late;
                const remaining = totalStudents - marked;

                $('#remaining-students').text(remaining);
            }


            let attendanceData = {};


            
            $('body').on('change','.attendance_radio', function () {
                let studentId = $(this).data('student-id');
                let status = $(this).val();
                attendanceData[studentId] = status;
                console.log('Updated attendanceData:', attendanceData);
                collectSummary();
            });


            $('#attendanceSave').on('click', function () {
                if (Object.keys(attendanceData).length === 0) {
                    console.log('No attendance data to save!');
                    return;
                }
                $.ajax({
                    url: "{{route('admin.class.attendance.store')}}",
                    type: "POST",
                    data: {
                        attendance: attendanceData,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function (data) {
                        if (data.success) {
                            console.log('Attendance saved successfully');
                        } else {
                            console.log('Something went wrong');
                        }
                    },
                    error: function (xhr) {
                        console.log(xhr.responseText);
                    }
                });
            });

        </script>
    @endpush
@endsection