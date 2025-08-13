<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function index(Request $request)
    {
        $query = Skill::query();

        // Search by skill name with case-insensitive matching
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where('skill_name', 'LIKE', "%{$search}%");
        }

        $skills = $query->get();

        return view('admin.skills.index', compact('skills'));
    }

    public function create()
    {
        return view('admin.skills.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'skill_name' => 'required|string|max:255|unique:skills,skill_name',
        ]);

        Skill::create($request->all());

        return redirect()->route('skills.index')->with('success', 'تم إنشاء المهارة بنجاح.');
    }

    public function edit(Skill $skill)
    {
        return view('admin.skills.edit', compact('skill'));
    }

    public function update(Request $request, Skill $skill)
    {
        $request->validate([
            'skill_name' => 'required|string|max:255|unique:skills,skill_name,' . $skill->id . ',id',
        ]);

        $skill->update($request->all());

        return redirect()->route('skills.index')->with('success', 'تم تحديث المهارة بنجاح.');
    }

    public function destroy(Skill $skill)
    {
        $skill->delete();
        return redirect()->route('skills.index')->with('success', 'تم حذف المهارة بنجاح.');
    }
}