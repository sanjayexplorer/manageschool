<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="shortcut icon" href="{{asset('images/favicon-16x16.png')}}" type="image/x-icon">
    <!--styles --> 
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
</head>

<body>
    <div class="min-h-screen bg-gray-100 flex items-center justify-center">
        <div class="w-full max-w-[460px] p-5">
           <div class="bg-white rounded-2xl shadow-lg p-5">
            <div class="mb-6 text-center">
                <div class="max-w-[170px] mx-auto my-0">
                    <img src="{{asset('images/site-logo.png')}}" alt="Site Logo" class="">
                </div>
            </div>
            <form action="{{route('login.post')}}" method="POST">
                @csrf
                <div class="mt-6">
                    <label for="email" class="input_label capitalize text-[#222937]">Email<span class="text-[#FF0000]">*</span></label>
                    <input type="text" name="email" id="email" value="{{ old('email') }}"
                           class="input_tags w-[100%] py-2 px-2 outline-none border-gray-300 border-[1px] rounded-[4px] focus:border-[#222937] required_fields">
                </div>
                <div class="mt-6">
                    <label for="password" class="input_label capitalize text-[#222937]">Password<span class="text-[#FF0000]">*</span></label>
                    <input type="password" name="password" id="password"
       class="input_tags w-[100%] py-2 px-2 outline-none border-gray-300 border-[1px] rounded-[4px] focus:border-[#222937] required_fields">

                </div>
                <a href="{{ route('google.redirect') }}" class="btn btn-primary"> Login with Google </a>
                <div class="input_tt w-full mt-6 mx-auto">
                    <input type="submit" value="Login" class="w-full bg-[#A73335] text-white py-2 px-4 rounded border border-transparent hover:border-[#222937] transition-all duration-500 ease-in-out outline-none cursor-pointer"/>
                </div>
            </form>
        </div>
    </div>
    </div>
     <!--js --> 
     <script src="{{asset('js/jquery-3.7.1.js')}}"></script>

   <script>
    const arr = [1,2,5,6];
    const missing = [];
    let finalArr = [];
    let i;
    for(i = 1; i <=6; i++){
        if(!arr.includes(i)){
            missing.push(i);
        }
    }
   function mergeArrays(arr,missing){
    let finalArr = arr.concat(missing);
    finalArr.sort((a, b) => a - b);
    return finalArr;
   }

   finalArr = mergeArrays(arr, missing);
   console.log('missing:', missing);
   console.log('finalArr:', finalArr);

</script>
</body>
</html>
