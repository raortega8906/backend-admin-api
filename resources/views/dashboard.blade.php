<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Mensaje de bienvenida -->
            <div class="mb-8">
                <h3 class="text-2xl font-light text-gray-800">
                    Bienvenido, <span class="font-semibold">{{ Auth::user()->name }}</span>
                </h3>
                <p class="text-gray-600 mt-1">Gestiona tu portafolio profesional</p>
            </div>

            <!-- Estadísticas -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <!-- Total Experiencias -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-600">Experiencias</p>
                                <p class="text-3xl font-semibold text-gray-900 mt-2">
                                    {{ $experiencesCount ?? 0 }}
                                </p>
                            </div>
                            <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Total Proyectos -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-600">Proyectos</p>
                                <p class="text-3xl font-semibold text-gray-900 mt-2">
                                    {{ $projectsCount ?? 0 }}
                                </p>
                            </div>
                            <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- API Status -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-600">API Status</p>
                                <p class="text-lg font-medium text-green-600 mt-2 flex items-center">
                                    <span class="w-2 h-2 bg-green-600 rounded-full mr-2"></span>
                                    Activa
                                </p>
                            </div>
                            <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                                <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l3 3-3 3m5 0h3M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Acciones principales -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                <!-- Gestión de contenido -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h4 class="text-lg font-semibold text-gray-900 mb-4">Gestionar Contenido</h4>
                        <div class="space-y-3">
                            <a href="{{ route('admin.experiences.index') }}" 
                               class="flex items-center justify-between p-3 border border-gray-200 rounded-lg hover:border-gray-300 hover:bg-gray-50 transition group">
                                <div class="flex items-center">
                                    <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center mr-3">
                                        <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="font-medium text-gray-900">Experiencia Laboral</p>
                                        <p class="text-sm text-gray-500">Gestionar trabajos y responsabilidades</p>
                                    </div>
                                </div>
                                <svg class="w-5 h-5 text-gray-400 group-hover:text-gray-600 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </a>

                            <a href="{{ route('admin.projects.index') }}" 
                               class="flex items-center justify-between p-3 border border-gray-200 rounded-lg hover:border-gray-300 hover:bg-gray-50 transition group">
                                <div class="flex items-center">
                                    <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center mr-3">
                                        <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="font-medium text-gray-900">Proyectos</p>
                                        <p class="text-sm text-gray-500">Gestionar portafolio de proyectos</p>
                                    </div>
                                </div>
                                <svg class="w-5 h-5 text-gray-400 group-hover:text-gray-600 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- API Endpoints -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h4 class="text-lg font-semibold text-gray-900 mb-4">API Endpoints</h4>
                        <div class="space-y-3">
                            <div class="p-3 bg-gray-50 rounded-lg border border-gray-200">
                                <div class="flex items-center justify-between mb-2">
                                    <span class="text-xs font-semibold text-green-600 bg-green-100 px-2 py-1 rounded">GET</span>
                                    <button onclick="copyToClipboard('{{ url('/api/v1/experiences') }}')" 
                                            class="text-xs text-gray-500 hover:text-gray-700">
                                        Copiar
                                    </button>
                                </div>
                                <code class="text-sm text-gray-800 break-all">/api/v1/experiences</code>
                                <p class="text-xs text-gray-500 mt-1">Obtener todas las experiencias</p>
                            </div>

                            <div class="p-3 bg-gray-50 rounded-lg border border-gray-200">
                                <div class="flex items-center justify-between mb-2">
                                    <span class="text-xs font-semibold text-green-600 bg-green-100 px-2 py-1 rounded">GET</span>
                                    <button onclick="copyToClipboard('{{ url('/api/v1/projects') }}')" 
                                            class="text-xs text-gray-500 hover:text-gray-700">
                                        Copiar
                                    </button>
                                </div>
                                <code class="text-sm text-gray-800 break-all">/api/v1/projects</code>
                                <p class="text-xs text-gray-500 mt-1">Obtener todos los proyectos</p>
                            </div>
                        </div>

                        <a href="{{ url('/api/documentation') }}" 
                           class="mt-4 inline-flex items-center text-sm text-indigo-600 hover:text-indigo-800 font-medium"
                           target="_blank">
                            Ver documentación completa
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Actividad reciente -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h4 class="text-lg font-semibold text-gray-900 mb-4">Actividad Reciente</h4>
                    <div class="space-y-3">
                        @forelse($recentActivity ?? [] as $activity)
                            <div class="flex items-center justify-between py-3 border-b border-gray-100 last:border-0">
                                <div class="flex items-center">
                                    <div class="w-2 h-2 bg-blue-600 rounded-full mr-3"></div>
                                    <div>
                                        <p class="text-sm text-gray-900">{{ $activity['message'] }}</p>
                                        <p class="text-xs text-gray-500">{{ $activity['time'] }}</p>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p class="text-gray-500 text-sm text-center py-8">No hay actividad reciente</p>
                        @endforelse
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script>
        function copyToClipboard(text) {
            navigator.clipboard.writeText(text).then(() => {
                // Mostrar mensaje temporal de éxito
                const button = event.target;
                const originalText = button.textContent;
                button.textContent = '¡Copiado!';
                button.classList.add('text-green-600');
                
                setTimeout(() => {
                    button.textContent = originalText;
                    button.classList.remove('text-green-600');
                }, 2000);
            });
        }
    </script>
</x-app-layout>