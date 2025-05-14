@extends('layout.default')
@section('title', 'Student Details')
@section('content')
<div class="w-full max-w-[800px] p-4 lg:p-8">
    <div class="flex justify-between items-center pb-5">
            <div class="list-header">
                <div class="flex items-center justify-start">
                    <a href="{{route('admin.students.index')}}" class="p-1"><img src="{{asset('images/arrow.svg')}}" alt="Back Button"></a>
                    <h2 class="font-normal text-2xl">Student Details</h2>
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
                            <p class="text-sm text-black-600 mb-1">{{$student->first_name}}</p>
                        </div>
        
                        <div class="w-1/2 mb-4">
                            <p class="text-sm text-gray-600 mb-1">Last Name</p>
                            <p class="text-sm text-black-600 mb-1">{{$student->last_name}}</p>
                        </div>
                     </div>
        
                    <div class="flex min-w-[250px] lg:flex items-center lg:w-full">
                         <div class="w-1/2 mb-4">
                            <p class="text-sm text-gray-600 mb-1">Email</p>
                            <p class="text-sm text-black-600 mb-1">{{$student->email}}</p>
                        </div>
                            
                        <div class="w-1/2 mb-4">
                            <p class="text-sm text-gray-600 mb-1">Phone</p>
                            <p class="text-sm text-black-600 mb-1">{{$student->phone}}</p>
                        </div>
                    </div>

                    <div class="flex min-w-[250px] lg:flex items-center lg:w-full">
                        <div class="w-1/2 mb-4">
                           <p class="text-sm text-gray-600 mb-1">Gender</p>
                           <p class="text-sm text-black-600 mb-1">{{$student->gender}}</p>
                       </div>
                           
                       <div class="w-1/2 mb-4">
                           <p class="text-sm text-gray-600 mb-1">Date of Birth</p>
                           <p class="text-sm text-black-600 mb-1">{{$student->dob}}</p>
                       </div>
                   </div>
                   <div class="w-full mb-4">
                    <p class="text-sm text-gray-600 mb-1">Status</p>
                    <p class="text-sm text-black-600 mb-1">{{$student->status}}</p>
                </div>
                </div>
            </div>

            <div class="basic-information">
                <div class="mb-6 text-left">
                    <h3 class="text-[1.3rem] font-bold text-gray-700">Address</h3>
                </div>
                <div class="w-full mb-4">
                    <p class="text-sm text-gray-600 mb-1">Address line 1</p>
                    <p class="text-sm text-black-600 mb-1">{{$student->address_line_1}}</p>
                </div>
            </div>

            <div class="basic-information">
                <div class="mb-6 text-left">
                    <h3 class="text-[1.3rem] font-bold text-gray-700">Academic Details</h3>
                </div>
                <div class="w-full mb-4">
                    <div class="flex min-w-[250px] lg:flex items-center lg:w-full">
                       <div class="w-1/2 mb-4">
                           <p class="text-sm text-gray-600 mb-1">Class</p>
                           <p class="text-sm text-black-600 mb-1">{{Helper::getClassById($student->class_id)}}</p>
                       </div>
       
                       <div class="w-1/2 mb-4">
                           <p class="text-sm text-gray-600 mb-1">Section</p>
                           <p class="text-sm text-black-600 mb-1">{{Helper::getSectionById($student->section_id)}}</p>
                       </div>
                    </div>

                    <div class="flex min-w-[250px] lg:flex items-center lg:w-full">
                        <div class="w-1/2 mb-4">
                            <p class="text-sm text-gray-600 mb-1">Roll Number</p>
                            <p class="text-sm text-black-600 mb-1">{{$student->roll_number}}</p>
                        </div>
        
                        <div class="w-1/2 mb-4">
                            <p class="text-sm text-gray-600 mb-1">Admission Date</p>
                            <p class="text-sm text-black-600 mb-1">{{$student->admission_date}}</p>
                        </div>
                     </div>
               </div>
            </div>

            <!-- Address Section -->
            <div class="address-information">
                <div class="mb-6 text-left">
                    <h3 class="text-[1.3rem] font-bold text-gray-700">Guardian Details</h3>
                </div>

                <div class="w-full mb-4">
                    <div class="flex min-w-[250px] lg:flex items-center lg:w-full">
                       <div class="w-1/2 mb-4">
                           <p class="text-sm text-gray-600 mb-1">Guardian's Name</p>
                           <p class="text-sm text-black-600 mb-1">{{$student->guardian_name}}</p>
                       </div>
       
                       <div class="w-1/2 mb-4">
                           <p class="text-sm text-gray-600 mb-1">Relationship to Student</p>
                           <p class="text-sm text-black-600 mb-1">{{$student->guardian_relation}}</p>
                       </div>
                    </div>
    
                    <div class="flex min-w-[250px] lg:flex items-center lg:w-full">
                        <div class="w-1/2 mb-4">
                            <p class="text-sm text-gray-600 mb-1">Guardian's Email</p>
                            <p class="text-sm text-black-600 mb-1">{{$student->guardian_email}}</p>
                        </div>
        
                        <div class="w-1/2 mb-4">
                            <p class="text-sm text-gray-600 mb-1">Guardian's Phone</p>
                            <p class="text-sm text-black-600 mb-1">{{$student->guardian_phone}}</p>
                        </div>
                    </div>
               </div>
            </div>
    </div>
</div>
@endsection