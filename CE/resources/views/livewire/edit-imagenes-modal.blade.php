<div>
    <!-- Modal -->
    <div class="modal fade @if ($open) show d-block @endif" tabindex="-1" role="dialog"
        style="@if ($open) display: block; @else display: none; @endif" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content border-0 shadow-lg" style="border-radius: 15px;">
                <!-- Título del modal -->
                <div class="modal-header bg-primary text-white" style="border-radius: 15px 15px 0 0;">
                    <h5 class="modal-title fw-bold"><i class="bi bi-pencil-square"></i> Editar Imagen</h5>
                    <button type="button" class="btn-close btn-close-white" aria-label="Cerrar"
                        wire:click="$set('open', false)"></button>
                </div>

                <!-- Contenido del modal -->
                <div class="modal-body bg-light">
                    <!-- Título de la imagen -->
                    <div class="mb-4">
                        <label for="imageTitle" class="form-label fw-semibold">Título de la Imagen</label>
                        <input type="text" id="imageTitle" class="form-control border-primary shadow-sm rounded-3"
                            wire:model.defer="title">
                        @error('title')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Descripción de la imagen -->
                    <div class="mb-4">
                        <label for="imageDescription" class="form-label fw-semibold">Descripción</label>
                        <textarea id="imageDescription" class="form-control border-primary shadow-sm rounded-3" wire:model.defer="description"
                            rows="3" placeholder="Escribe una breve descripción..."></textarea>
                        @error('description')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Imagen actual -->
                    <div class="mb-4">
                        <label for="imagePath" class="form-label fw-semibold">Imagen Actual</label>
                        @if ($path)
                            <img src="{{ Storage::url($path) }}" alt="Imagen actual"
                                class="w-32 h-32 object-cover mt-2 rounded-3" />
                        @else
                            <p class="text-muted">No se ha cargado ninguna imagen aún.</p>
                        @endif
                    </div>

                    <!-- Cargar nueva imagen -->
                    <div class="mb-4">
                        <label for="newImage" class="form-label fw-semibold">Cargar Nueva Imagen</label>
                        <input type="file" id="newImage" class="form-control border-primary shadow-sm rounded-3"
                            accept="image/*" wire:model="newImage">
                        @error('newImage')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                        <div wire:loading wire:target="newImage" class="text-primary">
                            <i class="spinner-border spinner-border-sm"></i> Cargando imagen...
                        </div>
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
