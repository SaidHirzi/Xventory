<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard In / Out</title>
    @vite('resources/css/app.css')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&display=swap" rel="stylesheet">
</head>

<body class="font-lexend bg-secondary h-screen w-screen flex justify-center items-center">

    <div class="bg-success h-[90%] w-[90%] flex rounded-2xl">
        <!-- Sidebar -->
        <nav class="bg-primary w-[280px] h-[93%] rounded-3xl flex flex-col items-start ml-8 text-white mt-7">
            <div>
                <img src="{{ asset('img/logo.png') }}" alt="">
                <div class="flex justify-center items-center w-full flex-col">
                    <img src="{{ asset('img/accoundefault.png') }}" alt="" />
                    <p class="text-2xl font-bold font-lexend">ADMIN</p>
                </div>
            </div>
            <div class="mt-10  flex-col justify-center items-center  w-full">
                <div class="flex items-center justify-center w-full hover:bg-gray-700 bg-gray-800">
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
                <div class="flex items-center justify-center w-full hover:bg-gray-700 ">
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

        <!-- Main Content -->
        <div class="flex flex-col items-center justify-center h-full w-full ">
            <!-- Top Cards -->
            <div class="flex items-center justify-between h-[15%] w-[97%] gap-2 mb-2">
                <div class="bg-white w-full rounded-3xl shadow p-4 h-[100%] flex justify-center items-center gap-8">
                    <img src="{{ asset('img/box.png') }}" alt="">
                    <div class="flex flex-col">
                        <h2 class="text-2xl font-bold">1000</h2>
                        <p class="text-2xl font-bold">Product</p>
                    </div>
                </div>
                <div class="bg-white w-full rounded-3xl shadow p-4 h-[100%] flex justify-center items-center gap-8">
                    <img src="{{ asset('img/brandd.png') }}" alt="">
                    <div class="flex flex-col">
                        <h2 class="text-2xl font-bold">1000</h2>
                        <p class="text-2xl font-bold">Brand</p>
                    </div>
                </div>
                <div class="bg-white w-full rounded-3xl shadow p-4 h-[100%] flex justify-center items-center gap-8">
                    <img src="{{ asset('img/people.png') }}" alt="">
                    <div class="flex flex-col">
                        <h2 class="text-2xl font-bold">1000</h2>
                        <p class="text-2xl font-bold">Categories</p>
                    </div>
                </div>
            </div>

            <!-- Chart Area -->
            <div class="bg-white h-[75%] w-[97%] rounded-3xl relative shadow px-6 py-4 overflow-hidden">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-2xl font-bold">In / Out</h2>
                    <div class="flex items-center gap-4">
                        <span class="text-green-600 font-bold">⬆ 1.1% vs last Year</span>
                        <span class="flex items-center gap-2"><span
                                class="w-3 h-1 bg-green-600 rounded-full"></span>Last Year</span>
                        <span class="flex items-center gap-2"><span
                                class="w-3 h-1 bg-blue-600 rounded-full"></span>Running Year</span>
                        <div class="bg-black text-white px-3 py-1 rounded-full text-sm">1Y</div>
                    </div>
                </div>

                <div class="h-[93%] w-full">
                    <canvas id="inOutChart" class="w-full h-full"></canvas>
                </div>
            </div>

        </div>
    </div>

    <script>
        const ctx = document.getElementById('inOutChart').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Ags', 'Sep', 'Okt', 'Nov', 'Des'],
                datasets: [{
                        label: 'Last Year',
                        data: [300, 250, 260, 500, 400, 380, 410, 800, 420, 250, 210, 230],
                        borderColor: 'green',
                        tension: 0.4,
                        fill: false,
                    },
                    {
                        label: 'Running Year',
                        data: [280, 310, 300, 550, 700, 450, 480, 650, 500, 700, 520, 560],
                        borderColor: 'blue',
                        tension: 0.4,
                        fill: true,
                        backgroundColor: 'rgba(59, 130, 246, 0.1)',
                        pointBackgroundColor: 'blue'
                    }

                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        mode: 'index',
                        intersect: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 1000,
                        ticks: {
                            stepSize: 200
                        }
                    }
                }
            }
        });
    </script>
</body>

</html>
