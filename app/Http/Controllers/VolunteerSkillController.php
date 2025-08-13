<?php

namespace App\Http\Controllers;

use App\Models\VolunteerSkill;
use App\Models\Volunteer;
use App\Models\Skill;
use Illuminate\Http\Request;

class VolunteerSkillController extends Controller
{
    public function index(Request $request)
    {
        $query = VolunteerSkill::with('volunteer.person', 'skill');

        // Search by volunteer name or skill name with case-insensitive matching
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->whereHas('volunteer.person', function ($q) use ($search) {
                $q->whereRaw('LOWER(name) LIKE ?', [strtolower("%{$search}%")]);
            })->orWhereHas('skill', function ($q) use ($search) {
                $q->whereRaw('LOWER(skill_name) LIKE ?', [strtolower("%{$search}%")]);
            });
        }

        $volunteerSkills = $query->get();

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
        $validated = $request->validate([
            'id_volunteer' => 'required|exists:volunteers,id',
            'id_skills' => 'required|exists:skills,id',
            'experience_period' => 'required|integer|min:0',
        ]);

        try {
            VolunteerSkill::create($validated);
            return redirect()->route('volunteer-skills.index')->with('success', 'تم إنشاء مهارة المتطوع بنجاح');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->with('error', 'حدث خطأ أثناء إنشاء مهارة المتطوع: ' . $e->getMessage())->withInput();
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