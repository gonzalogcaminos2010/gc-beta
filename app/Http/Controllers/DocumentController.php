<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Person;
use App\Models\Vehicle;
use App\Models\DocumentType;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function index()
    {
        $documents = Document::with(['person', 'vehicle', 'documentType'])->paginate(10);
        return view('documents.index', compact('documents'));
    }

    public function create()
    {
        $people = Person::where('approved', 1)->get();
        $vehicles = Vehicle::where('approved', 1)->get();
        $documentTypes = DocumentType::all();

        return view('documents.create', compact('people', 'vehicles', 'documentTypes'));
    }

    public function store(Request $request)
<<<<<<< HEAD
    {
        $request->validate([
            'entity_type' => 'required|in:Person,Vehicle',
            'person_id' => 'nullable|exists:people,id',
            'vehicle_id' => 'nullable|exists:vehicles,id',
            'document_type_id' => 'required|exists:document_types,id',
            'file' => 'required|file|mimes:pdf,jpg,jpeg,png',
            'expiration_date' => 'nullable|date',
        ]);

        $filePath = $request->file('file')->store('documents');

        Document::create([
            'person_id' => $request->entity_type == 'Person' ? $request->person_id : null,
            'vehicle_id' => $request->entity_type == 'Vehicle' ? $request->vehicle_id : null,
            'document_type_id' => $request->document_type_id,
            'file_path' => $filePath,
            'expiration_date' => $request->expiration_date,
        ]);

        return redirect()->route('documents.index')->with('success', 'Documento creado correctamente.');
    }
=======
{
    $request->validate([
        'entity_type' => 'required|in:Person,Vehicle',
        'person_id' => 'nullable|exists:people,id',
        'vehicle_id' => 'nullable|exists:vehicles,id',
        'document_type_id' => 'required|exists:document_types,id',
        'file' => 'required|file|mimes:pdf,jpg,jpeg,png',
        'expiration_date' => 'nullable|date',
    ]);

    $filePath = $request->file('file')->store('documents');

    Document::create([
        'person_id' => $request->entity_type == 'Person' ? $request->person_id : null,
        'vehicle_id' => $request->entity_type == 'Vehicle' ? $request->vehicle_id : null,
        'document_type_id' => $request->document_type_id,
        'file_path' => $filePath,
        'expiration_date' => $request->expiration_date,
    ]);

    return redirect()->route('documents.index')->with('success', 'Documento creado correctamente.');
}
>>>>>>> 657f32a (hola)

    public function show(Document $document)
    {
        return view('documents.show', compact('document'));
    }

    public function edit(Document $document)
    {
        $people = Person::where('approved', 1)->get();
        $vehicles = Vehicle::where('approved', 1)->get();
        $documentTypes = DocumentType::all();

        return view('documents.edit', compact('document', 'people', 'vehicles', 'documentTypes'));
    }

    public function update(Request $request, Document $document)
    {
        $request->validate([
            'entity_type' => 'required|in:Person,Vehicle',
            'person_id' => 'nullable|exists:people,id',
            'vehicle_id' => 'nullable|exists:vehicles,id',
            'document_type_id' => 'required|exists:document_types,id',
            'file' => 'nullable|file|mimes:pdf,jpg,jpeg,png',
            'expiration_date' => 'nullable|date',
        ]);

        $data = [
            'person_id' => $request->entity_type == 'Person' ? $request->person_id : null,
            'vehicle_id' => $request->entity_type == 'Vehicle' ? $request->vehicle_id : null,
            'document_type_id' => $request->document_type_id,
            'expiration_date' => $request->expiration_date,
        ];

        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('documents');
            $data['file_path'] = $filePath;
        }

        $document->update($data);

        return redirect()->route('documents.index')->with('success', 'Documento actualizado correctamente.');
    }

    public function destroy(Document $document)
    {
        $document->delete();

        return redirect()->route('documents.index')->with('success', 'Documento eliminado correctamente.');
    }
}