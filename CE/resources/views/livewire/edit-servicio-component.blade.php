<div>
    <!-- Modal -->
    <div class="modal fade @if ($open) show d-block @endif" tabindex="-1" role="dialog"
        style="@if ($open) display: block; @else display: none; @endif" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content border-0 shadow-lg" style="border-radius: 15px;">
                <!-- Título del modal -->
                <div class="modal-header bg-primary text-white" style="border-radius: 15px 15px 0 0;">
                    <h5 class="modal-title fw-bold"><i class="bi bi-pencil-square"></i> Editar Servicio</h5>
                    <button type="button" class="btn-close btn-close-white" aria-label="Cerrar"
                        wire:click="$set('open', false)"></button>
                </div>

                <!-- Contenido del modal -->
                <div class="modal-body bg-light">
                    <!-- Nombre de la Servicio -->
                    <div class="mb-4">
                        <label for="nombre" class="form-label fw-semibold">Nombre de la Servicio</label>
                        <input type="text" id="nombre" class="form-control border-primary shadow-sm rounded-3"
                            wire:model.defer="nombre">
                        @error('nombre')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <!-- Tipo Servicio -->
                    <div class="mb-4">
                        <label for="tipo_de_servicio" class="form-label fw-semibold">Tipo Servicio</label>
                        <input type="text" id="tipo_de_servicio" class="form-control border-primary shadow-sm rounded-3"
                            wire:model.defer="tipo_de_servicio">
                        @error('tipo_de_servicio')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <!-- Contenido -->
                    <div class="mb-4">
                        <label for="contenido" class="form-label fw-semibold">Contenido</label>
                        <input type="text" id="contenido" class="form-control border-primary shadow-sm rounded-3"
                            wire:model.defer="contenido">
                        @error('contenido')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <x-label value="Imagen Actual" />
                        @if ($path)
                            <img src="{{ $path }}" alt="Imagen actual" class="w-32 h-32 object-cover mt-2" />
                        @else
                            <span>No hay imagen actual.</span>
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

                </div>

                <!-- Pie del modal -->
                <div class="modal-footer bg-light" style="border-radius: 0 0 15px 15px;">
                    <button type="button" class="btn btn-secondary fw-bold shadow-sm rounded-3"
                        wire:click="$set('open', false)">
                        <i class="bi bi-x-circle"></i> Cerrar
                    </button>
                    <button type="button" class="btn btn-success fw-bold shadow-sm rounded-3" wire:click="save">
                        <i class="bi bi-save"></i> Guardar
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
