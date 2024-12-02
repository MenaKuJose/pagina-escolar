<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">


    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
    <script src="https://unpkg.com/@alpinejs/focus@3.x.x/dist/cdn.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="font-sans antialiased">
    @livewire('navigation-menu')
    <div class="flex min-h-screen bg-white">
        @livewire('sidebar')
        <!-- Contenido principal -->
        <main class="flex-1">
            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $slot }}
            </div>
        </main>
    </div>

    @stack('modals')

    @livewireScripts
    <script>
        function confirmDelete(ofertaId) {
            // Mostrar alerta de confirmación
            Swal.fire({
                title: '¿Estás seguro?',
                text: "Esta acción eliminará la oferta permanentemente.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Ejecutar la función de eliminación de Livewire si se confirma
                    window.Livewire.dispatch('deleteOferta', {
                        ofertaId
                    });
                }
            });
        }

        function confirmDeleteIm(imagenId) {
            // Mostrar alerta de confirmación
            Swal.fire({
                title: '¿Estás seguro?',
                text: "Esta acción eliminará la Imagen permanentemente.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Ejecutar la función de eliminación de Livewire si se confirma
                    window.Livewire.dispatch('deleteImage', imagenId);
                }
            });
        }

        // Mantener la alerta de éxito después de eliminar
        Livewire.on('alert', function(message) {
            Swal.fire({
                title: "Listo",
                text: message,
                icon: "success"
            });
        });
    </script>


</body>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</html>
