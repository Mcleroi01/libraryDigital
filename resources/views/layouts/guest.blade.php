<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ asset('img/icon.png') }}" type="image/x-icon">

    <title>{{ $title ?? 'BiblioTech' }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.2/css/responsive.dataTables.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.0.2/css/buttons.dataTables.css">

    <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/42.0.0/ckeditor5.css" />
    <link rel="stylesheet"
        href="https://cdn.ckeditor.com/ckeditor5-premium-features/42.0.0/ckeditor5-premium-features.css" />

    <style>
        /* Couleur normale des liens */
        .book-card {
            position: relative;
            width: 200px;
            height: 300px;
            perspective: 1000px;
            margin: 20px;
        }

        .book-card__book {
            position: relative;
            width: 100%;
            height: 100%;
            transform-style: preserve-3d;
            transition: transform 0.6s ease;
        }

        .book-card__book-front,
        .book-card__book-back,
        .book-card__book-side {
            position: absolute;
            width: 100%;
            height: 100%;
            backface-visibility: hidden;
        }

        .book-card__book-front {
            z-index: 2;
            transform: rotateY(0deg);
        }

        .book-card__book-back {
            background-color: #fff;
            transform: rotateY(180deg);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.233);
        }

        /* Effet de pages avec des lignes verticales */
        .book-card__book-side {
            position: absolute;
            width: 20px;
            height: 100%;
            right: -15px;
            transform: rotateY(90deg);
            background: repeating-linear-gradient(to right,
                    /* Changement ici pour lignes verticales */
                    #ddd,
                    #ddd 2px,
                    #ccc 2px,
                    #ccc 4px);
            box-shadow: inset 0 0 10px rgba(0, 0, 0, 0.2);
        }

        .book-card:hover .book-card__book {
            transform: rotateY(-30deg) translateX(-10px);
        }

        .book-card:hover .book-card__book-back {
            box-shadow: 5px 10px 20px rgba(0, 0, 0, 0.35);
        }

        .book-card:hover .book-card__book-side {
            opacity: 1;
            background: repeating-linear-gradient(to right,
                    /* Changement ici pour lignes verticales */
                    #ccc,
                    #ccc 2px,
                    #bbb 2px,
                    #bbb 4px);
        }
    </style>


    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="body bg-[#eaeaebf3] dark:bg-[#1E293B] ">
    <div class=" bg-gray-100 dark:bg-[#1E293B] ">
        @include('layouts.sidebar')

        @if (isset($header))
            <div class="relative bg-gradient-to-r from-purple-600 to-blue-600 h-screen text-white overflow-hidden">
                <div class="absolute inset-0">
                    <img src="https://wallpapers.com/images/hd/library-zoom-background-1920-x-1080-h4ge4nhje5ck2vsd.jpg"
                        alt="Background Image" class="object-cover object-center w-full h-full" />
                    <div class="absolute inset-0 bg-black opacity-50"></div>
                </div>

                <div class="relative z-10 flex flex-col justify-center items-center h-full text-center">

                    <img class="h-auto max-w-lg rounded-lg"
                        src="https://static.vecteezy.com/system/resources/thumbnails/013/083/736/small/stick-man-with-book-shelves-in-library-education-and-learning-concept-3d-illustration-or-3d-rendering-png.png"
                        alt="image description">

                    <h1 class="text-5xl font-bold leading-tight mb-4">{{ $header }}</h1>
                    <p class="text-xl text-gray-300 mb-8">Nous croyons que la lecture doit être accessible à tous. Notre plateforme offre une large sélection de livres numériques, facilitant l'accès à la littérature moderne et classique.</p>
                    <a href="#"
                        class="bg-yellow-400 text-gray-900 hover:bg-yellow-300 py-2 px-6 rounded-full text-lg font-semibold transition duration-300 ease-in-out transform hover:scale-105 hover:shadow-lg">Get
                        Started</a>
                </div>
            </div>
        @endif

        <main>
            {{ $slot }}
        </main>
        @include('layouts.footer')
    </div>
    <script>
        window.onscroll = function() {
            const header = document.getElementById("header");
            const navLinks = document.getElementById("nav-links");

            if (window.pageYOffset > 100) {
                header.classList.add("sticky-active");
            } else {
                header.classList.remove("sticky-active");
            }
        };
    </script>

</body>

</html>
