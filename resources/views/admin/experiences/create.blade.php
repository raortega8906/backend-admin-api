<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center">
            <a href="{{ route('admin.experiences.index') }}" class="mr-4 text-gray-600 hover:text-gray-900">
                ← Volver
            </a>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Nueva Experiencia') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <form action="{{ route('admin.experiences.store') }}" method="POST">
                        @csrf

                        <!-- Empresa -->
                        <div class="mb-6">
                            <label for="company" class="block text-sm font-medium text-gray-700 mb-2">
                                Empresa *
                            </label>
                            <input type="text" 
                                   name="company" 
                                   id="company" 
                                   value="{{ old('company') }}"
                                   class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 @error('company') border-red-500 @enderror"
                                   required>
                            @error('company')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Posición -->
                        <div class="mb-6">
                            <label for="position" class="block text-sm font-medium text-gray-700 mb-2">
                                Posición *
                            </label>
                            <input type="text" 
                                   name="position" 
                                   id="position" 
                                   value="{{ old('position') }}"
                                   class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 @error('position') border-red-500 @enderror"
                                   required>
                            @error('position')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Años -->
                        <div class="grid grid-cols-2 gap-4 mb-6">
                            <div>
                                <label for="start_year" class="block text-sm font-medium text-gray-700 mb-2">
                                    Año de inicio *
                                </label>
                                <input type="number" 
                                       name="start_year" 
                                       id="start_year" 
                                       value="{{ old('start_year') }}"
                                       min="1970"
                                       max="{{ date('Y') }}"
                                       class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 @error('start_year') border-red-500 @enderror"
                                       required>
                                @error('start_year')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="end_year" class="block text-sm font-medium text-gray-700 mb-2">
                                    Año de fin
                                </label>
                                <input type="number" 
                                       name="end_year" 
                                       id="end_year" 
                                       value="{{ old('end_year') }}"
                                       min="1970"
                                       max="{{ date('Y') + 10 }}"
                                       class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 @error('end_year') border-red-500 @enderror">
                                @error('end_year')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Trabajo actual -->
                        <div class="mb-6">
                            <label class="flex items-center">
                                <input type="checkbox" 
                                       name="is_current" 
                                       id="is_current"
                                       value="1"
                                       {{ old('is_current') ? 'checked' : '' }}
                                       class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                <span class="ml-2 text-sm text-gray-700">Trabajo actual</span>
                            </label>
                        </div>

                        <!-- Responsabilidades -->
                        <div class="mb-6">
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Responsabilidades
                            </label>
                            <div id="responsibilities-container">
                                @if(old('responsibilities'))
                                    @foreach(old('responsibilities') as $index => $responsibility)
                                        <div class="responsibility-item flex gap-2 mb-2">
                                            <input type="text" 
                                                   name="responsibilities[]" 
                                                   value="{{ $responsibility }}"
                                                   placeholder="Describe una responsabilidad..."
                                                   class="flex-1 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                            <button type="button" 
                                                    onclick="this.parentElement.remove()"
                                                    class="px-3 py-2 bg-red-100 text-red-600 rounded-md hover:bg-red-200 transition">
                                                ×
                                            </button>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="responsibility-item flex gap-2 mb-2">
                                        <input type="text" 
                                               name="responsibilities[]" 
                                               placeholder="Describe una responsabilidad..."
                                               class="flex-1 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                        <button type="button" 
                                                onclick="this.parentElement.remove()"
                                                class="px-3 py-2 bg-red-100 text-red-600 rounded-md hover:bg-red-200 transition">
                                            ×
                                        </button>
                                    </div>
                                @endif
                            </div>
                            <button type="button" 
                                    onclick="addResponsibility()"
                                    class="mt-2 text-sm text-indigo-600 hover:text-indigo-800">
                                + Agregar responsabilidad
                            </button>
                            @error('responsibilities')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Botones -->
                        <div class="flex justify-end gap-3 mt-8">
                            <a href="{{ route('admin.experiences.index') }}" 
                               class="px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                Cancelar
                            </a>
                            <button type="submit" 
                                    class="px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                Guardar Experiencia
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <script>
        function addResponsibility() {
            const container = document.getElementById('responsibilities-container');
            const div = document.createElement('div');
            div.className = 'responsibility-item flex gap-2 mb-2';
            div.innerHTML = `
                <input type="text" 
                       name="responsibilities[]" 
                       placeholder="Describe una responsabilidad..."
                       class="flex-1 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                <button type="button" 
                        onclick="this.parentElement.remove()"
                        class="px-3 py-2 bg-red-100 text-red-600 rounded-md hover:bg-red-200 transition">
                    ×
                </button>
            `;
            container.appendChild(div);
        }

        // Deshabilitar end_year cuando is_current está marcado
        document.getElementById('is_current').addEventListener('change', function() {
            const endYearInput = document.getElementById('end_year');
            if (this.checked) {
                endYearInput.value = '';
                endYearInput.disabled = true;
                endYearInput.classList.add('bg-gray-100');
            } else {
                endYearInput.disabled = false;
                endYearInput.classList.remove('bg-gray-100');
            }
        });

        // Ejecutar al cargar si ya está marcado
        if (document.getElementById('is_current').checked) {
            document.getElementById('end_year').disabled = true;
            document.getElementById('end_year').classList.add('bg-gray-100');
        }
    </script>
</x-app-layout>