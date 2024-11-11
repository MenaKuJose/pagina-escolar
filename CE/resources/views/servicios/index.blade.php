<x-app-layout>
    <x-slot name="header">
        <section-title class="font-semibold text-xl text-gray-800 leading-tight">
            Sevicios
        </section-title>
    </x-slot>

    <div >
        <div>
            <livewire:crear-servicio-component />
            <br>
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <!-- Llamada al componente Livewire -->
                <div class="flex justify-center">
                    <div>
                        <livewire:servicios-component />
                        <livewire:edit-servicio-component />
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
