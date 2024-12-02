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
                            <img src="{{ asset('storage/' . $servicio->imagen) }}" 
                                 alt="Imagen del servicio" 
                                 class="w-16 h-16 object-cover rounded">
                        @else
                            <span class="text-gray-500 italic">Sin imagen</span>
                        @endif
                    </td>
                    <td class="px-4 py-2">
                        <div class="flex space-x-2">
                            <button type="button" class="btn btn-primary btn-sm rounded-3 shadow-sm"
                                wire:click="editservicio({{ $servicio->id }})">
                                <i class="bi bi-pencil-square"></i> Editar
                            </button>

                            <button type="button" class="btn btn-danger btn-sm rounded-3 shadow-sm"
                                onclick="deleteServise({{ $servicio->id }})">
                                <i class="bi bi-trash"></i> Eliminar
                            </button>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Modal de Confirmación -->
    <div id="confirmModal" class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center hidden">
        <div class="bg-white rounded-lg p-6 w-80">
            <h2 class="text-lg font-semibold text-gray-800">Confirmación</h2>
            <p class="text-gray-600 mt-2">¿Estás seguro de que deseas eliminar este servicio?</p>

            <div class="mt-4 flex justify-end space-x-4">
                <button onclick="hideModal()" class="px-4 py-2 bg-gray-300 text-gray-800 rounded hover:bg-gray-400">Cancelar</button>
                <button id="confirmButton" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">Eliminar</button>
            </div>
        </div>
    </div>

    <script>
        let serviceId = null;

        // Función para mostrar el modal
        function deleteServise(id) {
            serviceId = id;  // Guarda el ID del servicio a eliminar
            showModal();
        }

        // Función para mostrar el modal
        function showModal() {
            document.getElementById('confirmModal').classList.remove('hidden');
        }

        // Función para ocultar el modal
        function hideModal() {
            document.getElementById('confirmModal').classList.add('hidden');
        }

        // Confirmación de eliminación
        document.getElementById('confirmButton').addEventListener('click', function() {
            if (serviceId !== null) {
                @this.call('deleteServicio', serviceId); // Llama a la función Livewire
            }
            hideModal();
        });
    </script>
</div>
