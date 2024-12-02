<div>
    <!-- Botón para abrir el modal -->
    <button 
        class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 focus:outline-none"
        wire:click="$set('open', true)">
        <i class="fa-solid fa-plus"></i>
        <span>Agregar nuevo servicio</span>
    </button>

    <!-- Modal -->
    <div 
        class="fixed inset-0 bg-gray-800 bg-opacity-50 flex justify-center items-center z-50"
        style="display: {{ $open ? 'flex' : 'none' }};">
        <div class="bg-white w-96 rounded-lg shadow-lg p-6">
            <!-- Título del modal -->
            <h2 class="text-lg font-semibold text-gray-800">Agregar Nuevo Servicio</h2>

            <!-- Contenido del modal -->
            <div class="mt-4">
                <!-- Nombre del servicio -->
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Nombre del servicio</label>
                    <input 
                        type="text" 
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                        wire:model.defer="nombre">
                    @error('nombre')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Tipo de servicio -->
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Tipo de servicio</label>
                    <input 
                        type="text" 
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                        wire:model.defer="tipo_de_servicio">
                    @error('tipo_de_servicio')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Contenido -->
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Contenido</label>
                    <input 
                        type="text" 
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                        wire:model.defer="contenido">
                    @error('contenido')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Imagen -->
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Archivo de Imagen</label>
                    <input 
                        type="file" 
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                        accept="image/*" 
                        wire:model="path">
                    @error('path')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                    @enderror
                    <div wire:loading wire:target="path" class="text-sm text-blue-600">
                        Cargando imagen...
                    </div>
                </div>
            </div>

            <!-- Footer del modal -->
            <div class="flex justify-end mt-4">
                <!-- Botón de cancelar -->
                <button 
                    class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600 focus:outline-none"
                    wire:click="$set('open', false)">
                    <i class="fa-solid fa-times"></i> Cancelar
                </button>

                <!-- Botón de guardar -->
                <button 
                    class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600 focus:outline-none ml-2"
                    wire:click="save">
                    <i class="fa-solid fa-save"></i> Guardar
                </button>
            </div>
        </div>
    </div>
</div>
