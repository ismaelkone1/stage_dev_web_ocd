<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Routing\Controller as Controller;
use Illuminate\Support\Facades\Auth; 

class PersonController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index']);
    }

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

        $validated['first_name'] = Str::ucfirst(Str::lower($validated['first_name']));

        $validated['last_name'] = Str::upper($validated['last_name']);

        $validated['birth_name'] = !empty($validated['birth_name']) 
            ? Str::upper($validated['birth_name'])
            : $validated['last_name'];

        // Format pour les middle names
        if (!empty($validated['middle_names'])) {
            $middleNames = array_map(function($name) {
                return Str::ucfirst(Str::lower(trim($name)));
            }, explode(',', $validated['middle_names']));
            $validated['middle_names'] = implode(',', $middleNames);
        }

        $validated['created_by'] = Auth::id();

        $person = Person::create($validated);

        return redirect()
            ->route('persons.index')
            ->with('success', 'Person created successfully.');
    }
}