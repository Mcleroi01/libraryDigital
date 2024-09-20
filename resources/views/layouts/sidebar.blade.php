   <!--Nav-->
   <nav id="header" class="w-full z-30 top-0 py-1 sticky bg-white">
       <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 px-6 py-3">

           <label for="menu-toggle" class="cursor-pointer md:hidden block">
               <svg class="fill-current text-gray-900" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                   viewBox="0 0 20 20">
                   <title>menu</title>
                   <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
               </svg>
           </label>
           <input class="hidden" type="checkbox" id="menu-toggle" />

           <div class="hidden md:flex md:items-center md:w-auto w-full order-3 md:order-1" id="menu">
               <nav>
                   <ul class="md:flex items-center justify-between text-base text-black font-extrabold pt-4 md:pt-0">
                       <li><a class="inline-block no-underline hover:text-yellow-500 hover:underline py-2 px-4"
                               id="list" href="#">Acceuil</a></li>
                       <li><a class="inline-block no-underline hover:text-yellow-500 hover:underline py-2 px-4"
                               id="list" href="#">Mes Livres</a></li>
                       <li><a class="inline-block no-underline hover:text-yellow-500 hover:underline py-2 px-4"
                               id="list" href="#">Collection</a></li>

                       <li><a class="inline-block no-underline hover:text-yellow-500 hover:underline py-2 px-4"
                               id="list" href="#">En Vogue</a></li>
                   </ul>
               </nav>
           </div>

           <div class="order-1 md:order-2">
               <a class="flex items-center tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-xl "
                   href="#">
                   <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                       xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                       viewBox="0 0 24 24">
                       <path
                           d="M20 14h-2.722L11 20.278a5.511 5.511 0 0 1-.9.722H20a1 1 0 0 0 1-1v-5a1 1 0 0 0-1-1ZM9 3H4a1 1 0 0 0-1 1v13.5a3.5 3.5 0 1 0 7 0V4a1 1 0 0 0-1-1ZM6.5 18.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2ZM19.132 7.9 15.6 4.368a1 1 0 0 0-1.414 0L12 6.55v9.9l7.132-7.132a1 1 0 0 0 0-1.418Z" />
                   </svg>


                   Biblio<span class=" text-yellow-500 font-extrabold">Tech</span>
               </a>
           </div>

           <div class="order-2 md:order-3 flex items-center" id="nav-content">

               @if (Route::has('login'))
                   <nav class="-mx-3 flex flex-1 justify-end">
                       @auth
                           <a href="{{ url('/dashboard') }}"
                               class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                               <img class="block mx-auto h-10 rounded-full sm:mx-0 sm:shrink-0" src="https://tailwindcss.com/img/erin-lindford.jpg" alt="Woman's Face">
                           </a>
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
           </div>
       </div>
   </nav>
