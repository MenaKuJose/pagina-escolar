<div class="flex min-h-screen bg-gray-100">
    <!-- Sidebar -->
    <aside class="w-64 h-screen bg-white text-gray-800 border-r border-gray-200 shadow-lg">
        <div class="p-6 h-full">
            <nav>
                <ul class="space-y-2">
                    <li>
                        <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')"
                            class="flex items-center p-3 rounded-lg hover:bg-gray-100 transition-colors duration-200">
                            <i class="fas fa-tachometer-alt w-6 h-6 text-gray-600"></i>
                            <span class="ml-3 font-medium">{{ __('Dashboard') }}</span>
                        </x-nav-link>
                    </li>
                    <li>
                        <x-nav-link href="{{ route('usuarios.index') }}" :active="request()->routeIs('usuarios.index')"
                            class="flex items-center p-3 rounded-lg hover:bg-gray-100 transition-colors duration-200">
                            <i class="fas fa-briefcase w-6 h-6 text-gray-600"></i>
                            <span class="ml-3 font-medium">{{ __('Tabla de Usuarios') }}</span>
                        </x-nav-link>
                    </li>
                    <li>
                        <x-nav-link href="{{ route('oferta-educativa.index') }}" :active="request()->routeIs('oferta-educativa.index')"
                            class="flex items-center p-3 rounded-lg hover:bg-gray-100 transition-colors duration-200">
                            <i class="fas fa-tasks w-6 h-6 text-gray-600"></i>
                            <span class="ml-3 font-medium">{{ __('Oferta Educativa') }}</span>
                        </x-nav-link>
                    </li>
                    <li>
                        <x-nav-link href="#" :active="request()->routeIs('settings')"
                            class="flex items-center p-3 rounded-lg hover:bg-gray-100 transition-colors duration-200">
                            <i class="fas fa-cog w-6 h-6 text-gray-600"></i>
                            <span class="ml-3 font-medium">{{ __('Settings') }}</span>
                        </x-nav-link>
                    </li>
                    <!-- Agrega más enlaces aquí -->
                </ul>
            </nav>
        </div>
    </aside>
</div>
