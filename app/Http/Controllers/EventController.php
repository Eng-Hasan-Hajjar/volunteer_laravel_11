<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Person;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::all();
        return view('admin.events.index', compact('events'));
    }

    public function create()
    {
        $people = Person::all();
       // dd($people);
        return view('admin.events.create', compact('people'));
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'event_name' => 'required|string|max:255',
            'start_day' => 'required|date',
            'end_day' => 'required|date|after_or_equal:start_day',
            'id_coordinator' => 'required|exists:people,id',
        ]);

        try {
            Event::create($validated);
            return redirect()->route('events.index')->with('success', 'تم إنشاء الفعالية بنجاح.');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->with('error', 'حدث خطأ أثناء إنشاء الفعالية: ' . $e->getMessage())->withInput();
        }
    }

    public function edit(Event $event)
    {
        $people = Person::all();
        return view('admin.events.edit', compact('event', 'people'));
    }

    public function update(Request $request, Event $event)
    {
        $request->validate([
            'event_name' => 'required|string|max:255',
            'start_day' => 'required|date',
            'end_day' => 'required|date|after_or_equal:start_day',
            'id_coordinator' => 'required|exists:people,id',
        ]);

        $event->update($request->all());

        return redirect()->route('events.index')->with('success', 'تم تحديث الفعالية بنجاح.');
    }

    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route('events.index')->with('success', 'تم حذف الفعالية بنجاح.');
    }

        
    public function index_web(Event $event)
    {
        $events = Event::get();
        return view('website.pages.events', compact('events'));
    }
    public function index_web_single(Event $event)
    {

        if (!$event->exists) {
            abort(404); // Return 404 if organization not found
        }
        // dd($organization);
        return view('website.pages.events_single', compact('event'));
    }


}