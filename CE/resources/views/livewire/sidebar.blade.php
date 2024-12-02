<div x-data="{ open: true }" class="flex min-h-screen">
    <!-- Sidebar -->
    <aside id="sidebar" class=" text-red-800 border-r shadow-lg transition-all" :class="open ? 'w-64' : 'w-32'">
        <div class="p-3 h-full">
            <!-- Toggle Button -->
            <button id="sidebar-toggle"
                class="flex items-center p-2 mb-4 transition-colors bg-red-700 hover:bg-red-800 rounded text-white"
                @click="open = !open" aria-expanded="true" aria-label="Toggle Sidebar">
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
                            ['name' => 'imagenes.index', 'icon' => 'fa-solid fa-images', 'label' => 'Imágenes'],
                        ];
                    @endphp

                    @foreach ($routes as $route)
                        <li>
                            <a href="{{ route($route['name']) }}"
                                class="group flex items-center p-2 rounded transition-all 
                                  {{ request()->routeIs($route['name']) ? 'bg-red-700 text-white' : 'text-red-800 hover:bg-red-800 hover:text-white' }}">
                                <!-- Icon container -->
                                <div class="w-8 h-8 flex items-center justify-center">
                                    <i
                                        class="{{ $route['icon'] }} text-lg 
                                           {{ request()->routeIs($route['name']) ? 'text-white' : 'group-hover:text-white' }}"></i>
                                </div>
                                <!-- Label -->
                                <span class="ml-3 transition-all duration-100" :class="open ? 'block' : 'hidden'">
                                    {{ $route['label'] }}
                                </span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </nav>
        </div>
    </aside>
</div>
