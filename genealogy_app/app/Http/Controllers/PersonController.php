<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    public function index()
    {
        $persons = Person::with('creator')->get();
        return view('persons.index', compact('persons'));
    }

    public function show(string $id)
    {
        $person = Person::with(['creator', 'parents', 'children'])->findOrFail($id);
        return view('persons.show', compact('person'));
    }

    public function create()
    {
        return view('persons.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'birth_name' => 'nullable|string|max:255',
            'middle_names' => 'nullable|string|max:255',
            'date_of_birth' => 'nullable|date'
        ]);

        $person = new Person($validated);
        $person->save();

        return redirect()
            ->route('persons.index')
            ->with('success', 'Person created successfully.');
    }
}