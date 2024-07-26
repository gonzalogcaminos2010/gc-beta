<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Documento') }}
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

                    <form method="POST" action="{{ route('documents.store') }}" enctype="multipart/form-data" id="document-form">
                        @csrf

                        <!-- Persona -->
                        <div id="person-section">
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
                        <div id="vehicle-section" style="display:none;">
                            <x-input-label for="vehicle_id" :value="__('Vehículo')" />
                            <select id="vehicle_id" name="vehicle_id" class="block mt-1 w-full">
                                <option value="">Seleccione un vehículo</option>
                                @foreach($vehicles as $vehicle)
                                    <option value="{{ $vehicle->id }}">{{ $vehicle->name }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('vehicle_id')" class="mt-2" />
                        </div>

                        <!-- Tipo de Documento -->
                        <div class="mt-4">
                            <x-input-label for="document_type_id" :value="__('Tipo de Documento')" />
                            <select id="document_type_id" name="document_type_id" class="block mt-1 w-full" required>
                                <option value="">Seleccione un tipo de documento</option>
                                @foreach($documentTypes as $type)
                                    <option value="{{ $type->id }}" data-expiration="{{ $type->expiration }}">{{ $type->name }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('document_type_id')" class="mt-2" />
                        </div>

                        <!-- Fecha de Vencimiento -->
                        <div class="mt-4" id="expiration-date-section" style="display:none;">
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
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const documentTypeSelect = document.getElementById('document_type_id');
            const expirationDateSection = document.getElementById('expiration-date-section');
            const personSection = document.getElementById('person-section');
            const vehicleSection = document.getElementById('vehicle-section');

            documentTypeSelect.addEventListener('change', function () {
                const selectedOption = documentTypeSelect.options[documentTypeSelect.selectedIndex];
                const expiration = selectedOption.getAttribute('data-expiration');
                const entityType = selectedOption.getAttribute('data-entity-type');

                // Show or hide expiration date field
                if (expiration == 1) {
                    expirationDateSection.style.display = 'block';
                } else {
                    expirationDateSection.style.display = 'none';
                }

                // Show or hide person and vehicle fields based on entity type
                if (entityType === 'Person') {
                    personSection.style.display = 'block';
                    vehicleSection.style.display = 'none';
                } else if (entityType === 'Vehicle') {
                    personSection.style.display = 'none';
                    vehicleSection.style.display = 'block';
                } else {
                    personSection.style.display = 'none';
                    vehicleSection.style.display = 'none';
                }
            });
        });
    </script>
</x-app-layout>