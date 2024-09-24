<x-app-layout>

    <x-slot name="header">
        @section('svg')
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6a7.5 7.5 0 107.5 7.5h-7.5V6z" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 10.5H21A7.5 7.5 0 0013.5 3v7.5z" />
            </svg>
        @endsection
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __( $book->title ) }}
        </h2>
    </x-slot>
    <div class="p-10">
        <div class="flex justify-between gap-4 items-center">
            <div>
                <button id="prev" class="bg-gray-300 p-2 rounded">
                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m15 19-7-7 7-7" />
                    </svg>

                </button>
            </div>
            <div>
                <canvas id="pdf-canvas" style="border: 1px solid black;"></canvas>
            </div>
            <div>
                <button id="next" class="bg-gray-300 p-2 rounded">
                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m9 5 7 7-7 7" />
                    </svg>

                </button>
            </div>
        </div>


        <div id="stepper" class="flex gap-2 mt-8 overflow-auto"></div>
        <form id="save-progress" method="POST" action="{{ route('books.updateProgress', $book->id) }}"
            style="display: none;">
            @csrf
            <input type="hidden" id="current_page" name="current_page" value="{{ $read->current_page }}">
        </form>
    </div>

    @section('script')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.15.349/pdf.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.15.349/pdf.worker.min.js"></script>
        <script>
            const pdfPath = "{{ asset('storage/' . $book->file_path) }}"; // Chemin du fichier PDF
            let pdfDoc = null;
            let pageNum = {{ $read->current_page }}; // Page actuelle
            const canvas = document.getElementById('pdf-canvas');
            const ctx = canvas.getContext('2d');
            const stepperContainer = document.getElementById('stepper');

            const renderPage = (num) => {
                pdfDoc.getPage(num).then(page => {
                    const viewport = page.getViewport({
                        scale: 1
                    });
                    canvas.height = viewport.height;
                    canvas.width = viewport.width;

                    const renderContext = {
                        canvasContext: ctx,
                        viewport: viewport
                    };
                    page.render(renderContext);
                });
            };

            // Charger le PDF
            pdfjsLib.getDocument(pdfPath).promise.then(pdf => {
                pdfDoc = pdf;
                const totalPages = pdf.numPages; // Récupérer le nombre total de pages

                // Générer dynamiquement les boutons du stepper
                for (let i = 1; i <= totalPages; i++) {
                    const button = document.createElement('button');
                    button.classList.add('page-stepper', 'bg-gray-200', 'p-2', 'rounded');
                    button.textContent = i;
                    button.setAttribute('data-page', i);
                    stepperContainer.appendChild(button);
                }

                renderPage(pageNum); // Afficher la page actuelle
                updateStepper(); // Mettre à jour l'état du stepper
            });

            function queueRenderPage(num) {
                renderPage(num);
                // Mettre à jour la page actuelle
                document.getElementById('current_page').value = num;
                updateStepper(); // Mettre à jour l'état du stepper à chaque changement de page
            }

            function onPrevPage() {
                if (pageNum <= 1) return; // Ne pas aller en dessous de la première page
                pageNum--;
                queueRenderPage(pageNum);
            }
            document.getElementById('prev').addEventListener('click', onPrevPage);

            function onNextPage() {
                if (pageNum >= pdfDoc.numPages) return; // Ne pas aller au-delà de la dernière page
                pageNum++;
                queueRenderPage(pageNum);
                // Soumettre la progression via AJAX
                saveProgress(pageNum);
            }
            document.getElementById('next').addEventListener('click', onNextPage);

            function saveProgress(currentPage) {
                fetch('{{ route('books.updateProgress', $book->id) }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                        },
                        body: JSON.stringify({
                            current_page: currentPage
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            console.log('Progression sauvegardée avec succès!');
                        } else {
                            console.log('Erreur lors de la sauvegarde de la progression.');
                        }
                    })
                    .catch(error => {
                        console.error('Erreur:', error);
                    });
            }

            // Mettre à jour l'état du stepper
            function updateStepper() {
                const buttons = document.querySelectorAll('.page-stepper');
                buttons.forEach(button => {
                    const pageNumber = parseInt(button.getAttribute('data-page'));
                    // Marquer les boutons jusqu'à la page actuelle
                    if (pageNumber < pageNum) {
                        button.classList.add('bg-blue-300'); // Couleur pour marquer les pages précédentes
                        button.classList.remove('bg-gray-200'); // Retirer la couleur par défaut
                    } else {
                        button.classList.remove('bg-blue-300'); // Retirer la couleur marquée si on n'est pas en dessous
                        button.classList.add('bg-gray-200'); // Ajouter la couleur par défaut
                    }
                });
            }

            // Écouteur d'événements pour les boutons de stepper
            stepperContainer.addEventListener('click', function(event) {
                if (event.target.classList.contains('page-stepper')) {
                    const targetPage = event.target.getAttribute('data-page');
                    pageNum = parseInt(targetPage);
                    queueRenderPage(pageNum);
                }
            });
        </script>
    @endsection
</x-app-layout>
