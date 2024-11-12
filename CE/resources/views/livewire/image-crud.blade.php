<div>
    <table class="table-auto w-full">
        <thead>
            <tr>
                <th class="px-4 py-2">Título</th>
                <th class="px-4 py-2">Descripción</th>
                <th class="px-4 py-2">Imagen</th>
                <th class="px-4 py-2">Acciones</th> <!-- Nueva columna para acciones -->
            </tr>
        </thead>
        <tbody>
            @foreach ($imagenes as $imagen)
                <tr>
                    <td class="border px-4 py-2">{{ $imagen->title }}</td>
                    <td class="border px-4 py-2">{{ $imagen->description }}</td>
                    <td class="border px-4 py-2">
                        @if ($imagen->path)
                            <img src="{{ Storage::url($imagen->path) }}" alt="Imagen" class="w-16 h-16 object-cover">
                        @else
                            Sin imagen
                        @endif
                    </td>
                    <td class="border px-4 py-2">
                        <x-secondary-button wire:click="editImage({{ $imagen->id }})"
                            class="text-blue-500 hover:text-blue-700">
                            Editar
                        </x-secondary-button>
                        <x-danger-button onclick="confirmDelete({{ $imagen->id }})"
                            class="text-red-500 hover:text-red-700">
                            Eliminar
                        </x-danger-button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
