<div x-data="{ isOpen: true }" class="flex min-h-screen bg-gray-100">
    <!-- Sidebar -->


    <aside :class="isOpen ? 'w-64' : 'w-20'" class="h-screen bg-white text-gray-900 border-r border-gray-200 shadow-lg transition-all duration-300">
        <div style="background-color: #5A7CA6" class="p-6 h-full">
            <!-- Toggle Button -->
            <button @click="isOpen = !isOpen" class="text-gray-900 focus:outline-none">
                <i :class="isOpen ? 'fa-solid fa-xmark' : 'fa-solid fa-bars'" class="text-2xl"></i>
            </button>

            <nav>
                <ul class="space-y-2 mt-4">
                    <li>
                        <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')"
                            class="flex items-center p-3 rounded-lg hover:bg-gray-100 transition-colors duration-200">
                            <i class="fas fa-tachometer-alt w-6 h-6 text-gray-900"></i>
                            <span x-show="isOpen" class="ml-3 font-medium text-gray-900">{{ __('Dashboard') }}</span>
                        </x-nav-link>
                    </li>
                    <li>
                        <x-nav-link href="{{ route('usuarios.index') }}" :active="request()->routeIs('usuarios.index')"
                            class="flex items-center p-3 rounded-lg hover:bg-gray-100 transition-colors duration-200">
                            <i class="fas fa-briefcase w-6 h-6 text-gray-900"></i>
                            <span x-show="isOpen" class="ml-3 font-medium text-gray-900">{{ __('Tabla de Usuarios') }}</span>
                        </x-nav-link>
                    </li>
                    <li>
                        <x-nav-link href="{{ route('oferta-educativa.index') }}" :active="request()->routeIs('oferta-educativa.index')"
                            class="flex items-center p-3 rounded-lg hover:bg-gray-100 transition-colors duration-200">
                            <i class="fas fa-tasks w-6 h-6 text-gray-900"></i>
                            <span x-show="isOpen" class="ml-3 font-medium text-gray-900">{{ __('Oferta Educativa') }}</span>
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
                        <x-nav-link href="" :active="request()->routeIs('Imagenes')"
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
                </ul>
            </nav>
        </div>
    </aside>
</div>
