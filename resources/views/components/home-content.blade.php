<section>
    @php
      $name1 = "HEMANT";
      
      $newName1 = str_split($name1);

      foreach($newName1 as $i){
        echo $i."<br>";
      }
     
     echo "<br>";

     $name2 = "SANJAY";

     foreach (str_split($name2) as $key => $value) {
       echo $value."<br>";
     }

     echo "</br>";
     echo "</br>";

abstract class Car {
    abstract public function carSpeed($speed); 
}

class CarModel extends Car {
    public $name;
    public $speed;

    public function carSpeed($speed) {
        $this->speed = $speed; 
        return $this->speed; 
    }

    public function setCarName($name) {
        $this->name = $name;
    }

    public function getCarName() {
        return $this->name;
    }
}

$hondaCar = new CarModel();
$hondaCarSpeed = $hondaCar->carSpeed(100);
$hondaCar->setCarName('Honda City');
echo $hondaCar->getCarName() . " with a speed of " . $hondaCarSpeed . " km/h.";

    @endphp
    <div class="top_banner">
        <div class="bg_image relative">
            <img src="{{asset('images/school-campus.jpg')}}" alt="School Campus">
            <div class="relative lg:absolute lg:top-1/2 lg:left-0 w-full lg:transform lg:-translate-y-1/2 lg:z-2 lg:right-0 py-8 sm:py-12 lg:py-0">
                <div class="wrapper">
                    <div class="banner_container flex">
                        <div class="banner_left w-full md:w-[50%] flex items-center">
                            <div class="form_container bg-[#fff] rounded-[3px] w-[480px] border-[1px] border-[#ccc]">
                                <div class="form_heading_container py-4 px-4 mb-2 sm:mb-10 border-b-[1px] border-b-gray-300 bg-gray-300">
                                    <h3 class="uppercase text-[21px] text-center text-[#222937] font-medium tracking-wide">inquiry form</h3>
                                </div>
                                <div class="form_main_container pb-[20px] lg:pb-[30px] px-[10px] lg:px-4">
                                    <form action="{{route('inquiry.post')}}" method="post"
                                        onsubmit="return validate_form();">
                                        @csrf
                                        <div class="basic_information">
                                            <div class="input_full_container flex justify-between flex-col sm:flex-row my-0 mx-[-10px] flex-wrap">
                                                <div class="input_inner w-full sm:w-[50%] mb-5 px-[10px]">
                                                    <div class="input_label_tt">
                                                        <label for="name" class="input_label capitalize text-[#222937]">name<span class="text-[#FF0000]">*</span></label>
                                                    </div>
                                                    <div class="input_tt">
                                                        <input type="text" name="name" id="name"
                                                            placeholder="Enter name"
                                                            class="input_tags w-[100%] py-2 px-2 outline-none border-gray-300 border-[1px] rounded-[4px] focus:border-[#222937] required_fields" data-error-msg="Name is required">
                                                           <span class="scrollForReq error-message"></span>
                                                    </div>
                                                </div>

                                                <div class="input_inner w-full sm:w-[50%] mb-5  px-[10px]">
                                                    <div class="input_label_tt">
                                                        <label for="email" class="input_label capitalize text-[#222937]">
                                                            email
                                                        <span class="text-[#FF0000]">*</span>
                                                        </label>
                                                    </div>
                                                    <div class="input_tt">
                                                        <input type="text" name="email" id="email"
                                                            placeholder="Enter email"
                                                            class="input_tags w-[100%] py-2 px-2 outline-none border-gray-300 border-[1px] rounded-[4px] focus:border-[#222937] required_fields email_validation" data-error-msg="Email is required">
                                                           <span class="scrollForReq error-message"></span>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="input_full_container my-0 mx-[-10px]">

                                                <div class="input_inner w-[100%] mb-5 px-[10px]">
                                                    <div class="input_label_tt">
                                                        <label for="query"
                                                            class="input_label capitalize text-[#222937]">Query<span
                                                                class="text-[#FF0000]">*</span></label>
                                                    </div>
                                                    <div class="input_tt">
                                                        <textarea placeholder="Enter query" name="query" id="query"
                                                            class="block w-[100%] resize-none min-h-[80px] sm:min-h-[120px] py-[2px] px-[5px] outline-none border-gray-300 border-[1px] rounded-[4px] focus:border-[#222937] required_fields" data-error-msg="Query is required">
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

    @php
      echo "Missing array element and elements";
      $arr = [1,2,3,5,6];
      $missing = [];
      for ($i=1; $i<=6; $i++) { 
        if(!in_array($i,$arr)){
            array_push($missing,$i);
        }
      }
      echo '<pre>';
      print_r($missing);
      echo '</pre>';
      echo "</br>";
    @endphp

    @php
      echo "Remove last element from array";
      echo "</br>";
     $arr = [1,2,3,4,5];
     $last = array_pop($arr);
     echo ' '.$last;
    @endphp


  @php
     echo "Remove first element from array";
     echo "</br>";
     $arr = [1,2,3,4,5];
     $first = array_shift($arr);
     echo $first;
  @endphp

  @php
     echo "Add one or more elements to the begining for an array";
     echo "</br>";
     $arr = [3,4,5];
     array_unshift($arr,1,2);
     echo "<pre>";
     print_r($arr);
  @endphp


 @php
     echo "Merge two or more arrays into one";
     echo "</br>";
     $arr1 = [3,4,5];
     $arr2 = [1,2];
     $merged = array_merge($arr1,$arr2);
     echo "</pre>";
     print_r($merged);
     echo "</br>";
 @endphp


@php 
   echo "Combine two arrays";
   echo "</br>";
   $arr1 = ['a','b','c','d'];
   $arr2 = [1,2,3,4];
   $combinedArray = array_combine($arr1,$arr2);
   print_r($combinedArray);
@endphp

  @php
   echo "</br>";
   echo "</br>";

   for($i=0; $i<=5; $i++){
        for ($j=1; $j<=$i; $j++) { 
           echo "*";
        }
     echo "</br>";
   }
  @endphp

@php

 echo "</br>";
 echo "</br>";

 for($i=0; $i<=5; $i++){
      for($j=5; $j>=$i; $j--){
        echo "*";
      }
      echo "</br>";
 }
@endphp


@php
    echo "</br>";

  for($i=1; $i<5; $i++){
    for($j=1; $j<5; $j++){
        echo "*";
    }
    echo "</br>";
  }
@endphp


    <script>
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

    var $hemant = 'HEMANT';
    console.log([...$hemant]);

    var newName = $hemant.split('');
    newName.map(function(i, index){
      console.log(index,i);
    });
</script>
</section>