<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Manage School Easy</title>
    <link rel="shortcut icon" href="{{asset('images/favicon-16x16.png')}}" type="image/x-icon">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" rel="stylesheet">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

</head>

<body>
    <div class="layout layout_main">
        <div class="header_container">
        <div class="upper_header bg-[#222937] afclr">
            <div class="wrapper">
                <div class="change_user_role float-right py-2">
                    <div class="dropdown">
                        <select name="select_user_role"  class="rounded-[3px] border-[#222937] border-[1px] capitalize" id="select_user_role">
                             <option value="admin">admin</option>
                             <option value="principal">principal</option>
                             <option value="student">student</option>
                             <option value="guest" selected>guest</option>
                        </select>
                </div>
            </div>
            </div>
        </div>
        <header class="header bg-[#fff] py-4 border-[#222937] border-b-[1px]">
            <div class="wrapper">
                <div class="header_inner flex items-center justify-between">
                    <div class="header_left w-[20%]">
                        <div class="site_logo">
                            <a href="javascript:void(0);" class="inline-block"><img src="{{asset('images/site-logo.png')}}" alt="" class="max-w-[200px] w-[100%]"></a>
                        </div>
                    </div>
                    <div class="header_right w-[80%]">
                         <div class="nav_bar">
                            <div class="nav_links">
                                <ul class="flex items-center justify-end">
                                    <li><a href="javascript:void(0);" class="no-underline px-5 py-5 capitalize">about us</a></li>
                                    <li><a href="javascript:void(0);" class="no-underline px-5 py-5 capitalize">student corner</a></li>
                                    <li><a href="javascript:void(0);" class="no-underline px-5 py-5 capitalize">academics</a></li>
                                    <li><a href="javascript:void(0);" class="no-underline px-5 py-5 capitalize">gallery</a></li> 
                                    <li><a href="javascript:void(0);" class="no-underline px-5 py-5 capitalize">admission</a></li> 
                                    <li><a href="tel:+918619673861" class="no-underline px-5 py-[10px] capitalize w-[100%] max-w-[200px] rounded-[3px] bg-[#222937] text-[#fff]" id="role_depend">contact us</a></li> 
                                </ul>
                            </div>
                         </div>
                    </div>
                </div>
            </div>
       
        </header>
        </div>
        <div class="top_banner py-[250px]">
            <div class="wrapper">
                <div class="banner_container flex">
                    <div class="banner_left w-[50%] flex items-center"> 
                        <div class="form_container border-[#fff] border-[1px] py-4 px-4 rounded-[3px] w-[470px]">
                                <form action="" method="post">
                                    @csrf
                                    <div class="basic_information">

                                         <div class="input_full_container flex justify-between mb-5">
                                            <div class="input_inner w-[50%] pr-2">
                                              <div class="input_label_tt">
                                                <label for="name" class="input_label capitalize text-[#FFF]">name</span></label>
                                              </div>
                                              <div class="input_tt">
                                                  <input type="text" name="name" id="name" placeholder="Enter name" class="input_tags w-[100%] py-2 px-2 outline-none border-gray-300 border-[1px] rounded-[4px]">
                                              </div>
                                            </div>
                                            <div class="input_inner w-[50%]">
                                                <div class="input_label_tt">
                                                  <label for="email"  class="input_label capitalize text-[#FFF]">email<span class="text-[#FF0000]">*</span></label>
                                                </div>
                                                <div class="input_tt">
                                                    <input type="text" name="email" id="email"  placeholder="Enter email" class="input_tags w-[100%] py-2 px-2 outline-none border-gray-300 border-[1px] rounded-[4px]">
                                                </div>
                                              </div>
                                        </div>
                                         <div class="input_full_container mb-5">
                                              <div class="input_inner w-[100%]">
                                                <div class="input_label_tt">
                                                    <label for="query" class="input_label capitalize text-[#FFF]">Query<span class="text-[#FF0000]">*</span></label>
                                                </div>
                                                <div class="input_tt">
                                                    <textarea 
                                                    placeholder="Enter query" 
                                                    name="query" 
                                                    id="query" 
                                                    class="w-[100%] resize-none min-h-[120px] py-[2px] px-[5px] outline-none border-gray-300 border-[1px] rounded-[4px]">
                                                </textarea>
                                                </div>
                                              </div>
                                         </div>

                                         <div class="input_full_container">
                                            <div class="input_inner w-[100%]">
                                                <div class="input_tt w-[200px] my-0 mx-auto">
                                                    <input 
                                                        type="submit" 
                                                        class="w-full bg-[#fff] text-[#222937] py-2 px-4 rounded border-['#fff'] border-[1px]
                                                        hover:border-[#222937]
                                                        transition-all duration-3000 ease-in-out
                                                        outline-none" 
                                                        aria-label="Submit Form"
                                                    >
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


<script src="{{asset('js/jquery-3.7.1.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
<script>
    $(document).ready(function () {
        $('#select_user_role').on('change',function(){
               var that = $(this).val();
               console.log('that:',that); 
               if(that == 'admin' || that == 'principal' || that == 'student'){
                $('#role_depend').text('Login');
                $('#role_depend').attr('href', 'javascript:void(0);');
               }
               else{
                 $('#role_depend').text('Contact Us');
                 $('#role_depend').attr('href', 'tel:+918619673861'); 
               }
        });
    });
</script>
</body>

</html>