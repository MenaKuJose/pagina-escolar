<div>
    <button type="button" class="btn btn-primary fw-bold shadow-sm" wire:click="$set('open', true)"
        style="border-radius: 30px;">
        Agregar Mejor Oferta Educativa
    </button>

    <!-- Modal -->
    <div class="modal fade @if ($open) show d-block @endif" tabindex="-1" role="dialog"
        style="@if ($open) display: block; @else display: none; @endif" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content border-0 shadow-lg" style="border-radius: 15px;">
                <!-- Título del modal -->
                <div class="modal-header bg-primary text-white" style="border-radius: 15px 15px 0 0;">
                    <h5 class="modal-title fw-bold"><i class="bi bi-pencil-square"></i> Agregar Mejor Oferta Educativa
                    </h5>
                    <button type="button" class="btn-close btn-close-white" aria-label="Cerrar"
                        wire:click="$set('open', false)"></button>
                </div>

                <!-- Contenido del modal -->
                <div class="modal-body bg-light">
                    <!-- Oferta Educativa (Selector de ID) -->
                    <div class="mb-4">
                        <x-label for="oferta_educativa_id" value="Oferta Educativa" />
                        <select class="form-select" wire:model="oferta_educativa_id" id="oferta_educativa_id">
                            <option value="">Seleccione una oferta</option>
                            @foreach ($ofertasEducativas as $oferta)
                                <option value="{{ $oferta->id }}">{{ $oferta->nombre }}</option>
                            @endforeach
                        </select>
                        @error('oferta_educativa_id')
                            <span class="text-sm text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- Pie del modal -->
                <div class="modal-footer bg-light" style="border-radius: 0 0 15px 15px;">
                    <button type="button" class="btn btn-secondary fw-bold shadow-sm" wire:click="$set('open', false)"
                        style="border-radius: 30px;">
                        <i class="bi bi-x-circle"></i> Cerrar
                    </button>
                    <button type="button" class="btn btn-success fw-bold shadow-sm" wire:click="guardar"
                        style="border-radius: 30px;">
                        <i class="bi bi-save"></i> Guardar
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
