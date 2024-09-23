<x-guest-layout>
    <x-slot name="header">
        @section('svg')
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6a7.5 7.5 0 107.5 7.5h-7.5V6z" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 10.5H21A7.5 7.5 0 0013.5 3v7.5z" />
            </svg>
        @endsection
        <h2 class="font-semibold text-4xl text-gray-200 leading-tight">
            {{ __('BiblioTech') }}
        </h2>
    </x-slot>


    <div class=" grid grid-cols-1 bg-black gap-0.5 overflow-hidden  text-center sm:grid-cols-2 lg:grid-cols-4">
        <div class="flex flex-col bg-white/5 p-8">
            <dt class="text-sm font-semibold leading-6 text-gray-300"> de Livres Uploadés</dt>
            <dd class="order-first text-3xl font-semibold tracking-tight text-white">{{ $books->count() }}</dd>
        </div>
        <div class="flex flex-col bg-white/5 p-8">
            <dt class="text-sm font-semibold leading-6 text-gray-300">de Lecture</dt>
            <dd class="order-first text-3xl font-semibold tracking-tight text-white">10 000 Heures</dd>
        </div>
        <div class="flex flex-col bg-white/5 p-8">
            <dt class="text-sm font-semibold leading-6 text-gray-300">de Lectures</dt>
            <dd class="order-first text-3xl font-semibold tracking-tight text-white">6 600 Recommandations</dd>
        </div>
        <div class="flex flex-col bg-white/5 p-8">
            <dt class="text-sm font-semibold leading-6 text-gray-300">2 100 Utilisateurs</dt>
            <dd class="order-first text-3xl font-semibold tracking-tight text-white">Actifs</dd>
        </div>
    </div>

    <div class=" p-2 lg:p-10">
        <div class=" mx-auto">
            <div class="block mb-4 mx-auto border-b border-slate-300 pb-2 ">
                <a target="_blank" href="https://www.material-tailwind.com/docs/html/card"
                    class="block w-full px-4 py-2  text-slate-700 transition-all">
                    Découvrez un vaste monde de livres numériques à portée de main, <b>Que vous soyez passionné de
                        littérature classique, de thrillers captivants ou de guides pratiques</b>.
                </a>
            </div>

            @foreach ($books as $book)
                <div class=" p-1 flex flex-wrap items-center justify-center">


                    <div
                        class="flex flex-col justify-center items-center text-gray-700 bg-white shadow-md bg-clip-border rounded-xl w-full lg:w-96">


                        <div class="book-card">
                            <div class="book-card__book">
                                <div class="book-card__book-front">
                                    <img src="{{ asset('storage/' . $book->image_path) }}" alt="{{ $book->title }}"
                                        class="object-cover w-full h-full" />
                                </div>
                                <div class="book-card__book-back"></div>
                                <div class="book-card__book-side"></div>
                            </div>
                        </div>

                        <div class="p-6">
                            <div class="flex items-center justify-between mb-2">
                                <p
                                    class="block font-sans text-base antialiased font-medium leading-relaxed text-blue-gray-900">
                                    {{ $book->title }}
                                </p>

                            </div>
                            <p
                                class="block font-sans text-sm antialiased font-normal leading-normal text-gray-700 opacity-75">
                                With plenty of talk and listen time, voice-activated Siri access, and an
                                available wireless charging case.
                            </p>
                        </div>
                        <div class="p-6 pt-0">
                            <a href="{{ route('book.readBook', $book->id) }}"
                                class="align-middle select-none font-sans font-bold text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 px-6 rounded-lg shadow-gray-900/10 hover:shadow-gray-900/20 focus:opacity-[0.85] active:opacity-[0.85] active:shadow-none block w-full bg-blue-gray-900/10 text-blue-gray-900 shadow-none hover:scale-105 hover:shadow-none focus:scale-105 focus:shadow-none active:scale-100"
                                type="button">
                                Add to Cart
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-guest-layout>
