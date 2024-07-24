<div class="container mx-auto px-4 py-8">
    
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-200">
                <tr>
                    <th scope="col" class="px-6 py-3 text-gray-800">
                        ID
                    </th>
                    <th scope="col" class="px-6 py-3 text-gray-800">
                        Nombre
                    </th>
                    <th scope="col" class="px-6 py-3 text-gray-800">
                        Apellido
                    </th>
                    <th scope="col" class="px-6 py-3 text-gray-800">
                        DNI (Documento Nacional de Identidad)
                    </th>
                    <th scope="col" class="px-6 py-3 text-gray-800">
                        CUIL
                    </th>
                    <th scope="col" class="px-6 py-3 text-gray-800">
                        Estado (Aprobado o Desaprobado)
                    </th>
                    <th scope="col" class="px-6 py-3 text-gray-800">
                        Acción
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($persons as $person)
                    <tr class="bg-white border-b hover:bg-gray-100">
                        <td class="px-6 py-4 font-medium text-gray-900">
                            {{ $person->id }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $person->first_name }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $person->last_name }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $person->dni }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $person->cuil }}
                        </td>
                        <td class="px-6 py-4">
                            @if($person->approved)
                                <span class="text-green-600 font-semibold">Yes</span>
                            @else
                                <span class="text-red-600 font-semibold">No</span>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <a href="{{ route('people.show', ['id' => $person->id]) }}" class="text-white bg-blue-500 hover:bg-blue-700 font-semibold py-1 px-2 rounded">Ver</a>
                            <a href="{{ route('people.edit', ['id' => $person->id]) }}" class="text-white bg-yellow-500 hover:bg-yellow-700 font-semibold py-1 px-2 rounded">Editar</a>
                            <button wire:click="delete({{ $person->id }})" class="text-white bg-red-500 hover:bg-red-700 font-semibold py-1 px-2 rounded">Eliminar</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
