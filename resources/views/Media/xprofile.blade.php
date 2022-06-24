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
    <style>
        .dropbtn {
            /* background-color: rgb(166, 255, 0); */
            color: black;
            padding-left: 8px;
            padding-right: 8px;
            border-radius: 6px;
            border-width: 2px;
            border-color: rgb(48, 185, 100);
            /* font-size: 16px; */
        }

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            /* background-color: rgb(166, 255, 0); */
            min-width: 160px;
            margin-top: 6px;
            border-radius: 6px;
            /* box-shadow: 0px 10px 15px -3px rgba(30, 243, 2, 0.2); */
            box-shadow: 0 10px 15px -3px rgb(42, 180, 8), 0 4px 6px -4px rgb(42, 180, 8);
            z-index: 1;
        }

        .dropdown-content a {
            color: blue;
            /* background-color: rgb(221, 245, 2); */
            box-shadow: 0 10px 15px -3px rgb(35, 173, 0), 0 4px 6px -4px rgb(35, 173, 0);
            padding: 8px 12px;
            border-radius: 6px;
            margin-bottom: 4px;
            /* text-decoration: none; */
            border-width: 1px;
            border-color: rgb(48, 185, 100);
            /* rgb(52, 248, 3) */
            display: block;
        }

        .dropdown-content a:hover {
            background-color: rgb(229, 255, 0);
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .dropdown:hover .dropbtn {
            background-color: rgb(102, 255, 0);
        }
    </style>

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
                    href=" {{ url('profile') }} ">{{$data->name}}</a></button>&nbsp;
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
        <p class="mt-0 text-center text-top text-3xl block self-start text-violet-900">Profile Page</p>
    </div>
    <hr class="border border-green-500">

    {{--  --}}
    <div>
        {{-- <div class="container flex item-center justify-center items-stretch">
            <button
                class="border border-1 border-green-500 w-72 rounded-md mt-2 bg-gradient-to-r from-yellow-300 to-lime-300"><a
                    href=" {{ url('createpost') }} ">Create Post</a></button>
        </div> --}}
        <div class="flex justify-around">
            <div class="mypost_left py-5">
                @foreach ($posts as $post)
                    <p><span class="border border-2 border-green-500 mr-2 rounded-full px-1">{{ $data->name }}</span> Created on {{ $post->created_at }}</p>
                    {{-- date('jS M Y',strtotime($post->updated_at)) --}}
                    <div class="info">
                        {{ $post->imagepost }}
                    </div>
                    <div class="interaction mb-2">
                        <a href="" class="text-blue-600 hover:underline mr-1">Like</a>|
                        <a href="" class="text-blue-600 hover:underline mr-1">Dislike</a>

                        {{-- <a href=" {{ url('/editpost', ['id' => $post->id]) }} "
                            class="text-blue-600 hover:underline mr-1">Edit</a>|
                        <a href=" {{ url('/delete', ['id' => $post->id]) }} " class="text-red-600 mr-1">Delete</a> --}}
                        {{-- <a href="" class="text-blue-600 hover:underline mr-1">View</a> --}}
                    </div>
                @endforeach
            </div>
            <div class="dropdown m-2 p-2">
                {{-- <p class="dropbtn bg-gradient-to-r from-yellow-300 to-lime-500">Personal details<a href=" {{ url('editdetail',['id'=>$data->id]) }} " class="editdetail rounded-full border border-1 border-green-600 ml-1 px-1 bg-gradient-to-r from-yellow-300 to-lime-500 hover:border-2">Edit</a></p> --}}
                <p class="dropbtn bg-gradient-to-r from-yellow-300 to-lime-500">Personal details</p>

                <div class="dropdown-content">
                    <a href="" class="bg-gradient-to-r from-yellow-300 to-lime-500">Name:-{{ $data->name }}</a>
                    <a href="" class="bg-gradient-to-r from-yellow-300 to-lime-500">E-mail:-{{ $data->email }}</a>
                    <a href="" class="bg-gradient-to-r from-yellow-300 to-lime-500">Gender:-{{ $data->gender }}</a>
                    <a href="" class="bg-gradient-to-r from-yellow-300 to-lime-500">Date of Birth:-{{ $data->dob }}</a>
                    <a href="" class="bg-gradient-to-r from-yellow-300 to-lime-500">Address:-{{ $data->address }}</a>
                </div>
            </div>
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
