<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="icon" type="image/png"
        href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRF-2WpWmQgRP2bN2FR4IeQPZnAV-e93oT6yA&usqp=CAU" />
    <title>Home</title>
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
                class="m-1 border border-2 border-green-600 rounded-full bg-gradient-to-r from-yellow-300 to-lime-300 hover:border-green-700 hover:rounded-xl active:border-1 active:border-green-800"
                type="search" name="search" placeholder="Search your friends...">
            <button
                class="border border-1 border-green-500 hover:bg-green-400 hover:border-green-600 text-green-900 m-1 px-1 rounded-full"><a
                    href=" {{ url('profile') }} ">{{ $data->name }}</a></button>&nbsp;
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
        {{-- <div class="center flex text-top absolute top-0 right-1/2 item-center justify-center items-stretch">
            <h1 class="mt-0 text-center text-top text-3xl block self-start text-violet-900">Home Page</h1>
        </div> --}}
    </div>

    <div class="container flex item-center justify-center items-stretch">
        <p class="mt-0 text-center text-top text-3xl block self-start text-violet-900">Home Page</p>
    </div>
    <hr class="border border-green-500">
    {{--  --}}

    <div class="container flex item-center justify-center items-stretch">
        <button
            class="border border-1 border-green-500 w-72 rounded-md mt-2 bg-gradient-to-r from-yellow-300 to-lime-300"><a
                href=" {{ url('createpost') }} ">Create Post</a></button>
    </div>

    <div class="post m-4 pl-5 flex flex-col place-items-center">
        @foreach ($posts as $Posts)
            <p><a href=" {{ url('xprofile', ['id' => $Posts->user->id]) }} "> {{ $Posts->user->email }} </a></p>
            <div class="bg-lime-300 py-1 px-2 mt-2 flex flex-col place-items-center justify-around">
                <div class="info">
                    {{ $Posts->textpost }}<br>
                    Created at:-{{ date('jS M Y', strtotime($Posts->updated_at)) }}<br>
                    <img src="{{ asset('postedImg/' . $Posts->imagepost) }}" alt="">

                </div>
                <div class="interaction mb-2">
                    <a href=" {{ url('like', ['id' => $Posts->id]) }} "
                        class="text-blue-600 hover:underline mr-1">Like({{ $Posts->likes }})</a>
                    <a href=" {{ url('dislike', ['id' => $Posts->id]) }} "
                        class="text-blue-600 hover:underline mr-1">Dislike({{ $Posts->dislikes }})</a>

                    {{-- @if ($Posts->likes == null)
                        <a href=" {{ url('like', ['id' => $Posts->id]) }} "
                            class="text-blue-600 hover:underline mr-1">Like(0)</a>
                    @else
                        <a href=" {{ url('like', ['id' => $Posts->id]) }} "
                            class="text-blue-600 hover:underline mr-1">Like({{ count($Posts->likes) }})</a>
                    @endif --}}
                    {{-- <a href=" {{ url('like', ['id' => $Posts->id]) }} "
                        class="text-blue-600 hover:underline mr-1">Like({{ ($Posts->likes)->count() }})</a> --}}
                    {{-- <a href=" {{ url('dislike', ['id' => $Posts->id]) }} "
                        class="text-blue-600 hover:underline mr-1">Dislike({{ $Posts->dislikes->count() }})</a> --}}

                    @if ($Posts->user_id == $data->id)
                        <a href=" {{ url('editpost', ['id' => $Posts->id]) }} "
                            class="text-blue-600 hover:underline mr-1">Edit</a>
                        <a href=" {{ url('/delete', ['id' => $Posts->id]) }} " class="text-red-600 mr-1">Delete</a>
                    @endif
                    {{-- <a href="" class="text-blue-600 hover:underline mr-1">View</a> --}}
                </div>
            </div><br>
        @endforeach
    </div>

    {{--  --}}
    <div>
        <button
            class="right bg-red-400 hover:bg-red-500 text-blue-800 m-2 rounded-md font-bold text-center border border-blue-900 fixed bottom-0 right-0 h-10 px-10"><a
                href="logout">Logout</a></button>
    </div>
</body>

</html>
