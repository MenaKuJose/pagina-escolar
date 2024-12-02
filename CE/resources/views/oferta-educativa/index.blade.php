<x-app-layout>
    <x-slot name="header">
        <section-title class="font-semibold text-xl text-gray-800 leading-tight">
            Ofertas Educativas
        </section-title>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <livewire:crear-oferta-componente />
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <!-- Llamada al componente Livewire -->
                <div class="flex justify-center">
                    <div class="w-full lg:w-11/12 mx-auto">
                        <livewire:of-admin-componente />
                        <livewire:edit-oferta-modal />
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
