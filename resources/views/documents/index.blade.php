<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
<<<<<<< HEAD
            {{ __('Lista de Documentos') }}
=======
            {{ __('Documentos') }}
>>>>>>> 657f32a (hola)
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
<<<<<<< HEAD
                    <div class="mb-4">
                        <a href="{{ route('documents.create') }}" class="text-white bg-blue-500 hover:bg-blue-700 font-semibold py-2 px-4 rounded">
                            {{ __('Crear Documento') }}
                        </a>
                    </div>
=======
                    @if(session('success'))
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ session('success') }}
                        </div>
                    @endif
>>>>>>> 657f32a (hola)

                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
<<<<<<< HEAD
                                <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                                <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Persona</th>
                                <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Vehículo</th>
                                <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tipo de Documento</th>
                                <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Archivo</th>
                                <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fecha de Vencimiento</th>
                                <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($documents as $document)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $document->id }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $document->person ? $document->person->first_name . ' ' . $document->person->last_name : '-' }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $document->vehicle ? $document->vehicle->name : '-' }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $document->documentType->name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap"><a href="{{ asset('storage/' . $document->file_path) }}" target="_blank" class="text-blue-500">Ver archivo</a></td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $document->expiration_date ? $document->expiration_date->format('Y-m-d') : '-' }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <a href="{{ route('documents.show', $document) }}" class="text-blue-500 hover:text-blue-700 font-semibold mr-2">Ver</a>
                                        <a href="{{ route('documents.edit', $document) }}" class="text-yellow-500 hover:text-yellow-700 font-semibold mr-2">Editar</a>
                                        <form action="{{ route('documents.destroy', $document) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-red-700 font-semibold">Eliminar</button>
=======
                                <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Tipo de Entidad
                                </th>
                                <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Nombre
                                </th>
                                <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Tipo de Documento
                                </th>
                                <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Fecha de Vencimiento
                                </th>
                                <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Acción
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($documents as $document)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $document->person_id ? 'Persona' : 'Vehículo' }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $document->person_id ? $document->person->first_name . ' ' . $document->person->last_name : $document->vehicle->make . ' ' . $document->vehicle->model }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $document->documentType->name }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $document->expiration_date ? \Carbon\Carbon::parse($document->expiration_date)->format('d/m/Y') : 'N/A' }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <a href="{{ route('documents.show', $document->id) }}" class="text-indigo-600 hover:text-indigo-900">Ver</a>
                                        <a href="{{ route('documents.edit', $document->id) }}" class="ml-4 text-yellow-600 hover:text-yellow-900">Editar</a>
                                        <form action="{{ route('documents.destroy', $document->id) }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="ml-4 text-red-600 hover:text-red-900">Eliminar</button>
>>>>>>> 657f32a (hola)
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
<<<<<<< HEAD

                    <div class="mt-4">
                        {{ $documents->links() }}
                    </div>
=======
>>>>>>> 657f32a (hola)
                </div>
            </div>
        </div>
    </div>
</x-app-layout>