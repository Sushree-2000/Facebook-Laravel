<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="icon" type="image/png"
        href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRF-2WpWmQgRP2bN2FR4IeQPZnAV-e93oT6yA&usqp=CAU" />
    <title>Login to DRAGON</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-r from-yellow-200 to-lime-600">
    <div
        class="container border border-2 border-green-400 m-40 mx-auto item-center justify-center flex flex-col bg-green-200 rounded-md content-evenly w-72 p-5">

        <form class="text-center" action=" {{ route('checked') }} " method="post">
            @csrf
            <div>
                <h3 class="text-blue-700">User Login</h3>
            </div>
            <hr class="border border-1 border-solid border-black"><br>
            <div class="results">
                @if (Session::get('fail'))
                    <div class="alert alert-danger" style="color: red;">
                        {{ Session::get('fail') }}
                    </div>
                @endif
            </div>
            <div class="flex flex-col">
                <label class="border border-1 border-black-100 rounded-md">Enter your email</label>
                <input class="border border-2 border-black bg-gray-100 rounded-md" type="email" name="email"
                    placeholder="Enter email" value="{{ old('email') }}">
                <span style=" color: red;">
                    @error('email')
                        {{ $message }}
                    @enderror
                </span>
            </div><br>
            <div class="flex flex-col">
                <label class="border border-1 border-black-100 rounded-md">Enter your password</label>
                <input class="border border-2 border-black bg-gray-100 rounded-md" type="password" name="password"
                    placeholder="Enter password">
                <span style=" color: red;">
                    @error('password')
                        {{ $message }}
                    @enderror
                </span>
            </div><br>
            <div>
                <button
                    class="bg-blue-500 hover:bg-blue-600 text-white my-0 px-10 rounded-sm font-bold text-center border border-blue-900"
                    type="submit" value="Login">Login</button>
            </div><br>
            <hr class="border border-1 border-dotted border-black">

            <a href="register" class="hover:underline hover:text-blue-700">Register here</a>
        </form>
    </div>
</body>

</html>
