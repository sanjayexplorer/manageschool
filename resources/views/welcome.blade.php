<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Manage School Easy</title>
    <link rel="shortcut icon" href="{{asset('images/favicon-16x16.png')}}" type="image/x-icon">
    <link rel="stylesheet" href="{{asset('css/jquery.fancybox.min.css')}}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

</head>

<body>
    <div class="layout layout_main">

        <header class="header_container">

            <div class="upper_header bg-[#222937] afclr">
                <div class="wrapper">
                    <div class="change_user_role float-right py-2">
                        <div class="dropdown">

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

            <div class="header bg-[#fff] py-4 border-[#222937] border-b-[1px]">

                <div class="wrapper">
                    <div class="header_inner flex items-center justify-between">
                        <div class="header_left w-[20%]">
                            <div class="site_logo">
                                <a href="{{route('welcome')}}" class="inline-block">
                                    <img src="{{asset('images/site-logo.png')}}" alt="" class="max-w-[230px] w-[100%]">
                                </a>
                            </div>
                        </div>
                        <div class="header_right w-[80%]">
                            <div class="nav_bar">
                                <div class="nav_links">
                                    <ul class="flex items-center justify-end">
                                        <li><a href="javascript:void(0);"
                                                class="no-underline px-5 py-5 capitalize text-[18px]">about us</a></li>
                                        <li><a href="javascript:void(0);"
                                                class="no-underline px-5 py-5 capitalize text-[18px]">student corner</a>
                                        </li>
                                        <li><a href="javascript:void(0);"
                                                class="no-underline px-5 py-5 capitalize text-[18px]">academics</a></li>
                                        <li><a href="javascript:void(0);"
                                                class="no-underline px-5 py-5 capitalize text-[18px]">gallery</a></li>
                                        <li><a href="javascript:void(0);"
                                                class="no-underline px-5 py-5 capitalize text-[18px]">admission</a></li>
                                        <li><a href="tel:+918619673861"
                                                class="no-underline ml-5 px-6 py-3 text-[18px] capitalize w-[100%] max-w-[200px] rounded-[3px] bg-[#222937] text-[#fff]"
                                                id="role_depend">contact us</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </header>

        <section>
            <div class="top_banner">
                <div class="bg_image relative">
                    <img src="{{asset('images/school-campus.jpg')}}" alt="">
                    <div class="banner_position">
                        <div class="wrapper">
                            <div class="banner_container flex">
                                <div class="banner_left w-[50%] flex items-center">
                                    <div class="form_container bg-[#fff]  rounded-[3px] w-[480px]">

                                        <div class="form_heading_container py-4 px-4 mb-10 border-b-[1px] border-b-gray-300 bg-gray-300">
                                            <h3
                                                class="uppercase text-[21px] text-center text-[#222937] font-medium tracking-wide">
                                                inquiry form</h3>
                                        </div>

                                        <div class="form_main_container pb-[30px] px-4">
                                            <form action="{{route('inquiryPost')}}" method="post">
                                                @csrf
                                                <div class="basic_information">

                                                    <div
                                                        class="input_full_container flex justify-between my-0 mx-[-10px] flex-wrap">

                                                        <div class="input_inner w-[50%] mb-5 px-[10px]">
                                                            <div class="input_label_tt">
                                                                <label for="name"
                                                                    class="input_label capitalize text-[#222937]">name</span></label>
                                                            </div>
                                                            <div class="input_tt">
                                                                <input type="text" name="name" id="name"
                                                                    placeholder="Enter name"
                                                                    class="input_tags w-[100%] py-2 px-2 outline-none border-gray-300 border-[1px] rounded-[4px] focus:border-[#222937]">
                                                            </div>
                                                        </div>

                                                        <div class="input_inner w-[50%] mb-5  px-[10px]">
                                                            <div class="input_label_tt">
                                                                <label for="email"
                                                                    class="input_label capitalize text-[#222937]">email<span
                                                                        class="text-[#FF0000]">*</span></label>
                                                            </div>
                                                            <div class="input_tt">
                                                                <input type="text" name="email" id="email"
                                                                    placeholder="Enter email"
                                                                    class="input_tags w-[100%] py-2 px-2 outline-none border-gray-300 border-[1px] rounded-[4px] focus:border-[#222937]">
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
                                                                <textarea placeholder="Enter query" name="query"
                                                                    id="query"
                                                                    class="w-[100%] resize-none min-h-[120px] py-[2px] px-[5px] outline-none border-gray-300 border-[1px] rounded-[4px] focus:border-[#222937]">
                                                                </textarea>
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
        </section>

        <footer>
            <div class="footer_container bg-[#222937] py-[80px]">
                <div class="wrapper">
                    <div class="footer_inner">
                        <div class="footer_content flex mx-[-20px]">

                            <div class="footer_content_tt w-[26%] px-[20px]">
                                <div class="footer_h mb-5">
                                    <h2
                                        class="text-left border-b-[4px] border-b-[#A73335] text-[#fff] capitalize inline-block text-[21px]">
                                        manage school easy</h2>
                                </div>
                                <div class="mb-5">
                                    <h3 class="text-[#A73335] capitalize ">Address:</h3>
                                    <p class="text-[#fff] capitalize">
                                        manage school easy
                                        <br>
                                        Sector-17, Pratap Nagar, Sanganer
                                        <br>
                                        Jaipur (Rajasthan)-302033
                                    </p>
                                </div>
                                <div class="mb-5">
                                    <h3 class="text-[#A73335] capitalize">Email:</h3>
                                    <p class="text-[#fff]">
                                        manageschooleasy100@gmail.com
                                        <br>
                                        barethsanjay37@gmail.com
                                    </p>
                                </div>
                                <div class="mb-5">
                                    <h3 class="text-[#A73335] capitalize">Call:</h3>
                                    <p class="text-[#fff] capitalize">
                                        0141-2796929,
                                        <br>
                                        +91 7300000875,
                                        <br>
                                        +91 8058007777
                                    </p>
                                </div>
                            </div>

                            <div class="footer_content_tt w-[37%] px-[20px]">
                                <div class="w-[100%]">
                                <div class="footer_h mb-5">
                                    <h3
                                        class="text-left border-b-[4px] border-b-[#A73335] text-[#fff] capitalize inline-block text-[21px]">
                                        useful links</h3>
                                </div>
                                <div class="mb-5 border-b-[1px] border-b-[#fff]">
                                    <p class="text-[#fff] capitalize">
                                        The Mentor’s Hub
                                    </p>
                                </div>
                                <div class="mb-5 border-b-[1px] border-b-[#fff]">
                                    <p class="text-[#fff] capitalize">
                                        Public Mandatory Disclosure
                                    </p>
                                </div>
                                <div class="mb-5 border-b-[1px] border-b-[#fff]">
                                    <p class="text-[#fff] capitalize">
                                        Admission Criteria
                                    </p>
                                </div>
                                <div class="mb-5 border-b-[1px] border-b-[#fff]">
                                    <p class="text-[#fff] capitalize">
                                        Activity Planner
                                    </p>
                                </div>
                                <div class="mb-5 border-b-[1px] border-b-[#fff]">
                                    <p class="text-[#fff] capitalize">
                                        Events
                                    </p>
                                </div>
                                <div class="mb-5 border-b-[1px] border-b-[#fff]">
                                    <p class="text-[#fff] capitalize">
                                        Blogs & Articles
                                    </p>
                                </div>
                                <div class="mb-5 border-b-[1px] border-b-[#fff]">
                                    <p class="text-[#fff] capitalize">
                                        Contact Us
                                    </p>
                                </div>
                                <div class="mb-5">
                                    <p class="text-[#fff] capitalize">
                                        Career
                                    </p>
                                </div>
                            </div>
                        </div>

                            <div class="footer_content_tt w-[37%] px-[20px]">
                                <div class="footer_h mb-5">
                                    <h3 class="text-left border-b-[4px] border-b-[#A73335] text-[#fff] capitalize inline-block text-[21px]">
                                        contact us</h3>
                                </div>

                                  <div class="w-[100%] mb-5">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3558.4642411647396!2d75.76384879999999!3d26.888757899999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x396db442b5da868d%3A0xc0df936a4d577b30!2sBytegrow%20Technologies!5e0!3m2!1sen!2sin!4v1737185247760!5m2!1sen!2sin" width="100%" height="200" style="border-radius: 4px"  allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" ></iframe>
                                 </div>

                                 <div class="footer_h mb-5">
                                    <h3 class="text-left border-b-[4px] border-b-[#A73335] text-[#fff] capitalize inline-block text-[21px]">
                                        Also Visit</h3>
                                </div>
                                <div class="mb-5 border-b-[1px] border-b-[#fff]">
                                    <p class="text-[#fff] capitalize">
                                        The Mentor’s Hub
                                    </p>
                                </div>

                                <div class="mb-5 border-b-[1px] border-b-[#fff]">
                                    <p class="text-[#fff] capitalize">
                                        The Mentor’s Hub
                                    </p>
                                </div>
                                <div class="mb-5 ">
                                    <p class="text-[#fff] capitalize">
                                        The Mentor’s Hub
                                    </p>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <script src="{{asset('js/jquery-3.7.1.js')}}"></script>
    <script src="{{asset('js/jquery.fancybox.min.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('#select_user_role').on('change', function () {
                var that = $(this).val();
                console.log('that:', that);
                if (that == 'admin' || that == 'principal' || that == 'student') {
                    $('#role_depend').text('Login');
                    $('#role_depend').attr('href', 'javascript:void(0);');
                }
                else {
                    $('#role_depend').text('Contact Us');
                    $('#role_depend').attr('href', 'tel:+918619673861');
                }
            });
        });
    </script>
</body>

</html>