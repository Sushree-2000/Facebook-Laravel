<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="icon" type="image/png"
        href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRF-2WpWmQgRP2bN2FR4IeQPZnAV-e93oT6yA&usqp=CAU" />
    <title>Posting</title>
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
            <input
                class="border border-2 border-green-600 rounded-full bg-gradient-to-r from-yellow-300 to-lime-300 hover:border-green-700 hover:rounded-xl active:border-1 active:border-green-800"
                type="text" name="search" placeholder="Search your friends...">
            <button
                class="border border-1 border-green-500 hover:bg-green-400 hover:border-green-600 text-green-900 m-1 rounded-sm"><a
                    href=" {{ url('profile') }} ">Profile</a></button>&nbsp;
            <button
                class="border border-1 border-green-500 hover:bg-green-400 hover:border-green-600 text-green-900 m-1 rounded-sm"><a
                    href=" {{ url('home') }} ">Home</a></button>&nbsp;
            <button
                class="border border-1 border-green-500 hover:bg-green-400 hover:border-green-600 text-green-900 m-1 rounded-sm"><a
                    href=" {{ url('about') }} ">About</a></button>&nbsp;
            <button
                class="border border-1 border-green-500 hover:bg-green-400 hover:border-green-600 text-green-900 m-1 rounded-sm"><a
                    href=" {{ url('contact') }} ">Contact</a></button>&nbsp;
            <button
                class="border border-1 border-green-500 hover:bg-green-400 hover:border-black-600 text-olive-900 m-1 rounded-sm"><a
                    href=" {{ url('setting') }} ">Settings</a></button>&nbsp;
        </div>

    </div>
    <div class="rounded-md mx-36 px-20">
        {{-- border border-green-700 green-2 --}}
        <div class="container w-fit flex item-center justify-center items-stretch">
            <p class="mt-2 mb-2 text-center text-3xl block self-start text-violet-900">Create Post</p>
        </div>
        <hr class="border border-1 border-green-700">
        {{--  --}}
        <form action=" {{ route('posted') }} " method="POST" enctype="multipart/form-data">
            @csrf
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

            <div class="container flex flex-col item-center justify-center items-stretch">
                <p class="posts mt-2 w-fit flex item-center justify-center">Add Text:- <input
                        class=" border border-1 border-green-700 ml-2 px-1 rounded-full  bg-gradient-to-r from-yellow-300 to-lime-300 hover:border-green-700 hover:rounded-xl"
                        type="text" placeholder="Write your texts here to post..." name="textpost"></p>

                <p class="posts my-2 w-fit flex item-center justify-center">Add Image:- <input
                        class="border pt-1 pb-5 px-1 w-64 border-1 border-green-700 ml-2 rounded-lg bg-gradient-to-r from-yellow-300 to-lime-300 hover:border-green-700 hover:rounded-xl"
                        type="file" placeholder="Post..." name="imagepost">
                </p>
                <button name="add" type="submit"
                    class="bg-gradient-to-r from-yellow-300 to-lime-300 rounded-full border border-1 border-green-700 px-2 ml-1 w-20 hover:border-green-700 hover:rounded-xl">Upload</button>
            </div>
        </form>
    </div>

    {{--  --}}
    <div>
        <button class="right bg-red-400 hover:bg-red-500 text-blue-800 m-2 rounded-md font-bold text-center border border-blue-900 fixed bottom-0 right-0 h-10 px-10"><a href="logout">Logout</a></button>
    </div>
</body>

</html>
