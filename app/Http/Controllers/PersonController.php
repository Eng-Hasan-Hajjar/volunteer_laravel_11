<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    public function index(Request $request)
    {
        $query = Person::query();

        // Search by name or national number with case-insensitive matching
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->whereRaw('LOWER(name) LIKE ?', [strtolower("%{$search}%")])
                  ->orWhere('national_number', 'LIKE', "%{$search}%")
                  ->orWhere('email', 'LIKE', "%{$search}%")
                  ->orWhere('contact_number', 'LIKE', "%{$search}%");
            });
        }

        $people = $query->get();

        return view('admin.people.index', compact('people'));
    }

    public function create()
    {
        return view('admin.people.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'second_name' => 'nullable|string|max:255',
            'national_number' => 'required|string|max:20|unique:people,national_number',
            'birth_date' => 'required|date',
            'email' => 'required|email|max:255|unique:people,email',
            'gender' => 'nullable|in:ذكر,أنثى',
            'contact_number' => 'nullable|string|max:20',
            'job_title' => 'nullable|string|max:100',
            'nationality' => 'nullable|string|max:100',
            'availability_times' => 'nullable|string',
            'motivation' => 'nullable|string',
            'is_active' => 'nullable|boolean',
            'department' => 'nullable|string|max:100',
            'hiring_date' => 'nullable|date',
            'address' => 'nullable|string|max:255',
            'notes' => 'nullable|string',
        ]);

        // Set default values if not provided
        $validated = array_merge($validated, [
            'is_active' => $request->input('is_active', true),
            'hiring_date' => $request->input('hiring_date', now()->toDateString()),
        ]);

        Person::create($validated);

        return redirect()->route('people.index')->with('success', 'تم إنشاء الشخص بنجاح.');
    }

    public function edit(Person $person)
    {
        return view('admin.people.edit', compact('person'));
    }

    public function update(Request $request, Person $person)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'second_name' => 'nullable|string|max:255',
            'national_number' => 'required|string|max:20|unique:people,national_number,' . $person->id,
            'birth_date' => 'required|date',
            'email' => 'required|email|max:255|unique:people,email,' . $person->id,
            'gender' => 'nullable|in:ذكر,أنثى',
            'contact_number' => 'nullable|string|max:20',
            'job_title' => 'nullable|string|max:100',
            'nationality' => 'nullable|string|max:100',
            'availability_times' => 'nullable|string',
            'motivation' => 'nullable|string',
            'is_active' => 'nullable|boolean',
            'department' => 'nullable|string|max:100',
            'hiring_date' => 'nullable|date',
            'address' => 'nullable|string|max:255',
            'notes' => 'nullable|string',
        ]);

        // Set default values if not provided
        $validated = array_merge($validated, [
            'is_active' => $request->input('is_active', $person->is_active ?? true),
            'hiring_date' => $request->input('hiring_date', $person->hiring_date ?? now()->toDateString()),
        ]);

        $person->update($validated);

        return redirect()->route('people.index')->with('success', 'تم تحديث الشخص بنجاح.');
    }

    public function destroy(Person $person)
    {
        try {
            $person->delete();
            return redirect()->route('people.index')->with('success', 'تم حذف الشخص بنجاح.');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->route('people.index')->with('error', 'لا يمكن حذف الشخص بسبب وجود بيانات مرتبطة.');
        }
    }
}