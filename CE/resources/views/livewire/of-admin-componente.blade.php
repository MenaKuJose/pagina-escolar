<div class="table-responsive overflow-x-auto">
    <table class="min-w-full table-auto border-collapse border border-gray-200">
        <thead class="bg-blue-500 text-white">
            <tr>
                <th class="px-4 py-2">Nombre</th>
                <th class="px-4 py-2">Etapa Inicial</th>
                <th class="px-4 py-2">Duración Inicial</th>
                <th class="px-4 py-2">Etapa Continuidad</th>
                <th class="px-4 py-2">Duración Continuidad</th>
                <th class="px-4 py-2">Duración Total</th>
                <th class="px-4 py-2">Horas Totales</th>
                <th class="px-4 py-2">Créditos Totales</th>
                <th class="px-4 py-2">Acciones</th> <!-- Nueva columna para acciones -->
            </tr>
        </thead>
        <tbody>
            @foreach ($ofertas as $oferta)
                <tr>
                    <td class="px-4 py-2">{{ $oferta->nombre }}</td>
                    <td class="px-4 py-2">{{ $oferta->etapa_inicial }}</td>
                    <td class="px-4 py-2">{{ $oferta->duracion_cuatri_in }}</td>
                    <td class="px-4 py-2">{{ $oferta->etapa_continuidad }}</td>
                    <td class="px-4 py-2">{{ $oferta->duracion_cuatri_con }}</td>
                    <td class="px-4 py-2">{{ $oferta->duracion_total_programa }}</td>
                    <td class="px-4 py-2">{{ $oferta->horas_totales }}</td>
                    <td class="px-4 py-2">{{ $oferta->creditos_totales }}</td>
                    <td class="px-4 py-2">
                        <!-- Contenedor para alinear los botones -->
                        <div class="flex space-x-2">
                            <!-- Botón para Editar -->
                            <button type="button" class="btn btn-primary btn-sm rounded-3 shadow-sm"
                                wire:click="editOferta({{ $oferta->id }})">
                                <i class="bi bi-pencil-square"></i> Editar
                            </button>

                            <!-- Botón para Eliminar -->
                            <button type="button" class="btn btn-danger btn-sm rounded-3 shadow-sm"
                                onclick="confirmDelete({{ $oferta->id }})">
                                <i class="bi bi-trash"></i> Eliminar
                            </button>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
