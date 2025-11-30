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
            
            {{-- Mensaje de éxito --}}
            @if(session('success'))
                <div class="mb-4 bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-md">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    @forelse($projects as $project)
                        <div class="mb-8 pb-8 border-b border-gray-100 last:border-0 last:pb-0 last:mb-0">

                            {{-- Encabezado --}}
                            <div class="flex justify-between items-start mb-3">
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-900">
                                        {{ $project->name }}
                                    </h3>
                                    <p class="text-gray-600 mt-1">
                                        {{ $project->description }}
                                    </p>

                                    @if($project->url)
                                        <a href="{{ $project->url }}" target="_blank" 
                                           class="text-indigo-600 hover:underline text-sm">
                                            Ver proyecto
                                        </a>
                                    @endif
                                </div>

                                @if($project->image_path)
                                    <img src="{{ asset('storage/' . $project->image_path) }}" 
                                         class="w-32 h-20 object-cover rounded-md shadow">
                                @endif
                            </div>

                            {{-- Acciones --}}
                            <div class="mt-4 flex gap-3">
                                <a href="{{ route('admin.projects.edit', $project) }}"
                                   class="text-sm text-indigo-600 hover:text-indigo-800 font-medium">
                                    Editar
                                </a>

                                <form action="{{ route('admin.projects.destroy', $project) }}"
                                      method="POST"
                                      onsubmit="return confirm('¿Seguro que deseas eliminar este proyecto?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="text-sm text-red-600 hover:text-red-800 font-medium">
                                        Eliminar
                                    </button>
                                </form>
                            </div>

                        </div>
                    @empty
                        <div class="text-center py-12">
                            <p class="text-gray-500">No hay proyectos registrados.</p>
                        </div>
                    @endforelse

                </div>
            </div>
        </div>

        {{-- Paginación --}}
        <div class="mt-6 max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{ $projects->links() }}
        </div>

    </div>
</x-app-layout>

<style>
    p.text-sm.text-gray-700.leading-5.dark\:text-gray-600 {
        display: none;
    }
</style>