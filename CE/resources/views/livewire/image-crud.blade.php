<div class="table-responsive">
    <table class="min-w-full table-auto border-collapse border border-gray-200">
        <thead class="bg-blue-500 text-white">
            <tr>
                <th class="px-4 py-2">Título</th>
                <th class="px-4 py-2">Descripción</th>
                <th class="px-4 py-2">Imagen</th>
                <th class="px-4 py-2">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($imagenes as $imagen)
                <tr>
                    <td class="px-4 py-2">{{ $imagen->title }}</td>
                    <td class="px-4 py-2">{{ $imagen->description }}</td>
                    <td class="px-4 py-2">
                        @if ($imagen->path)
                            <img src="{{ Storage::url($imagen->path) }}" alt="Imagen" class="img-thumbnail"
                                style="width: 80px; height: 80px; object-fit: cover;">
                        @else
                            <span class="text-muted">Sin imagen</span>
                        @endif
                    </td>
                    <td class="px-4 py-2">
                        <!-- Botón para Editar -->
                        <button type="button" class="btn btn-primary btn-sm rounded-3 shadow-sm"
                            wire:click="editImage({{ $imagen->id }})">
                            Editar
                        </button>

                        <!-- Botón para Eliminar -->
                        <button type="button" class="btn btn-danger btn-sm rounded-3 shadow-sm"
                            onclick="confirmDeleteIm({{ $imagen->id }})">
                            Eliminar
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
