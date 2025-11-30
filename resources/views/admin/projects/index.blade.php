<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Proyectos') }}
            </h2>
            <a href="{{ route('admin.projects.create') }}" 
               class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                + Nuevo Proyecto
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Mensaje de éxito -->
            @if(session('success'))
                <div class="mb-4 bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-md flex items-center justify-between">
                    <span>{{ session('success') }}</span>
                    <button onclick="this.parentElement.remove()" class="text-green-800 hover:text-green-900">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
                        </svg>
                    </button>
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    @forelse($projects as $project)
                        <div class="mb-8 pb-8 border-b border-gray-100 last:border-0 last:pb-0 last:mb-0">

                            <!-- Encabezado -->
                            <div class="flex justify-between items-start gap-4 mb-3">
                                <div class="flex-1">
                                    <h3 class="text-lg font-semibold text-gray-900">
                                        {{ $project->name }}
                                    </h3>
                                    <p class="text-gray-600 mt-1 text-sm">
                                        {{ $project->description }}
                                    </p>

                                    @if($project->url)
                                        <a href="{{ $project->url }}" target="_blank" 
                                           class="inline-flex items-center text-indigo-600 hover:text-indigo-800 text-sm mt-2 transition">
                                            Ver proyecto
                                            <svg class="w-3 h-3 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                                            </svg>
                                        </a>
                                    @endif
                                </div>

                                @if($project->image_path)
                                    <img src="{{ asset('storage/' . $project->image_path) }}" 
                                         alt="{{ $project->name }}"
                                         class="w-32 h-20 object-cover rounded-md shadow-sm">
                                @endif
                            </div>

                            <!-- Acciones -->
                            <div class="mt-4 flex items-center gap-3">
                                <a href="{{ route('admin.projects.edit', $project) }}"
                                   class="text-sm text-indigo-600 hover:text-indigo-800 font-medium transition">
                                    Editar
                                </a>

                                <form action="{{ route('admin.projects.destroy', $project) }}"
                                      method="POST"
                                      onsubmit="return confirm('¿Seguro que deseas eliminar este proyecto?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="text-sm text-red-600 hover:text-red-800 font-medium transition">
                                        Eliminar
                                    </button>
                                </form>
                            </div>

                        </div>
                    @empty
                        <div class="text-center py-12">
                            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                            <p class="mt-4 text-gray-500">No hay proyectos registrados.</p>
                            <a href="{{ route('admin.projects.create') }}" 
                               class="mt-4 inline-flex items-center text-sm text-indigo-600 hover:text-indigo-800 font-medium">
                                Crear tu primer proyecto
                                <svg class="ml-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </a>
                        </div>
                    @endforelse

                </div>
            </div>

            <!-- Paginación -->
            @if($projects->hasPages())
                <div class="mt-6">
                    {{ $projects->links() }}
                </div>
            @endif
        </div>
    </div>
</x-app-layout>