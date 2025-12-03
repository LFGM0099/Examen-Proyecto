<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Información de Autos</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen">

    <div class="container mx-auto p-4 md:p-8">
        
        <div class="flex justify-between items-center mb-6">
            
            <h1 class="text-4xl font-extrabold text-gray-900 border-b-4 border-indigo-500 pb-2">
                Información de Autos 🚘
            </h1>

            {{-- BOTÓN AGREGAR --}}
            <a href="{{ route('autos.create') }}"
               class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-lg shadow-md transition duration-150 ease-in-out transform hover:scale-105">
                + Agregar Auto
            </a>
        </div>

        {{-- MENSAJE DE ÉXITO --}}
        @if(session('success'))
            <div class="mb-4 p-4 rounded-lg bg-green-100 text-green-700 font-semibold">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white shadow-2xl rounded-xl overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                
                <thead class="bg-indigo-600 text-white">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-bold uppercase">Marca</th>
                        <th class="px-6 py-3 text-left text-xs font-bold uppercase">Modelo</th>
                        <th class="px-6 py-3 text-left text-xs font-bold uppercase hidden sm:table-cell">Año</th>
                        <th class="px-6 py-3 text-left text-xs font-bold uppercase hidden md:table-cell">Motor</th>
                        <th class="px-6 py-3 text-center text-xs font-bold uppercase">Acciones</th>
                    </tr>
                </thead>
                
                <tbody class="divide-y divide-gray-200">

                    {{-- RECORRER LOS AUTOS DE LA BD --}}
                    @forelse($autos as $auto)
                    <tr class="hover:bg-gray-50 transition duration-150">
                        
                        <td class="px-6 py-4 text-sm font-medium text-gray-900">
                            {{ $auto->marca }}
                        </td>

                        <td class="px-6 py-4 text-sm text-gray-500">
                            {{ $auto->modelo }}
                        </td>

                        <td class="px-6 py-4 text-sm text-gray-500 hidden sm:table-cell">
                            {{ $auto->anio }}
                        </td>

                        <td class="px-6 py-4 text-sm text-gray-500 hidden md:table-cell">
                            {{ $auto->motor }}
                        </td>

                        <td class="px-6 py-4 text-center text-sm font-medium">
                            <div class="flex justify-center space-x-4">

                                {{-- BOTÓN EDITAR --}}
                                <a href=" {{ route('autos.edit', $auto -> id_auto) }} "
                                   class="text-indigo-600 hover:text-indigo-900 font-semibold">
                                    Modificar
                                </a>

                            {{-- BOTÓN ELIMINAR --}}
                            <form action="{{ route('autos.destroy', $auto->id_auto) }}" 
                                method="POST"
                                onsubmit="return confirm('¿Estás seguro de eliminar este auto?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="text-red-600 hover:text-red-900 font-semibold">
                                    Eliminar
                                </button>
                            </form>


                            </div>
                        </td>

                    </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-6 text-gray-500 text-sm">
                                No hay autos registrados todavía.
                            </td>
                        </tr>
                    @endforelse

                </tbody>
            </table>
        </div>

    </div>

</body>
</html>
