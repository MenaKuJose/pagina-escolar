<div>
    <x-button wire:click="$set('open', true)">
        Agregar Nueva Oferta
    </x-button>

    <!-- Modal -->
    <x-dialog-modal wire:model="open">
        <x-slot name="title">
            Agregar Nueva Oferta
        </x-slot>

        <x-slot name="content">
            <!-- Título de la imagen -->
            <div class="mb-4">
                <x-label value="Título de la Imagen" />
                <x-input type="text" class="w-full" wire:model.defer="title"></x-input>
                @error('title')
                    <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>

            <!-- Descripción de la imagen -->
            <div class="mb-4">
                <x-label value="Descripción" />
                <textarea class="w-full form-input" wire:model.defer="description" rows="3"></textarea>
                @error('description')
                    <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>

            <!-- Archivo de imagen -->
            <div class="mb-4">
                <x-label value="Archivo de Imagen" />
                <x-input type="file" class="w-full" accept="image/*" wire:model="path"></x-input>
                @error('path')
                    <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror
                <div wire:loading wire:target="path" class="text-sm text-blue-600">
                    Cargando imagen...
                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-danger-button wire:click="$set('open', false)">
                Cerrar
            </x-danger-button>
            <x-button wire:click="save" class="ml-2">
                Guardar
            </x-button>
        </x-slot>
    </x-dialog-modal>
</div>
