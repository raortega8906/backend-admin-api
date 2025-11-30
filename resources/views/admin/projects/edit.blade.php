<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center">
            <a href="{{ route('admin.projects.index') }}" class="mr-4 text-gray-600 hover:text-gray-900">
                ← Volver
            </a>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Editar Proyecto') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <form action="{{ route('admin.projects.update', $project) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        {{-- Nombre --}}
                        <div class="mb-6">
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                                Nombre del proyecto *
                            </label>
                            <input type="text" 
                                   name="name" 
                                   id="name"
                                   value="{{ old('name', $project->name) }}"
                                   class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 @error('name') border-red-500 @enderror"
                                   required>
                            @error('name')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Descripción --}}
                        <div class="mb-6">
                            <label for="description" class="block text-sm font-medium text-gray-700 mb-2">
                                Descripción *
                            </label>
                            <textarea name="description" 
                                      id="description"
                                      rows="4"
                                      class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 @error('description') border-red-500 @enderror"
                                      required>{{ old('description', $project->description) }}</textarea>
                            @error('description')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- URL --}}
                        <div class="mb-6">
                            <label for="url" class="block text-sm font-medium text-gray-700 mb-2">
                                URL del proyecto (opcional)
                            </label>
                            <input type="url" 
                                   name="url" 
                                   id="url"
                                   value="{{ old('url', $project->url) }}"
                                   placeholder="https://tusitio.com"
                                   class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 @error('url') border-red-500 @enderror">
                            @error('url')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Imagen --}}
                        <div class="mb-6">
                            <label for="image_path" class="block text-sm font-medium text-gray-700 mb-2">
                                Imagen
                            </label>
                            <input type="file" 
                                   name="image_path"
                                   id="image_path"
                                   accept="image/*"
                                   class="w-full text-sm text-gray-700 
                                          file:bg-gray-100 file:border file:border-gray-300
                                          file:px-4 file:py-2 file:mr-4
                                          file:rounded-md file:text-gray-700
                                          hover:file:bg-gray-200">
                            @if($project->image_path)
                                <p class="mt-2 text-sm text-gray-600">Imagen actual:</p>
                                <img src="{{ asset('storage/' . $project->image_path) }}" class="w-48 h-32 object-cover rounded-md mt-1">
                            @endif
                            @error('image_path')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Botones --}}
                        <div class="flex justify-end gap-3 mt-8">
                            <a href="{{ route('admin.projects.index') }}" 
                               class="px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-50 focus:outline-none">
                                Cancelar
                            </a>

                            <button type="submit"
                                    class="px-4 py-2 bg-gray-800 text-white rounded-md font-semibold text-xs uppercase tracking-widest hover:bg-gray-700 focus:outline-none">
                                Actualizar Proyecto
                            </button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>