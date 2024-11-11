<div class="overflow-x-auto bg-white shadow-md rounded-lg">
    <table class="table-auto w-full text-left text-sm text-gray-500">
        <thead class="bg-gray-100 text-gray-700 uppercase font-semibold">
            <tr style="background-color: #87CEEB" class=" text-gray-700 uppercase text-sm leading-normal">
                <th class="px-6 py-3">Nombre del servicio</th>
                <th class="px-6 py-3">Tipo de servicio</th>
                <th class="px-6 py-3">Descripción</th>
                <th class="px-6 py-3 text-center">Acciones</th> <!-- Nueva columna para acciones -->
            </tr>
        </thead>
        <tbody class="text-gray-700">
            @foreach ($servicios as $servicio)
                <tr class="border-b hover:bg-gray-50 transition duration-200">
                    <td class="px-6 py-4">{{ $servicio->nombre }}</td>
                    <td class="px-6 py-4">{{ $servicio->tipo_de_servicio }}</td>
                    <td class="px-6 py-4">{{ $servicio->contenido }}</td>
                    <td class="px-6 py-4 text-center">
                        <button 
                            wire:click="editservicio({{ $servicio->id }})" 
                            class="text-blue-500 hover:text-blue-700 transition duration-200"
                            title="Editar">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </button>
                        <button 
                            onclick="confirmDeleteServise({{ $servicio->id }})" 
                            class="ml-4 text-red-500 hover:text-red-700 transition duration-200"
                            title="Eliminar">
                            <i class="fa-solid fa-trash-can"></i>
                        </button>
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
    
        function confirmDeleteServise(id) {
            serviceId = id; // Guarda el ID del servicio a eliminar
            showModal();
        }
    
        function showModal() {
            document.getElementById('confirmModal').classList.remove('hidden');
        }
    
        function hideModal() {
            document.getElementById('confirmModal').classList.add('hidden');
        }
    
        document.getElementById('confirmButton').addEventListener('click', function() {
            if (serviceId !== null) {
                @this.call('deleteServicio', serviceId);
            }
            hideModal();
        });
    </script>
    
</div>


