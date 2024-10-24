@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <!-- Título del producto -->
    <h1 class="text-3xl font-bold mb-4 titulo-producto">ZOTAC GAMING NVIDIA GEFORCE RTX 4060</h1>
    
    <!-- Contenedor para el título de detalles de la orden -->
    <div class="bg-blue-50 border border-blue-200 p-4 rounded-lg mb-4 w-1/4">
        <h2 class="text-xl font-semibold detalles-producto">Detalles de la orden</h2>
    </div>

    <!-- Contenedor flex para alinear detalles de la orden y la imagen en la misma fila -->
    <div class="flex mb-6 justify-between">
        <!-- Cuadro de detalles de la orden -->
        <div class="border border-gray-300 p-6 rounded-lg w-2/3">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Primera columna: Título "Fecha", seguido de Fecha, Pagado y Envío -->
                <div class="w-full text-justify p-4">
                    <p class="mb-6 w-full text-lg fecha-producto"><strong>Fecha:</strong> 12/03/2024</p>
                    <p class="mb-6 w-full text-lg estado-producto"><strong>Pagado:</strong> 12/03/2024</p>
                    <p class="w-full text-lg entregado-producto"><strong>Envío:</strong> Entregado</p>
                </div>
                
                <!-- Segunda columna: "Orden" grande y negritas, "ID del producto" más pequeño y en gris -->
                <div class="w-full text-left p-4">
                    <p class="text-3xl font-bold mb-4 orden-producto">Orden: #04563087981</p>
                    <p class="text-gray-500 text-sm id-producto"><strong>ID del producto:</strong> 123456</p>
                </div>
            </div>
        </div>

        <!-- Contenedor para la imagen -->
        <div class="w-1/3 flex justify-center items-center">
            <img src="{{ asset('img/ASUS_PRIME_Z790-A_WIFI-3.jpg') }}" alt="ASUS PRIME Z790-A WIFI" class="w-72 h-72 object-cover image-producto">
        </div>
    </div>

    <!-- Formulario de reseña -->
    <form action="#" method="POST">
        @csrf
        <div class="mb-6">
            <label for="title" class="block text-lg font-medium text-gray-700 titulo-comentario">Título</label>
            <input type="text" name="title" id="title" class="w-full p-3 border border-gray-300 rounded-lg" placeholder="Opcional: introduce un título">
        </div>

        <div class="mb-6">
            <label for="rating" class="block text-lg font-medium text-gray-700 calificacion-comentario">Calificación *</label>
            <div class="flex items-center">
                <input type="radio" name="rating" value="1" id="rating1" class="hidden rating-star" />
                <label for="rating1" class="cursor-pointer text-4xl text-gray-400 hover:text-blue-500">&#9733;</label>

                <input type="radio" name="rating" value="2" id="rating2" class="hidden rating-star" />
                <label for="rating2" class="cursor-pointer text-4xl text-gray-400 hover:text-blue-500">&#9733;</label>

                <input type="radio" name="rating" value="3" id="rating3" class="hidden rating-star" />
                <label for="rating3" class="cursor-pointer text-4xl text-gray-400 hover:text-blue-500">&#9733;</label>

                <input type="radio" name="rating" value="4" id="rating4" class="hidden rating-star" />
                <label for="rating4" class="cursor-pointer text-4xl text-gray-400 hover:text-blue-500">&#9733;</label>

                <input type="radio" name="rating" value="5" id="rating5" class="hidden rating-star" />
                <label for="rating5" class="cursor-pointer text-4xl text-gray-400 hover:text-blue-500">&#9733;</label>
            </div>
        </div>

        <div class="mb-6">
            <label for="review" class="block text-lg font-medium text-gray-700">¿Qué te pareció? *</label>
            <textarea name="review" id="review" rows="4" class="w-full p-3 border border-gray-300 rounded-lg" placeholder="Opcional: ¿Puedes describir la razón de tu calificación?"></textarea>
        </div>

        <div class="mb-4 text-sm text-red-500 text-center">
            Los campos marcados con * son obligatorios
        </div>

        <div class="flex justify-center">
            <button type="submit" class="px-4 py-2 bg-blue-500 text-white font-semibold rounded-lg hover:bg-blue-600 publicar-comentario">
                Publicar
            </button>
        </div>
    </form>
</div>

<!-- Agregamos el script para manejar las estrellas -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const stars = document.querySelectorAll('.rating-star');
        const labels = document.querySelectorAll('label[for^="rating"]');

        // Añadir un event listener a cada estrella
        labels.forEach((label, index) => {
            label.addEventListener('click', function () {
                // Limpiar todas las estrellas antes de aplicar los cambios
                labels.forEach(lbl => {
                    lbl.classList.remove('text-blue-500');
                    lbl.classList.add('text-gray-400');
                });

                // Colorear las estrellas hasta la seleccionada
                for (let i = 0; i <= index; i++) {
                    labels[i].classList.remove('text-gray-400');
                    labels[i].classList.add('text-blue-500');
                }
            });
        });
    });
</script>

@endsection
