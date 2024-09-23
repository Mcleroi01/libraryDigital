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

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        @include('layouts.navigation')

        <div class="p-4 sm:ml-64">
            @isset($header)
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        function expandSidebar() {
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.querySelector('.ml-16');

            if (sidebar.style.width === '16rem') {
                sidebar.style.width = '4rem';
                mainContent.style.marginLeft = '4rem';
                sidebar.classList.remove('text-left', 'px-6');
                sidebar.classList.add('text-center', 'px-0');
            } else {
                sidebar.style.width = '16rem';
                mainContent.style.marginLeft = '16rem';
                sidebar.classList.add('text-left', 'px-6');
                sidebar.classList.remove('text-center', 'px-0');
            }

            const labels = sidebar.querySelectorAll('span');
            labels.forEach(label => label.classList.toggle('opacity-0'));
        }

        function highlightSidebarItem(element) {
            const buttons = document.querySelectorAll("#sidebar button");
            buttons.forEach(btn => {
                btn.classList.remove('bg-gradient-to-r', 'from-cyan-400', 'to-cyan-500', 'text-white', 'w-48',
                    'ml-0');
                btn.firstChild.nextSibling.classList.remove('text-white');
            });
            element.classList.add('bg-gradient-to-r', 'from-cyan-400', 'to-cyan-500', 'w-56', 'h-10', 'ml-0');
            element.firstChild.nextSibling.classList.add('text-white');
        }

        // Para la gráfica de Usuarios
        var ctx = document.getElementById('usersChart').getContext('2d');
        new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Usuarios Nuevos', 'Usuarios Registrados'],
                datasets: [{
                    data: [50, 50],
                    backgroundColor: ['cyan', 'yellow'],
                }]
            },
            options: {
                responsive: true,
            }
        });

        // Para la gráfica de Comercios
        var ctx2 = document.getElementById('commercesChart').getContext('2d');
        new Chart(ctx2, {
            type: 'doughnut',
            data: {
                labels: ['Comercios Nuevos', 'Comercios Registrados'],
                datasets: [{
                    data: [60, 40],
                    backgroundColor: ['cyan', 'yellow'],
                }]
            },
            options: {
                responsive: true,
            }
        });
    </script>
</body>

</html>
