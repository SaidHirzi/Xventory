<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <div>

        @extends('layouts.app')

        @section('content')
            <div class="min-h-screen bg-gray-100 flex flex-col items-center py-10 px-4">
                <h2 class="text-3xl font-bold mb-6">Search Product</h2>

                <form action="{{ route('product.search') }}" method="GET" class="w-full max-w-md mb-6">
                    <input type="text" name="search" placeholder="Type to search..."
                        class="w-full px-4 py-3 rounded-lg border border-gray-300 shadow focus:outline-none"
                        value="{{ request('search') }}">
                </form>

                @if ($products->count())
                    <div class="w-full max-w-2xl bg-white rounded-xl shadow p-4">
                        <h3 class="text-xl font-semibold mb-4">Search Results</h3>
                        <ul class="divide-y">
                            @foreach ($products as $product)
                                <li class="py-2">{{ $product->nama_product }}</li>
                            @endforeach
                        </ul>
                    </div>
                @else
                    <p class="text-gray-500">No products found.</p>
                @endif
            </div>
        @endsection
    </div>

</body>

</html>
