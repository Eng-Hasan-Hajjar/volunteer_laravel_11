<?php

namespace App\Http\Controllers;

use App\Models\EmployedAvailableResource;
use App\Models\Person;
use Illuminate\Http\Request;

class EmployedAvailableResourceController extends Controller
{
    public function index()
    {
        $resources = EmployedAvailableResource::with('coordinator')->get();
        return view('admin.employed_available_resources.index', compact('resources'));
    }

    public function create()
    {
        $people = Person::all();
        return view('admin.employed_available_resources.create', compact('people'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_coordinator' => 'required|exists:people,id',
            'type_resources' => 'required|string|max:255',
            'price_resources' => 'required|numeric|min:0',
        ]);

        EmployedAvailableResource::create($request->all());

        return redirect()->route('employed-available-resources.index')->with('success', 'تم إنشاء المورد بنجاح.');
    }

    public function edit(EmployedAvailableResource $employedAvailableResource)
    {
        $people = Person::all();
        return view('admin.employed_available_resources.edit', compact('employedAvailableResource', 'people'));
    }

    public function update(Request $request, EmployedAvailableResource $employedAvailableResource)
    {
        $request->validate([
            'id_coordinator' => 'required|exists:people,id',
            'type_resources' => 'required|string|max:255',
            'price_resources' => 'required|numeric|min:0',
        ]);

        $employedAvailableResource->update($request->all());

        return redirect()->route('employed-available-resources.index')->with('success', 'تم تحديث المورد بنجاح.');
    }

    public function destroy(EmployedAvailableResource $employedAvailableResource)
    {
        $employedAvailableResource->delete();
        return redirect()->route('employed-available-resources.index')->with('success', 'تم حذف المورد بنجاح.');
    }
}