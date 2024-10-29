<div>
    <table class="table-auto w-full">
        <thead>
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
                    <td class="border px-4 py-2">{{ $oferta->nombre }}</td>
                    <td class="border px-4 py-2">{{ $oferta->etapa_inicial }}</td>
                    <td class="border px-4 py-2">{{ $oferta->duracion_cuatri_in }}</td>
                    <td class="border px-4 py-2">{{ $oferta->etapa_continuidad }}</td>
                    <td class="border px-4 py-2">{{ $oferta->duracion_cuatri_con }}</td>
                    <td class="border px-4 py-2">{{ $oferta->duracion_total_programa }}</td>
                    <td class="border px-4 py-2">{{ $oferta->horas_totales }}</td>
                    <td class="border px-4 py-2">{{ $oferta->creditos_totales }}</td>
                    <td class="border px-4 py-2">
                        <x-secondary-button wire:click="editOferta({{ $oferta->id }})"
                            class="text-red-500 hover:text-red-700">
                            Editar
                        </x-secondary-button>
                        <x-danger-button onclick="confirmDelete({{ $oferta->id }})"
                            class="text-red-500 hover:text-red-700">
                            Eliminar
                        </x-danger-button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
