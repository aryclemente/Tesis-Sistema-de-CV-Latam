<div id="alertModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
    <div class="bg-white rounded-lg shadow-lg w-11/12 md:w-1/2 lg:w-1/3 p-6 relative text-center alert-box">
        <div id="progressBar" class="absolute top-0 left-0 w-full h-1 bg-blue-500"></div>

        @if (session('success'))
            <div class="text-blue-700">
                <h2 class="text-xl font-semibold mb-2">¡Éxito!</h2>
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        @if (session('warning'))
            <div class="text-yellow-700">
                <h2 class="text-xl font-semibold mb-2">Advertencia</h2>
                <span class="block sm:inline">{{ session('warning') }}</span>
            </div>
        @endif

        <button class="absolute top-2 right-2 text-gray-500 hover:text-gray-700 close-alert">
            <svg class="fill-current h-6 w-6" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <title>Cerrar</title>
                <path d="M14.348 5.652a1 1 0 00-1.414 0L10 8.586 7.066 5.652a1 1 0 10-1.414 1.414l2.934 2.934-2.934 2.934a1 1 0 001.414 1.414L10 12.414l2.934 2.934a1 1 0 001.414-1.414l-2.934-2.934 2.934-2.934a1 1 0 000-1.414z" />
            </svg>
        </button>

        <button class="mt-4 bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded close-alert">
            Aceptar
        </button>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const alertModal = document.getElementById("alertModal");
        const progressBar = document.getElementById("progressBar");
        const closeButtons = document.querySelectorAll(".close-alert");

        // Verificar si hay sesión de 'success' o 'warning'
        if (@json(session('success')) || @json(session('warning'))) {
            alertModal.classList.remove("hidden");

            let progress = 100;
            const totalTime = 3000;  // Tiempo total en ms (3 segundos)
            const stepTime = 30;     // Tiempo por intervalo
            const step = 100 / (totalTime / stepTime);
            const interval = setInterval(() => {
                if (progress <= 0) {
                    clearInterval(interval);
                    alertModal.classList.add("hidden");
                } else {
                    progress -= step;
                    progressBar.style.width = progress + "%";
                }
            }, stepTime);
        }

        // Cerrar el modal al hacer clic en los botones
        closeButtons.forEach(button => {
            button.addEventListener("click", function () {
                alertModal.classList.add("hidden");
            });
        });

        // Cerrar el modal si se hace clic fuera de él
        alertModal.addEventListener("click", function (event) {
            if (event.target === alertModal) {
                alertModal.classList.add("hidden");
            }
        });
    });
</script>
