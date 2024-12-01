<div>
    <!-- Botón para abrir el modal -->
    <button type="button" class="btn btn-primary fw-bold shadow-sm" wire:click="$set('open', true)"
        style="border-radius: 30px;">
        <i class="bi bi-plus-circle"></i> Agregar Nueva Oferta
    </button>

    <!-- Modal -->
    <div class="modal fade @if ($open) show d-block @endif" tabindex="-1" role="dialog"
        style="@if ($open) display: block; @else display: none; @endif" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content border-0 shadow-lg" style="border-radius: 15px;">
                <!-- Título del modal -->
                <div class="modal-header bg-primary text-white" style="border-radius: 15px 15px 0 0;">
                    <h5 class="modal-title fw-bold"><i class="bi bi-pencil-square"></i> Agregar Nueva Oferta</h5>
                    <button type="button" class="btn-close btn-close-white" aria-label="Cerrar"
                        wire:click="$set('open', false)"></button>
                </div>

                <!-- Contenido del modal -->
                <div class="modal-body bg-light">
                    <!-- Título de la imagen -->
                    <div class="mb-4">
                        <label for="imageTitle" class="form-label fw-semibold">Título de la Imagen</label>
                        <input type="text" id="imageTitle" class="form-control border-primary shadow-sm"
                            wire:model.defer="title">
                        @error('title')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Descripción de la imagen -->
                    <div class="mb-4">
                        <label for="imageDescription" class="form-label fw-semibold">Descripción</label>
                        <textarea id="imageDescription" class="form-control border-primary shadow-sm" wire:model.defer="description"
                            rows="3" placeholder="Escribe una breve descripción..."></textarea>
                        @error('description')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Archivo de imagen -->
                    <div class="mb-4">
                        <label for="imagePath" class="form-label fw-semibold">Archivo de Imagen</label>
                        <input type="file" id="imagePath" class="form-control border-primary shadow-sm"
                            accept="image/*" wire:model="path">
                        @error('path')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                        <div wire:loading wire:target="path" class="text-primary">
                            <i class="spinner-border spinner-border-sm"></i> Cargando imagen...
                        </div>
                    </div>
                </div>

                <!-- Pie del modal -->
                <div class="modal-footer bg-light" style="border-radius: 0 0 15px 15px;">
                    <button type="button" class="btn btn-secondary fw-bold shadow-sm" wire:click="$set('open', false)"
                        style="border-radius: 30px;">
                        <i class="bi bi-x-circle"></i> Cerrar
                    </button>
                    <button type="button" class="btn btn-success fw-bold shadow-sm" wire:click="save"
                        style="border-radius: 30px;">
                        <i class="bi bi-save"></i> Guardar
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
