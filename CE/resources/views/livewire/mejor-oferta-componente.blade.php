<div>
    <!-- Mensaje de éxito -->
    @if (session()->has('mensaje'))
        <div class="text-green-500 mb-4">
            {{ session('mensaje') }}
        </div>
    @endif

    <!-- Tabla para mostrar las mejores ofertas educativas -->
    <div class="overflow-x-auto">
        <table class="table-auto w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border border-gray-300 px-4 py-2">ID</th>
                    <th class="border border-gray-300 px-4 py-2">Nombre</th>
                    <th class="border border-gray-300 px-4 py-2">Etapa Inicial</th>
                    <th class="border border-gray-300 px-4 py-2">Etapa Continuidad</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mejoresOfertas as $oferta)
                    <tr>
                        <td class="border border-gray-300 px-4 py-2">{{ $oferta->id }}</td>
                        <!-- Aquí accedemos al nombre de la oferta educativa relacionada -->
                        <td class="border border-gray-300 px-4 py-2">{{ $oferta->ofertaEducativa->nombre }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $oferta->etapa_inicial }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $oferta->etapa_continuidad }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Paginación -->
    <div class="mt-4">
        {{ $mejoresOfertas->links() }}
    </div>
</div>
