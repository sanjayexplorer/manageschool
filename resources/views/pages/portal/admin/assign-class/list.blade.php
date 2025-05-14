@extends('layout.default')
@section('title', 'Assign Class')

@push('styles')
    <style>
        .class-card {
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .class-card:hover {
            transform: scale(1.03);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .scrollbar-thin::-webkit-scrollbar {
            height: 8px;
        }

        .scrollbar-thin::-webkit-scrollbar-thumb {
            background-color: #60a5fa;
            border-radius: 4px;
        }
    </style>
@endpush

@section('content')
    <div class="w-full h-screen bg-gray-800 p-4 lg:p-8">
        <div class="flex justify-between items-center pb-5">
            <div class="list-header">
            <h2 class="font-semibold text-2xl text-white">Assign Class</h2>
            </div>
            <div class="list-header">
            <button class="flex items-center gap-2 bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M4 6h16M4 12h8m-8 6h16"/>
                </svg>
                Auto Arrange
            </button>
        </div>
        </div>

        <div class="w-full rounded-md bg-white shadow-md overflow-hidden">
            <div class="flex gap-6 overflow-x-auto overflow-y-hidden py-6 px-4 scrollbar-thin">

                @foreach ($teachers as $teacher)
                    <div class="min-w-[280px] bg-blue-50 rounded-lg shadow-lg border border-blue-200"
                         id="teacher-{{ $teacher->id }}">
                        <h3 class="font-bold text-blue-800 text-lg mb-4 py-2 px-4 border-b border-blue-300">
                            {{ $teacher->first_name }} {{ $teacher->last_name }}
                        </h3>
                        <div class="class-list p-4 min-h-[150px] space-y-3"
                             data-teacher="{{ $teacher->id }}">
                            @foreach ($classes->where('teacher_id', $teacher->id) as $class)
                                <div class="class-card bg-white p-4 rounded shadow-md cursor-move hover:bg-blue-100 border border-gray-200"
                                     data-class-id="{{ $class->id }}">
                                    {{ $class->name }}
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach

          
                <div class="min-w-[280px] bg-pink-50 rounded-lg shadow-lg border border-pink-200">
                    <h3 class="font-bold text-pink-800 text-lg mb-4 py-2 px-4 border-b border-pink-300">Unassigned</h3>
                    <div class="class-list min-h-[150px] p-4 space-y-3" data-teacher="">
                        @foreach ($classes->whereNull('teacher_id') as $class)
                            <div class="class-card bg-white p-4 rounded shadow-md cursor-move hover:bg-pink-100 border border-gray-200"
                                 data-class-id="{{ $class->id }}">
                                {{ $class->name }}
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.class-list').each(function () {
                new Sortable(this, {
                    group: 'shared',
                    animation: 150,
                    ghostClass: 'bg-gray-200',
                    onEnd: function (evt) {
                        const classId = $(evt.item).data('class-id');
                        const newTeacherId = $(evt.to).data('teacher') || null;

                        $.ajax({
                            url: "{{ route('admin.classes.assign') }}",
                            method: "POST",
                            data: {
                                _token: "{{ csrf_token() }}",
                                class_id: classId,
                                teacher_id: newTeacherId
                            },
                            dataType: 'json',
                            success: function (response) {
                                if (response.success) {
                                    console.log('Class reassigned successfully.');
                                } else {
                                    alert('Failed to assign class.');
                                }
                            },
                            error: function () {
                                alert('Something went wrong while assigning the class.');
                            }
                        });
                    }
                });
            });
        });
    </script>
@endpush
