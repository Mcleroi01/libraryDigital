<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'BiblioTech') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.2/css/responsive.dataTables.css">


    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js', 'node_modules/epubjs/dist/epub.min.js'])


</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        @include('layouts.navigation')

        <div class="p-4 pt-20 px-2 md:px-5 pb-4 ml-12  sm:ml-64">
            @if (isset($header))
                <nav class = "flex px-5 py-3 text-gray-700  rounded-lg bg-[#eaeaebf3] dark:bg-[#1E293B] "
                    aria-label="Breadcrumb">
                    <ol class = "inline-flex items-center space-x-1 md:space-x-3">
                        <li class = "inline-flex items-center">
                            <a href="#"
                                class = "inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
                                @yield('svg')
                                {{ $header }}
                            </a>
                        </li>
                        <li>
                            <div class = "flex items-center">
                                <svg class = "w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fillRule="evenodd"
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clipRule="evenodd"></path>
                                </svg>

                            </div>
                        </li>
                    </ol>
                </nav>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.5/jszip.min.js"></script>
    <script src="{{ Vite::asset('node_modules/epubjs/dist/epub.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#table').DataTable({
                language: {
                    lengthMenu: 'Afficher les entrées _MENU_',
                    info: 'Affichage de la page _PAGE_ sur _PAGES_'
                },
            });


            $('.dt-container').addClass('text-base text-gray-800 dark:text-gray-400 leading-tight')

            $('.dt-buttons').addClass('mt-4')
            $('.dt-buttons buttons').addClass('cursor-pointer mt-5 bg-slate-600 p-2 rounded-sm font-bold')

            $("#dt-length-0").addClass('text-gray-700 dark:text-gray-400 w-24 bg-white');

            $('.dt-input').addClass('w-20')



        });
    </script>
    

    @yield('script')

</body>

</html>
