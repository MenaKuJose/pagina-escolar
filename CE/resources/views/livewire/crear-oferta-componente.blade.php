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
            <!-- Nombre de la oferta -->
            <div class="mb-4">
                <x-label value="Nombre de la Oferta" />
                <x-input type="text" class="w-full" wire:model.defer="nombre"></x-input>
                @error('nombre')
                    <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>

            <!-- Etapa Inicial -->
            <div class="mb-4">
                <x-label value="Etapa Inicial" />
                <x-input type="text" class="w-full" wire:model.defer="etapa_inicial"></x-input>
                @error('etapa_inicial')
                    <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>

            <!-- Duración cuatrimestral inicial -->
            <div class="mb-4">
                <x-label value="Duración Inicial (cuatrimestres)" />
                <select class="w-full form-input" wire:model.defer="duracion_cuatri_in">
                    <option value="">Seleccione</option>
                    @foreach (range(1, 6) as $number)
                        <option value="{{ $number }}">{{ $number }}</option>
                    @endforeach
                </select>
                @error('duracion_cuatri_in')
                    <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>

            <!-- Etapa de continuidad -->
            <div class="mb-4">
                <x-label value="Etapa Continuidad" />
                <x-input type="text" class="w-full" wire:model.defer="etapa_continuidad"></x-input>
                @error('etapa_continuidad')
                    <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>

            <!-- Duración cuatrimestral de continuidad -->
            <div class="mb-4">
                <x-label value="Duración Continuidad (cuatrimestres)" />
                <select class="w-full form-input" wire:model.defer="duracion_cuatri_con">
                    <option value="">Seleccione</option>
                    @foreach (range(1, 5) as $number)
                        <option value="{{ $number }}">{{ $number }}</option>
                    @endforeach
                </select>
                @error('duracion_cuatri_con')
                    <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>

            <!-- Horas Totales -->
            <div class="mb-4">
                <x-label value="Horas Totales" />
                <x-input type="text" class="w-full" wire:model.defer="horas_totales"></x-input>
                @error('horas_totales')
                    <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>

            <!-- Créditos Totales -->
            <div class="mb-4">
                <x-label value="Créditos Totales" />
                <x-input type="text" class="w-full" wire:model.defer="creditos_totales"></x-input>
                @error('creditos_totales')
                    <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>

            <!-- Mapa Curricular (archivo PDF) -->
            <div class="mb-4">
                <x-label value="Mapa Curricular" />
                <x-input type="file" class="w-full" accept=".pdf" wire:model.defer="mapa_curricular"></x-input>
                @error('mapa_curricular')
                    <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror
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
