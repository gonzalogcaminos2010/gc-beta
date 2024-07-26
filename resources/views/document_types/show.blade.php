@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalles del Tipo de Documento</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $documentType->name }}</h5>
            <p class="card-text"><strong>Código:</strong> {{ $documentType->code }}</p>
            <p class="card-text"><strong>¿Tiene vencimiento?</strong> {{ $documentType->has_expiry ? 'Sí' : 'No' }}</p>
            <p class="card-text"><strong>Tipo de Entidad:</strong> {{ $documentType->entity_type }}</p>
            <a href="{{ route('document_types.edit', $documentType->id) }}" class="btn btn-warning">Editar</a>
            <form action="{{ route('document_types.destroy', $documentType->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Eliminar</button>
            </form>
            <a href="{{ route('document_types.index') }}" class="btn btn-secondary">Volver</a>
        </div>
    </div>
</div>
@endsection
