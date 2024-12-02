<div>
    <x-dialog-modal wire:model="open">
        <x-slot name="title">Editar Imagen</x-slot>

        <x-slot name="content">
            <!-- Título de la imagen -->
            <div class="mb-4">
                <x-label value="Título de la Imagen" />
                <x-input type="text" class="w-full" wire:model.defer="title" />
                @error('title')
                    <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>

            <!-- Descripción de la imagen -->
            <div class="mb-4">
                <x-label value="Descripción" />
                <x-input type="text" class="w-full" wire:model.defer="description" />
                @error('description')
                    <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>

            <!-- Imagen actual -->
            <div class="mb-4">
                <x-label value="Imagen Actual" />
                @if ($path)
                    <img src="{{ Storage::url($path) }}" alt="Imagen actual" class="w-32 h-32 object-cover mt-2" />
                @endif
            </div>

            <!-- Cargar nueva imagen -->
            <div class="mb-4">
                <x-label value="Cargar Nueva Imagen" />
                <x-input type="file" class="w-full mt-2" accept="image/*" wire:model="newImage" />
                @error('newImage')
                    <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-danger-button wire:click="$set('open', false)">Cerrar</x-danger-button>
            <x-button wire:click="save" class="ml-2">Guardar</x-button>
        </x-slot>
    </x-dialog-modal>
</div>
