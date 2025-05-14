<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Manage School Easy</title>
    <link rel="shortcut icon" href="{{asset('images/favicon-16x16.png')}}" type="image/x-icon">
    <!--styles --> 
    <link rel="stylesheet" href="{{asset('css/jquery.fancybox.min.css')}}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <!--js --> 
    <script src="{{asset('js/jquery-3.7.1.js')}}"></script>
    <script src="{{asset('js/jquery.fancybox.min.js')}}"></script>

</head>

<body>
    <div class="layout layout_main">
        <header class="header_container">
            <div class="upper_header bg-[#222937] py-2 lg:py-0 afclr">
                <div class="wrapper px:0 lg:px-5">
                    <div class="change_user_role flex justify-between lg:justify-end items-center py-0 lg:py-2">
                        <div class="flex items-center lg:hidden w-[50%] justify-start">
                            <a href="{{route('welcome')}}" class="inline-block">
                                <img src="{{asset('images/site-logo.png')}}" alt="" class="max-w-[130px] sm:max-w-[170px] w-[100%]">
                            </a>
                        </div>
                        <div class="dropdown flex items-center gap-3 sm:gap-5 w-[50%] justify-end">
                            <a href="javascript:void(0);" class="p-1 block lg:hidden"><img src="{{asset('/images/menu_icon.svg')}}" alt="Toggle Menu" id="toggle_menu"></a>
                            <select name="select_user_role"
                                class="rounded-[3px] border-[#222937] border-[1px] capitalize" id="select_user_role">
                                <option value="admin">admin</option>
                                <option value="principal">principal</option>
                                <option value="student">student</option>
                                <option value="guest" selected>guest</option>
                            </select>
                        </div>

                    </div>
                </div>
            </div>

            <div class="header bg-[#fff] lg:py-4 border-[#222937] border-b-[1px] hidden lg:block" id="main_header">
                <div class="wrapper !px-0 lg:!px-5">
                    <div class="header_inner flex lg:items-center lg:justify-between flex-col lg:flex-row">
                        <div class="header_left lg:w-[20%] w-full hidden lg:block">
                            <div class="site_logo lg:px-0 px-[1.25rem]">
                                <a href="{{route('welcome')}}" class="inline-block">
                                    <img src="{{asset('images/site-logo.png')}}" alt="" class="max-w-[230px] w-[100%]">
                                </a>
                            </div>
                        </div>
                        <div class="header_right lg:w-[80%] w-full">
                            <div class="nav_bar lg:mt-0">
                                <div class="nav_links">
                                    <ul class="flex lg:items-center lg:justify-end items-start flex-col lg:flex-row justify-start">
                                        <li class="lg:w-auto w-full lg:border-none  border-b-[1px] border-b-[#222937]">
                                            <a href="javascript:void(0);"
                                                class="block no-underline px-5 py-3 capitalize text-[18px] lg:rounded-[3px] transition-all duration-300 ease-out  hover:bg-[#222937] hover:text-white">about us</a>
                                            </li>
                                        <li class="lg:w-auto w-full lg:border-none border-b-[1px] border-b-[#222937]">
                                            <a href="javascript:void(0);"
                                                class="block no-underline px-5 py-3 capitalize text-[18px] lg:rounded-[3px] transition-all duration-300 ease-out  hover:bg-[#222937] hover:text-white">student corner</a>
                                        </li>
                                        <li class="lg:w-auto w-full lg:border-none border-b-[1px] border-b-[#222937]">
                                            <a href="javascript:void(0);"
                                                class="block no-underline px-5 py-3 capitalize text-[18px] lg:rounded-[3px] transition-all duration-300 ease-out  hover:bg-[#222937] hover:text-white">academics</a>
                                            </li>
                                        <li class="lg:w-auto w-full lg:border-none border-b-[1px] border-b-[#222937]">
                                            <a href="javascript:void(0);"
                                                class="block no-underline px-5 py-3 capitalize text-[18px] lg:rounded-[3px] transition-all duration-300 ease-out  hover:bg-[#222937] hover:text-white">gallery</a>
                                            </li>
                                        <li class="lg:w-auto w-full lg:border-none  border-b-[1px] border-b-[#222937]">
                                            <a href="javascript:void(0);"
                                                class="block no-underline px-5 py-3 capitalize text-[18px] lg:rounded-[3px] transition-all duration-300 ease-out  hover:bg-[#222937] hover:text-white">admission</a>
                                            </li>
                                        <li class="lg:w-auto w-full">
                                            <a href="tel:+918619673861"
                                                class="block no-underline px-5 py-3 capitalize text-[18px] lg:rounded-[3px] transition-all duration-300 ease-out  hover:bg-[#222937] hover:text-white roleChangeAnchor active"
                                                id="contact_us_btn">contact us</a>
                                            <a href="{{route('login')}}"
                                                class="no-underline px-5 py-3 capitalize text-[18px] lg:rounded-[3px] transition-all duration-300 ease-out  hover:bg-[#222937] hover:text-white roleChangeAnchor hidden"
                                                id="login_btn">login</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </header>
        <script>
        $(document).ready(function () {
        $('#select_user_role').on('change', function () {
            var that = $(this).val();
            console.log('Selected Role:', that);
            $('#main_header').slideDown();
            
            if (that == 'admin' || that == 'principal' || that == 'student') {
                $('#contact_us_btn').removeClass('active');
                $('#login_btn').removeClass('hidden').addClass('active');
            } else {
                $('#login_btn').removeClass('active').addClass('hidden');
                $('#contact_us_btn').addClass('active');
            }
        });

        $('#toggle_menu').on('click',function(e){
            e.preventDefault();
            $('#main_header').slideToggle();
        });
    });

    </script>