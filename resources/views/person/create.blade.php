<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
<<<<<<< HEAD
            {{ __('Crear Persona') }}
=======
            {{ __('Crear Documento') }}
>>>>>>> 657f32a (hola)
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    @if(session('success'))
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ session('success') }}
                        </div>
                    @endif

<<<<<<< HEAD
                    <form method="POST" action="{{ route('people.store') }}" enctype="multipart/form-data">
                        @csrf

                        <!-- First Name -->
                        <div>
                            <x-input-label for="first_name" :value="__('Nombre')" />
                            <x-text-input id="first_name" class="block mt-1 w-full" type="text" name="first_name" :value="old('first_name')" required autofocus />
                            <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
                        </div>

                        <!-- Last Name -->
                        <div class="mt-4">
                            <x-input-label for="last_name" :value="__('Apellido')" />
                            <x-text-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" :value="old('last_name')" required />
                            <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
                        </div>

                        <!-- DNI -->
                        <div class="mt-4">
                            <x-input-label for="dni" :value="__('DNI')" />
                            <x-text-input id="dni" class="block mt-1 w-full" type="text" name="dni" :value="old('dni')" required />
                            <x-input-error :messages="$errors->get('dni')" class="mt-2" />
                        </div>

                        <!-- CUIL -->
                        <div class="mt-4">
                            <x-input-label for="cuil" :value="__('CUIL')" />
                            <x-text-input id="cuil" class="block mt-1 w-full" type="text" name="cuil" :value="old('cuil')" required />
                            <x-input-error :messages="$errors->get('cuil')" class="mt-2" />
                        </div>

                        <!-- Employment Type -->
                        <div class="mt-4">
                            <x-input-label for="employment_type" :value="__('Tipo de Empleo')" />
                            <select id="employment_type" name="employment_type" class="block mt-1 w-full" required>
                                <option value="employee">Empleado</option>
                                <option value="contractor">Contratista</option>
                            </select>
                            <x-input-error :messages="$errors->get('employment_type')" class="mt-2" />
                        </div>

                        <!-- Phone -->
                        <div class="mt-4">
                            <x-input-label for="phone" :value="__('Teléfono')" />
                            <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" />
                            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                        </div>

                        <!-- Email -->
                        <div class="mt-4">
                            <x-input-label for="email" :value="__('Correo Electrónico')" />
                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- Birth Date -->
                        <div class="mt-4">
                            <x-input-label for="birth_date" :value="__('Fecha de Nacimiento')" />
                            <x-text-input id="birth_date" class="block mt-1 w-full" type="date" name="birth_date" :value="old('birth_date')" />
                            <x-input-error :messages="$errors->get('birth_date')" class="mt-2" />
                        </div>

                        <!-- Hire Date -->
                        <div class="mt-4">
                            <x-input-label for="hire_date" :value="__('Fecha de Alta')" />
                            <x-text-input id="hire_date" class="block mt-1 w-full" type="date" name="hire_date" :value="old('hire_date')" />
                            <x-input-error :messages="$errors->get('hire_date')" class="mt-2" />
                        </div>

                        <!-- Address -->
                        <div class="mt-4">
                            <x-input-label for="address" :value="__('Dirección')" />
                            <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" />
                            <x-input-error :messages="$errors->get('address')" class="mt-2" />
                        </div>

                        <!-- City -->
                        <div class="mt-4">
                            <x-input-label for="city" :value="__('Ciudad')" />
                            <x-text-input id="city" class="block mt-1 w-full" type="text" name="city" :value="old('city')" />
                            <x-input-error :messages="$errors->get('city')" class="mt-2" />
                        </div>

                        <!-- State -->
                        <div class="mt-4">
                            <x-input-label for="state" :value="__('Estado/Provincia')" />
                            <x-text-input id="state" class="block mt-1 w-full" type="text" name="state" :value="old('state')" />
                            <x-input-error :messages="$errors->get('state')" class="mt-2" />
                        </div>

                        <!-- Country -->
                        <div class="mt-4">
                            <x-input-label for="country" :value="__('País')" />
                            <x-text-input id="country" class="block mt-1 w-full" type="text" name="country" :value="old('country')" />
                            <x-input-error :messages="$errors->get('country')" class="mt-2" />
                        </div>

                        <!-- Photo -->
                        <div class="mt-4">
                            <x-input-label for="photo" :value="__('Foto')" />
                            <input id="photo" class="block mt-1 w-full" type="file" name="photo" />
                            <x-input-error :messages="$errors->get('photo')" class="mt-2" />
                        </div>

                        <!-- Employment Status (only visible for admin) -->
                        @if (Auth::user()->hasRole('admin'))
                            <div class="mt-4">
                                <x-input-label for="approved" :value="__('Estado')" />
                                <select id="approved" name="approved" class="block mt-1 w-full">
                                    <option value="0">Inactivo</option>
                                    <option value="1">Activo</option>
                                </select>
                                <x-input-error :messages="$errors->get('approved')" class="mt-2" />
                            </div>
                        @endif

