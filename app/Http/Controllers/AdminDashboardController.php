<?php
namespace App\Http\Controllers;
use App\Models\EventVolunteer;
use App\Models\VolunteerTask;
use App\Models\FinancialSupport;
use App\Models\Volunteer;
use App\Models\Event;
use App\Models\FundingOrganization;
use Illuminate\Http\Request;
use App\Models\EmployedAvailableResource;
use App\Models\User;
use Carbon\Carbon;

class AdminDashboardController extends Controller
{
    public function dashboard()
    {
      $totalUsers = User::count();
        $totalVolunteers = Volunteer::count();
        $totalEventVolunteers = EventVolunteer::count();
        $totalVolunteerTasks = VolunteerTask::count();
        $totalFinancialSupports = FinancialSupport::count();
        $totalFundingOrganizations = FundingOrganization::count();
        $totalEmployedAvailableResources = EmployedAvailableResource::count();
        $latestVolunteers = Volunteer::with('person')->latest()->take(5)->get();
        $latestEventVolunteers = EventVolunteer::with(['volunteer.person', 'event'])->latest()->take(5)->get();

        // إحصائيات جديدة
        $activeEvents = Event::where('end_day', '>=', Carbon::now())->count(); // الفعاليات النشطة
      //  $totalVolunteerHours = VolunteerTask::sum('hours'); // إجمالي الساعات (افتراض وجود عمود hours)
        $totalParticipants = EventVolunteer::count();
        $participationRate = ($totalVolunteers > 0) ? ($totalParticipants / $totalVolunteers) * 100 : 0;

        return view('dashboard', compact(
            'totalUsers',
            'totalVolunteers',
            'totalEventVolunteers',
            'totalVolunteerTasks',
            'totalFinancialSupports',
            'totalFundingOrganizations',
            'totalEmployedAvailableResources',
            'latestVolunteers',
            'latestEventVolunteers',
            'activeEvents',
          
            'participationRate'
        ));
    }
    



    
}
