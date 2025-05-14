@extends('layout.default')
@section('title', 'Edit Teacher Details')
@section('content')
    <div class="w-full max-w-[800px] p-4 lg:p-8">
        <div class="flex justify-between items-center pb-5">
            <div class="list-header">
                <div class="flex items-center justify-start">
                    <a href="{{route('admin.teachers.index')}}" class="p-1"><img src="{{asset('images/arrow.svg')}}"
                            alt="Back Button"></a>
                    <h2 class="font-normal text-2xl">Edit Teacher Details</h2>
                </div>
            </div>
        </div>
        <div class="w-full rounded-md">
            <form action="{{route('admin.teachers.update', $teacher->id)}}" method="post" class="flex flex-col"
                onsubmit="return checkForm();">
                @csrf
                <input type="hidden" id="teacherPhotoId" name="teacherPhotoId" value="">
                <!-- Basic Information Section -->
                <div class="basic-information">
                    <div class="mb-6 text-left">
                        <h3 class="text-[1.3rem] font-bold text-gray-700">Basic Information</h3>
                    </div>

                    <div class="flex flex-col md:flex-row justify-between gap-[10px]">
                        <!-- First Name -->
                        <div class="input-group w-full md:w-1/2 mb-4">
                            <label for="first_name" class="text-sm text-gray-600 mb-2 block">First Name<span
                                    class="mandatory">*</span></label>
                            <input type="text" name="first_name" id="first_name"
                                class="w-full p-3 border border-gray-300 rounded-md text-base text-gray-700 outline-none required_fields"
                                value="{{ old('first_name', $teacher->first_name) }}"
                                data-error-msg="First name is required." />
                            <span class="scrollForReq error-message"></span>
                        </div>
                        <!-- First Name -->
                        <div class="input-group w-full md:w-1/2 mb-4">
                            <label for="last_name" class="text-sm text-gray-600 mb-2 block">Last Name<span
                                    class="mandatory">*</span></label>
                            <input type="text" name="last_name" id="last_name"
                                class="w-full p-3 border border-gray-300 rounded-md text-base text-gray-700 outline-none required_fields"
                                value="{{ old('last_name', $teacher->last_name) }}"
                                data-error-msg="Last name is required." />
                            <span class="scrollForReq error-message"></span>
                        </div>
                    </div>

                    <div class="flex flex-col md:flex-row justify-between gap-[10px]">
                        <!-- Email -->
                        <div class="input-group w-full md:w-1/2 mb-4">
                            <label for="email" class="text-sm text-gray-600 mb-2 block">Email</label>
                            <input type="text" name="email" id="email"
                                class="w-full p-3 border border-gray-300 rounded-md text-base text-gray-700 outline-none"
                                value="{{ old('email', $teacher->email) }}" />
                        </div>
                        <!-- Phone -->
                        <div class="input-group w-full md:w-1/2 mb-4">
                            <label for="phone" class="text-sm text-gray-600 mb-2 block">Phone<span
                                    class="mandatory">*</span></label>
                            <input type="text" name="phone" id="phone"
                                class="w-full p-3 border border-gray-300 rounded-md text-base text-gray-700 outline-none required_fields phone_validation"
                                value="{{ old('phone', $teacher->phone) }}" data-error-msg="Phone is required." />
                            <span class="scrollForReq error-message"></span>
                        </div>
                    </div>
                    <div class="flex flex-col md:flex-row justify-between gap-[10px]">
                        <!-- Gender -->
                        <div class="input-group w-full md:w-1/2 mb-4">
                            <label for="gender" class="text-sm text-gray-600 mb-2 block">Gender<span
                                    class="mandatory">*</span></label>
                            <select name="gender" id="gender"
                                class="w-full p-3 border border-gray-300 rounded-md text-base text-gray-700 outline-none required_fields"
                                data-error-msg="Gender is required.">
                                <option value="" disabled {{ old('gender', $teacher->gender) == '' ? 'selected' : '' }}>Select
                                    Gender</option>
                                <option value="male" {{ old('gender', $teacher->gender) == 'male' ? 'selected' : '' }}>Male
                                </option>
                                <option value="female" {{ old('gender', $teacher->gender) == 'female' ? 'selected' : '' }}>
                                    Female</option>
                                <option value="other" {{ old('gender', $teacher->gender) == 'other' ? 'selected' : '' }}>Other
                                </option>
                            </select>

                            <span class="scrollForReq error-message"></span>
                        </div>
                        <!-- Phone -->
                        <div class="input-group w-full md:w-1/2 mb-4">
                            <label for="date_of_birth" class="text-sm text-gray-600 mb-2 block">Date of Birth<span
                                    class="mandatory">*</span></label>
                            <input type="text" name="date_of_birth" id="date_of_birth"
                                class="w-full p-3 border border-gray-300 rounded-md text-base text-gray-700 outline-none required_fields"
                                value="{{ old('date_of_birth', $teacher->date_of_birth) }}"
                                data-error-msg="Date of birth is required." readonly />
                            <span class="scrollForReq error-message"></span>
                        </div>
                    </div>

                    <div class="input-group w-full mb-4">
                        <label for="gender" class="text-sm text-gray-600 mb-2 block">Status<span
                                class="mandatory">*</span></label>
                        <select name="status" id="status"
                            class="w-full p-3 border border-gray-300 rounded-md text-base text-gray-700 outline-none required_fields"
                            data-error-msg="Status is required.">
                            <option value="" selected  {{ old('status', $teacher->status) == '' ? 'selected' : '' }}>Select Status</option>
                            <option value="active" {{ old('status', $teacher->status) == 'active' ? 'selected' : '' }}>Active
                            </option>
                            <option value="inactive" {{ old('status', $teacher->status) == 'inactive' ? 'selected' : '' }}>Inctive
                            </option>
                        </select>
                        <span class="scrollForReq error-message"></span>
                    </div>
                </div>

                <div class="basic-information">
                    <div class="mb-6 text-left">
                        <h3 class="text-[1.3rem] font-bold text-gray-700">Academic Details</h3>
                    </div>
                    <div class="flex flex-col md:flex-row justify-between gap-[10px]">
                        <!-- Roll Number -->
                        <div class="input-group w-full md:w-1/2 mb-4">
                            <label for="qualification" class="text-sm text-gray-600 mb-2 block">Qualification<span
                                    class="mandatory">*</span></label>
                            <input type="text" name="qualification" id="qualification"
                                class="w-full p-3 border border-gray-300 rounded-md text-base text-gray-700 outline-none required_fields"
                                value="{{ old('qualification', $teacher->qualification) }}"
                                data-error-msg="Qualification is required." />
                            <span class="scrollForReq error-message"></span>
                        </div>

                        <!-- Admission Date -->
                        <div class="input-group w-full md:w-1/2 mb-4">
                            <label for="specialization" class="text-sm text-gray-600 mb-2 block">Specialization<span
                                    class="mandatory">*</span></label>
                            <input type="text" name="specialization" id="specialization"
                                class="w-full p-3 border border-gray-300 rounded-md text-base text-gray-700 outline-none required_fields"
                                value="{{ old('specialization', $teacher->specialization) }}"
                                data-error-msg="Specialization is required." />
                            <span class="scrollForReq error-message"></span>
                        </div>
                    </div>
                </div>

                <div class="w-full">
                    <!-- Submit Button -->
                    <button type="submit"
                        class="p-[0.95rem] bg-gray-700 text-white text-base border-none rounded-md cursor-pointer transition-all duration-300 mt-4 mb-4 w-full uppercase">UPDATE</button>
                </div>
            </form>
        </div>
    </div>
    <!-- Scripts -->
    @push('scripts')

        <script>
            // Validate form start
            function checkForm() {
                let hasErrors = false;
                let firstErrorElement = null;
                $(".required_fields").each(function () {
                    let $this = $(this);
                    let value = $this.val().trim();
                    let errorMessage = $this.data("error-msg");
                    let errorContainer = $this.closest('.input-group').find('.error-message');
                    if (!value) {
                        hasErrors = true;
                        if (!firstErrorElement) {
                            firstErrorElement = $this;
                        }
                        errorContainer.html(errorMessage);
                    } else {
                        errorContainer.empty();
                    }
                    // Mobile number validation (if applicable)
                    if ($this.hasClass('phone_validation')) {
                        let inputValue = $this.val().trim();
                        if (!inputValue) {
                            hasErrors = true;
                            errorContainer.html("Phone number is required");
                        } else if (inputValue.length < 10) {
                            hasErrors = true;
                            errorContainer.show().html("Phone number must be at least 10 digits");
                        } else {
                            errorContainer.empty();
                        }
                    }
                });

                if (hasErrors) {
                    if (firstErrorElement) {
                        $("html, body").animate({
                            scrollTop: firstErrorElement.offset().top - 150
                        }, 500);
                    }
                    return false;
                }
                return true;
            }
            // Validate form end

            $('.required_fields').on('keyup', function () {
                let $inputGroup = $(this).closest('.input-group');
                let errorMessage = $inputGroup.find('.error-message');
                let errorIcon = $inputGroup.find('.error');

                if (!$(this).val().trim()) {
                    errorMessage.text($(this).data("error-msg")).show();
                    errorIcon.hide();
                } else {
                    errorMessage.hide();
                    errorIcon.hide();
                }
            });

            // new AirDatepicker('#');
            new AirDatepicker('#dob', {
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


            // new AirDatepicker('#');
            new AirDatepicker('#admission_date', {
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



            var classesData = @json($classes);

            $('#class_id').on('change', function () {
                var classId = $(this).val();

                var selectedClass = classesData.find(function (classItem) {
                    return classItem.id == classId;
                });

                $('#section_id').empty();

                if (selectedClass && selectedClass.sections.length > 0) {
                    selectedClass.sections.forEach(function (section) {
                        $('#section_id').append(
                            '<option value="' + section.id + '">Section ' + section.name + '</option>'
                        );
                    });
                } else {
                    $('#section_id').append('<option value="">No sections available</option>');
                }
            });

        </script>
    @endpush
@endsection