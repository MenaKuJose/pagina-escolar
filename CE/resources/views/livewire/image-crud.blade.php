<div class="overflow-x-auto">
    <table class="table-auto w-full border-collapse bg-white shadow-lg rounded-lg">
        <thead class="bg-gradient-to-r from-blue-500 to-indigo-500 text-white">
            <tr>
                <th class="px-6 py-3 text-left font-semibold text-sm uppercase">Título</th>
                <th class="px-6 py-3 text-left font-semibold text-sm uppercase">Descripción</th>
                <th class="px-6 py-3 text-left font-semibold text-sm uppercase">Imagen</th>
                <th class="px-6 py-3 text-center font-semibold text-sm uppercase">Acciones</th>
                <!-- Nueva columna para acciones -->
            </tr>
        </thead>
        <tbody>
            @foreach ($imagenes as $imagen)
                <tr class="hover:bg-gray-100 border-b border-gray-200">
                    <td class="border px-6 py-4 text-gray-800">{{ $imagen->title }}</td>
                    <td class="border px-6 py-4 text-gray-800">{{ $imagen->description }}</td>
                    <td class="border px-6 py-4 text-gray-800">
                        @if ($imagen->path)
                            <img src="{{ Storage::url($imagen->path) }}" alt="Imagen"
                                class="w-16 h-16 object-cover rounded">
                        @else
                            <span class="text-gray-500 italic">Sin imagen</span>
                        @endif
                    </td>
                    <td class="border px-6 py-4 text-center">
                        <x-secondary-button wire:click="editImage({{ $imagen->id }})"
                            class="text-blue-500 hover:text-blue-700">
                            Editar
                        </x-secondary-button>
                        <x-danger-button onclick="confirmDeleteIm({{ $imagen->id }})"
                            class="text-red-500 hover:text-red-700 ml-2">
                            Eliminar
                        </x-danger-button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
