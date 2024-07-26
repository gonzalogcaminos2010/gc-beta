<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lista de Documentos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    <div class="mb-4">
                        <a href="{{ route('documents.create') }}" class="text-white bg-blue-500 hover:bg-blue-700 font-semibold py-2 px-4 rounded">
                            {{ __('Crear Documento') }}
                        </a>
                    </div>

                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
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
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="mt-4">
                        {{ $documents->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>