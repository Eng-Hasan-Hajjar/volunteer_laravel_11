<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Person;
use App\Models\EventGallery; // Ensure this is imported
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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
        return view('admin.events.create', compact('people'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'event_name' => 'required|string|max:255',
            'start_day' => 'required|date',
            'end_day' => 'required|date|after_or_equal:start_day',
            'id_coordinator' => 'required|exists:people,id',
            'main_image' => 'nullable|image|max:2048',
            'gallery_images.*' => 'nullable|image|max:2048',
        ]);

        try {
            $data = $validated;
            if ($request->hasFile('main_image')) {
                $imageName = time() . '_main.' . $request->file('main_image')->getClientOriginalExtension();
                $request->file('main_image')->move(public_path('images/events'), $imageName);
                $data['main_image'] = 'images/events/' . $imageName;
            }

            $event = Event::create($data);

            if ($request->hasFile('gallery_images')) {
                foreach ($request->file('gallery_images') as $image) {
                    $galleryImageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('images/events/gallery'), $galleryImageName);
                    $event->galleryImages()->create(['image_path' => 'images/events/gallery/' . $galleryImageName]);
                }
            }

            return redirect()->route('events.index')->with('success', 'تم إنشاء الفعالية بنجاح.');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->with('error', 'حدث خطأ أثناء إنشاء الفعالية: ' . $e->getMessage())->withInput();
        }
    }

    public function edit(Event $event)
    {
        $event->load('galleryImages');
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
            'main_image' => 'nullable|image|max:2048',
            'gallery_images.*' => 'nullable|image|max:2048',
        ]);

        $data = $request->all();
        if ($request->hasFile('main_image')) {
            if ($event->main_image && file_exists(public_path($event->main_image))) {
                unlink(public_path($event->main_image));
            }
            $imageName = time() . '_main.' . $request->file('main_image')->getClientOriginalExtension();
            $request->file('main_image')->move(public_path('images/events'), $imageName);
            $data['main_image'] = 'images/events/' . $imageName;
        }

        $event->update($data);

        if ($request->hasFile('gallery_images')) {
            if ($event->galleryImages) {
                foreach ($event->galleryImages as $galleryImage) {
                    if (file_exists(public_path($galleryImage->image_path))) {
                        unlink(public_path($galleryImage->image_path));
                    }
                    $galleryImage->delete();
                }
            }
            foreach ($request->file('gallery_images') as $image) {
                $galleryImageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images/events/gallery'), $galleryImageName);
                $event->galleryImages()->create(['image_path' => 'images/events/gallery/' . $galleryImageName]);
            }
        }

        return redirect()->route('events.index')->with('success', 'تم تحديث الفعالية بنجاح.');
    }

    public function destroy(Event $event)
    {
        if ($event->main_image && file_exists(public_path($event->main_image))) {
            unlink(public_path($event->main_image));
        }
        if ($event->galleryImages) {
            foreach ($event->galleryImages as $galleryImage) {
                if (file_exists(public_path($galleryImage->image_path))) {
                    unlink(public_path($galleryImage->image_path));
                }
                $galleryImage->delete();
            }
        }
        $event->delete();
        return redirect()->route('events.index')->with('success', 'تم حذف الفعالية بنجاح.');
    }

    public function index_web()
    {
        $events = Event::with('coordinator', 'galleryImages')->get();
        return view('website.pages.events', compact('events'));
    }

    public function index_web_single(Event $event)
    {
        if (!$event->exists) {
            abort(404);
        }
        $event->load('coordinator', 'galleryImages');
        return view('website.pages.events_single', compact('event'));
    }
}