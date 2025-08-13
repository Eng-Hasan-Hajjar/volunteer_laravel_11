<?php

namespace App\Http\Controllers;

use App\Models\EventVolunteer;
use App\Models\Event;
use App\Models\Volunteer;
use Illuminate\Http\Request;

class EventVolunteerController extends Controller
{
    public function index(Request $request)
    {
        $query = EventVolunteer::with('event', 'volunteer.person');

        // Search by event name or volunteer name with case-insensitive matching
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->whereHas('event', function ($q) use ($search) {
                $q->whereRaw('LOWER(event_name) LIKE ?', [strtolower("%{$search}%")]);
            })->orWhereHas('volunteer.person', function ($q) use ($search) {
                $q->whereRaw('LOWER(name) LIKE ?', [strtolower("%{$search}%")]);
            });
        }

        $eventVolunteers = $query->get();

        return view('admin.event_volunteers.index', compact('eventVolunteers'));
    }

    public function create()
    {
        $events = Event::all();
        $volunteers = Volunteer::all();
        return view('admin.event_volunteers.create', compact('events', 'volunteers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_event' => 'required|exists:events,id',
            'id_volunteer' => 'required|exists:volunteers,id',
        ]);

        EventVolunteer::create($request->all());

        return redirect()->route('event-volunteers.index')->with('success', 'تم إنشاء مشاركة المتطوع في الفعالية بنجاح.');
    }

    public function edit(EventVolunteer $eventVolunteer)
    {
        $events = Event::all();
        $volunteers = Volunteer::all();
        return view('admin.event_volunteers.edit', compact('eventVolunteer', 'events', 'volunteers'));
    }

    public function update(Request $request, EventVolunteer $eventVolunteer)
    {
        $request->validate([
            'id_event' => 'required|exists:events,id',
            'id_volunteer' => 'required|exists:volunteers,id',
        ]);

        $eventVolunteer->update($request->all());

        return redirect()->route('event-volunteers.index')->with('success', 'تم تحديث مشاركة المتطوع في الفعالية بنجاح.');
    }

    public function destroy(EventVolunteer $eventVolunteer)
    {
        $eventVolunteer->delete();
        return redirect()->route('event-volunteers.index')->with('success', 'تم حذف مشاركة المتطوع في الفعالية بنجاح.');
    }
}