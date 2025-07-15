<?php

namespace App\Http\Controllers;

use App\Models\VolunteerSkill;
use App\Models\Volunteer;
use App\Models\Skill;
use Illuminate\Http\Request;

class VolunteerSkillController extends Controller
{
    public function index()
    {
        $volunteerSkills = VolunteerSkill::with('volunteer', 'skill')->get();
        return view('admin.volunteer_skills.index', compact('volunteerSkills'));
    }

    public function create()
    {
        $volunteers = Volunteer::all();
        $skills = Skill::all();
   
        return view('admin.volunteer_skills.create', compact('volunteers', 'skills'));
    }

    public function store(Request $request)
    {

   //     dd($request);
        $validated =   $request->validate([
            'id_volunteer' => 'required|exists:volunteers,id',
            'id_skills' => 'required|exists:skills,id',
            'experience_period' => 'required|integer|min:0',
        ]);

        try {
            VolunteerSkill::create($validated);
            return redirect()->route('volunteer-skills.index')->with('success', 'تم إنشاء مهارة المتطوع بنجاح');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->with('error', 'حدث خطأ أثناء إنشاء   مهارة المتطوع : ' . $e->getMessage())->withInput();
        }

      

       
    }

    public function edit(VolunteerSkill $volunteerSkill)
    {
        $volunteers = Volunteer::all();
        $skills = Skill::all();
        return view('admin.volunteer_skills.edit', compact('volunteerSkill', 'volunteers', 'skills'));
    }

    public function update(Request $request, VolunteerSkill $volunteerSkill)
    {
      //  dd($request);
        $request->validate([
            'id_volunteer' => 'required|exists:volunteers,id',
            'id_skills' => 'required|exists:skills,id',
            'experience_period' => 'required|integer|min:0',
        ]);
    
        $volunteerSkill->update($request->all());

        return redirect()->route('volunteer-skills.index')->with('success', 'تم تحديث مهارة المتطوع بنجاح.');
    }

    public function destroy(VolunteerSkill $volunteerSkill)
    {
        $volunteerSkill->delete();
        return redirect()->route('volunteer-skills.index')->with('success', 'تم حذف مهارة المتطوع بنجاح.');
    }
}