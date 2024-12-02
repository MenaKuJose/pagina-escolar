<div>
    <x-button wire:click="$set('open', true)">
        Agregar Mejor Oferta Educativa
    </x-button>

    <!-- Modal -->
    <x-dialog-modal wire:model="open">
        <x-slot name="title">
            Agregar Mejor Oferta Educativa
        </x-slot>

        <x-slot name="content">
            <!-- Oferta Educativa (Selector de ID) -->
            <div class="mb-4">
                <x-label value="Oferta Educativa" />
                <select class="w-full form-input" wire:model="oferta_educativa_id">
                    <option value="">Seleccione una oferta</option>
                    @foreach ($ofertasEducativas as $oferta)
                        <option value="{{ $oferta->id }}">{{ $oferta->nombre }}</option>
                    @endforeach
                </select>
                @error('oferta_educativa_id')
                    <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-danger-button wire:click="$set('open', false)">
                Cerrar
            </x-danger-button>
            <x-button wire:click="guardar" class="ml-2">
                Guardar
            </x-button>
        </x-slot>
    </x-dialog-modal>
</div>
