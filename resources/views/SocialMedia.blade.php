<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="icon" type="image/png" href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRF-2WpWmQgRP2bN2FR4IeQPZnAV-e93oT6yA&usqp=CAU" />
    <title>My Dragon Media</title>
    {{-- <img src="Dragon.jpg" alt="Girl in a jacket"> --}}
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-r from-yellow-200 to-lime-600">
    <div class="container mt-40 flex mx-auto item-center justify-center">
        <div class="left mx-14">
            {{-- <img class="w-60" src="Dragon.jpg" alt=""> --}}
            <h1 class="text-violet-700 text-5xl mx-6 font-sans hover:font-extrabold hover:text-indigo-600 cursor-all-scroll">DRAGON</h1>
            <p class="text-3xl mx-6 hover:font-semibold hover:text-indigo-600">Dragon:THE LORD</p>
        </div>
        <div class="right flex flex-col bg-green-200 border border-green-300 p-6 rounded-lg hover:bg-green-200">
            {{-- <input class="px-3 h-10 my-1 border border-1 border-gray-200 rounded-md outline-blue-500" type="text" placeholder="Email address or phone number">

            <input class="px-3 h-10 my-1 border border-1 border-gray-200 rounded-md outline-blue-500" type="password" placeholder="Password">

            <a href=" {{url('login')}} " class="bg-blue-500 hover:bg-blue-700 text-white my-1 py-2 rounded-md font-bold text-center"><button>Login</button></a> --}}

            {{-- <span class="text-blue-500 text-center text-sm my-1 cursor-pointer hover:underline">Forgotten password?</span> --}}


            <form class="text-center" action=" {{ route('checked') }} " method="post">
                @csrf
                {{-- <div>
                    <h3 class="text-blue-700">User Login</h3>
                </div> --}}
                {{-- <hr class="border border-1 border-solid border-black"><br> --}}
                <div class="results">
                    @if (Session::get('fail'))
                        <div class="alert alert-danger" style="color: red;">
                            {{ Session::get('fail') }}
                        </div>
                    @endif
                </div>
                    <div class="flex flex-col">
                        {{-- <label class="border border-1 border-black-100 rounded-md">Enter your email</label> --}}
                        <input class="border border-2 border-black bg-gray-100 rounded-md" type="email" name="email" placeholder="Enter email"
                            value="{{ old('email') }}">
                        <span style=" color: red;">
                            @error('email')
                                {{ $message }}
                            @enderror
                        </span>
                    </div><br>
                    <div class="flex flex-col">
                        {{-- <label class="border border-1 border-black-100 rounded-md">Enter your password</label> --}}
                        <input class="border border-2 border-black bg-gray-100 rounded-md" type="password" name="password" placeholder="Enter password">
                        <span style=" color: red;">
                            @error('password')
                                {{ $message }}
                            @enderror
                        </span>
                    </div><br>
                    <div class="flex flex-col">
                        <button class="bg-blue-600 hover:bg-blue-700 text-white px-1 border border-blue-700 rounded-md font-bold text-center" type="submit" value="Login">Login</button>
                    </div>
                </form>

            <hr class="my-1 border border-1 border-solid border-gray-400">

            <a href=" {{url('register')}} " class="bg-green-600 hover:bg-green-700  text-white my-1 py-2 px-4 mx-auto rounded-md font-bold w-fit"><button>Create an account</button></a>

        </div>
    </div>
</body>
</html>
