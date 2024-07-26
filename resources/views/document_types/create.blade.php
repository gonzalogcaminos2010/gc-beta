<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Tipo de Documento') }}
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

                    <form method="POST" action="{{ route('document_types.store') }}" enctype="multipart/form-data">
                        @csrf

                        <!-- Name -->
                        <div>
                            <x-input-label for="name" :value="__('Nombre')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <!-- Code -->
                        <div class="mt-4">
                            <x-input-label for="code" :value="__('Código')" />
                            <x-text-input id="code" class="block mt-1 w-full" type="text" name="code" :value="old('code')" required />
                            <x-input-error :messages="$errors->get('code')" class="mt-2" />
                        </div>

                        <!-- Has Expiry -->
                        <div class="mt-4">
                            <x-input-label for="has_expiry" :value="__('¿Tiene vencimiento?')" />
                            <select id="has_expiry" name="has_expiry" class="block mt-1 w-full" required>
                                <option value="1">Sí</option>
                                <option value="0">No</option>
                            </select>
                            <x-input-error :messages="$errors->get('has_expiry')" class="mt-2" />
                        </div>

                        <!-- Entity Type -->
                        <div class="mt-4">
                            <x-input-label for="entity_type" :value="__('Tipo de Entidad')" />
                            <select id="entity_type" name="entity_type" class="block mt-1 w-full" required>
                                <option value="Person">Persona</option>
                                <option value="Vehicle">Vehículo</option>
                            </select>
                            <x-input-error :messages="$errors->get('entity_type')" class="mt-2" />
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
