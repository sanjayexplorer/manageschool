@extends('layout.default')
@section('title', 'Teacher Details')
@section('content')
<div class="w-full max-w-[800px] p-4 lg:p-8">
    <div class="flex justify-between items-center pb-5">
            <div class="list-header">
                <div class="flex items-center justify-start">
                    <a href="{{route('admin.teachers.index')}}" class="p-1"><img src="{{asset('images/arrow.svg')}}" alt="Back Button"></a>
                    <h2 class="font-normal text-2xl">Teacher Details</h2>
                </div>
            </div>
    </div>
    <div class="w-full rounded-md">
            <!-- Basic Information Section -->
            <div class="basic-information">
                <div class="mb-6 text-left">
                    <h3 class="text-[1.3rem] font-bold text-gray-700">Basic Information</h3>
                </div>
                <div class="w-full mb-4">
                     <div class="flex min-w-[250px] lg:flex items-center lg:w-full">
                        <div class="w-1/2 mb-4">
                            <p class="text-sm text-gray-600 mb-1">First Name</p>
                            <p class="text-sm text-black-600 mb-1">{{$teacher->first_name}}</p>
                        </div>
        
                        <div class="w-1/2 mb-4">
                            <p class="text-sm text-gray-600 mb-1">Last Name</p>
                            <p class="text-sm text-black-600 mb-1">{{$teacher->last_name}}</p>
                        </div>
                     </div>
        
                    <div class="flex min-w-[250px] lg:flex items-center lg:w-full">
                         <div class="w-1/2 mb-4">
                            <p class="text-sm text-gray-600 mb-1">Email</p>
                            <p class="text-sm text-black-600 mb-1">{{$teacher->email}}</p>
                        </div>
                            
                        <div class="w-1/2 mb-4">
                            <p class="text-sm text-gray-600 mb-1">Phone</p>
                            <p class="text-sm text-black-600 mb-1">{{$teacher->phone}}</p>
                        </div>
                    </div>

                    <div class="flex min-w-[250px] lg:flex items-center lg:w-full">
                        <div class="w-1/2 mb-4">
                           <p class="text-sm text-gray-600 mb-1">Gender</p>
                           <p class="text-sm text-black-600 mb-1">{{$teacher->gender}}</p>
                       </div>
                           
                       <div class="w-1/2 mb-4">
                           <p class="text-sm text-gray-600 mb-1">Date of Birth</p>
                           <p class="text-sm text-black-600 mb-1">{{$teacher->date_of_birth}}</p>
                       </div>
                   </div>
                   <div class="w-full mb-4">
                    <p class="text-sm text-gray-600 mb-1">Status</p>
                    <p class="text-sm text-black-600 mb-1">{{$teacher->status}}</p>
                </div>
                </div>
            </div>


            <div class="basic-information">
                <div class="mb-6 text-left">
                    <h3 class="text-[1.3rem] font-bold text-gray-700">Academic Details</h3>
                </div>
                <div class="w-full mb-4">
                    <div class="flex min-w-[250px] lg:flex items-center lg:w-full">
                       <div class="w-1/2 mb-4">
                           <p class="text-sm text-gray-600 mb-1">Qualification</p>
                           <p class="text-sm text-black-600 mb-1">{{$teacher->qualification}}</p>
                       </div>
       
                       <div class="w-1/2 mb-4">
                           <p class="text-sm text-gray-600 mb-1">Specialization</p>
                           <p class="text-sm text-black-600 mb-1">{{$teacher->specialization}}</p>
                       </div>
                    </div>
               </div>
            </div>
    </div>
</div>
@endsection