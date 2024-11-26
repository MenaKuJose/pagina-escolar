<div x-data="{ isOpen: true }" class="flex min-h-screen bg-gray-100">
    <!-- Sidebar -->
    <aside :class="isOpen ? 'w-64' : 'w-20'"
        class="h-screen bg-white text-gray-800 border-r border-gray-200 shadow-lg transition-all duration-300">

        <div class="p-6 h-full">
            <!-- Toggle Button -->
            <button @click="isOpen = !isOpen" class="text-gray-600 focus:outline-none mb-4 flex items-center">
                <i :class="isOpen ? 'fa-solid fa-chevron-left' : 'fa-solid fa-bars'" class="text-xl"></i>
                <span x-show="isOpen" class="ml-2 font-medium">{{ __('Universidad Tecnológica del Poniente') }}</span>
            </button>

            <!-- Navigation -->
            <nav>
                <ul class="space-y-2">
                    <li>
                        <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')"
                            class="flex items-center p-3 rounded-lg hover:bg-gray-100 transition-colors duration-200">
                            <i class="fas fa-tachometer-alt w-6 h-6 text-gray-600"></i>
                            <span x-show="isOpen" class="ml-3 font-medium">{{ __('Dashboard') }}</span>
                        </x-nav-link>
                    </li>
                    <li>
                        <x-nav-link href="{{ route('usuarios.index') }}" :active="request()->routeIs('usuarios.index')"
                            class="flex items-center p-3 rounded-lg hover:bg-gray-100 transition-colors duration-200">
                            <i class="fas fa-users w-6 h-6 text-gray-600"></i>
                            <span x-show="isOpen" class="ml-3 font-medium">{{ __('Tabla de Usuarios') }}</span>
                        </x-nav-link>
                    </li>
                    <li>
                        <x-nav-link href="{{ route('oferta-educativa.index') }}" :active="request()->routeIs('oferta-educativa.index')"
                            class="flex items-center p-3 rounded-lg hover:bg-gray-100 transition-colors duration-200">
                            <i class="fas fa-graduation-cap w-6 h-6 text-gray-600"></i>
                            <span x-show="isOpen" class="ml-3 font-medium">{{ __('Oferta Educativa') }}</span>
                        </x-nav-link>
                    </li>
                    <li>
                        <x-nav-link href="{{ route('mejor-oferta.index') }}" :active="request()->routeIs('mejor-oferta.index')"
                            class="flex items-center p-3 rounded-lg hover:bg-gray-100 transition-colors duration-200">
                            <i class="fas fa-graduation-cap w-6 h-6 text-gray-600"></i>
                            <span x-show="isOpen" class="ml-3 font-medium">{{ __('Mejor Oferta Educativa') }}</span>
                        </x-nav-link>
                    </li>
                    <li>
                        <x-nav-link href="{{ route('servicios.index') }}" :active="request()->routeIs('servicios.index')"
                            class="flex items-center p-3 rounded-lg hover:bg-gray-100 transition-colors duration-200">
                            <i class="fas fa-concierge-bell w-6 h-6 text-gray-900"></i>
                            <span x-show="isOpen" class="ml-3 font-medium text-gray-900">{{ __('Servicios') }}</span>
                        </x-nav-link>
                    </li>
                    <li>
                        <x-nav-link href="{{ route('imagenes.index') }}" :active="request()->routeIs('imagenes.index')"
                            class="flex items-center p-3 rounded-lg hover:bg-gray-100 transition-colors duration-200">
                            <i class="fa-solid fa-images w-6 h-6 text-gray-900"></i>
                            <span x-show="isOpen" class="ml-3 font-medium text-gray-900">{{ __('Imagenes') }}</span>
                        </x-nav-link>
                    </li>
                    <li>
                        <x-nav-link href="#" :active="request()->routeIs('settings')"
                            class="flex items-center p-3 rounded-lg hover:bg-gray-100 transition-colors duration-200">
                            <i class="fas fa-cog w-6 h-6 text-gray-900"></i>
                            <span x-show="isOpen" class="ml-3 font-medium text-gray-900">{{ __('Settings') }}</span>
                        </x-nav-link>
                    </li>
                    <!-- Agrega más enlaces aquí -->
                </ul>
            </nav>
        </div>
    </aside>
</div>
