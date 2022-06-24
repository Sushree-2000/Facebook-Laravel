<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="icon" type="image/png" href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRF-2WpWmQgRP2bN2FR4IeQPZnAV-e93oT6yA&usqp=CAU" />
    <title>Registration to DRAGON</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-r from-yellow-200 to-lime-600">
    <div class="container border border-2 border-green-400 m-40 flex mx-auto item-center justify-center flex flex-col bg-green-200 rounded-md content-evenly w-96 p-5">

        <form class="container text-center" action=" {{ route('created') }} " method="POST">
            @csrf
            <div>
                <h3 class="text-blue-700">Registration page</h3>
            </div>
            <hr class="border border-1 border-solid border-black">
            <div class="results">
                @if (Session::get('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                @endif
                @if (Session::get('fail'))
                    <div class="alert alert-danger">
                        {{ Session::get('fail') }}
                    </div>
                @endif
            </div>

            <div class="flex flex-col">
                <label for="name" class="border border-1 border-black-100 rounded-md">Enter your name</label>
                <input type="text" class="border border-2 border-black bg-gray-100 rounded-md" name="name"
                    value="{{ old('name') }}">
                <span style="color: red;">
                    @error('name')
                        {{ $message }}
                    @enderror
                </span>
            </div>
            <div class="flex flex-col">
                <label for="email" class="border border-1 border-black-100 rounded-md">Enter your email</label>
                <input type="email" class="border border-2 border-black bg-gray-100 rounded-md" name="email"
                    value="{{ old('email') }}">
                <span style=" color: red;">
                    @error('email')
                        {{ $message }}
                    @enderror
                </span>
            </div>
            <div class="">
                <label for="gender" class="border border-1 border-black-100 rounded-md">Gender</label>
                <br>
                Male<input type="radio" name="gender" value="male">
                Female<input type="radio" name="gender" value="female">
                <span style=" color: red;">
                    @error('email')
                        {{ $message }}
                    @enderror
                </span>
            </div>
            <div class="flex flex-col">
                <label for="dob" class="border border-1 border-black-100 rounded-md">Date Of Birth</label>
                <input type="date" class="border border-2 border-black bg-gray-100 rounded-md" name="dob" value="">
                <span style=" color: red;">
                    @error('email')
                        {{ $message }}
                    @enderror
                </span>
            </div>
            <div class="flex flex-col">
                <label for="address" class="border border-1 border-black-100 rounded-md">Address</label>
                <input type="text" class="border border-2 border-black bg-gray-100 rounded-md" name="address" value="">
                <span style=" color: red;">
                    @error('email')
                        {{ $message }}
                    @enderror
                </span>
            </div>
            <div class="flex flex-col">
                <label for="password" class="border border-1 border-black-100 rounded-md">Enter your password</label>
                <input type="password" class="border border-2 border-black bg-gray-100 rounded-md" name="password">
                <span style="color: red;">
                    @error('password')
                        {{ $message }}
                    @enderror
                </span>
            </div>
            <div class="flex flex-col">
                <label for="conf_password" class="border border-1 border-black-100 rounded-md">Confirm your
                    password</label>
                <input type="password" class="border border-2 border-black bg-gray-100 rounded-md" name="conf_password">
                <span style="color: red;">
                    @error('conf_password')
                        {{ $message }}
                    @enderror
                </span>
            </div>
            <br>
            <div>
                <button type="submit"
                    class="bg-green-500 hover:bg-green-600 text-white my-0 px-10 rounded-sm font-bold text-center border border-green-900">Register</button>
            </div><br>
            <hr class="border border-1 border-dotted border-black">

            <a href="login" class="hover:underline hover:text-blue-700">Already have an account!!!</a>
        </form>
    </div>
</body>

</html>
