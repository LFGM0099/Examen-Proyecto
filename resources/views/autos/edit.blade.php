<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Auto</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center p-4">

    <div class="bg-white p-8 rounded-xl shadow-2xl w-full max-w-lg transform hover:scale-[1.01] transition duration-300">

        <h2 class="text-3xl font-extrabold text-gray-900 mb-6 border-b-2 border-indigo-500 pb-2">
            Editar Vehículo
        </h2>

        <!-- FORMULARIO PARA EDITAR -->
        <form action="{{ route('autos.update', $auto->id_auto) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-5">
                <label for="marca" class="block text-sm font-medium text-gray-700 mb-1">
                    Marca de Auto
                </label>
                <input type="text" id="marca" name="marca"
                       value="{{ old('marca', $auto->marca) }}"
                       class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm
                              focus:ring-indigo-500 focus:border-indigo-500 hover:border-indigo-400 transition"
                       required>
            </div>

            <div class="mb-5">
                <label for="modelo" class="block text-sm font-medium text-gray-700 mb-1">
                    Modelo
                </label>
                <input type="text" id="modelo" name="modelo"
                       value="{{ old('modelo', $auto->modelo) }}"
                       class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm
                              focus:ring-indigo-500 focus:border-indigo-500 hover:border-indigo-400 transition"
                       required>
            </div>

            <div class="grid grid-cols-2 gap-5 mb-6">
                <div>
                    <label for="anio" class="block text-sm font-medium text-gray-700 mb-1">
                        Año
                    </label>
                    <input type="number" id="anio" name="anio" min="1900" max="2099"
                           value="{{ old('anio', $auto->anio) }}"
                           class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm
                                  focus:ring-indigo-500 focus:border-indigo-500 hover:border-indigo-400 transition"
                           required>
                </div>

                <div>
                    <label for="motor" class="block text-sm font-medium text-gray-700 mb-1">
                        Motor
                    </label>
                    <input type="text" id="motor" name="motor"
                           value="{{ old('motor', $auto->motor) }}"
                           class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm
                                  focus:ring-indigo-500 focus:border-indigo-500 hover:border-indigo-400 transition"
                           required>
                </div>
            </div>

            <button type="submit"
                    class="w-full flex justify-center py-3 px-4 rounded-lg shadow-md text-sm font-medium
                           text-white bg-indigo-600 hover:bg-indigo-700 focus:ring-2 focus:ring-offset-2
                           focus:ring-indigo-500 transition transform hover:scale-[1.02]">
                Actualizar Información del Auto
            </button>
        </form>

        <p class="mt-6 text-xs text-center text-gray-500">
            *Modifica solo los campos necesarios.
        </p>

    </div>

</body>
</html>
