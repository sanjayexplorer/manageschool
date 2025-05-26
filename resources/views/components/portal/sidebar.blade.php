@php
    $routeArray = app('request')
        ->route()
        ->getAction();
    $controllerAction = class_basename($routeArray['controller']);
    [$controller, $action] = explode('@', $controllerAction);
@endphp
@push('styles')
    <style>
       .sidebar-scroll::-webkit-scrollbar { width: 5px; } 
        .sidebar-scroll::-webkit-scrollbar-track { box-shadow: inset 0 0 5px #ffffff; border-radius: 10px; } 
        .sidebar-scroll::-webkit-scrollbar-thumb { background: #ccc; border-radius: 10px; } 
        .sidebar-scroll::-webkit-scrollbar-thumb:hover { background: #ccc; }
    </style>
@endpush
<div class="relative h-screen bg-white flex flex-col border-r">
    <!-- Close Icon -->
    <button class="absolute top-4 right-4 text-gray-400 hover:text-red-500 transition duration-300 lg:hidden"
        aria-label="Close" id="closeMobileMenuButton">
        <!-- Heroicon X (Cross icon) -->
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
    </button>

    <!-- Logo -->
    <div class="p-6 flex items-center space-x-3 border-b">
        <img src="{{asset('images/site-logo.png')}}" alt="Logo" class="h-10 w-auto">
    </div>

    <!-- Navigation Links -->
    <nav class="flex-1 mt-4 overflow-y-scroll sidebar-scroll">
      
        <ul class="space-y-2">
            <li>
                <a href="{{route('admin.dashboard')}}"
                    class="flex items-center space-x-3 px-6 py-3 text-gray-700 hover:bg-blue-100 transition @if (strcmp($controller, 'DashboardController') == 0) bg-blue-100 @endif">
                    <svg class="h-5 w-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path d="M10 2a8 8 0 018 8v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5a8 8 0 018-8z" />
                    </svg>
                    <span>Dashboard</span>
                </a>
            </li>
             <li>
                <a href="{{route('admin.classes.index')}}"
                      class="flex items-center space-x-3 px-6 py-3 text-gray-700 hover:bg-blue-100 transition @if (strcmp($controller, 'ClassController') == 0) bg-blue-100 @endif">
                    <svg class="h-5 w-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path d="M10 2a8 8 0 018 8v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5a8 8 0 018-8z" />
                    </svg>
                    <span>Assign Class</span>
                </a>
            </li>

            <li>
                <a href="{{route('admin.teachers.index')}}"
                    class="flex items-center space-x-3 px-6 py-3 text-gray-700 hover:bg-blue-100 transition @if (strcmp($controller, 'TeacherController') == 0) bg-blue-100 @endif">
                    <svg class="h-5 w-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4z" />
                    </svg>
                    <span>Teachers</span>
                </a>
            </li>
            <li>
                <a href="{{route('admin.students.index')}}"
                    class="flex items-center space-x-3 px-6 py-3 text-gray-700 hover:bg-blue-100 transition @if (strcmp($controller, 'StudentController') == 0) bg-blue-100 @endif">
                    <svg class="h-5 w-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4z" />
                    </svg>
                    <span>Students</span>
                </a>
            </li>
            <li>
                <a href="{{route('admin.attendance.index')}}"
                    class="flex items-center space-x-3 px-6 py-3 text-gray-700 hover:bg-blue-100 transition @if (strcmp($controller, 'AttendanceController') == 0) bg-blue-100 @endif">
                    <svg class="h-5 w-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4z" />
                    </svg>
                    <span>Attendance</span>
                </a>
            </li>
        </ul>
    </nav>

    <!-- Logout Button -->
    <div class="p-6 border-t">
        <form id="logout-form" action="{{route('logout')}}" method="post" class="hidden">
            @csrf
        </form>
        <a href="javascript:void(0);" onclick="document.getElementById('logout-form').submit();"
            class="flex items-center space-x-3 text-red-500 hover:text-red-600 transition">
            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                <path d="M10 3a7 7 0 00-5.24 11.64L10 21l5.24-6.36A7 7 0 0010 3z" />
            </svg>
            <span>Logout</span>
        </a>
    </div>
</div>