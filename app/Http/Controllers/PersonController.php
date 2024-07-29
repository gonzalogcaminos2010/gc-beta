<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use App\Models\DocumentType;

class PersonController extends Controller
{
    public function index()
    {
        $people = Person::all();
        return view('person.index', compact('people'));
    }

    public function create()
    {
        return view('person.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'dni' => 'required|string|max:255|unique:people',
            'cuil' => 'required|string|max:255|unique:people',
            'employment_type' => 'required|string|in:employee,contractor',
            'phone' => 'nullable|string|max:255',
            'email' => 'nullable|string|email|max:255',
            'birth_date' => 'nullable|date',
            'hire_date' => 'nullable|date',
            'address' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'state' => 'nullable|string|max:255',
            'country' => 'nullable|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $person = new Person($request->except('photo'));

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos', 'public');
            $person->photo = $photoPath;
        }

        //depurar la variable
        //dd($person);

        $person->save();

        return redirect()->route('people.create')->with('success', 'Person created successfully.');
    }

    public function show($id)
    {
<<<<<<< HEAD
        $person = Person::findOrFail($id);

        // Convertir las fechas a instancias de Carbon si no son nulas
        $person->birth_date = $person->birth_date ? Carbon::parse($person->birth_date) : null;
        $person->hire_date = $person->hire_date ? Carbon::parse($person->hire_date) : null;
    
        return view('person.show', compact('person'));
=======
        $person = Person::with('documents.documentType')->findOrFail($id);
        $documentTypes = DocumentType::where('entity_type', 'Person')->get();

        return view('person.show', compact('person', 'documentTypes'));
>>>>>>> 657f32a (hola)
    }


    public function edit($id)
{
    $person = Person::findOrFail($id);
    return view('person.edit', compact('person'));
}






    public function update(Request $request, Person $person)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'dni' => 'required|string|max:255|unique:people,dni,' . $person->id,
            'cuil' => 'required|string|max:255|unique:people,cuil,' . $person->id,
            'employment_type' => 'required|string|in:employee,contractor',
            'phone' => 'nullable|string|max:255',
            'email' => 'nullable|string|email|max:255',
            'birth_date' => 'nullable|date',
            'hire_date' => 'nullable|date',
            'address' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'state' => 'nullable|string|max:255',
            'country' => 'nullable|string|max:255',
            'photo' => 'nullable|image|max:1024',
            'approved' => 'boolean',
        ]);
    
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos');
            $person->photo = $photoPath;
        }
    
        $person->update($request->except(['photo']));
    
        return redirect()->route('people.index')->with('success', 'Persona actualizada correctamente.');
    }



   //delete person
    public function destroy($id)
    {
        $person = Person::findOrFail($id);
        $person->delete();
        return redirect()->route('people.index')->with('success', 'Person deleted successfully.');
    }

    public function approve($id)
    {
        $person = Person::findOrFail($id);
        $person->approved = true;
        $person->save();

        return response()->json($person);
    }

    public function approved()
    {
        $approvedPeople = Person::where('approved', true)->get();
        return response()->json($approvedPeople);
    }
}