<nav class="bg-white border-b border-gray-300">
    <div class="flex justify-between items-center px-6">
        <!-- Ícono de Menú (cyan) -->
        <button id="menu-button" onclick="expandSidebar()">
            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M5 7h14M5 12h14M5 17h10" />
            </svg>

        </button>
        <!-- Logo (centrado) -->
        <div class="mx-auto">
            <a class="flex items-center tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-xl "
                href="#">
                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path
                        d="M20 14h-2.722L11 20.278a5.511 5.511 0 0 1-.9.722H20a1 1 0 0 0 1-1v-5a1 1 0 0 0-1-1ZM9 3H4a1 1 0 0 0-1 1v13.5a3.5 3.5 0 1 0 7 0V4a1 1 0 0 0-1-1ZM6.5 18.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2ZM19.132 7.9 15.6 4.368a1 1 0 0 0-1.414 0L12 6.55v9.9l7.132-7.132a1 1 0 0 0 0-1.418Z" />
                </svg>


                Biblio<span class=" text-yellow-500 font-extrabold">Tech</span>
            </a>
        </div>
        <!-- Ícono de Notificación y Perfil -->
        <div class="space-x-4">
            <button type="button"
                class="flex text-sm bg-white rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                aria-expanded="false" data-dropdown-toggle="dropdown-user">
                <span class="sr-only">Open user menu</span>
                <img class="w-8 h-8 rounded-full" src="{{ asset('img/profil.jpeg') }}" alt="user photo">

            </button>

            <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600"
                id="dropdown-user">
                <div class="px-4 py-3" role="none">
                    <p class="text-sm text-gray-900 dark:text-white" role="none">
                        {{ Auth::user()->name }}
                    </p>
                    <p class="text-sm font-medium text-gray-900 truncate dark:text-gray-300" role="none">
                        {{ Auth::user()->email }}
                    </p>
                </div>
                <ul class="py-1" role="none">
                    <li>
                        <a href="{{ route('profile.edit') }}"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                            role="menuitem">Profil</a>
                    </li>

                    <li>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                            this.closest('form').submit();">
                                {{ __('Deconnexion') }}
                            </x-dropdown-link>
                        </form>


                    </li>
                </ul>
            </div>
            <!-- Botón de Perfil -->
            <button>
                <i class="fas fa-user text-cyan-500 text-lg"></i>
            </button>
        </div>
    </div>
</nav>


<!-- Barra lateral -->
<div id="sidebar"
    class="w-28 bg-white h-screen fixed rounded-none border-none transition-all duration-200 ease-in-out overflow-hidden">
    <!-- Items -->
    <div class="p-2 space-y-4">
        <!-- Inicio -->
        <button class="relative px-3 py-3 flex items-center space-x-4 justify-start text-gray-500 rounded-lg group"
            onclick="highlightSidebarItem(this)">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6a7.5 7.5 0 107.5 7.5h-7.5V6z" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 10.5H21A7.5 7.5 0 0013.5 3v7.5z" />
            </svg>
            <span class="font-medium transition-all duration-200 opacity-0">Inicio</span>
        </button>

        <!-- Autorizaciones -->
        <button class="relative px-3 py-3 flex items-center space-x-4 justify-start text-gray-500 rounded-lg group"
            onclick="highlightSidebarItem(this)">
            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                <path d="M7.833 2c-.507 0-.98.216-1.318.576A1.92 1.92 0 0 0 6 3.89V21a1 1 0 0 0 1.625.78L12 18.28l4.375 3.5A1 1 0 0 0 18 21V3.889c0-.481-.178-.954-.515-1.313A1.808 1.808 0 0 0 16.167 2H7.833Z"/>
              </svg>

            <span class="font-medium transition-all duration-200 opacity-0">Autorizaciones</span>
        </button>

        <!-- Usuarios -->
        <button class="relative px-3 py-3 flex items-center space-x-4 justify-start text-gray-500 rounded-lg group"
            onclick="highlightSidebarItem(this)">
            <svg  aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 6.03v13m0-13c-2.819-.831-4.715-1.076-8.029-1.023A.99.99 0 0 0 3 6v11c0 .563.466 1.014 1.03 1.007 3.122-.043 5.018.212 7.97 1.023m0-13c2.819-.831 4.715-1.076 8.029-1.023A.99.99 0 0 1 21 6v11c0 .563-.466 1.014-1.03 1.007-3.122-.043-5.018.212-7.97 1.023" />
            </svg>

            <span class="font-medium transition-all duration-200 opacity-0">Usuarios</span>
        </button>

        <!-- Comercios -->
        <button class="relative px-3 py-3 flex items-center space-x-4 justify-start text-gray-500 rounded-lg group"
            onclick="highlightSidebarItem(this)">
            <i class="fas fa-store"></i>
            <span class="font-medium transition-all duration-200 opacity-0">Comercios</span>
        </button>

        <!-- Transacciones -->
        <button class="relative px-3 py-3 flex items-center space-x-4 justify-start text-gray-500 rounded-lg group"
            onclick="highlightSidebarItem(this)">
            <i class="fas fa-exchange-alt"></i>
            <span class="font-medium transition-all duration-200 opacity-0">Transacciones</span>
        </button>

        <!-- Cerrar sesión -->
        <button class="relative px-3 py-3 flex items-center space-x-4 justify-start text-gray-500 rounded-lg group"
            onclick="highlightSidebarItem(this)">
            <i class="fas fa-sign-out-alt"></i>
            <span class="font-medium transition-all duration-200 opacity-0">Cerrar sesión</span>
        </button>
    </div>
</div>
