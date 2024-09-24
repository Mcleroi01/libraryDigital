 <nav class="bg-white border-gray-200 dark:bg-gray-900">
     <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
         <a class="flex items-center tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-xl "
             href="#">
             <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                 width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                 <path
                     d="M20 14h-2.722L11 20.278a5.511 5.511 0 0 1-.9.722H20a1 1 0 0 0 1-1v-5a1 1 0 0 0-1-1ZM9 3H4a1 1 0 0 0-1 1v13.5a3.5 3.5 0 1 0 7 0V4a1 1 0 0 0-1-1ZM6.5 18.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2ZM19.132 7.9 15.6 4.368a1 1 0 0 0-1.414 0L12 6.55v9.9l7.132-7.132a1 1 0 0 0 0-1.418Z" />
             </svg>


             Biblio<span class=" text-yellow-500 font-extrabold">Tech</span>
         </a>
         <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
             @if (Route::has('login'))
                 <nav class="-mx-3 flex flex-1 justify-end">
                     @auth
                         <button type="button"
                             class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                             id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown"
                             data-dropdown-placement="bottom">
                             <span class="sr-only">Open user menu</span>
                             <img class="w-8 h-8 rounded-full" src="/docs/images/people/profile-picture-3.jpg"
                                 alt="user photo">
                         </button>
                     @else
                         <a href="{{ route('login') }}"
                             class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                             Log in
                         </a>

                         @if (Route::has('register'))
                             <a href="{{ route('register') }}"
                                 class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                                 Register
                             </a>
                         @endif
                     @endauth
                 </nav>
             @endif

             <!-- Dropdown menu -->
             <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600"
                 id="user-dropdown">
                 <div class="px-4 py-3">
                     <span class="block text-sm text-gray-900 dark:text-white">Bonnie Green</span>
                     <span class="block text-sm  text-gray-500 truncate dark:text-gray-400">name@flowbite.com</span>
                 </div>
                 <ul class="py-2" aria-labelledby="user-menu-button">
                     <li>
                         <a href="#"
                             class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Dashboard</a>
                     </li>
                     <li>
                         <a href="#"
                             class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Settings</a>
                     </li>
                     <li>
                         <a href="#"
                             class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Earnings</a>
                     </li>
                     <li>
                         <a href="#"
                             class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign
                             out</a>
                     </li>
                 </ul>
             </div>
             <button data-collapse-toggle="navbar-user" type="button"
                 class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                 aria-controls="navbar-user" aria-expanded="false">
                 <span class="sr-only">Open main menu</span>
                 <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                     viewBox="0 0 17 14">
                     <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                         d="M1 1h15M1 7h15M1 13h15" />
                 </svg>
             </button>
         </div>
         <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">
             <ul
                 class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                 <li><a class="inline-block no-underline hover:text-yellow-500 hover:underline py-2 px-4 {{ request()->routeIs('welcome') ? ' text-yellow-500 ' : '' }}"
                         id="list" href="{{ route('welcome') }}">Acceuil</a></li>
                 <li><a class="inline-block no-underline hover:text-yellow-500 hover:underline py-2 px-4" id="list"
                         href="#">Mes Livres</a></li>
                 <li><a class="inline-block no-underline hover:text-yellow-500 hover:underline py-2 px-4" id="list"
                         href="#">Collection</a></li>

                 <li><a class="inline-block no-underline hover:text-yellow-500 hover:underline py-2 px-4" id="list"
                         href="#">En Vogue</a></li>
             </ul>
         </div>
     </div>
 </nav>
