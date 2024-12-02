<div class="table-responsive overflow-x-auto">
    <table class="min-w-full table-auto border-collapse border border-gray-200">
        <thead class="bg-blue-500 text-white">
            <tr>
                <th class="px-4 py-2">Nombre</th>
                <th class="px-4 py-2">Tipo</th>
                <th class="px-4 py-2">Contenido</th>
                <th class="px-4 py-2">Imagen</th>
                <th class="px-4 py-2">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($servicios as $servicio)
                <tr>
                    <td class="px-4 py-2">{{ $servicio->nombre }}</td>
                    <td class="px-4 py-2">{{ $servicio->tipo_de_servicio }}</td>
                    <td class="px-4 py-2">{{ $servicio->contenido }}</td>
                    <td class="px-4 py-2">
                        @if ($servicio->imagen)
                            <img src="{{ asset('storage/' . $servicio->imagen) }}" alt="Imagen del servicio"
                                class="w-16 h-16 object-cover rounded">
                        @else
                            <span class="text-gray-500 italic">Sin imagen</span>
                        @endif
                    </td>
                    <td class="px-4 py-2">
                        <div class="flex space-x-2">
                            <x-secondary-button wire:click="editservicio({{ $servicio->id }})"
                                class="text-blue-500 hover:text-blue-700">
                                Editar
                            </x-secondary-button>
                            <x-danger-button onclick="deleteServicio({{ $servicio->id }})"
                                class="text-red-500 hover:text-red-700 ml-2">
                                Eliminar
                            </x-danger-button>

                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
