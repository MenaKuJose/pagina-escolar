<x-app-layout>
    <x-slot name="header">
        <section-title class="font-semibold text-xl text-gray-800 leading-tight">
            Imagenes
        </section-title>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <livewire:crear-imagenes-componente />
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <!-- Llamada al componente Livewire -->
                <div class="flex justify-center">
                    <div>
                        <livewire:image-crud />
                        <livewire:edit-imagenes-modal />
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
