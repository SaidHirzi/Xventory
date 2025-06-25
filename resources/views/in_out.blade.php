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
            <nav class="bg-primary w-[21%] h-[92%] rounded-3xl flex flex-col items-start ml-8 text-white">
                <div>
                    <img src="{{ asset('img/logo.png') }}" alt="">
                    <div class="flex justify-center items-center w-full flex-col">
                        <img src="{{ asset('img/accoundefault.png') }}" alt="" />
                        <p class="text-2xl font-bold font-lexend">ADMIN</p>
                    </div>
                </div>
                <div class="mt-10 flex-col justify-center items-center  w-full">
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
                    <div class="flex items-center justify-center w-full hover:bg-gray-700">
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
                    <div class="flex items-center justify-center w-full hover:bg-gray-700 bg-gray-800">
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
                    <div class="flex justify-center w-full gap-5">
                        <div class=" w-32 h-12 mt-6 ">
                            <a href="/in_out"
                                class="flex justify-center items-center h-full w-full gap-4 hover:border-b-2 hover:border-blue-600">
                                <img src="{{ asset('img/inn.png') }}" alt="" width="30" height=""
                                    class="h-[30px]" />
                                <button id="btn-in" class="   cursor-pointer text-xl">
                                    In Item
                                </button>
                            </a>
                        </div>
                        <div class=" w-32 h-12 mt-6 ">
                            <a href="/out"
                                class="flex justify-center items-center h-full w-full gap-4 hover:border-b-2 hover:border-blue-600">
                                <img src="{{ asset('img/document-text.png') }}" alt="" width="30"
                                    height="" class="h-[30px]" />
                                <button id="btn-in" class="   cursor-pointer text-xl">
                                    Out Item
                                </button>
                            </a>
                        </div>
                    </div>
                    <div class="justify-between flex ">
                        {{-- <div
                            class="relative w-60 mt-5 ml-10 rounded-3xl border border-gray-300 h-12 justify-center items-center flex">
                            <input type="text" placeholder="Search"
                                class="w-full pl-10 pr-10 py-3 px-6 rounded-3xl text-black text-lg" />
                            <img src="{{ asset('img/search.png') }}" alt="Search"
                                class="absolute top-1/2 left-1 transform -translate-y-1/2 w-5 h-5" />
                        </div> --}}
                    </div>
                    <div class=" h-120 overflow-y-auto scrollbar-thin scrollbar-success">
                        <div class="flex gap-4 px-10 py-10 h-full ">
                            <ul class="">
                                <li class="flex flex-col gap-[43px] mt-19">
                                    @foreach ($products as $product)
                                        <input type="checkbox" class=" "></input>
                                    @endforeach
                                </li>
                            </ul>
                            <ul class="">
                                <li>Kode Barang</li>
                                <ul class="flex flex-col gap-8 mt-11">
                                    @foreach ($products as $product)
                                        @php
                                            // Ambil brand berdasarkan nama brand yang sama dengan product_brand
                                            $brand = $brands->firstWhere('nama_brand', $product->product_brand);
                                        @endphp
                                        <li class="flex ">
                                            <span>{{ $brand ? $brand->kode_brand : '-' }}</span>
                                            <span>{{ $product->id }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </ul>
                            <ul class="w-40 ">Created By
                                <li class="flex flex-col gap-8 mt-11 ">
                                    @foreach ($products as $product)
                                        <p>{{ $product->product_name }}</p>
                                    @endforeach ($users as $user)
                                </li>
                            </ul>
                            <ul class="mr-5 w-24">Date
                                <li class="flex flex-col gap-8 mt-11">
                                    @foreach ($products as $product)
                                        <p>2024-10-01</p>
                                    @endforeach ($users as $user)
                                </li>
                            </ul>
                            <ul class="mr-5  w-28">Supplier Name
                                <li class="flex flex-col gap-8 mt-11 w- ">
                                    @foreach ($products as $product)
                                        <p>
                                            {{ $product->product_supplier }}
                                        </p>
                                    @endforeach ($users as $user)
                                </li>
                            </ul>
                            <ul class=" justify-center  w-[20%] ">
                                <p class="flex justify-center w-full mb-11">Action</p>
                                @foreach ($products as $product)
                                    <li class="flex gap-2 mb-1 w-full justify-center">
                                        <div class="mb-3">
                                            <button class="open-action-modal " data-id="{{ $product->id }}"
                                                data-address="{{ $product->address }}"
                                                data-name="{{ $product->product_name }}"
                                                data-code="{{ $product->product_code }}"
                                                data-created="{{ $product->created_at }}"
                                                data-updated="{{ $product->updated_at }}"
                                                data-status="{{ $product->status }}">
                                                <img class="cursor-pointer" src="{{ asset('img/action.png') }}"
                                                    alt="">
                                            </button>
                                        </div>
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
            <form class="grid grid-cols-2 gap-6">
                <!-- Nama Barang -->
                <div>
                    <label for="product_name" class="block text-gray-700 font-semibold mb-1">Kode Kategori <span
                            class="text-red-500">*</span></label>
                    <input type="text" id="product_name" name="product_name" placeholder="Nama barang"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>

                <!-- Jumlah Barang -->
                <div>
                    <label for="product_stock" class="block text-gray-700 font-semibold mb-1">Status <span
                            class="text-red-500">*</span></label>
                    <select id="product_category" name="product_category"
                        class="w-full px-4 py-2 border cursor-pointer border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 bg-white">
                        <option disabled selected>Pilih status</option>
                        <option>Tidak Aktif</option>
                        <option>Aktif</option>
                    </select>
                </div>

                <!-- Kategori -->
                <div>
                    <label for="product_category" class="block text-gray-700 font-semibold mb-1">Kategori <span
                            class="text-red-500">*</span></label>
                    <input type="text" id="nama_kategori" name="product_category"
                        placeholder="Masukkan Nama Kategori"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>
            </form>

            <!-- Tombol -->
            <div class="flex justify-end gap-4 mt-8">
                <button type="button" id="close-modal1"
                    class="px-6 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-100 transition cursor-pointer">
                    Batal
                </button>
                <button type="submit"
                    class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition cursor-pointer">Tambah</button>
            </div>
        </div>
    </div>

    <div id="modal-overlay1"
        class="fixed inset-0 bg-black bg-opacity-50 backdrop-blur-sm hidden justify-center items-center z-50 w-full h-full">
        <div
            class="bg-white shadow-xl w-[600px] h-[600px] p-8 rounded-3xl relative top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-gray-800">Detail Produk</h2>
                <button id="close-modal2" class="text-gray-500 hover:text-red-500 text-2xl font-bold">&times;</button>
            </div>
            <div id="modal-content" class="gap-y-9">
                <!-- Konten diisi dinamis lewat JS -->
            </div>
        </div>
    </div>

    <script>
        const addButton = document.querySelector('.bg-blue-600 button');
        const modal = document.getElementById('modal-overlay');
        const closeModal = document.getElementById('close-modal');
        const closeModal1 = document.getElementById('close-modal1');

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

        const editButtons = document.querySelectorAll('.edit-button');
        const editModal = document.getElementById('edit-modal');
        const closeEditModal = document.getElementById('close-edit-modal');
        const closeEditModal1 = document.getElementById('close-edit-modal1');
        const editForm = document.getElementById('edit-form');

        editButtons.forEach(button => {
            button.addEventListener('click', () => {
                const id = button.dataset.id;
                const name = button.dataset.name;
                const code = button.dataset.code;
                const status = button.dataset.status;

                document.getElementById('edit-product-id').value = id;
                document.getElementById('edit-product-name').value = name;
                document.getElementById('edit-product-code').value = code;
                document.getElementById('edit-status').value = status;


                editForm.action = `/brand/update/${id}`; // ganti sesuai route kamu
                editModal.classList.remove('hidden');
                pageWrapper.classList.add('blur-sm', 'pointer-events-none');
            });
        });

        [closeEditModal, closeEditModal1].forEach(button => {
            button.addEventListener('click', () => {
                editModal.classList.add('hidden');
                pageWrapper.classList.remove('blur-sm', 'pointer-events-none');
            });
        });

        document.addEventListener('DOMContentLoaded', () => {
            const actionButtons = document.querySelectorAll('.open-action-modal');
            const modal1 = document.getElementById('modal-overlay1');
            const modalContent = document.getElementById('modal-content');
            const pageWrapper = document.querySelector('.bg-secondary');
            const closeModal2 = document.getElementById('close-modal2');

            actionButtons.forEach(button => {
                button.addEventListener('click', () => {
                    const code = button.dataset.code;
                    const name = button.dataset.name;
                    const status = button.dataset.status;
                    const created = button.dataset.created;
                    const updated = button.dataset.updated;

                    modalContent.innerHTML = `
                    <div class="flex mb-4"><label class="block text-gray-700 font-semibold mb-1 mr-3">Kode Brand:</label><p class="text-gray-700 font-semibold">${code}</p></div>
                    <div class="flex mb-4"><label class="block text-gray-700 font-semibold mb-1 mr-3">Nama Brand:</label><p class="text-gray-700 font-semibold">${name}</p></div>
                    <div class="flex mb-4"><label class="block text-gray-700 font-semibold mb-1 mr-3">Status:</label><p class="text-gray-700 font-semibold">${status}</p></div>
                    <div class="flex mb-4"><label class="block text-gray-700 font-semibold mb-1 mr-3">Created At:</label><p class="text-gray-700 font-semibold">${created}</p></div>
                    <div class="flex mb-4"><label class="block text-gray-700 font-semibold mb-1 mr-3">Updated At:</label><p class="text-gray-700 font-semibold">${updated}</p></div>
                    `;

                    modal1.classList.remove('hidden');
                    pageWrapper?.classList.add('blur-sm', 'pointer-events-none');
                });
            });

            closeModal2.addEventListener('click', () => {
                modal1.classList.add('hidden');
                pageWrapper?.classList.remove('blur-sm', 'pointer-events-none');
            });
        });
    </script>
</body>

</html>
