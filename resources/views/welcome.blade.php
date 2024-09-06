<x-guest-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Discover') }}
        </h2>
        <div class="max-w-5xl min-w-sm">
            <label
                class="mx-auto mt-4 relative bg-white p-2  flex flex-col md:flex-row   border  rounded-2xl gap-2 shadow-2xl focus-within:border-gray-300"
                for="search-bar">
                <input id="search-bar" placeholder="your keyword here"
                    class="px-6 py-2 w-full rounded-md flex-1 outline-none bg-white border-none">
                <button
                    class="w-full md:w-auto px-6 py-3 bg-black border-black text-white fill-white active:scale-95 duration-100 border will-change-transform overflow-hidden relative rounded-xl transition-all disabled:opacity-70">

                    <div class="relative">

                        <!-- Loading animation change opacity to display -->
                        <div
                            class="flex items-center justify-center h-3 w-3 absolute inset-1/2 -translate-x-1/2 -translate-y-1/2 transition-all">
                            <svg class="opacity-0 animate-spin w-full h-full" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                    stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor"
                                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                </path>
                            </svg>
                        </div>

                        <div class="flex items-center transition-all opacity-1 valid:"><span
                                class="text-sm font-semibold whitespace-nowrap truncate mx-auto">
                                Search
                            </span>
                        </div>

                    </div>

                </button>
            </label>
        </div>



        <div class="max-w-5xl  mt-36 mb-16 ">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Book Recomanded</h2>
        </div>

        <div class=" flex flex-wrap absolute top-96">


            <div class="flex-shrink-0 m-6 relative overflow-hidden bg-teal-500 rounded-lg max-w-xs shadow-lg group">
                <svg class="absolute bottom-0 left-0 mb-8 scale-150 group-hover:scale-[1.65] transition-transform"
                    viewBox="0 0 375 283" fill="none" style="opacity: 0.1;">
                    <rect x="159.52" y="175" width="152" height="152" rx="8"
                        transform="rotate(-45 159.52 175)" fill="white" />
                    <rect y="107.48" width="152" height="152" rx="8" transform="rotate(-45 0 107.48)"
                        fill="white" />
                </svg>
                <div
                    class="relative  flex items-center justify-center group-hover:scale-110 transition-transform">
                    <div class="block absolute w-48 h-48 bottom-0 left-0 -mb-24 ml-3"
                        style="background: radial-gradient(black, transparent 60%); transform: rotate3d(0, 0, 1, 20deg) scale3d(1, 0.6, 1); opacity: 0.2;">
                    </div>
                    <img class="relative w-full"
                        src="https://www.cse.iitd.ac.in/~srsarangi/advbook/images/new-cover-small.jpg" alt="">
                </div>

            </div>
            <div class="flex-shrink-0 m-6 relative overflow-hidden bg-orange-500 rounded-lg max-w-xs shadow-lg group">
                <svg class="absolute bottom-0 left-0 mb-8 scale-150 group-hover:scale-[1.65] transition-transform"
                    viewBox="0 0 375 283" fill="none" style="opacity: 0.1;">
                    <rect x="159.52" y="175" width="152" height="152" rx="8"
                        transform="rotate(-45 159.52 175)" fill="white" />
                    <rect y="107.48" width="152" height="152" rx="8" transform="rotate(-45 0 107.48)"
                        fill="white" />
                </svg>
                <div
                    class="relative flex items-center justify-center group-hover:scale-110 transition-transform">
                    <div class="block absolute w-48 h-48 bottom-0 left-0 -mb-24 ml-3"
                        style="background: radial-gradient(black, transparent 60%); transform: rotate3d(0, 0, 1, 20deg) scale3d(1, 0.6, 1); opacity: 0.2;">
                    </div>
                    <img class="relative w-full bg-cover"
                        src="https://www.edrawsoft.com/templates/images/marketing-business-book-cover.png"
                        alt="">
                </div>

            </div>
        </div>




    </x-slot>

    <div class="max-w-5xl  ">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Book Recomanded</h2>
    </div>
</x-guest-layout>
