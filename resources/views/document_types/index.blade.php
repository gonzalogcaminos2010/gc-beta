<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tipos de Documentos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    <div class="mt-12 text-2xl">
                        <a href="{{ route('document_types.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md">Crear Nuevo Tipo de Documento</a>
                    </div>
                    <table class="min-w-full bg-white mt-6">
                        <thead>
                            <tr>
                                <th class="py-2">Nombre</th>
                                <th class="py-2">Código</th>
                                <th class="py-2">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($documentTypes as $documentType)
                                <tr>
                                    <td class="py-2">{{ $documentType->name }}</td>
                                    <td class="py-2">{{ $documentType->code }}</td>
                                    <td class="py-2">
                                        <a href="{{ route('document_types.show', $documentType->id) }}" class="bg-green-500 text-white px-4 py-2 rounded-md">Ver</a>
                                        <a href="{{ route('document_types.edit', $documentType->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded-md">Editar</a>
                                        <form action="{{ route('document_types.destroy', $documentType->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
