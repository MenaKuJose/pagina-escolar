<x-app-layout>
    <x-slot name="header">
        <section-title class="font-semibold text-xl text-gray-800 leading-tight">
            Mejor Oferta Educativa
        </section-title>
    </x-slot>

    <!-- Ajuste para ocupar todo el alto disponible -->
    <div class="py-12 h-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 h-full">
            <livewire:crear-mejor-oferta-componente />
            <div class="bg-white overflow-auto shadow-xl sm:rounded-lg p-6 h-full">
                <!-- Ajuste para que el contenedor ocupe todo el alto disponible -->
                <div class="flex justify-center h-full">
                    <div class="w-full">
                        <!-- Componente Livewire para la mejor oferta -->
                        <livewire:mejor-oferta-componente />
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
