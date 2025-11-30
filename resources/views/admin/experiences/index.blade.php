<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Experiencia Profesional') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    @forelse($experiences as $experience)
                        <div class="mb-8 pb-8 border-b border-gray-100 last:border-0 last:pb-0 last:mb-0">
                            <!-- Encabezado -->
                            <div class="flex justify-between items-start mb-3">
                                <div>
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
                        </div>
                    @empty
                        <div class="text-center py-12">
                            <p class="text-gray-500">No hay experiencias registradas.</p>
                        </div>
                    @endforelse

                </div>
            </div>
        </div>
    </div>
</x-app-layout>