=======
                    <form method="POST" action="{{ route('documents.store') }}" enctype="multipart/form-data">
                        @csrf

                        <!-- Entidad -->
                        <div>
                            <x-input-label for="entity_type" :value="__('Tipo de Entidad')" />
                            <select id="entity_type" name="entity_type" class="block mt-1 w-full" required>
                                <option value="Person">Persona</option>
                                <option value="Vehicle">Vehículo</option>
                            </select>
                            <x-input-error :messages="$errors->get('entity_type')" class="mt-2" />
                        </div>

                        <!-- Persona -->
                        <div class="mt-4" id="person_select">
                            <x-input-label for="person_id" :value="__('Persona')" />
                            <select id="person_id" name="person_id" class="block mt-1 w-full">
                                <option value="">Seleccione una persona</option>
                                @foreach($people as $person)
                                    <option value="{{ $person->id }}">{{ $person->first_name }} {{ $person->last_name }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('person_id')" class="mt-2" />
                        </div>

                        <!-- Vehículo -->
                        <div class="mt-4" id="vehicle_select" style="display: none;">
                            <x-input-label for="vehicle_id" :value="__('Vehículo')" />
                            <select id="vehicle_id" name="vehicle_id" class="block mt-1 w-full">
                                <option value="">Seleccione un vehículo</option>
                                @foreach($vehicles as $vehicle)
                                    <option value="{{ $vehicle->id }}">{{ $vehicle->make }} {{ $vehicle->model }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('vehicle_id')" class="mt-2" />
                        </div>

                        <!-- Tipo de Documento -->
                        <div class="mt-4">
                            <x-input-label for="document_type_id" :value="__('Tipo de Documento')" />
                            <select id="document_type_id" name="document_type_id" class="block mt-1 w-full" required>
                                <option value="">Seleccione un tipo de documento</option>
                                @foreach($documentTypes as $documentType)
                                    <option value="{{ $documentType->id }}" data-expiration="{{ $documentType->expiration }}">{{ $documentType->name }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('document_type_id')" class="mt-2" />
                        </div>

                        <!-- Fecha de Vencimiento -->
                        <div class="mt-4" id="expiration_date_field" style="display: none;">
                            <x-input-label for="expiration_date" :value="__('Fecha de Vencimiento')" />
                            <x-text-input id="expiration_date" class="block mt-1 w-full" type="date" name="expiration_date" />
                            <x-input-error :messages="$errors->get('expiration_date')" class="mt-2" />
                        </div>

                        <!-- Archivo -->
                        <div class="mt-4">
                            <x-input-label for="file" :value="__('Archivo')" />
                            <input id="file" class="block mt-1 w-full" type="file" name="file" required />
                            <x-input-error :messages="$errors->get('file')" class="mt-2" />
                        </div>

>>>>>>> 657f32a (hola)
                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ml-4">
                                {{ __('Guardar') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<<<<<<< HEAD
</x-app-layout>
=======
</x-app-layout>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const entityTypeSelect = document.getElementById('entity_type');
    const personSelect = document.getElementById('person_select');
    const vehicleSelect = document.getElementById('vehicle_select');
    const documentTypeSelect = document.getElementById('document_type_id');
    const expirationDateField = document.getElementById('expiration_date_field');

    entityTypeSelect.addEventListener('change', function () {
        if (entityTypeSelect.value === 'Person') {
            personSelect.style.display = 'block';
            vehicleSelect.style.display = 'none';
        } else if (entityTypeSelect.value === 'Vehicle') {
            personSelect.style.display = 'none';
            vehicleSelect.style.display = 'block';
        } else {
            personSelect.style.display = 'none';
            vehicleSelect.style.display = 'none';
        }
    });

    documentTypeSelect.addEventListener('change', function () {
        const selectedOption = documentTypeSelect.options[documentTypeSelect.selectedIndex];
        const expirationRequired = selectedOption.getAttribute('data-expiration') == '1';
        expirationDateField.style.display = expirationRequired ? 'block' : 'none';
    });
});
</script>
>>>>>>> 657f32a (hola)
