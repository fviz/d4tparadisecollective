<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>D4T PARADISE COLLECTIVE</title>
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
        THANK YOU
        </span>
        <div class="text-center">
            <a href="/">
                <img src="./assets/close.gif" alt="">
            </a>
        </div>
    </div>
    <div class="p-2">
        <p>
            Success! Thank you for reserving your tickets. We will send a confirmation email to {{$ticket->client_email}}.
        </p>
        <div class="flex">
            <img src="./assets/gdance.gif" alt="">
            <img src="./assets/gdance.gif" alt="">
            <img src="./assets/gdance.gif" alt="">
            <img src="./assets/gdance.gif" alt="">
        </div>
    </div>
</div>


</body>
</html>
