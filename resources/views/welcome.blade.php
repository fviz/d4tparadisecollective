<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="/css/app.css">
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,400;0,600;1,200;1,400;1,600&display=swap');
        </style>

        <style>
            body {
                font-family: 'Poppins', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased p-8">
        <h1 class="font-bold text-xl -top-4 relative">Paradise Collective</h1>
        <hr class="border-black">

    <div class="products grid md:grid-cols-3 xl:grid-cols-4 mx-auto mt-16 gap-2">
        @foreach($products as $product)
            <div class="h-48 border border-black p-2 flex">
                <img src="{{ $product->images[0]}}" alt="" class="w-auto h-1/2 float-left mr-2">
                <div>
                    <strong>{{ $product->name }}</strong>
                    <p>{{ $product->description }}</p>
                    €{{ $product->found_price->unit_amount / 100 }}
                </div>

            </div>
        @endforeach
    </div>
    </body>
</html>
