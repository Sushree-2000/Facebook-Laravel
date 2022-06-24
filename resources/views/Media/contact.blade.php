<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="icon" type="image/png"
        href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRF-2WpWmQgRP2bN2FR4IeQPZnAV-e93oT6yA&usqp=CAU" />
    <title>Contact</title>
    <script src="https://cdn.tailwindcss.com"></script>
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> --}}

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
                class="border border-1 border-green-500 hover:bg-green-400 hover:border-green-600 text-green-900 m-1 px-1 rounded-full"><a
                    href=" {{ url('profile') }} ">{{ $data->name }}</a></button>&nbsp;
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
        {{-- <div class="center flex text-top absolute top-0 right-1/2 item-center justify-center items-stretch">
            <h1 class="mt-0 text-center text-top text-3xl block self-start text-violet-900">Home Page</h1>
        </div> --}}
    </div>

    <div class="container flex item-center justify-center items-stretch">
        <p class="mt-0 text-center text-top text-4xl block self-start text-violet-900">Contact Page</p>
    </div>
    <hr class="border border-1 border-green-700">

    {{--  --}}
    <div class="about flex place-content-evenly m-4">
        <div
            class="left p-2 m-2 shadow shadow-lg shadow-cyan-500 hover:shadow-cyan-500  hover:shadow-xl hover:bg-gradient-to-r from-yellow-200 to-lime-500 rounded-lg">
            @foreach ($about as $abouts)
                <div class="personal mb-2 border border-1 p-2 rounded-lg border-green-600">
                    <h2 class="underline decoration-dashed underline-offset-4 font-bold">Contact details</h2>
                    <p class="font-bold">Full Name:- {{ $abouts->fullname }} </p>
                    <p class="font-bold">Email id:- {{ $abouts->email }} </p>
                    <p class="font-bold">Phone number:- {{ $abouts->number }} </p>
                    <p class="font-bold">Permanent Address:- {{ $abouts->address }} </p>
                </div>
            @endforeach
        </div>
    </div>
    {{--  --}}
    <div>
        <button
            class="right bg-red-400 hover:bg-red-500 text-blue-800 m-2 rounded-md font-bold text-center border border-blue-900 fixed bottom-0 right-0 h-10 px-10"><a
                href="logout">Logout</a></button>
    </div>
</body>

</html>
