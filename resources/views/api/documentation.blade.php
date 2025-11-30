<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>API Documentation - Portfolio</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">
    
    <div class="max-w-5xl mx-auto py-12 px-6">
        
        <!-- Header -->
        <div class="mb-12">
            <h1 class="text-4xl font-bold text-gray-900 mb-2">API Documentation</h1>
            <p class="text-gray-600">Documentación de endpoints para acceder al portafolio - Versión 1.0</p>
            <div class="mt-4 flex items-center gap-3">
                <div class="inline-flex items-center px-3 py-1 bg-green-100 text-green-800 rounded-full text-sm">
                    <span class="w-2 h-2 bg-green-600 rounded-full mr-2"></span>
                    API Activa
                </div>
                <div class="inline-flex items-center px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-sm font-semibold">
                    v1
                </div>
            </div>
        </div>

        <!-- Base URL -->
        <div class="bg-white rounded-lg shadow-sm p-6 mb-8">
            <h2 class="text-xl font-semibold text-gray-900 mb-4">Base URL</h2>
            <div class="bg-gray-900 text-gray-100 p-4 rounded-md font-mono text-sm">
                https://backend-admin-api.test/api/v1
            </div>
        </div>

        <!-- Endpoints -->
        <div class="space-y-6">
            
            <!-- Experiences -->
            <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h2 class="text-xl font-semibold text-gray-900">Experiencias</h2>
                </div>
                <div class="p-6">
                    
                    <!-- GET /experiences -->
                    <div class="mb-8">
                        <div class="flex items-center gap-3 mb-3">
                            <span class="px-3 py-1 bg-green-100 text-green-700 rounded-md font-semibold text-sm">GET</span>
                            <code class="text-gray-900 font-mono">/experiences</code>
                        </div>
                        <p class="text-gray-600 mb-4">Obtiene todas las experiencias laborales ordenadas por año de inicio (descendente).</p>
                        
                        <div class="mb-4">
                            <p class="text-sm font-semibold text-gray-700 mb-2">Respuesta (200 OK):</p>
                            <pre class="bg-gray-900 text-gray-100 p-4 rounded-md overflow-x-auto text-sm"><code>[
  {
    "id": 1,
    "company": "Tech Corp",
    "position": "Senior Developer",
    "start_year": 2020,
    "end_year": null,
    "is_current": true,
    "responsibilities": [
      "Desarrollo de APIs REST",
      "Liderazgo técnico del equipo"
    ]
  }
]</code></pre>
                        </div>

                        <div>
                            <p class="text-sm font-semibold text-gray-700 mb-2">Ejemplo cURL:</p>
                            <div class="relative">
                                <pre class="bg-gray-900 text-gray-100 p-4 rounded-md overflow-x-auto text-sm"><code>curl -X GET https://backend-admin-api.test/api/v1/experiences \
  -H "Accept: application/json"</code></pre>
                                <button onclick="copyCode(this, 'curl -X GET https://backend-admin-api.test/api/v1/experiences -H &quot;Accept: application/json&quot;')" 
                                        class="absolute top-2 right-2 px-3 py-1 bg-gray-700 hover:bg-gray-600 text-white text-xs rounded transition">
                                    Copiar
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- GET /experiences/{id} -->
                    <div>
                        <div class="flex items-center gap-3 mb-3">
                            <span class="px-3 py-1 bg-green-100 text-green-700 rounded-md font-semibold text-sm">GET</span>
                            <code class="text-gray-900 font-mono">/experiences/{id}</code>
                        </div>
                        <p class="text-gray-600 mb-4">Obtiene una experiencia específica por su ID.</p>
                        
                        <div class="mb-4">
                            <p class="text-sm font-semibold text-gray-700 mb-2">Parámetros:</p>
                            <ul class="text-sm text-gray-600 ml-4 space-y-1">
                                <li><code class="bg-gray-100 px-2 py-1 rounded">id</code> - ID de la experiencia (integer)</li>
                            </ul>
                        </div>

                        <div>
                            <p class="text-sm font-semibold text-gray-700 mb-2">Ejemplo cURL:</p>
                            <div class="relative">
                                <pre class="bg-gray-900 text-gray-100 p-4 rounded-md overflow-x-auto text-sm"><code>curl -X GET https://backend-admin-api.test/api/v1/experiences/1 \
  -H "Accept: application/json"</code></pre>
                                <button onclick="copyCode(this, 'curl -X GET https://backend-admin-api.test/api/v1/experiences/1 -H &quot;Accept: application/json&quot;')" 
                                        class="absolute top-2 right-2 px-3 py-1 bg-gray-700 hover:bg-gray-600 text-white text-xs rounded transition">
                                    Copiar
                                </button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Projects -->
            <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h2 class="text-xl font-semibold text-gray-900">Proyectos</h2>
                </div>
                <div class="p-6">
                    
                    <!-- GET /projects -->
                    <div class="mb-8">
                        <div class="flex items-center gap-3 mb-3">
                            <span class="px-3 py-1 bg-green-100 text-green-700 rounded-md font-semibold text-sm">GET</span>
                            <code class="text-gray-900 font-mono">/projects</code>
                        </div>
                        <p class="text-gray-600 mb-4">Obtiene todos los proyectos ordenados por fecha de creación (descendente).</p>
                        
                        <div class="mb-4">
                            <p class="text-sm font-semibold text-gray-700 mb-2">Respuesta (200 OK):</p>
                            <pre class="bg-gray-900 text-gray-100 p-4 rounded-md overflow-x-auto text-sm"><code>[
  {
    "id": 1,
    "name": "E-commerce Platform",
    "description": "Plataforma de comercio electrónico completa",
    "url": "https://example.com",
    "image_path": "projects/example.jpg",
    "created_at": "2024-01-15T10:00:00.000000Z"
  }
]</code></pre>
                        </div>

                        <div>
                            <p class="text-sm font-semibold text-gray-700 mb-2">Ejemplo cURL:</p>
                            <div class="relative">
                                <pre class="bg-gray-900 text-gray-100 p-4 rounded-md overflow-x-auto text-sm"><code>curl -X GET https://backend-admin-api.test/api/v1/projects \
  -H "Accept: application/json"</code></pre>
                                <button onclick="copyCode(this, 'curl -X GET https://backend-admin-api.test/api/v1/projects -H &quot;Accept: application/json&quot;')" 
                                        class="absolute top-2 right-2 px-3 py-1 bg-gray-700 hover:bg-gray-600 text-white text-xs rounded transition">
                                    Copiar
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- GET /projects/{id} -->
                    <div>
                        <div class="flex items-center gap-3 mb-3">
                            <span class="px-3 py-1 bg-green-100 text-green-700 rounded-md font-semibold text-sm">GET</span>
                            <code class="text-gray-900 font-mono">/projects/{id}</code>
                        </div>
                        <p class="text-gray-600 mb-4">Obtiene un proyecto específico por su ID.</p>
                        
                        <div class="mb-4">
                            <p class="text-sm font-semibold text-gray-700 mb-2">Parámetros:</p>
                            <ul class="text-sm text-gray-600 ml-4 space-y-1">
                                <li><code class="bg-gray-100 px-2 py-1 rounded">id</code> - ID del proyecto (integer)</li>
                            </ul>
                        </div>

                        <div>
                            <p class="text-sm font-semibold text-gray-700 mb-2">Ejemplo cURL:</p>
                            <div class="relative">
                                <pre class="bg-gray-900 text-gray-100 p-4 rounded-md overflow-x-auto text-sm"><code>curl -X GET https://backend-admin-api.test/api/v1/projects/1 \
  -H "Accept: application/json"</code></pre>
                                <button onclick="copyCode(this, 'curl -X GET https://backend-admin-api.test/api/v1/projects/1 -H &quot;Accept: application/json&quot;')" 
                                        class="absolute top-2 right-2 px-3 py-1 bg-gray-700 hover:bg-gray-600 text-white text-xs rounded transition">
                                    Copiar
                                </button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>

        <!-- Footer -->
        <div class="mt-12 text-center text-gray-600 text-sm">
            <p>Todos los endpoints devuelven respuestas en formato JSON.</p>
            <p class="mt-2">Para más información, contacta con <a href="mailto:raortega8906@gmail.com">raortega8906@gmail.com</a>.</p>
        </div>

    </div>

    <script>
        function copyCode(button, text) {
            navigator.clipboard.writeText(text).then(() => {
                const originalText = button.textContent;
                button.textContent = '¡Copiado!';
                button.classList.add('bg-green-600');
                button.classList.remove('bg-gray-700');
                
                setTimeout(() => {
                    button.textContent = originalText;
                    button.classList.remove('bg-green-600');
                    button.classList.add('bg-gray-700');
                }, 2000);
            });
        }
    </script>

</body>
</html>