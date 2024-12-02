<div>
    <!-- Mensaje de éxito -->
    @if (session()->has('mensaje'))
        <div class="text-green-600 bg-green-100 border border-green-300 rounded-md p-4 mb-4">
            {{ session('mensaje') }}
        </div>
    @endif

    <!-- Tabla para mostrar las mejores ofertas educativas -->
    <div class="overflow-x-auto">
        <table class="table-auto w-full border-collapse bg-white shadow-lg rounded-lg">
            <thead class="bg-gradient-to-r from-blue-500 to-indigo-500 text-white">
                <tr>
                    <th class="px-6 py-3 text-left font-semibold text-sm uppercase">ID</th>
                    <th class="px-6 py-3 text-left font-semibold text-sm uppercase">Nombre</th>
                    <th class="px-6 py-3 text-left font-semibold text-sm uppercase">Etapa Inicial</th>
                    <th class="px-6 py-3 text-left font-semibold text-sm uppercase">Etapa Continuidad</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mejoresOfertas as $oferta)
                    <tr class="hover:bg-gray-100 border-b border-gray-200">
                        <td class="border px-6 py-4 text-gray-800">{{ $oferta->id }}</td>
                        <!-- Aquí accedemos al nombre de la oferta educativa relacionada -->
                        <td class="border px-6 py-4 text-gray-800">{{ $oferta->ofertaEducativa->nombre }}</td>
                        <td class="border px-6 py-4 text-gray-800">{{ $oferta->etapa_inicial }}</td>
                        <td class="border px-6 py-4 text-gray-800">{{ $oferta->etapa_continuidad }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Paginación -->
    <div class="mt-4 flex justify-center">
        {{ $mejoresOfertas->links() }}
    </div>
</div>
