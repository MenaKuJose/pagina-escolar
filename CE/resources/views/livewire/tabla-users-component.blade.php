<div class="overflow-x-auto">
    <table class="min-w-full table-auto border-collapse border border-gray-200 bg-white rounded-lg shadow-lg">
        <thead class="bg-blue-500 text-white">
            <tr>
                <th class="px-4 py-2 text-left">ID</th>
                <th class="px-4 py-2 text-left">Nombre</th>
                <th class="px-4 py-2 text-left">Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr class="hover:bg-gray-100">
                    <td class="px-4 py-2 text-left">{{ $user->id }}</td>
                    <td class="px-4 py-2 text-left">{{ $user->name }}</td>
                    <td class="px-4 py-2 text-left">{{ $user->email }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
