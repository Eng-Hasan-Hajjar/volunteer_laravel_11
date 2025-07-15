<?php

namespace App\Http\Controllers;

use App\Models\Volunteer;
use App\Models\Person;
use Illuminate\Http\Request;

class VolunteerController extends Controller
{
     public function index_web()
    { 
       /* $locations = Location::all();
        $propertyTypes = PropertyType::withCount('properties')->get(); // جلب الأنواع مع عدد العقارات
        $properties = Property::with('images')->paginate(10);
        $comments = Comment::all();
        */
        return view('website.index');
    }
    
    public function index()
    {
        $volunteers = Volunteer::with('person')->get();
        return view('admin.volunteers.index', compact('volunteers'));
    }

    public function create()
    {
        $people = Person::all();
        return view('admin.volunteers.create', compact('people'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_person' => 'required|exists:people,id|unique:volunteers,id',
        ]);

        Volunteer::create($request->all());

        return redirect()->route('volunteers.index')->with('success', 'تم إنشاء المتطوع بنجاح.');
    }

    public function edit(Volunteer $volunteer)
    {
        $people = Person::all();
        return view('admin.volunteers.edit', compact('volunteer', 'people'));
    }

    public function update(Request $request, Volunteer $volunteer)
    {
        $request->validate([
            'id_person' => 'required|exists:people,id|unique:volunteers,id,' . $volunteer->id . ',id',
        ]);

        $volunteer->update($request->all());

        return redirect()->route('volunteers.index')->with('success', 'تم تحديث المتطوع بنجاح.');
    }

    public function destroy(Volunteer $volunteer)
    {
        $volunteer->delete();
        return redirect()->route('volunteers.index')->with('success', 'تم حذف المتطوع بنجاح.');
    }
}