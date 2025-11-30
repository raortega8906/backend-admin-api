<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Experiencia Profesional') }}
            </h2>
            <a href="{{ route('admin.experiences.create') }}" 
               class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                + Nueva Experiencia
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
                    
                    @forelse($experiences as $experience)
                        <div class="mb-8 pb-8 border-b border-gray-100 last:border-0 last:pb-0 last:mb-0">
                            <!-- Encabezado -->
                            <div class="flex justify-between items-start mb-3">
                                <div class="flex-1">
                                    <h3 class="text-lg font-semibold text-gray-900">
                                        {{ $experience->position }}
                                    </h3>
                                    <p class="text-gray-600 mt-1">
                                        {{ $experience->company }}
                                    </p>
                                </div>
                                <span class="text-sm text-gray-500 whitespace-nowrap ml-4">
                                    {{ $experience->start_year }} - 
                                    @if($experience->is_current)
                                        <span class="text-blue-600 font-medium">Actual</span>
                                    @else
                                        {{ $experience->end_year }}
                                    @endif
                                </span>
                            </div>

                            <!-- Responsabilidades -->
                            @if($experience->responsibilities && count($experience->responsibilities) > 0)
                                <ul class="mt-3 space-y-1.5 text-sm text-gray-600">
                                    @foreach($experience->responsibilities as $responsibility)
                                        <li class="flex items-start">
                                            <span class="text-gray-400 mr-2">•</span>
                                            <span>{{ $responsibility }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif

                            <!-- Acciones -->
                            <div class="mt-4 flex items-center gap-3">
                                <a href="{{ route('admin.experiences.edit', $experience) }}"
                                   class="text-sm text-indigo-600 hover:text-indigo-800 font-medium transition">
                                    Editar
                                </a>

                                <form action="{{ route('admin.experiences.destroy', $experience) }}"
                                      method="POST"
                                      onsubmit="return confirm('¿Seguro que deseas eliminar esta experiencia?');">
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
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            <p class="mt-4 text-gray-500">No hay experiencias registradas.</p>
                            <a href="{{ route('admin.experiences.create') }}" 
                               class="mt-4 inline-flex items-center text-sm text-indigo-600 hover:text-indigo-800 font-medium">
                                Crear tu primera experiencia
                                <svg class="ml-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </a>
                        </div>
                    @endforelse

                </div>
            </div>

            <!-- Paginación -->
            @if($experiences->hasPages())
                <div class="mt-6">
                    {{ $experiences->links() }}
                </div>
            @endif
        </div>
    </div>
</x-app-layout>