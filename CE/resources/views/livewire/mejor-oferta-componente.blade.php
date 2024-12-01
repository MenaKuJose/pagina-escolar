<div>
    <!-- Mensaje de éxito -->
    @if (session()->has('mensaje'))
        <div class="text-green-500 mb-4">
            {{ session('mensaje') }}
        </div>
    @endif

    <!-- Tabla para mostrar las mejores ofertas educativas -->
    <div class="overflow-x-auto">
        <table class="min-w-full table-auto border-collapse border border-gray-200">
            <thead class="bg-blue-500 text-white">
                <tr>
                    <th class="px-4 py-2">ID</th>
                    <th class="px-4 py-2">Nombre</th>
                    <th class="px-4 py-2">Etapa Inicial</th>
                    <th class="px-4 py-2">Etapa Continuidad</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mejoresOfertas as $oferta)
                    <tr>
                        <td class="border border-gray-300 px-4 py-2">{{ $oferta->id }}</td>
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
