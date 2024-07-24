<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Persona') }}
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
</x-app-layout>