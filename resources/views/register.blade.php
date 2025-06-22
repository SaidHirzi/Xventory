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
    <div class="relative w-screen h-screen">
        <img src="{{ asset('img/login.png') }}" alt="gambar-bg" class="absolute inset-0 w-full h-full object-cover">

        <div class="absolute inset-0 flex justify-center items-center px-4 py-2">
            <div
                class="bg-primary w-[500px] h-[500px] rounded-2xl shadow-lg text-white text-3xl font-bold flex flex-col items-center p-6 gap-4">
                <!-- Bagian Logo dan Judul -->
                <div class="relative  items-center -10">
                    <div class="flex h-full ">
                        <img src="{{ asset('img/logo.png') }}" alt="Logo" width="200" height="250"
                            class=" rounded-lg " />
                    </div>
                    <p class="text-white text-2xl font-semibold absolute top-18 left-10  ">User Login</p>
                </div>
                <!-- Form Login -->
                <form action="{{ route('register.store') }}" method="POST" class="w-full">
                    @csrf
                    <div class="w-full font-normal text-white px-17">
                        <div class="mb-4">
                            <input name="email" type="email" placeholder="Email"
                                class="w-full px-3 py-2 rounded-md bg-white text-black text-lg" required />
                        </div>
                        <div class="mb-4">
                            <input name="username" type="text" placeholder="Username"
                                class="w-full px-3 py-2 rounded-md bg-white text-black text-lg" required />
                        </div>
                        <div class="mb-4">
                            <input name="password" type="password" placeholder="Password"
                                class="w-full px-3 py-2 rounded-md bg-white text-black text-lg" required />
                        </div>
                        <div class="mb-4">
                            <input name="password_confirmation" type="password" placeholder="Confirm Password"
                                class="w-full px-3 py-2 rounded-md bg-white text-black text-lg" required />
                        </div>
                        <div>
                            <button
                                class="bg-secondary w-full h-10 rounded-lg text-white font-semibold hover:bg-opacity-80 transition text-lg">
                                Register
                            </button>
                        </div>
                        <div class="flex justify-center">
                            <p class="text-sm mt-2">Have an account? <a href="/login"
                                    class="text-blue-700 hover:text-blue-900">Login here</a></p>
                        </div>
                    </div>
                </form>

            </div>
        </div>

    </div>
</body>

</html>
