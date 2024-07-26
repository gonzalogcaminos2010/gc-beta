<?php

namespace App\Http\Controllers;

use App\Models\DocumentType;
use Illuminate\Http\Request;



class DocumentTypeController extends Controller
{
    public function index()
    {
        $documentTypes = DocumentType::all();
        return view('document_types.index', compact('documentTypes'));
    }

    public function create()
    {
        return view('document_types.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:255|unique:document_types',
            'has_expiry' => 'required|boolean',
            'entity_type' => 'required|string|in:Person,Vehicle',
        ]);

        DocumentType::create($request->all());

        return redirect()->route('document_types.index')->with('success', 'Tipo de documento creado exitosamente.');
    }

    public function show(DocumentType $documentType)
    {
        return view('document_types.show', compact('documentType'));
    }

    public function edit(DocumentType $documentType)
    {
        return view('document_types.edit', compact('documentType'));
    }

    public function update(Request $request, DocumentType $documentType)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:255|unique:document_types,code,' . $documentType->id,
            'has_expiry' => 'required|boolean',
            'entity_type' => 'required|string|in:Person,Vehicle',
        ]);

        $documentType->update($request->all());

        return redirect()->route('document_types.index')->with('success', 'Tipo de documento actualizado exitosamente.');
    }

    public function destroy(DocumentType $documentType)
    {
        $documentType->delete();

        return redirect()->route('document_types.index')->with('success', 'Tipo de documento eliminado exitosamente.');
    }
}
