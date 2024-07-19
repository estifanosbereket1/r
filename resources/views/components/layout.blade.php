<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="images/favicon.ico" />
      <!-- Flatpickr CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css"/>
   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
 <!-- Flatpickr JS -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        laravel: "#ef3b2d",
                    },
                },
            },
        };
    </script>
    <title>Lakeside Reservations | Find rooms</title>
</head>

<body class="mb-48">
    <nav class="flex px-4 justify-between items-center mb-4 top-0 pt-10 border-b-[1px] py-4 z-40 bg-white sticky  ">
        <a href="/">
            <h1 class="font-extrabold text-2xl">Lakeside Rentals</h1>
        </a>
        <ul class="flex space-x-6 mr-6 text-lg">
            @auth
                <li>
                    <span class="font-bold ">Welcome {{ auth()->user()->name }} </span>
                </li>
                <li>
                    <a href="/rooms/manage" class="hover:text-laravel"><i class="fa-solid fa-gear"></i>
                        Manage Listing</a>
                </li>

                 <li>
                    <a href="/reservations" class="hover:text-laravel"><i class="fa-solid fa-clock"></i>
                        reservations</a>
                </li>
                <li>
                    <form action="/logout" class="inline" method="POST">
                        @csrf
                        <button type="submit"> <i class="fa-solid fa-door-closed"></i>Logout</button>
                    </form>
                </li>
            @else
                <li>
                    <a href="/register" class="hover:text-laravel"><i class="fa-solid fa-user-plus"></i> Register</a>
                </li>
                <li>
                    <a href="/login" class="hover:text-laravel"><i class="fa-solid fa-arrow-right-to-bracket"></i>
                        Login</a>
                </li>
            @endauth
        </ul>
    </nav>

    <main>
        {{ $slot }}
    </main>
    <footer
        class="fixed bottom-0 left-0 w-full flex items-center justify-start font-bold bg-cyan-700 text-white h-24 mt-24 opacity-90 md:justify-center">
        <p class="ml-2">Copyright &copy; 2022, All Rights reserved</p>

        <a href="/rooms/create" class="absolute top-1/3 right-10 bg-black text-white py-2 px-5">Add Room</a>
    </footer>
    <x-flash-card />
</body>

</html>
