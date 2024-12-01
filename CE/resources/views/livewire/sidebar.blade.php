<div x-data="{ open: true }" class="flex min-h-screen bg-light">
    <!-- Sidebar -->
    <aside id="sidebar" class="bg-white border-r shadow-sm transition-all" :class="open ? 'w-64' : 'w-20'">
        <div class="p-3 h-full">
            <!-- Toggle Button -->
            <button id="sidebar-toggle" class="flex items-center p-2 mb-4 transition-colors" @click="open = !open"
                aria-expanded="true" aria-label="Toggle Sidebar">
                <i class="fas" :class="open ? 'fa-chevron-left' : 'fa-bars'"></i>
                <span class="ml-2" :class="open ? 'block' : 'hidden'">Universidad Tecnológica del Poniente</span>
            </button>

            <!-- Navigation -->
            <nav>
                <ul class="space-y-2">
                    @php
                        $routes = [
                            ['name' => 'dashboard', 'icon' => 'fas fa-tachometer-alt', 'label' => 'Dashboard'],
                            ['name' => 'usuarios.index', 'icon' => 'fas fa-users', 'label' => 'Tabla de Usuarios'],
                            [
                                'name' => 'oferta-educativa.index',
                                'icon' => 'fas fa-graduation-cap',
                                'label' => 'Oferta Educativa',
                            ],
                            [
                                'name' => 'mejor-oferta.index',
                                'icon' => 'fas fa-graduation-cap',
                                'label' => 'Mejor Oferta Educativa',
                            ],
                            ['name' => 'servicios.index', 'icon' => 'fas fa-concierge-bell', 'label' => 'Servicios'],
                            ['name' => 'imagenes.index', 'icon' => 'fa-solid fa-images', 'label' => 'Imágenes'],
                        ];
                    @endphp

                    @foreach ($routes as $route)
                        <li>
                            <a href="{{ route($route['name']) }}"
                                class="flex items-center p-2 rounded transition-colors {{ request()->routeIs($route['name']) ? 'bg-blue-700 text-white' : 'text-gray-600' }}">
                                <!-- Icon container (always visible) -->
                                <div
                                    class="w-6 h-6 flex items-center justify-center text-center rounded-md overflow-hidden">
                                    <i
                                        class="{{ $route['icon'] }} {{ request()->routeIs($route['name']) ? 'text-white' : 'text-gray-600' }} text-xl"></i>
                                </div>
                                <!-- Label -->
                                <span class="ml-2 transition-all duration-300"
                                    :class="{ 'hidden': !open, 'block': open }">{{ $route['label'] }}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </nav>
        </div>
    </aside>
</div>
