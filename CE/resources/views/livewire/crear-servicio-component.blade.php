<div>
    <x-button wire:click="$set('open', true)">
        <i class="fa-solid fa-plus " style="color: #005eff;"></i>
        <span >Agregar nuevo servicio</span>
    </x-button>

    <!-- Modal -->
    <x-dialog-modal wire:model="open">
        <x-slot  name="title">
            Agregar Nuevo Servicio
        </x-slot>
        

        <x-slot name="content">
            <!-- Nombre de la oferta -->
            <div class="mb-4">
                <x-label value="Nombre del servicio" />
                <x-input type="text" class="w-full" wire:model.defer="nombre"></x-input>
                @error('nombre')
                    <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>

            <!-- Tipo de servicio -->
            <div class="mb-4">
                <x-label value="Tipo de servicio" />
                <x-input type="text" class="w-full" wire:model.defer="tipo_de_servicio"></x-input>
                @error('tipo_de_servicio')
                    <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>

            <!-- Contenido -->
            <div class="mb-4">
                <x-label value="Contenido" />
                <x-input type="text" class="w-full" wire:model.defer="contenido"></x-input>
                @error('contenido')
                    <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-danger-button wire:click="$set('open', false)">
                <i class="fa-solid fa-times"></i>
            </x-danger-button>
            <x-button wire:click="save" class="ml-2" style="background-color: #3C5A99">
                <i class="fa-solid fa-save"></i>
                
            </x-button>
        </x-slot>
    </x-dialog-modal>
</div>
