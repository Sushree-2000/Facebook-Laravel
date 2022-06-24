<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="icon" type="image/png"
        href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRF-2WpWmQgRP2bN2FR4IeQPZnAV-e93oT6yA&usqp=CAU" />
    <title>About</title>
    <script src="https://cdn.tailwindcss.com"></script>
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> --}}

    <style>
        .form {
            display: none;
        }

        .add:hover .form {
            display: block;
        }

        .editform {
            display: none;
        }

        .edit:hover .editform {
            display: block;
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
        <p class="mt-0 text-center text-top text-4xl block self-start text-violet-900">About Page</p>
    </div>
    <hr class="border border-1 border-green-700">

    {{--  --}}
    <div class="about flex place-content-evenly">
        <div
            class="left p-2 m-2 shadow shadow-lg shadow-cyan-500 hover:shadow-cyan-500  hover:shadow-xl hover:bg-gradient-to-r from-yellow-200 to-lime-500 rounded-lg">
            @foreach ($about as $abouts)
                <div class="personal mb-2 border border-1 p-2 rounded-lg border-green-600">
                    <h2 class="underline decoration-dashed underline-offset-4 text-bold">Personal details</h2>
                    <p>Full Name:- {{ $abouts->fullname }} </p>
                    <p>Email id:- {{ $abouts->email }} </p>
                    <p>Phone number:- {{ $abouts->number }} </p>
                    <p>Date of birth:- {{ $abouts->dob }} </p>
                    <p>Gender:- {{ $abouts->gender }} </p>
                    <p>Permanent Address:- {{ $abouts->address }} </p>
                </div>
                <div class="professional mb-2 border border-1 p-2 rounded-lg border-green-600">
                    <h2 class="underline decoration-dashed underline-offset-4 text-bold">Professsional details</h2>
                    <p>Work:- {{ $abouts->work }} </p>
                    <p>Education:- {{ $abouts->education }} </p>
                    <p>Educational Institute:- {{ $abouts->college }} </p>
                    <p>College pass out year:- {{ $abouts->passout }} </p>
                </div>
            @endforeach
            @foreach ($about as $abouts)
                <button type=""
                    class="edit m-2 border border-2 border-lime-500 h-8 px-2 pb-1 rounded-full mt-4 bg-gradient-to-r from-yellow-200 to-red-600"><a
                        href=" {{ url('deleteabout', ['id' => $abouts->id]) }} ">Delete</a></button>
            @endforeach
        </div>
        <div class="add p-2">
            <h2 class="add m-2 p-2 rounded-md bg-gradient-to-r from-yellow-200 to-cyan-500">Add your details</h2>
            <form action=" {{ route('aboutstored') }} " method="POST"
                class="form p-2 m-2 shadow shadow-lg shadow-cyan-500 hover:shadow-cyan-500 hover:shadow-xl hover:bg-gradient-to-r from-yellow-200 to-lime-500 rounded-lg">
                @csrf
                <div class="personaldetail flex flex-col my-1 border border-1 border-green-600 rounded-lg p-2">
                    <h3 class="underline decoration-dashed underline-offset-4">Personal details</h3>
                    <label for="fullname">Full name:</label>
                    <input type="text" name="fullname" placeholder="Enter your full name">
                    <span style=" color: red;">
                        @error('fullname')
                            {{ $message }}
                        @enderror
                    </span>
                    <label for="email">Email:</label>
                    <input type="email" name="email" placeholder="Enter your email id"
                        value="{{ $data->email }}">
                    <span style=" color: red;">
                        @error('email')
                            {{ $message }}
                        @enderror
                    </span>
                    <label for="number">Phone:</label>
                    <input type="tel" name="number" placeholder="Enter your phone number">
                    <span style=" color: red;">
                        @error('number')
                            {{ $message }}
                        @enderror
                    </span>
                    <label for="dob">Date of birth:</label>
                    <input type="date" name="dob" placeholder="Enter your DOB" value="{{ $data->dob }}">
                    <span style=" color: red;">
                        @error('dob')
                            {{ $message }}
                        @enderror
                    </span>
                    <label for="gender">Gender:</label>
                    <input type="text" name="gender" placeholder="Gender" value="{{ $data->gender }}">
                    <span style=" color: red;">
                        @error('gender')
                            {{ $message }}
                        @enderror
                    </span>
                    <label for="address">Permanent Address:</label>
                    <input type="text" name="address" placeholder="Enter your permanent address"
                        value="{{ $data->address }}">
                    <span style=" color: red;">
                        @error('address')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="professionaldetails flex flex-col mt-2 border border-1 border-green-600 rounded-lg p-2">
                    <h3 class="underline decoration-dashed underline-offset-4">Professional Details</h3>
                    <label for="work">Work:</label>
                    <input type="text" name="work" placeholder="What's your profession">
                    <span style=" color: red;">
                        @error('work')
                            {{ $message }}
                        @enderror
                    </span>
                    <label for="education">Education:</label>
                    <input type="text" name="education" placeholder="Qualification">
                    <span style=" color: red;">
                        @error('education')
                            {{ $message }}
                        @enderror
                    </span>
                    <label for="college">Educational Institute:</label>
                    <input type="text" name="college" placeholder="Your college name">
                    <span style=" color: red;">
                        @error('college')
                            {{ $message }}
                        @enderror
                    </span>
                    <label for="passout">College pass out year:</label>
                    <input type="text" name="passout" placeholder="Passout year">
                    <span style=" color: red;">
                        @error('college')
                            {{ $message }}
                        @enderror
                    </span>
                </div>

                <button type="submit"
                    class="m-2 border border-2 border-lime-500 h-8 px-2 pb-1 rounded-full mt-4 bg-gradient-to-r from-yellow-200 to-lime-500">Upload</button>

            </form>
        </div>
        <div class="edit p-2">
            <h2 class="edit m-2 p-2 rounded-md bg-gradient-to-r from-yellow-200 to-lime-500">Edit Here</h2>
            {{-- {{ route('aboutupdated',['id'=>$data->email]) }} --}}
            @foreach ($about as $abouts)
                <form action=" {{ url('updateabout', ['id' => $abouts->id]) }} " method="POST"
                    class="editform p-2 m-2 shadow shadow-lg shadow-cyan-500 hover:shadow-cyan-500 hover:shadow-xl hover:bg-gradient-to-r from-yellow-200 to-lime-500 rounded-lg">
                    @csrf
                    <div class="personaldetail flex flex-col my-1 border border-1 border-green-600 rounded-lg p-2">
                        <h3 class="underline decoration-dashed underline-offset-4">Personal details</h3>
                        <label for="fullname">Full name:</label>
                        <input type="text" name="fullname" placeholder="Enter your full name"
                            value="{{ $abouts->fullname }}">

                        <label for="email">Email:</label>
                        <input type="email" name="email" placeholder="Enter your email id"
                            value="{{ $abouts->email }}">

                        <label for="number">Phone:</label>
                        <input type="tel" name="number" placeholder="Enter your phone number"
                            value="{{ $abouts->number }}">

                        <label for="dob">Date of birth:</label>
                        <input type="date" name="dob" placeholder="Enter your DOB"
                            value="{{ $abouts->dob }}">

                        <label for="gender">Gender:</label>
                        <input type="text" name="gender" placeholder="Gender" value="{{ $abouts->gender }}">

                        <label for="address">Permanent Address:</label>
                        <input type="text" name="address" placeholder="Enter your permanent address"
                            value="{{ $abouts->address }}">

                    </div>
                    <div
                        class="professionaldetails flex flex-col mt-2 border border-1 border-green-600 rounded-lg p-2">
                        <h3 class="underline decoration-dashed underline-offset-4">Professional Details</h3>
                        <label for="work">Work:</label>
                        <input type="text" name="work" placeholder="What's your profession"
                            value="{{ $abouts->work }}">

                        <label for="education">Education:</label>
                        <input type="text" name="education" placeholder="Qualification"
                            value="{{ $abouts->education }}">

                        <label for="college">Educational Institute:</label>
                        <input type="text" name="college" placeholder="Your college name"
                            value="{{ $abouts->college }}">

                        <label for="passout">College pass out year:</label>
                        <input type="text" name="passout" placeholder="Passout year"
                            value="{{ $abouts->passout }}">

                    </div>

                    <button type="submit"
                        class="m-2 border border-2 border-lime-500 h-8 px-2 pb-1 rounded-full mt-4 bg-gradient-to-r from-yellow-200 to-lime-500">Update</button>
                </form>
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
