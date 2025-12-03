  <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Auto con Tailwind CSS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Estilos personalizados si fueran necesarios, aunque Tailwind lo maneja casi todo */
    </style>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center p-4">

    <div class="bg-white p-8 rounded-xl shadow-2xl w-full max-w-lg transform hover:scale-[1.01] transition duration-300">

        <h2 class="text-3xl font-extrabold text-gray-900 mb-6 border-b-2 border-indigo-500 pb-2">
            Detalles del Vehículo
        </h2>

        <form action="{{ route('autos.store') }}" method="POST">
            @csrf
            <div class="mb-5">
                <label for="marca" class="block text-sm font-medium text-gray-700 mb-1">
                    Marca de Auto
                </label>
                <input type="text" id="marca" name="marca" placeholder="Ej: Toyota, BMW, Ford"
                       class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 transition duration-150 ease-in-out hover:border-indigo-400"
                       required>
            </div>

            <div class="mb-5">
                <label for="modelo" class="block text-sm font-medium text-gray-700 mb-1">
                    Modelo
                </label>
                <input type="text" id="modelo" name="modelo" placeholder="Ej: Corolla, Serie 3, Mustang"
                       class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 transition duration-150 ease-in-out hover:border-indigo-400"
                       required>
            </div>

            <div class="grid grid-cols-2 gap-5 mb-6">
                <div>
                    <label for="año" class="block text-sm font-medium text-gray-700 mb-1">
                        Año
                    </label>
                    <input type="number" id="año" name="anio" placeholder="Ej: 2022" min="1900" max="2099"
                           class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 transition duration-150 ease-in-out hover:border-indigo-400"
                           required>
                </div>

                <div>
                    <label for="motor" class="block text-sm font-medium text-gray-700 mb-1">
                        Motor (Cilindrada/Especificación)
                    </label>
                    <input type="text" id="motor" name="motor" placeholder="Ej: 2.0L Turbo, V8"
                           class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 transition duration-150 ease-in-out hover:border-indigo-400"
                           required>
                </div>
            </div>

            <button type="submit"
                    class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-md text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-150 ease-in-out transform hover:scale-[1.02]">
                Guardar Información del Auto
            </button>
        </form>

        <p class="mt-6 text-xs text-center text-gray-500">
            *Asegúrate de que todos los campos sean correctos.
        </p>
    </div>

</body>
</html>