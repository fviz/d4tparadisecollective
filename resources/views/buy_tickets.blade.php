<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>D4T PARADISE</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        .button {
            font-size: 11px;
            box-sizing: border-box;
            border: none;
            background: silver;
            box-shadow: inset -1px -1px #0a0a0a, inset 1px 1px #fff, inset -2px -2px grey, inset 2px 2px #dfdfdf;
            border-radius: 0;
            min-width: 75px;
            min-height: 23px;
            padding: 0 12px;
        }
    </style>
</head>
<body
    style="background-image: url('/assets/wp.jpg'); background-repeat: no-repeat; background-size: cover; background-position: center; min-height: 100vh">

<div class="m-8 md:top-10 md:left-10 md:fixed md:w-64 md:h-90 bg-white border">
    <div class="flex justify-between items-center bg-pink-600 text-white px-1">
        <span>
        WHAT
        </span>
        <div class="text-center">
            <img src="./assets/close.gif" alt="">
        </div>
    </div>
    <div class="p-2">
        <p>
            We are launching a website, and that is so cool that we are throwing a party for it.
        </p>
        <p>
            <img src="./assets/mrticketreadytorockatcojz9.gif" alt="">
        </p>
    </div>
</div>

<div class="m-8 md:fixed md:w-64 md:h-90 bg-white border" style="top: 190px; left: 250px;">
    <div class="flex justify-between items-center bg-pink-600 text-white px-1">
        <span>
        WHEN & WHERE
        </span>
        <div>
            <img src="./assets/close.gif" alt="">
        </div>
    </div>
    <div class="p-2">
        <p>
            Date: 22/04/2022 <br>
            Time: 20:00 – 03:00+ <br>
            Location: <a href="#" class="underline text-blue-800">Onderlands 9, Arnhem</a>
        </p>
    </div>
</div>

<div class="m-8 md:fixed md:w-64 md:h-90 bg-white border" style="top: 310px; left: 250px;">
    <div class="flex justify-between items-center bg-pink-600 text-white px-1">
        <span>
        HOW MUCH
        </span>
        <div>
            <img src="./assets/close.gif" alt="">
        </div>
    </div>
    <div class="p-2">
        <p>
            Name your own price, starting at €0 :}
        </p>
        <p class="text-sm">
            If you choose to pay, you can do it with iDeal or with a credit card. If you'd like to pay in cash, <a class="text-blue-600 underline"
                href="mailto:BVAMD4@artez.nl">send us a message</a> and we will arrange something.<br>
        </p>

    </div>
</div>

<div class="m-8 md:fixed md:w-64 md:h-90 bg-white border" style="top: 310px; left: 250px;">
    <div class="flex justify-between items-center bg-pink-600 text-white px-1">
        <span>
        GET TICKETS NOW
        </span>
        <div>
            <img src="./assets/close.gif" alt="">
        </div>
    </div>
    <div class="p-2">
        <form action="" x-data="{ priceFieldVisible: false}">
            <label for="amount">How many tickets?</label>
            <div class="relative">
                <input type="number" id="amount" name="amount" class="border w-full px-1">
                <div class="absolute right-1 top-0 h-full text-gray-800 w-4 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" className="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" strokeWidth={2}>
                        <path strokeLinecap="round" strokeLinejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </div>
            </div>
            <span>How much would you like to pay?</span>
            <div>
                <input type="radio" id="free" name="payment_choice" value="free" x-model="priceFieldVisible">
                <label for="free">Go for free</label>
            </div>
            <div>
                <input type="radio" id="name_your_price" name="payment_choice" value="name_your_price" x-model="priceFieldVisible" >
                <label for="name_your_price">Name your price</label>
            </div>
            <template x-if="priceFieldVisible=='name_your_price'">
                <div>
                    <label for="price">Price</label>
                    <div class="relative">
                        <input type="text" id="price" name="price" class="border w-full px-1">
                        <div class="absolute right-2 top-0 text-gray-500">
                            €
                        </div>
                    </div>

                </div>
            </template>

            <div>
                <button class="button w-full mt-2">Buy now</button>
            </div>
        </form>
    </div>
</div>

</body>
</html>
