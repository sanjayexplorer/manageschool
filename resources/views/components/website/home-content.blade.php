<section>
    @if(Session::has('error'))
        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('error') }}</p>
    @endif
 
    <div class="top_banner">
        <div class="bg_image relative">
            <img src="{{asset('images/school-campus.jpg')}}" alt="School Campus">
            <div
                class="relative lg:absolute lg:top-1/2 lg:left-0 w-full lg:transform lg:-translate-y-1/2 lg:z-2 lg:right-0 py-8 sm:py-12 lg:py-0">
                <div class="wrapper">
                    <div class="banner_container flex">
                        <div class="banner_left w-full md:w-[50%] flex items-center">
                            <div class="form_container bg-[#fff] rounded-[3px] w-[480px] border-[1px] border-[#ccc]">
                                <div
                                    class="form_heading_container py-4 px-4 mb-2 sm:mb-10 border-b-[1px] border-b-gray-300 bg-gray-300">
                                    <h3
                                        class="uppercase text-[21px] text-center text-[#222937] font-medium tracking-wide">
                                        inquiry form</h3>
                                </div>
                                <div class="form_main_container pb-[20px] lg:pb-[30px] px-[10px] lg:px-4">
                                    <form action="{{route('inquiry.post')}}" method="post"
                                        onsubmit="return validate_form();">
                                        @csrf
                                        <div class="basic_information">
                                            <div
                                                class="input_full_container flex justify-between flex-col sm:flex-row my-0 mx-[-10px] flex-wrap">
                                                <div class="input_inner w-full sm:w-[50%] mb-5 px-[10px]">
                                                    <div class="input_label_tt">
                                                        <label for="name"
                                                            class="input_label capitalize text-[#222937]">name<span
                                                                class="text-[#FF0000]">*</span></label>
                                                    </div>
                                                    <div class="input_tt">
                                                        <input type="text" name="name" id="name"
                                                            placeholder="Enter name"
                                                            class="input_tags w-[100%] py-2 px-2 outline-none border-gray-300 border-[1px] rounded-[4px] focus:border-[#222937] required_fields"
                                                            data-error-msg="Name is required">
                                                        <span class="scrollForReq error-message"></span>
                                                    </div>
                                                </div>

                                                <div class="input_inner w-full sm:w-[50%] mb-5  px-[10px]">
                                                    <div class="input_label_tt">
                                                        <label for="email"
                                                            class="input_label capitalize text-[#222937]">
                                                            email
                                                            <span class="text-[#FF0000]">*</span>
                                                        </label>
                                                    </div>
                                                    <div class="input_tt">
                                                        <input type="text" name="email" id="email"
                                                            placeholder="Enter email"
                                                            class="input_tags w-[100%] py-2 px-2 outline-none border-gray-300 border-[1px] rounded-[4px] focus:border-[#222937] required_fields email_validation"
                                                            data-error-msg="Email is required">
                                                        <span class="scrollForReq error-message"></span>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="input_full_container my-0 mx-[-10px]">

                                                <div class="input_inner w-[100%] mb-5 px-[10px]">
                                                    <div class="input_label_tt">
                                                        <label for="message"
                                                            class="input_label capitalize text-[#222937]">Message<span
                                                                class="text-[#FF0000]">*</span></label>
                                                    </div>
                                                    <div class="input_tt">
                                                        <textarea placeholder="Enter message" name="message"
                                                            id="message"
                                                            class="block w-[100%] resize-none min-h-[80px] sm:min-h-[120px] py-[2px] px-[5px] outline-none border-gray-300 border-[1px] rounded-[4px] focus:border-[#222937] required_fields"
                                                            data-error-msg="Message is required">
                                                        </textarea>
                                                        <span class="scrollForReq error-message"></span>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="input_full_container">
                                                <div class="input_inner w-[100%]">
                                                    <div class="input_tt w-[100px] my-0 mx-auto">
                                                        <button type="submit" class="w-full bg-[#A73335] text-[#fff] py-2 px-4 rounded border-['#fff'] border-[1px]
                                                      hover:border-[#222937] 
                                                      transition-all duration-3000 ease-in-out
                                                      outline-none">Submit</button>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>

document.getElementById('endDate').addEventListener('change', function () {
    const start = new Date(document.getElementById('startDate').value);
    const end = new Date(this.value);
    const diffDays = (end - start) / (1000 * 60 * 60 * 24);

    if (diffDays > 0) {
        const dailyRate = 50; // Example
        const totalPrice = dailyRate * diffDays;
        console.log(`Days: ${diffDays}, Total: $${totalPrice}`);
    } else {
        alert("End date must be after start date.");
    }
});


        function validate_form() {
            let hasErrors = false;
            let firstErrorElement = null;

            $(".required_fields").each(function () {
                let $this = $(this);
                let value = $this.val().trim();
                let errorMessage = $this.data("error-msg");
                let errorContainer = $this.closest('.input_tt').find('.error-message');

                if (!value) {
                    hasErrors = true;
                    if (!firstErrorElement) {
                        firstErrorElement = $this;
                    }
                    errorContainer.html(errorMessage);
                } else {
                    errorContainer.empty();
                }


                if ($this.hasClass('email_validation')) {
                    let inputValue = $this.val().trim();
                    let emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

                    if (!inputValue) {
                        hasErrors = true;
                        errorContainer.text("Email is required").show();
                    } else if (!emailPattern.test(inputValue)) {
                        hasErrors = true;
                        errorContainer.text("Enter a valid email address").show();
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

            console.log('Validation successful!');
            return true;
        }

        $('.required_fields').on('keyup', function () {
            let $inputGroup = $(this).closest('.input_tt');
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

        var fileTypesBusLicense = ['jpg', 'jpeg', 'png', 'JPG', 'JPEG', 'PNG', 'webp', 'WEBP'];
        $("#imageUpload").on('change', function (e) {
            if ($(this).val() !== '') {
                var that = this;

                if (this.files && this.files[0]) {
                    var file = this.files[0];
                    var fsize = file.size;
                    const fileSizeKB = Math.round(fsize / 1024);


                    if (fileSizeKB >= 10240) {
                        Swal.fire({
                            title: 'Image size is too big!',
                            text: 'Please upload an image smaller than 10MB.',
                            icon: 'warning',
                            confirmButtonText: 'OK'
                        });
                        e.target.value = '';
                        return;
                    }

                    var extension = file.name.split('.').pop();
                    var isSuccess = fileTypesBusLicense.includes(extension);

                    if (!isSuccess) {
                        Swal.fire({
                            title: 'Invalid file format!',
                            text: 'Only JPG, JPEG, PNG, WEBP formats are allowed.',
                            icon: 'warning',
                            confirmButtonText: 'OK'
                        });
                        e.target.value = '';
                        return;
                    }

                    var img = new Image();
                    img.src = URL.createObjectURL(file);
                    img.onload = function () {
                        if (img.width < 840 || img.height < 456) {
                            Swal.fire({
                                title: 'Invalid image dimensions!',
                                text: 'Please upload an image with at least 840x456 pixels.',
                                icon: 'warning',
                                confirmButtonText: 'OK'
                            });
                            e.target.value = '';
                        } else {
                            upload(that, extension);
                        }
                    };
                }
            }
        });
        function upload(img, extension) {
            var form_data = new FormData();
            form_data.append('photo', img.files[0]);
            form_data.append('_token', '{{ csrf_token() }}');


            jQuery.ajax({
                url: "{{route('image.upload.post')}}",
                data: form_data,
                type: 'POST',
                contentType: false,
                processData: false,
                success: function (data) {
                    if (!data.errors) {

                    }
                    else {
                        Swal.fire({
                            title: 'File format not supported. Please upload a PNG, JPG or WEBP file',
                            icon: 'warning',
                            showCancelButton: false,
                            confirmButtonText: 'OK',
                            customClass: {
                                popup: '',
                                title: '',
                                actions: '',
                            },
                        }).then((result) => {
                            if (result.isConfirmed) {
                            }
                        });
                    }
                },
                complete: function (data) {

                },
                error: function (xhr, status, error) {
                    console.log('error', error.message);
                }
            });
        }


    </script>
</section>