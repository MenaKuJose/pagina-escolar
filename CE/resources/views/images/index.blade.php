<x-app-layout>
    <x-slot name="header">
        <section-title class="font-semibold text-xl text-gray-800 leading-tight">
            Imágenes
        </section-title>
    </x-slot>

    <!-- Ajustar el contenedor principal para que ocupe todo el alto de la pantalla -->
    <div class="py-12 h-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 h-full">
            <livewire:crear-imagenes-componente />
            <div class="bg-white overflow-auto shadow-xl sm:rounded-lg p-6 h-full">
                <!-- Ajustar el contenedor de la tabla para ocupar todo el alto disponible -->
                <div class="flex justify-center h-full">
                    <div class="w-full">
                        <!-- Componente Livewire para las imágenes -->
                        <livewire:image-crud />
                        <livewire:edit-imagenes-modal />
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
