<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="icon" type="image/png"
        href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRF-2WpWmQgRP2bN2FR4IeQPZnAV-e93oT6yA&usqp=CAU" />
    <title>Profile</title>
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="bg-gradient-to-r from-yellow-200 to-lime-600">
    {{-- container flex flex-col w-80 mx-auto item-center justify-center --}}

    <div class="left item-start flex">
        <div class="left">
            <h1
                class="text-left text-5xl text-violet-700 mx-2 mt-0 font-sans hover:font-extrabold hover:text-indigo-600 cursor-all-scroll">
                DRAGON</h1>
            <p class="text-3xl text-left mx-2 text-violet-900 hover:font-semibold hover:text-indigo-600">Dragon:THE LORD
            </p>
        </div>
        <div class="right text-right absolute top-0 right-0 flex flex-row">
            <button
                class="border border-1 border-green-500 hover:bg-green-400 hover:border-green-600 text-green-900 m-1 px-1 rounded-full"><a href=" {{url('profile')}} ">{{$data->name}}</a></button>&nbsp;
            <button
                class="border border-1 border-green-500 hover:bg-green-400 hover:border-green-600 text-green-900 m-1"><a
                    href=" {{ url('home') }} ">Home</a></button>&nbsp;
            <button
                class="border border-1 border-green-500 hover:bg-green-400 hover:border-green-600 text-green-900 m-1"><a
                    href=" {{ url('about') }} ">About</a></button>&nbsp;
            <button
                class="border border-1 border-green-500 hover:bg-green-400 hover:border-green-600 text-green-900 m-1"><a
                    href=" {{ url('contact') }} ">Contact</a></button>&nbsp;
            <button
                class="border border-1 border-green-500 hover:bg-green-400 hover:border-black-600 text-olive-900 m-1"><a
                    href=" {{ url('setting') }} ">Settings</a></button>&nbsp;
        </div>

    </div>

    <div class="container flex item-center justify-center items-stretch">
        <p class="mt-0 text-center text-top text-3xl block self-start text-violet-900">Edit your details</p>
    </div>
    <hr class="border border-green-500">

    {{--  --}}
    <div class="container">
        <form action="{{ url('updatedetail', ['id' => $data->id]) }}" method="POST">
            @csrf
            {{-- {!! csrf_field() !!} --}}
            {{-- @method("PATCH") --}}
            {{-- {{ method_field('PATCH') }} --}}
            <div class="flex flex-col place-items-center mt-2 bg-gradient-to-r from-yellow-200 to-lime-500">
                <input type="hidden" name="id" id="id" value="{{ $data->id }}" id="id" />

                <p class="posts mt-2 w-fit flex item-center justify-center hover:text-violet-900">Name:- <input
                        class="border border-x-0 border-t-0 border-b-1 border-green-600 ml-2 px-1 rounded-full  bg-gradient-to-r from-yellow-200 to-lime-500 hover:border-b-2 hover:border-green-600 hover:rounded-xl shadow hover:drop-shadow-xl hover:shadow-cyan-500"
                        type="text" name="name" id="name" value="{{ $data->name }}">
                </p>

                <p class="posts my-2 w-fit flex item-center justify-center hover:text-violet-900">Email:- <input
                        class="border border-x-0 border-t-0 border-b-1 border-green-600 ml-2 px-1 rounded-full  bg-gradient-to-r from-yellow-200 to-lime-500 hover:border-b-2 hover:border-green-600 hover:rounded-xl shadow hover:drop-shadow-xl hover:shadow-cyan-500"
                        type="text" name="email" id="email" value="{{ $data->email }}">
                </p>

                <p class="posts my-2 w-fit flex item-center justify-center hover:text-violet-900">Gender:- <input
                        class="border border-x-0 border-t-0 border-b-1 border-green-600 ml-2 px-1 rounded-full  bg-gradient-to-r from-yellow-200 to-lime-500 hover:border-b-2 hover:border-green-600 hover:rounded-xl shadow hover:drop-shadow-xl hover:shadow-cyan-500"
                        type="text" name="gender" id="gender" value="{{ $data->gender }}">
                </p>

                <p class="posts my-2 w-fit flex item-center justify-center hover:text-violet-900">Date of birth:- <input
                        class="border border-x-0 border-t-0 border-b-1 border-green-600 ml-2 px-1 rounded-full  bg-gradient-to-r from-yellow-200 to-lime-500 hover:border-b-2 hover:border-green-600 hover:rounded-xl shadow hover:drop-shadow-xl hover:shadow-cyan-500"
                        type="date" name="dob" id="dob" value="{{ $data->dob }}">
                </p>

                <p class="posts my-2 w-fit flex item-center justify-center hover:text-violet-900">Address:- <input
                        class="border border-x-0 border-t-0 border-b-1 border-green-600 ml-2 px-1 rounded-full  bg-gradient-to-r from-yellow-200 to-lime-500 hover:border-b-2 hover:border-green-600 hover:rounded-xl shadow hover:drop-shadow-xl hover:shadow-cyan-500"
                        type="text" name="address" id="address" value="{{ $data->address }}">
                </p>
                <button name="add" type="submit"
                    class="bg-gradient-to-r from-yellow-300 to-lime-300 rounded-full border border-1 border-green-700 px-2 ml-1 w-20 hover:border-green-700 hover:rounded-xl">Update</button>
            </div>
        </form>

    </div>

    {{--  --}}

    <div>
        <button
            class="right bg-red-400 hover:bg-red-500 text-blue-800 m-2 rounded-md font-bold text-center border border-blue-900 fixed bottom-0 right-0 h-10 px-10"><a
                href="logout">Logout</a></button>
    </div>

</body>

</html>
