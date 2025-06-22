<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Page</title>
    @vite('resources/css/app.css')

</head>

<body>
    <div class="relative w-screen h-screen ">
        <img src="{{ asset('img/login.png') }}" alt="gambar-bg" class="absolute inset-0 w-full h-full object-cover">
        <div class="absolute inset-0 flex justify-center items-center p-4">
            <div
                class="bg-primary w-[500px] h-[500px] rounded-2xl shadow-lg text-white text-3xl font-bold flex flex-col items-center p-6 gap-4">
                <!-- Bagian Logo dan Judul -->
                <div class="relative  items-center -10">
                    <div class="flex h-full ">
                        <img src="{{ asset('img/logo.png') }}" alt="Logo" width="200" height="250"
                            class=" rounded-lg " />
                    </div>
                    <p class="text-white text-2xl font-semibold absolute top-22 left-10  ">User Login</p>
                </div>

                {{-- login --}}
                <form action="{{ route('login.auth') }}" method="POST" class="w-full">
                    @csrf
                    <div class="w-full font-normal text-white mt-10 px-17">
                        <div class="mb-4">
                            <input name="username" type="text" placeholder="Username"
                                class="w-full px-3 py-3 rounded-md bg-white text-black text-lg" required />
                        </div>
                        <div class="mb-4">
                            <input name="password" type="password" placeholder="Password"
                                class="w-full px-3 py-3 rounded-md bg-white text-black text-lg" required />
                        </div>
                        <!-- checkbox dan tombol login -->
                        <div class="flex w-full">
                            <label class="flex items-center cursor-pointer">
                                <input type="checkbox" class="mr-2" />
                                <span class="text-sm">Remember Me</span>
                            </label>
                            <a href="/ForgotPassword" class="text-sm ml-auto text-blue-700 hover:text-blue-900">Forgot
                                Password</a>
                        </div>
                        <div>
                            <button type="submit"
                                class="bg-secondary w-full h-12 rounded-lg mt-2 text-white cursor-pointer font-semibold hover:bg-opacity-80 transition">Login</button>
                        </div>
                        <div class="flex justify-center">
                            <p class="text-sm mt-2">Don't have an account? <a href="/register"
                                    class="text-blue-700 hover:text-blue-900">Register</a></p>
                        </div>
                    </div>
                </form>


            </div>
        </div>

    </div>
</body>

</html>
