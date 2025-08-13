<?php

namespace App\Http\Controllers;

use App\Models\VolunteerTask;
use App\Models\Volunteer;
use App\Models\Event;
use Illuminate\Http\Request;

class VolunteerTaskController extends Controller
{
    public function index(Request $request)
    {
        $query = VolunteerTask::with('volunteer.person', 'event');

        // Search by volunteer name or event name with case-insensitive matching
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->whereHas('volunteer.person', function ($q) use ($search) {
                $q->whereRaw('LOWER(name) LIKE ?', [strtolower("%{$search}%")]);
            })->orWhereHas('event', function ($q) use ($search) {
                $q->whereRaw('LOWER(event_name) LIKE ?', [strtolower("%{$search}%")]);
            });
        }

        $volunteerTasks = $query->get();

        return view('admin.volunteer_tasks.index', compact('volunteerTasks'));
    }

    public function create()
    {
        $volunteers = Volunteer::all();
        $events = Event::all();
        return view('admin.volunteer_tasks.create', compact('volunteers', 'events'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_volunteer' => 'required|exists:volunteers,id',
            'id_event' => 'required|exists:events,id',
            'designation' => 'required|string|max:255',
        ]);

        try {
            VolunteerTask::create($validated);
            return redirect()->route('volunteer-tasks.index')->with('success', 'تم إنشاء مهمة المتطوع بنجاح.');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->with('error', 'حدث خطأ أثناء إنشاء مهمة المتطوع: ' . $e->getMessage())->withInput();
        }
    }

    public function edit(VolunteerTask $volunteerTask)
    {
        $volunteers = Volunteer::all();
        $events = Event::all();
        return view('admin.volunteer_tasks.edit', compact('volunteerTask', 'volunteers', 'events'));
    }

    public function update(Request $request, VolunteerTask $volunteerTask)
    {
        $request->validate([
            'id_volunteer' => 'required|exists:volunteers,id',
            'id_event' => 'required|exists:events,id',
            'designation' => 'required|string|max:255',
        ]);

        $volunteerTask->update($request->all());

        return redirect()->route('volunteer-tasks.index')->with('success', 'تم تحديث مهمة المتطوع بنجاح.');
    }

    public function destroy(VolunteerTask $volunteerTask)
    {
        $volunteerTask->delete();
        return redirect()->route('volunteer-tasks.index')->with('success', 'تم حذف مهمة المتطوع بنجاح.');
    }
}