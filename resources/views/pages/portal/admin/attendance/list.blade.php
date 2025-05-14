@extends('layout.default')

@section('title', 'Class List')

@section('content')
    <div class="w-full p-4 lg:p-8">
        <!-- Page Header -->
        <div class="flex justify-between items-center pb-5">
            <h2 class="font-semibold text-2xl text-gray-800">Class List</h2>
        </div>

        <!-- Class Table -->
        <div class="w-full max-w-[800px] rounded-md bg-white shadow-md overflow-hidden">
            <div class="table-container overflow-x-auto">
                @if(count($classes) > 0)
                    <table class="min-w-full table-auto border-separate border-spacing-0">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="text-left py-3 px-6 text-sm font-medium text-gray-600 uppercase tracking-wider border-b border-gray-200">Class Name</th>
                                <th class="text-left py-3 px-6 text-sm font-medium text-gray-600 uppercase tracking-wider border-b border-gray-200">Action</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            @foreach ($classes as $class)
                                <tr class="hover:bg-gray-50 transition">
                                    <td class="text-left py-3 px-6 text-sm text-gray-800 border-b border-gray-200">
                                        {{ $class->name }}
                                    </td>
                                    <td class="text-left py-3 px-6 text-sm text-gray-800 border-b border-gray-200">
                                        <a href="{{ route('admin.class.students', $class->id) }}"
                                            class="inline-block px-3 py-1 text-sm text-white bg-blue-500 rounded hover:bg-blue-600 transition">
                                             View
                                         </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p class="text-center text-gray-500">No classes available.</p>
                @endif
            </div>
        </div>
    </div>
@endsection
