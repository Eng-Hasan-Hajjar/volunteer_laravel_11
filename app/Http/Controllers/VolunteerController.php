<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Carbon\Carbon;
use App\Models\Volunteer;
use App\Models\Person;
use App\Models\Organization;
use Illuminate\Http\Request;

class VolunteerController extends Controller
{
    public function index_web_main()
    {
        $events = Event::with('coordinator', 'galleryImages')
                       ->where('start_day', '>=', Carbon::today())
                       ->orderBy('start_day', 'asc')
                       ->take(3)
                       ->get();

        $volunteers = Volunteer::with('person', 'volunteerSkills', 'eventVolunteers.event')
                           ->take(3)
                           ->get();

        $organizations = Organization::take(3)
                           ->get();

        return view('website.index', compact('events', 'volunteers', 'organizations'));
    }

    public function index(Request $request)
    {
        $query = Volunteer::with('person');

        // Search by name or national number with case-insensitive matching
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->whereHas('person', function ($q) use ($search) {
                $q->whereRaw('LOWER(name) LIKE ?', [strtolower("%{$search}%")])
                  ->orWhere('national_number', 'LIKE', "%{$search}%");
            })->orWhere('id', 'LIKE', "%{$search}%"); // Fallback to volunteer ID
        }

        $volunteers = $query->get();

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
            'image' => 'nullable|image|max:2048',
        ]);

        $data = $request->all();
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('images/volunteers'), $imageName);
            $data['image'] = 'images/volunteers/' . $imageName;
        }

        Volunteer::create($data);

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
            'image' => 'nullable|image|max:2048',
        ]);

        $data = $request->all();
        if ($request->hasFile('image')) {
            if ($volunteer->image) {
                unlink(public_path($volunteer->image));
            }
            $imageName = time() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('images/volunteers'), $imageName);
            $data['image'] = 'images/volunteers/' . $imageName;
        }

        $volunteer->update($data);

        return redirect()->route('volunteers.index')->with('success', 'تم تحديث المتطوع بنجاح.');
    }

    public function destroy(Volunteer $volunteer)
    {
        if ($volunteer->image) {
            unlink(public_path($volunteer->image));
        }
        $volunteer->delete();
        return redirect()->route('volunteers.index')->with('success', 'تم حذف المتطوع بنجاح.');
    }

    public function index_web(Request $request)
    {
        $query = Volunteer::with('person', 'volunteerSkills', 'eventVolunteers.event');

        // Search by name or national number with case-insensitive matching
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->whereHas('person', function ($q) use ($search) {
                $q->whereRaw('LOWER(name) LIKE ?', [strtolower("%{$search}%")])
                  ->orWhere('national_number', 'LIKE', "%{$search}%");
            })->orWhere('id', 'LIKE', "%{$search}%"); // Fallback to volunteer ID
        }

        // Filter by minimum experience period (in months)
        if ($request->has('min_experience') && $request->min_experience != '' && is_numeric($request->min_experience)) {
            $minExperience = (int)$request->min_experience;
            $query->whereHas('volunteerSkills', function ($q) use ($minExperience) {
                $q->where('experience_period', '>=', $minExperience);
            });
        }

        // Filter by event date range
        if ($request->has('start_date') && $request->start_date != '' && $request->has('end_date') && $request->end_date != '') {
            $startDate = date('Y-m-d', strtotime($request->start_date));
            $endDate = date('Y-m-d', strtotime($request->end_date));
            if ($startDate <= $endDate) {
                $query->whereHas('eventVolunteers.event', function ($q) use ($startDate, $endDate) {
                    $q->whereBetween('start_day', [$startDate, $endDate]);
                });
            }
        }

        $volunteers = $query->get();

        return view('website.pages.volunteers', compact('volunteers'));
    }

    public function index_web_single(Volunteer $volunteer)
    {
        if (!$volunteer->exists) {
            abort(404);
        }
        return view('website.pages.volunteers_single', compact('volunteer'));
    }
}