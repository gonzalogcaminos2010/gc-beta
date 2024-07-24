<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
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
        $person = Person::findOrFail($id);

        // Convertir las fechas a instancias de Carbon si no son nulas
        $person->birth_date = $person->birth_date ? Carbon::parse($person->birth_date) : null;
        $person->hire_date = $person->hire_date ? Carbon::parse($person->hire_date) : null;
    
        return view('person.show', compact('person'));
    }

    public function edit($id)
    {
        $person = Person::findOrFail($id);
        return view('person.edit', compact('person'));
    }

    public function update(Request $request, $id)
    {
        Log::info('Iniciando actualización de persona.', ['id' => $id]);
    
        $request->validate([
            'first_name' => 'sometimes|string|max:255',
            'last_name' => 'sometimes|string|max:255',
            'dni' => 'sometimes|string|max:255|unique:people,dni,' . $id,
            'cuil' => 'sometimes|string|max:255|unique:people,cuil,' . $id,
            'employment_type' => 'sometimes|string|in:' . implode(',', array_keys(Person::EMPLOYMENT_TYPES)),
            'phone' => 'nullable|string|max:255',
            'email' => 'nullable|string|email|max:255',
            'photo' => 'nullable|image|max:2048',
            'birth_date' => 'nullable|date',
            'hire_date' => 'nullable|date',
            'address' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'state' => 'nullable|string|max:255',
            'country' => 'nullable|string|max:255',
            'approved' => 'boolean',
        ]);
    
        Log::info('Validación completada.', ['request' => $request->all()]);
    
        $person = Person::findOrFail($id);
    
        if ($request->hasFile('photo')) {
            Log::info('Archivo de foto recibido.', ['file' => $request->file('photo')]);
    
            // Eliminar la foto anterior si existe
            if ($person->photo) {
                Storage::delete('public/' . $person->photo);
                Log::info('Foto anterior eliminada.', ['path' => $person->photo]);
            }
    
            // Guardar la nueva foto
            $photoPath = $request->file('photo')->store('photos', 'public');
            $person->photo = $photoPath;
            Log::info('Nueva foto guardada.', ['path' => $photoPath]);
        } else {
            Log::info('No se recibió ningún archivo de foto.');
        }
    
        $person->update($request->except('photo'));
        $person->save();
    
        Log::info('Persona actualizada exitosamente.', ['person' => $person]);
    
        return redirect()->route('people.show', $person->id)->with('success', 'Persona actualizada con éxito.');
    }

    public function destroy($id)
    {
        $person = Person::findOrFail($id);
        $person->delete();

        return response()->json(null, 204);
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