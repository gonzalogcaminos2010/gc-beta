    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Detalle de Persona</title>
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const tabs = document.querySelectorAll('.tab');
                tabs.forEach(tab => {
                    tab.addEventListener('click', function() {
                        const target = this.getAttribute('data-target');
                        document.querySelectorAll('.tab-content').forEach(tc => tc.classList.add('hidden'));
                        document.querySelector(`#${target}`).classList.remove('hidden');
                        tabs.forEach(t => t.classList.remove('text-blue-600', 'border-blue-600'));
                        this.classList.add('text-blue-600', 'border-blue-600');
                    });
                });
            });
        </script>
    </head>
    <body class="bg-gray-100">
        <div class="container mx-auto px-4 py-8">
            <div class="bg-white shadow-md rounded-lg p-6">
                <h2 class="text-2xl font-semibold text-gray-800 mb-4">Detalles de la Persona</h2>
                <div class="flex justify-center mb-4">
                    @if($person->photo)
                        <img src="{{ asset('storage/' . $person->photo) }}" alt="Foto de {{ $person->first_name }}" class="rounded-full w-32 h-32 object-cover">
                    @else
                        <img src="https://via.placeholder.com/150" alt="Foto de {{ $person->first_name }}" class="rounded-full w-32 h-32 object-cover">
                    @endif
                </div>
                <div class="border-b border-gray-200 mb-6">
                    <nav class="flex -mb-px space-x-8">
                        <a class="tab text-sm font-medium text-gray-500 hover:text-gray-600 hover:border-gray-300 py-4 px-1 border-b-2 border-transparent cursor-pointer" data-target="tab-personal">Personal</a>
                        <a class="tab text-sm font-medium text-gray-500 hover:text-gray-600 hover:border-gray-300 py-4 px-1 border-b-2 border-transparent cursor-pointer" data-target="tab-employment">Empleo</a>
                        <a class="tab text-sm font-medium text-gray-500 hover:text-gray-600 hover:border-gray-300 py-4 px-1 border-b-2 border-transparent cursor-pointer" data-target="tab-location">Ubicación</a>
                    </nav>
                </div>
                <div id="tab-personal" class="tab-content">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">ID</label>
                            <p class="mt-1 text-gray-900">{{ $person->id }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Nombre</label>
                            <p class="mt-1 text-gray-900">{{ $person->first_name }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Apellido</label>
                            <p class="mt-1 text-gray-900">{{ $person->last_name }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">DNI</label>
                            <p class="mt-1 text-gray-900">{{ $person->dni }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">CUIL</label>
                            <p class="mt-1 text-gray-900">{{ $person->cuil }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Teléfono</label>
                            <p class="mt-1 text-gray-900">{{ $person->phone }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Email</label>
                            <p class="mt-1 text-gray-900">{{ $person->email }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Fecha de Nacimiento</label>
                            <p class="mt-1 text-gray-900">{{ $person->birth_date ? $person->birth_date->format('d/m/Y') : 'N/A' }}</p>
                        </div>
                    </div>
                </div>
                <div id="tab-employment" class="tab-content hidden">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Fecha de Contratación</label>
                            <p class="mt-1 text-gray-900">{{ $person->hire_date ? $person->hire_date->format('d/m/Y') : 'N/A' }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Tipo de Empleo</label>
                            <p class="mt-1 text-gray-900">{{ $person->employment_type }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Estado de Aprobación</label>
                            <p class="mt-1 text-gray-900">
                                @if($person->approved)
                                    <span class="text-green-600 font-semibold">Aprobado</span>
                                @else
                                    <span class="text-red-600 font-semibold">No Aprobado</span>
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
                <div id="tab-location" class="tab-content hidden">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Dirección</label>
                            <p class="mt-1 text-gray-900">{{ $person->address }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Ciudad</label>
                            <p class="mt-1 text-gray-900">{{ $person->city }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Estado</label>
                            <p class="mt-1 text-gray-900">{{ $person->state }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">País</label>
                            <p class="mt-1 text-gray-900">{{ $person->country }}</p>
                        </div>
                    </div>
                </div>
                <div class="md:col-span-2 mt-6">
                    <label class="block text-sm font-medium text-gray-700">Fecha de Creación</label>
                    <p class="mt-1 text-gray-900">{{ $person->created_at->format('d/m/Y H:i') }}</p>
                </div>
                <div class="md:col-span-2 mt-6">
                    <label class="block text-sm font-medium text-gray-700">Última Actualización</label>
                    <p class="mt-1 text-gray-900">{{ $person->updated_at->format('d/m/Y H:i') }}</p>
                </div>
                <div class="mt-6 flex justify-end space-x-3">
                    <a href="{{ route('people.index') }}" class="text-white bg-blue-500 hover:bg-blue-700 font-semibold py-2 px-4 rounded">Volver</a>
                    <a href="{{ route('people.edit', ['id' => $person->id]) }}" class="text-white bg-yellow-500 hover:bg-yellow-700 font-semibold py-2 px-4 rounded">Editar</a>
                    <form method="POST" action="{{ route('people.destroy', ['id' => $person->id]) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-white bg-red-500 hover:bg-red-700 font-semibold py-2 px-4 rounded" onclick="return confirm('¿Estás seguro de que deseas eliminar esta persona?')">Eliminar</button>
                    </form>
                </div>
            </div>
        </div>
    </body>
    </html>