<div>
    <!-- Modal -->
    <div class="modal fade @if ($open) show d-block @endif" tabindex="-1" role="dialog"
        style="@if ($open) display: block; @else display: none; @endif" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content border-0 shadow-lg" style="border-radius: 15px;">
                <!-- Título del modal -->
                <div class="modal-header bg-primary text-white" style="border-radius: 15px 15px 0 0;">
                    <h5 class="modal-title fw-bold"><i class="bi bi-pencil-square"></i> Editar Oferta</h5>
                    <button type="button" class="btn-close btn-close-white" aria-label="Cerrar"
                        wire:click="$set('open', false)"></button>
                </div>

                <!-- Contenido del modal -->
                <div class="modal-body bg-light">
                    <!-- Nombre de la oferta -->
                    <div class="mb-4">
                        <label for="nombre" class="form-label fw-semibold">Nombre de la Oferta</label>
                        <input type="text" id="nombre" class="form-control border-primary shadow-sm rounded-3"
                            wire:model.defer="nombre">
                        @error('nombre')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Etapa Inicial -->
                    <div class="mb-4">
                        <label for="etapa_inicial" class="form-label fw-semibold">Etapa Inicial</label>
                        <input type="text" id="etapa_inicial" class="form-control border-primary shadow-sm rounded-3"
                            wire:model.defer="etapa_inicial">
                        @error('etapa_inicial')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Duración cuatrimestral inicial -->
                    <div class="mb-4">
                        <label for="duracion_cuatri_in" class="form-label fw-semibold">Duración Inicial
                            (cuatrimestres)</label>
                        <select id="duracion_cuatri_in" class="form-select border-primary shadow-sm rounded-3"
                            wire:model.defer="duracion_cuatri_in">
                            <option value="">Seleccione</option>
                            @foreach (range(1, 6) as $number)
                                <option value="{{ $number }}">{{ $number }}</option>
                            @endforeach
                        </select>
                        @error('duracion_cuatri_in')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Etapa de continuidad -->
                    <div class="mb-4">
                        <label for="etapa_continuidad" class="form-label fw-semibold">Etapa Continuidad</label>
                        <input type="text" id="etapa_continuidad"
                            class="form-control border-primary shadow-sm rounded-3"
                            wire:model.defer="etapa_continuidad">
                        @error('etapa_continuidad')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Duración cuatrimestral de continuidad -->
                    <div class="mb-4">
                        <label for="duracion_cuatri_con" class="form-label fw-semibold">Duración Continuidad
                            (cuatrimestres)</label>
                        <select id="duracion_cuatri_con" class="form-select border-primary shadow-sm rounded-3"
                            wire:model.defer="duracion_cuatri_con">
                            <option value="">Seleccione</option>
                            @foreach (range(1, 5) as $number)
                                <option value="{{ $number }}">{{ $number }}</option>
                            @endforeach
                        </select>
                        @error('duracion_cuatri_con')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Horas Totales -->
                    <div class="mb-4">
                        <label for="horas_totales" class="form-label fw-semibold">Horas Totales</label>
                        <input type="text" id="horas_totales" class="form-control border-primary shadow-sm rounded-3"
                            wire:model.defer="horas_totales">
                        @error('horas_totales')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Créditos Totales -->
                    <div class="mb-4">
                        <label for="creditos_totales" class="form-label fw-semibold">Créditos Totales</label>
                        <input type="text" id="creditos_totales"
                            class="form-control border-primary shadow-sm rounded-3" wire:model.defer="creditos_totales">
                        @error('creditos_totales')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Mapa Curricular (archivo PDF) -->
                    <div class="mb-4">
                        <label for="mapa_curricular" class="form-label fw-semibold">Mapa Curricular</label>

                        <!-- Mostrar vista previa solo si no se ha seleccionado un nuevo archivo -->
                        @if (!$mapa_curricular && $oferta->mapa_curricular)
                            <p class="text-muted">{{ basename($oferta->mapa_curricular) }}</p>
                            <iframe src="{{ Storage::url($oferta->mapa_curricular) }}"
                                class="w-100 h-64 mt-2 border border-gray-300"></iframe>
                        @endif

                        <!-- Campo para cargar un nuevo archivo PDF -->
                        <input type="file" id="mapa_curricular"
                            class="form-control border-primary shadow-sm rounded-3 mt-2" accept=".pdf"
                            wire:model="mapa_curricular">
                        @error('mapa_curricular')
                            <small class="text-danger">{{ $message }}</small>
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
