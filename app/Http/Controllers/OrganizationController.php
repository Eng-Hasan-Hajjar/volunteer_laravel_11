<?php

namespace App\Http\Controllers;
use App\Models\Organization;

use Illuminate\Http\Request;

class OrganizationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
               $organizations = Organization::get();
        return view('admin.organizations.index', compact('organizations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('admin.organizations.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $validated =      $request->validate([
            'organization_name' => 'required|string|max:255|unique:organizations,organization_name',
            'address' => 'required|string|max:255',
            'time_of_creation' => 'required|date',
        ]);

        try {
            Organization::create($validated);
            return redirect()->route('organizations.index')->with('success', 'تم إنشاء المنظمة بنجاح.');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->with('error', 'حدث خطأ أثناء إنشاء المنظمة: ' . $e->getMessage())->withInput();
        }
    

  
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Organization $organization)
    {  
        return view('admin.organizations.edit', compact('organization'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Organization $organization)
    {
        $request->validate([
              'organization_name' => 'required|string|max:255|unique:organizations,organization_name',
            'address' => 'required|string|max:255',
            'time_of_creation' => 'required|date',
        ]);

        $organization->update($request->all());

        return redirect()->route('organizations.index')->with('success', 'تم تحديث المنظمة بنجاح.');
  
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Organization $organization)
    {
                $organization->delete();
        return redirect()->route('events.index')->with('success', 'تم حذف المنظمة بنجاح.');

    }


    public function index_web(Organization $organization)
    {
        $organizations = Organization::get();
        return view('website.pages.organizations', compact('organizations'));
    }
    public function index_web_single(Organization $organization)
    {

        // Remove dd() for production, it's only for debugging
        // dd($organization);
        if (!$organization->exists) {
            abort(404); // Return 404 if organization not found
        }
   // dd($organization);
        return view('website.pages.organizations-single', compact('organization'));
    }
}
