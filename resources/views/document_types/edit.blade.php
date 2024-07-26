@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Tipo de Documento</h1>
    <form action="{{ route('document_types.update', $documentType->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $documentType->name }}" required>
        </div>
        <div class="form-group">
            <label for="code">Código</label>
            <input type="text" name="code" id="code" class="form-control" value="{{ $documentType->code }}" required>
        </div>
        <div class="form-group">
            <label for="has_expiry">¿Tiene vencimiento?</label>
            <select name="has_expiry" id="has_expiry" class="form-control" required>
                <option value="1" {{ $documentType->has_expiry ? 'selected' : '' }}>Sí</option>
                <option value="0" {{ !$documentType->has_expiry ? 'selected' : '' }}>No</option>
            </select>
        </div>
        <div class="form-group">
            <label for="entity_type">Tipo de Entidad</label>
            <select name="entity_type" id="entity_type" class="form-control" required>
                <option value="Person" {{ $documentType->entity_type == 'Person' ? 'selected' : '' }}>Persona</option>
                <option value="Vehicle" {{ $documentType->entity_type == 'Vehicle' ? 'selected' : '' }}>Vehículo</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection
