<x-app-layout>
    <x-slot name="header">
        <section-title class="font-semibold text-xl text-gray-800 leading-tight">
            Usuarios Registrados
        </section-title>
    </x-slot>

    <!-- Ajustar el contenedor principal para que ocupe todo el alto de la pantalla -->
    <div class="py-12 h-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 h-full">
            <div class="bg-white overflow-auto shadow-xl sm:rounded-lg p-6 h-full">
                <div class="flex justify-center h-full">
                    <div class="w-full">
                        <livewire:tabla-users-component />
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
