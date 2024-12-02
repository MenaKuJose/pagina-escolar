<div class="overflow-x-auto">
    <table class="table-auto w-full border-collapse bg-white shadow-lg rounded-lg">
        <thead class="bg-gradient-to-r from-blue-500 to-indigo-500 text-white">
            <tr>
                <th class="px-6 py-3 text-left font-semibold text-sm uppercase">ID</th>
                <th class="px-6 py-3 text-left font-semibold text-sm uppercase">Nombre</th>
                <th class="px-6 py-3 text-left font-semibold text-sm uppercase">Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr class="hover:bg-gray-100 border-b border-gray-200">
                    <td class="border px-6 py-4 text-gray-800">{{ $user->id }}</td>
                    <td class="border px-6 py-4 text-gray-800">{{ $user->name }}</td>
                    <td class="border px-6 py-4 text-gray-800">{{ $user->email }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
