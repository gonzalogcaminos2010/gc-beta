<<<<<<< HEAD
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
=======
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalles de la Persona') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    <div class="mt-8 text-2xl flex items-center">
                        @if($person->photo)
                            <img src="{{ asset('storage/' . $person->photo) }}" alt="Foto de {{ $person->first_name }}" class="rounded-full w-32 h-32 object-cover mr-4">
                        @else
                            <img src="https://via.placeholder.com/150" alt="Foto de {{ $person->first_name }}" class="rounded-full w-32 h-32 object-cover mr-4">
                        @endif
                        <div>
                            {{ $person->first_name }} {{ $person->last_name }}
                        </div>
                    </div>

                    <div class="mt-6 text-gray-500">
                        <p>DNI: {{ $person->dni }}</p>
                        <p>CUIL: {{ $person->cuil }}</p>
                        <p>Fecha de Nacimiento: {{ $person->birth_date }}</p>
                        <p>Fecha de Alta: {{ $person->hire_date }}</p>
                        <p>Dirección: {{ $person->address }}</p>
                        <p>Ciudad: {{ $person->city }}</p>
                        <p>Estado/Provincia: {{ $person->state }}</p>
                        <p>País: {{ $person->country }}</p>
                    </div>

                    <div class="mt-6">
                        <ul class="border-b flex">
                            <li class="mr-1">
                                <a class="bg-white inline-block py-2 px-4 text-blue-500 hover:text-blue-800 font-semibold" href="#details">Detalles</a>
                            </li>
                            <li class="-mb-px mr-1">
                                <a class="bg-white inline-block py-2 px-4 text-blue-500 hover:text-blue-800 font-semibold" href="#documents">Documentos</a>
                            </li>
                        </ul>
                    </div>

                    <div id="details" class="tab-content mt-4">
                        <div class="text-gray-500">
                            <p><strong>Nombre:</strong> {{ $person->first_name }}</p>
                            <p><strong>Apellido:</strong> {{ $person->last_name }}</p>
                            <p><strong>DNI:</strong> {{ $person->dni }}</p>
                            <p><strong>CUIL:</strong> {{ $person->cuil }}</p>
                            <p><strong>Fecha de Nacimiento:</strong> {{ $person->birth_date }}</p>
                            <p><strong>Fecha de Alta:</strong> {{ $person->hire_date }}</p>
                            <p><strong>Dirección:</strong> {{ $person->address }}</p>
                            <p><strong>Ciudad:</strong> {{ $person->city }}</p>
                            <p><strong>Estado/Provincia:</strong> {{ $person->state }}</p>
                            <p><strong>País:</strong> {{ $person->country }}</p>
                        </div>
                    </div>

                    <div id="documents" class="tab-content mt-4 hidden">
                        <div class="text-gray-500">
                            <h3 class="font-semibold text-xl text-gray-800 leading-tight">Documentos</h3>
                            <button onclick="openModal()" class="mt-2 px-4 py-2 bg-blue-500 text-white rounded">Agregar</button>
                            <div>
                                @foreach ($documentTypes as $documentType)
                                    <div class="mt-4 p-4 border border-gray-200 rounded">
                                        <p>{{ $documentType->name }}</p>
                                        @foreach ($person->documents->where('document_type_id', $documentType->id) as $document)
                                            <div class="mt-2">
                                                <a href="{{ route('documents.show', $document->id) }}" target="_blank">{{ $document->file_path }}</a>
                                                <p>Fecha de Vencimiento: {{ $document->expiration_date }}</p>
                                            </div>
                                        @endforeach
                                        <button onclick="openModal({{ $documentType->id }})" class="mt-2 px-4 py-2 bg-green-500 text-white rounded">Cargar</button>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div x-data="{ showModal: false, documentTypeId: null }" x-show="showModal" class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50">
        <div class="bg-white p-8 rounded shadow-xl">
            <h2 class="text-2xl mb-4">Cargar Documento</h2>
            <form method="POST" action="{{ route('documents.store') }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="person_id" value="{{ $person->id }}">
                <input type="hidden" name="document_type_id" x-model="documentTypeId">

                <div class="mt-4">
                    <x-input-label for="file" :value="__('Archivo')" />
                    <input id="file" class="block mt-1 w-full" type="file" name="file" required />
                    <x-input-error :messages="$errors->get('file')" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-input-label for="expiration_date" :value="__('Fecha de Vencimiento')" />
                    <x-text-input id="expiration_date" class="block mt-1 w-full" type="date" name="expiration_date" />
                    <x-input-error :messages="$errors->get('expiration_date')" class="mt-2" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <button type="button" onclick="closeModal()" class="px-4 py-2 bg-red-500 text-white rounded">Cancelar</button>
                    <x-primary-button class="ml-4">
                        {{ __('Guardar') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openModal(documentTypeId = null) {
            const alpineData = document.querySelector('[x-data]').__x.$data;
            alpineData.showModal = true;
            alpineData.documentTypeId = documentTypeId;
        }

        function closeModal() {
            const alpineData = document.querySelector('[x-data]').__x.$data;
            alpineData.showModal = false;
        }

        document.addEventListener('DOMContentLoaded', function() {
            const tabs = document.querySelectorAll('.border-b a');

            tabs.forEach(tab => {
                tab.addEventListener('click', function(e) {
                    e.preventDefault();
                    const target = this.getAttribute('href').substring(1);
                    document.querySelectorAll('.tab-content').forEach(content => {
                        content.classList.add('hidden');
                    });
                    document.getElementById(target).classList.remove('hidden');
                    tabs.forEach(t => t.classList.remove('border-b-2', 'border-blue-500'));
                    this.classList.add('border-b-2', 'border-blue-500');
                });
            });
        });
    </script>
</x-app-layout>
>>>>>>> 657f32a (hola)
