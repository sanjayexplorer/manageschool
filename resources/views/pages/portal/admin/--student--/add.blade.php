@extends('layout.default')
@section('title', 'Add New Student')
@section('content')
<div class="w-full max-w-[800px] p-4 lg:p-8">
    <div class="flex justify-between items-center pb-5">
            <div class="list-header">
                <div class="flex items-center justify-start">
                    <a href="{{route('admin.students.index')}}" class="p-1"><img src="{{asset('images/arrow.svg')}}" alt="Back Button"></a>
                    <h2 class="font-normal text-2xl">Add New Student</h2>
                </div>
            </div>
    </div>
    <div class="w-full rounded-md">
        <form action="{{route('admin.students.store')}}" method="post" class="flex flex-col"
            onsubmit="return checkForm();">
            @csrf
            <input type="hidden" id="studentPhotoId" name="studentPhotoId" value="">
            <!-- Basic Information Section -->
            <div class="basic-information">
                <div class="mb-6 text-left">
                    <h3 class="text-[1.3rem] font-bold text-gray-700">Basic Information</h3>
                </div>

                <div class="flex flex-col md:flex-row justify-between gap-[10px]">
                    <!-- First Name -->
                   <div class="input-group w-full md:w-1/2 mb-4">
                        <label for="first_name" class="text-sm text-gray-600 mb-2 block">First Name<span class="mandatory">*</span></label>
                        <input type="text" name="first_name" id="first_name" class="w-full p-3 border border-gray-300 rounded-md text-base text-gray-700 outline-none required_fields" value=""
                        data-error-msg="First name is required." />
                        <span class="scrollForReq error-message"></span>
                    </div>
                    <!-- First Name -->
                   <div class="input-group w-full md:w-1/2 mb-4">
                        <label for="last_name" class="text-sm text-gray-600 mb-2 block">Last Name<span class="mandatory">*</span></label>
                        <input type="text" name="last_name" id="last_name" class="w-full p-3 border border-gray-300 rounded-md text-base text-gray-700 outline-none required_fields"
                        value="" data-error-msg="Last name is required." />
                        <span class="scrollForReq error-message"></span>
                    </div>
                </div>

                <div class="flex flex-col md:flex-row justify-between gap-[10px]">
                    <!-- Email -->
                    <div class="input-group w-full md:w-1/2 mb-4">
                        <label for="email" class="text-sm text-gray-600 mb-2 block">Email<span class="mandatory">*</span></label>
                        <input type="text" name="email" id="email" class="w-full p-3 border border-gray-300 rounded-md text-base text-gray-700 outline-none required_fields email_validation"
                        value="" data-error-msg="Email is required." />
                        <span class="scrollForReq error-message"></span>
                    </div>
                    <!-- Phone -->
                    <div class="input-group w-full md:w-1/2 mb-4">
                        <label for="phone" class="text-sm text-gray-600 mb-2 block">Phone<span class="mandatory">*</span></label>
                        <input type="text" name="phone" id="phone" class="w-full p-3 border border-gray-300 rounded-md text-base text-gray-700 outline-none required_fields phone_validation"
                        value="" data-error-msg="Phone is required." />
                        <span class="scrollForReq error-message"></span>
                    </div>
                </div>
                <div class="flex flex-col md:flex-row justify-between gap-[10px]">
                    <!-- Gender -->
                    <div class="input-group w-full md:w-1/2 mb-4">
                        <label for="gender" class="text-sm text-gray-600 mb-2 block">Gender<span class="mandatory">*</span></label>
                        <select name="gender" id="gender" class="w-full p-3 border border-gray-300 rounded-md text-base text-gray-700 outline-none required_fields" data-error-msg="Gender is required.">
                            <option value="" selected>Select Gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>
                        </select>
                        <span class="scrollForReq error-message"></span>
                    </div>
                    <!-- Phone -->
                    <div class="input-group w-full md:w-1/2 mb-4">
                        <label for="dob" class="text-sm text-gray-600 mb-2 block">Date of Birth<span class="mandatory">*</span></label>
                        <input type="text" name="dob" id="dob" class="w-full p-3 border border-gray-300 rounded-md text-base text-gray-700 outline-none required_fields"
                        value="" data-error-msg="Date of birth is required." readonly/>
                        <span class="scrollForReq error-message"></span>
                    </div>
                </div>
                
                <div class="input-group w-full mb-4">
                    <label for="gender" class="text-sm text-gray-600 mb-2 block">Status<span class="mandatory">*</span></label>
                    <select name="status" id="status" class="w-full p-3 border border-gray-300 rounded-md text-base text-gray-700 outline-none required_fields" data-error-msg="Status is required.">
                        <option value="" selected>Select Status</option>
                        <option value="active">Active</option>
                        <option value="inactive">Inctive</option>
                    </select>
                    <span class="scrollForReq error-message"></span>
                </div>
            </div>

            <div class="basic-information">
                <div class="mb-6 text-left">
                    <h3 class="text-[1.3rem] font-bold text-gray-700">Address</h3>
                </div>
                <div class="input-group w-full mb-4">
                    <label for="address_line_1" class="text-sm text-gray-600 mb-2 block">Address Line 1<span class="mandatory">*</span></label>
                    <textarea name="address_line_1" id="address_line_1" class="w-full p-3 border border-gray-300 rounded-md text-base text-gray-700 outline-none required_fields" 
                            rows="3" placeholder="Enter Address Line 1" data-error-msg="Address Line 1 is required."></textarea>
                    <span class="scrollForReq error-message"></span>
                </div>
            </div>

            <div class="basic-information">
                <div class="mb-6 text-left">
                    <h3 class="text-[1.3rem] font-bold text-gray-700">Academic Details</h3>
                </div>
                <div class="flex flex-col md:flex-row justify-between gap-[10px]">
                    <!-- Class -->
                    <div class="input-group w-full md:w-1/2 mb-4">
                        <label for="class_id" class="text-sm text-gray-600 mb-2 block">Class<span class="mandatory">*</span></label>
                        <select name="class_id" id="class_id" class="w-full p-3 border border-gray-300 rounded-md text-base text-gray-700 outline-none required_fields" data-error-msg="Class is required.">
                            <option value="" selected>Select Class</option>
                            @foreach($classes as $class)
                            <option value="{{ $class->id }}">{{ $class->name }}</option>
                           @endforeach
                        </select>
                        <span class="scrollForReq error-message"></span>
                    </div>
                     <!-- Section -->
                    <div class="input-group w-full md:w-1/2 mb-4">
                        <label for="section_id" class="text-sm text-gray-600 mb-2 block">Section<span class="mandatory">*</span></label>
                        <select name="section_id" id="section_id" class="w-full p-3 border border-gray-300 rounded-md text-base text-gray-700 outline-none required_fields" data-error-msg="Section is required.">
                            <option value="" selected>Select Section</option>
                        </select>
                        <span class="scrollForReq error-message"></span>
                    </div>
                </div>
                <div class="flex flex-col md:flex-row justify-between gap-[10px]">
                <!-- Roll Number -->
                    <div class="input-group w-full md:w-1/2 mb-4">
                        <label for="roll_number" class="text-sm text-gray-600 mb-2 block">Roll Number<span class="mandatory">*</span></label>
                        <input type="text" name="roll_number" id="roll_number" class="w-full p-3 border border-gray-300 rounded-md text-base text-gray-700 outline-none required_fields" value="" data-error-msg="Roll number is required." />
                        <span class="scrollForReq error-message"></span>
                    </div>

                    <!-- Admission Date -->
                    <div class="input-group w-full md:w-1/2 mb-4">
                        <label for="admission_date" class="text-sm text-gray-600 mb-2 block">Admission Date<span class="mandatory">*</span></label>
                        <input type="text" name="admission_date" id="admission_date" class="w-full p-3 border border-gray-300 rounded-md text-base text-gray-700 outline-none required_fields"
                        value="" data-error-msg="Admission date is required." readonly/>
                        <span class="scrollForReq error-message"></span>
                    </div>
                </div>
            </div>

            <!-- Address Section -->
            <div class="address-information">
                <div class="mb-6 text-left">
                    <h3 class="text-[1.3rem] font-bold text-gray-700">Guardian Details</h3>
                </div>
                <!-- Guardian Information Section -->
                <div class="flex flex-col md:flex-row justify-between gap-[10px]">
                    <!-- Guardian's Name -->
                    <div class="input-group w-full md:w-1/2 mb-4">
                        <label for="guardian_name" class="text-sm text-gray-600 mb-2 block">Guardian's Name</label>
                        <input type="text" name="guardian_name" id="guardian_name" class="w-full p-3 border border-gray-300 rounded-md text-base text-gray-700 outline-none" value=""/>
                    </div>
                    <!-- Guardian's Relationship -->
                    <div class="input-group w-full md:w-1/2 mb-4">
                        <label for="guardian_relation" class="text-sm text-gray-600 mb-2 block">Relationship to Student</label>
                        <input type="text" name="guardian_relation" id="guardian_relation" class="w-full p-3 border border-gray-300 rounded-md text-base text-gray-700 outline-none" value=""/>
                    </div>
                </div>
                
                <div class="flex flex-col md:flex-row justify-between gap-[10px]">
                    <!-- Guardian's Email -->
                    <div class="input-group w-full md:w-1/2 mb-4">
                        <label for="guardian_email" class="text-sm text-gray-600 mb-2 block">Guardian's Email</label>
                        <input type="text" name="guardian_email" id="guardian_email" class="w-full p-3 border border-gray-300 rounded-md text-base text-gray-700 outline-none" value=""/>
                    </div>
                    <!-- Guardian's Phone -->
                    <div class="input-group w-full md:w-1/2 mb-4">
                        <label for="guardian_phone" class="text-sm text-gray-600 mb-2 block">Guardian's Phone</label>
                        <input type="text" name="guardian_phone" id="guardian_phone" class="w-full p-3 border border-gray-300 rounded-md text-base text-gray-700 outline-none" value=""/>
                    </div>
                </div>
            </div>

         <div class="w-full">
            <!-- Submit Button -->
            <button type="submit" class="p-[0.95rem] bg-gray-700 text-white text-base border-none rounded-md cursor-pointer transition-all duration-300 mt-4 mb-4 w-full uppercase">SAVE</button>
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
                    errorContainer.html("Phone is required.");
                } else if (inputValue.length < 10) {
                    hasErrors = true;
                    errorContainer.show().html("Phone must be at least 10 digits.");
                } else {
                    errorContainer.empty();
                }
            }
            // Email validation (if applicable)
            if ($this.hasClass('email_validation')) {
                let inputValue = $this.val().trim();
                let emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!inputValue) {
                    hasErrors = true;
                    errorContainer.text("Email is required.").show();
                } else if (!emailPattern.test(inputValue)) {
                    hasErrors = true;
                    errorContainer.text("Enter a valid email address.").show();
                } else {
                    errorContainer.hide();
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


    $('#class_id').on('change', function() {
        var classId = $(this).val();
        
        var selectedClass = classesData.find(function(classItem) {
            return classItem.id == classId;
        });

        $('#section_id').empty();

        if (selectedClass && selectedClass.sections.length > 0) {
            selectedClass.sections.forEach(function(section) {
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