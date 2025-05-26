@extends('layout.default')
@section('title', 'Add Bulk Upload')
@push('styles')
    <style>

    </style>
@endpush
@section('content')

    <div class="w-full p-4 lg:p-8">
        <div class="flex justify-between items-center pb-5">
            <div class="list-header">
                <div class="flex items-center justify-start">
                    <a href="{{route('admin.students.index')}}" class="p-1"><img src="{{asset('images/arrow.svg')}}"
                            alt="Back Button"></a>
                    <h2 class="font-normal text-2xl">Add Bulk Upload</h2>
                </div>
            </div>
        </div>


        <div class="w-full rounded-md bg-white">
            <div class="max-w-md p-6 shadow-md">
                <form action="{{ route('admin.students.bulk-upload.store') }}" method="POST" enctype="multipart/form-data"
                class="w-full space-y-4">
                @csrf
                <div>
                    <label for="uploadCsv" class="block text-sm font-medium text-gray-700 mb-1">Upload CSV</label>
                    <input type="file" id="uploadCsv" name="admissions"
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-md cursor-pointer focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                
                <div>
                    <button type="submit"
                    class="w-full bg-blue-600 text-white font-semibold py-2 px-4 rounded hover:bg-blue-700 transition duration-200">
                    Submit
                </button>
            </div>
        </form>
        </div>

        </div>
    </div>
    @push('scripts')
        <script>

        </script>
    @endpush
@endsection