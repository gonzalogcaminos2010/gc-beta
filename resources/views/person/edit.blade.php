<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Persona</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-8">
        <div class="bg-white shadow-md rounded-lg p-6">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">Editar Persona</h2>
            <form action="{{ route('people.update', $person->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Nombre</label>
                        <input type="text" name="first_name" value="{{ old('first_name', $person->first_name) }}" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Apellido</label>
                        <input type="text" name="last_name" value="{{ old('last_name', $person->last_name) }}" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">DNI</label>
                        <input type="text" name="dni" value="{{ old('dni', $person->dni) }}" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">CUIL</label>
                        <input type="text" name="cuil" value="{{ old('cuil', $person->cuil) }}" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Teléfono</label>
                        <input type="text" name="phone" value="{{ old('phone', $person->phone) }}" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" name="email" value="{{ old('email', $person->email) }}" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Fecha de Nacimiento</label>
                        <input type="date" name="birth_date" value="{{ old('birth_date', $person->birth_date) }}" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Fecha de Contratación</label>
                        <input type="date" name="hire_date" value="{{ old('hire_date', $person->hire_date) }}" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Tipo de Empleo</label>
                        <input type="text" name="employment_type" value="{{ old('employment_type', $person->employment_type) }}" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Dirección</label>
                        <input type="text" name="address" value="{{ old('address', $person->address) }}" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Ciudad</label>
                        <input type="text" name="city" value="{{ old('city', $person->city) }}" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Estado</label>
                        <input type="text" name="state" value="{{ old('state', $person->state) }}" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">País</label>
                        <input type="text" name="country" value="{{ old('country', $person->country) }}" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Foto</label>
                        <input type="file" name="photo" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                    @if($person->photo)
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Foto Actual</label>
                        <img src="{{ asset('storage/' . $person->photo) }}" alt="Foto de {{ $person->first_name }}" class="mt-2 rounded-lg w-32 h-32 object-cover">
                    </div>
                    @endif
                </div>
                <div class="mt-6 flex justify-end space-x-3">
                    <a href="{{ route('people.index') }}" class="text-white bg-blue-500 hover:bg-blue-700 font-semibold py-2 px-4 rounded">Cancelar</a>
                    <button type="submit" class="text-white bg-green-500 hover:bg-green-700 font-semibold py-2 px-4 rounded">Guardar Cambios</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>