<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&display=swap" rel="stylesheet">

</head>

<body>
    <div class="bg-secondary h-screen w-screen flex justify-center items-center ">
        <div class="bg-success h-[90%] w-[90%] items-center flex rounded-2xl">
            <nav class="bg-primary w-[29%] h-[92%] rounded-3xl flex flex-col items-start ml-8 text-white">
                <div>
                    <img src="{{ asset('img/logo.png') }}" alt="">
                    <div class="flex justify-center items-center w-full flex-col">
                        <img src="{{ asset('img/accoundefault.png') }}" alt="" />
                        <p class="text-2xl font-bold font-lexend">ADMIN</p>
                    </div>
                </div>
                <div class="mt-10  flex-col justify-center items-center  w-full">
                    <div class="flex items-center justify-center w-full hover:bg-gray-700">
                        <a class="flex items-center  w-full px-7 cursor-pointer" href="/dashboard">
                            <img src="{{ asset('img/dashboard.png') }}" alt="" width="40" />
                            <p class="text-2xl font-bold font-lexend ml-4">Home</p>
                        </a>
                    </div>
                    <div class="flex items-center justify-center w-full hover:bg-gray-700">
                        <a class="flex items-center w-full px-7 cursor-pointer" href="/product">
                            <img src="{{ asset('img/barang.png') }}" alt="" width="40" />
                            <p class="text-2xl font-bold font-lexend ml-4">Product</p>
                        </a>
                    </div>
                    <div class="flex items-center justify-center w-full hover:bg-gray-700  ">
                        <a class="flex items-center w-full px-7 cursor-pointer" href="/category">
                            <img src="{{ asset('img/kategori.png') }}" alt="" width="40" />
                            <p class="text-2xl font-bold font-lexend ml-4">Category</p>
                        </a>
                    </div>
                    <div class="flex items-center justify-center w-full hover:bg-gray-700 bg-gray-800">
                        <a class="flex items-center w-full px-7 cursor-pointer" href="/brand">
                            <img src="{{ asset('img/brand.png') }}" alt="" width="40" />
                            <p class="text-2xl font-bold font-lexend ml-4">Brand</p>
                        </a>
                    </div>
                    <div class="flex items-center justify-center w-full hover:bg-gray-700">
                        <a class="flex items-center w-full px-7 cursor-pointer" href="/supplier">
                            <img src="{{ asset('img/supplier.png') }}" alt="" width="40" />
                            <p class="text-2xl font-bold font-lexend ml-4">Supplier</p>
                        </a>
                    </div>
                    <div class="flex items-center justify-center w-full hover:bg-gray-700">
                        <a class="flex items-center w-full px-7 cursor-pointer" href="/in_out">
                            <img src="{{ asset('img/in.png') }}" alt="" width="40" />
                            <p class="text-2xl font-bold font-lexend ml-4">In & Out</p>
                        </a>
                    </div>
                    <div class="flex items-center justify-center w-full h-8 hover:bg-gray-700 cursor-pointer">
                        <form class="cursor-pointer" method="POST" action="{{ route('logout') }} ">
                            @csrf
                            <button type="submit" class="cursor-pointer text-xl">Logout</button>
                        </form>
                    </div>
                </div>
            </nav>
            <div class="flex-col items-center justify-center h-full w-full flex gap-3">
                <div class="bg-white h-[92%] w-[97%] mr-8 ml-7 rounded-3xl ">
                    <div class="justify-between flex ">
                        <div
                            class="relative w-60 mt-10 ml-10 rounded-3xl border border-gray-300 h-12 justify-center items-center flex">
                            <input type="text" placeholder="Search"
                                class="w-full pl-10 pr-10 py-3 px-6 rounded-3xl text-black text-lg" />
                            <img src="{{ asset('img/search.png') }}" alt="Search"
                                class="absolute top-1/2 left-1 transform -translate-y-1/2 w-5 h-5" />
                        </div>
                        <div class="flex  mr-5">
                            <div
                                class="relative bg-blue-600 w-44 mt-10  rounded-3xl border border-gray-300 h-12 justify-center items-center flex ">
                                <button type="text" placeholder="Add Item"
                                    class="w-full pl-10 pr-10 py-3 px-6 text-sm rounded-3xl text-bold text- text-[#ffffff] cursor-pointer">
                                    Add Brand
                                </button>
                                <img src="{{ asset('img/add-circle.png') }}" alt="Search"
                                    class="absolute top-1/2 left-3 transform -translate-y-1/2 w-5 h-5 cursor-pointer" />
                            </div>
                            <div
                                class="relative w-30 h-12 mt-10 ml-10  rounded-3xl border border-gray-300 flex justify-center items-center">
                                <button type="text" placeholder="Search"
                                    class="w-full pl-10 pr-10 py-3 px-6 ml-2 rounded-3xl text-black text-lg cursor-pointer justify-center items-center"
                                    href="/filter">
                                    Filter
                                </button>
                                <img src="{{ asset('img/filter.png') }}" alt="Search"
                                    class="absolute top-1/2 left-3 transform -translate-y-1/2 w-5 h-5" />
                            </div>
                        </div>
                    </div>
                    <div class=" h-120 overflow-y-auto scrollbar-thin scrollbar-success">
                        <div class="flex gap-4 px-10 py-10 h-full ">
                            <ul class="">
                                <li class="flex flex-col gap-[43px] mt-19">
                                    @foreach ($brands as $brand)
                                        <input type="checkbox" class=" "></input>
                                    @endforeach
                                </li>
                            </ul>
                            <ul class="w-32">Kode Brand
                                <li class="flex flex-col gap-8 mt-11">
                                    @foreach ($brands as $brand)
                                        <p>{{ $brand->kode_brand }}</p>
                                    @endforeach ($users as $user)
                                </li>
                            </ul>
                            <ul class="w-80 ">Nama Brand
                                <li class="flex flex-col gap-8 mt-11 ">
                                    @foreach ($brands as $brand)
                                        <p>{{ $brand->nama_brand }}</p>
                                    @endforeach ($users as $user)
                                </li>
                            </ul>
                            <ul class="mr-5 w-48">Status
                                <li class="flex flex-col gap-8 mt-11">
                                    @foreach ($brands as $brand)
                                        <p class="flex flex-col ">{{ $brand->status }}</p>
                                    @endforeach ($users as $user)
                                </li>
                            </ul>
                            <ul class="mr-5  w-[14%]">Created At
                                <li class="flex flex-col gap-8 mt-11 w- ">
                                    @foreach ($brands as $brand)
                                        {{ $brand->created_at }}
                                    @endforeach ($users as $user)
                                </li>
                            </ul>
                            <ul class="mr-5 w-[14%]">Updated At
                                <li class="flex flex-col gap-8 mt-11">
                                    @foreach ($brands as $brand)
                                        {{ $brand->updated_at }}
                                    @endforeach ($users as $user)
                                </li>
                            </ul>
                            <ul class=" justify-center  w-[20%] ">
                                <p class="flex justify-center w-full mb-11">Action</p>
                                @foreach ($brands as $brand)
                                    <li class="flex gap-2 mb-6 w-full justify-center">
                                        <img class="cursor-pointer" src="{{ asset('img/action.png') }}"
                                            alt="">
                                        <img class="cursor-pointer" src="{{ asset('img/action-1.png') }}"
                                            width="30" />
                                        <img class="cursor-pointer" src="{{ asset('img/action-2.png') }}"
                                            width="30" />
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
    </div>
    <div id="modal-overlay"
        class="fixed inset-0 bg-black bg-opacity-50 backdrop-blur-sm hidden justify-center items-center z-50 w-full h-full">
        <div
            class="bg-white shadow-xl w-[800px] p-8 rounded-3xl relative top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">

            <!-- Header -->
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-gray-800">Tambah Barang</h2>
                <button id="close-modal" class="text-gray-500 hover:text-red-500 text-2xl font-bold">&times;</button>
            </div>

            <!-- Form -->
            <form method="POST" action="{{ route('brand.store') }}" class="grid grid-cols-2 gap-6">
                @csrf

                <!-- Kode Brand -->
                <div>
                    <label for="kode_brand" class="block text-gray-700 font-semibold mb-1">Kode Brand <span
                            class="text-red-500">*</span></label>
                    <input type="text" id="kode_brand" name="kode_brand" placeholder="Kode Brand"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>

                <!-- Status -->
                <div>
                    <label for="status" class="block text-gray-700 font-semibold mb-1">Status <span
                            class="text-red-500">*</span></label>
                    <select id="status" name="status"
                        class="w-full px-4 py-2 border cursor-pointer border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 bg-white">
                        <option disabled selected>Pilih status</option>
                        <option value="Tidak Aktif">Tidak Aktif</option>
                        <option value="Aktif">Aktif</option>
                    </select>
                </div>

                <!-- Nama Brand -->
                <div>
                    <label for="nama_brand" class="block text-gray-700 font-semibold mb-1">Brand <span
                            class="text-red-500">*</span></label>
                    <input type="text" id="nama_brand" name="nama_brand" placeholder="Masukkan Nama Brand"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>

                <!-- Tombol -->
                <div class="flex justify-end gap-4 mt-8 col-span-2">
                    <button type="button" id="close-modal1"
                        class="px-6 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-100 transition cursor-pointer">
                        Batal
                    </button>
                    <button type="submit"
                        class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition cursor-pointer">Tambah</button>
                </div>
            </form>

        </div>
    </div>

    <script>
        const addButton = document.querySelector('.bg-blue-600 button');
        const modal = document.getElementById('modal-overlay');
        const closeModal = document.getElementById('close-modal');
        const closeModal1 = document.getElementById('close-modal1');
        const pageWrapper = document.querySelector('.bg-secondary');

        addButton.addEventListener('click', () => {
            modal.classList.remove('hidden');
            pageWrapper.classList.add('blur-sm', 'pointer-events-none');
        });

        closeModal.addEventListener('click', () => {
            modal.classList.add('hidden');
            pageWrapper.classList.remove('blur-sm', 'pointer-events-none');
        });
        closeModal1.addEventListener('click', () => {
            modal.classList.add('hidden');
            pageWrapper.classList.remove('blur-sm', 'pointer-events-none');
        });
    </script>
</body>

</html>
