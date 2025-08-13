<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
           
            RolesTableSeeder::class,
       
            
      
        ]);



        // Syrian Cities
        $syrianCities = [
            'دمشق', 'حلب', 'حمص', 'حماة', 'اللاذقية', 'دير الزور', 'الرقة', 'السويداء', 'إدلب', 'درعا'
        ];

        // Arabic Names (Common Syrian Names)
        $names = [
            'محمد', 'أحمد', 'علي', 'خالد', 'ياسر', 'فاطمة', 'زينب', 'أمينة', 'ليلى', 'سلمى'
        ];

        // Organizations in Syria
        $organizations = [
            'جمعية الإغاثة السورية', 'الصليب الأحمر السوري', 'مؤسسة التنمية المحلية', 'رابطة الشباب السوري'
        ];

        // Skills
        $skills = [
            'تنظيم الفعاليات', 'إدارة المشاريع', 'الإسعافات الأولية', 'التطوع البيئي'
        ];

        // Event Names (Relevant to Syrian Context)
        $eventNames = [
            'حملة تنظيف حدائق دمشق', 'مهرجان الثقافة السورية في حلب', 'يوم التطوع لإعادة الإعمار', 'ندوة الشباب في حمص'
        ];




        $names = ['محمد', 'أحمد', 'علي', 'فاطمة', 'خديجة', 'عائشة'];
        $nationalities = ['سورية', 'لبنانية', 'مصرية', 'أردنية'];
        $departments = ['الإدارة', 'التسويق', 'التنظيم', 'الدعم اللوجستي'];
        $jobTitles = ['مدير مشروع', 'منسق فعاليات', 'متطوع', 'محاسب'];

        $people = [];
        foreach (range(1, 10) as $index) {
            $name = $names[array_rand($names)];
            $secondName = $names[array_rand($names)] . ' ' . ['الخطيب', 'الحسن', 'الزعبي'][array_rand(['الخطيب', 'الحسن', 'الزعبي'])];
            $gender = ['ذكر', 'أنثى'][array_rand(['ذكر', 'أنثى'])];
            $people[] = [
                'name' => $name,
                'second_name' => $secondName,
                'gender' => $gender,
                'national_number' => 'SY' . str_pad(mt_rand(1000000, 9999999), 7, '0', STR_PAD_LEFT),
                'birth_date' => Carbon::now()->subYears(mt_rand(20, 50))->toDateString(),
                'email' => Str::slug($name) . mt_rand(1, 100) . '@example.com',
                'contact_number' => '+963' . mt_rand(900000000, 999999999), // Example Syrian number
                'job_title' => $jobTitles[array_rand($jobTitles)],
                'nationality' => $nationalities[array_rand($nationalities)],
                'availability_times' => '9:00 ص - 3:00 م، يوميًا', // Example availability
                'motivation' => 'الرغبة في مساعدة المجتمع', // Example motivation
                'is_active' => (bool)rand(0, 1), // Random true/false
                'department' => $departments[array_rand($departments)],
                'hiring_date' => Carbon::now()->subDays(mt_rand(0, 365))->toDateString(), // Random date in the past year
                'address' => 'دمشق، سوريا', // Example address
                'notes' => 'متعاون ونشط', // Example notes
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        \DB::table('people')->insert($people);


        // Seed Organizations
        $organizationsData = [];
        foreach ($organizations as $org) {
            $organizationsData[] = [
                'organization_name' => $org,
                'address' => $syrianCities[array_rand($syrianCities)] . ' - شارع المجد',
                'time_of_creation' => Carbon::now()->subYears(mt_rand(1, 10))->toDateTimeString(),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        DB::table('organizations')->insert($organizationsData);

        // Seed Skills
        $skillsData = [];
        foreach ($skills as $skill) {
            $skillsData[] = [
                'skill_name' => $skill,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        DB::table('skills')->insert($skillsData);

        // Seed Events (Assuming events table exists with id_coordinator)
        $eventsData = [];
        $coordinators = DB::table('people')->pluck('id')->all();
        foreach ($eventNames as $eventName) {
            $eventsData[] = [
                'event_name' => $eventName,
                'start_day' => Carbon::now()->addDays(mt_rand(1, 30))->toDateString(),
                'end_day' => Carbon::now()->addDays(mt_rand(31, 60))->toDateString(),
                'id_coordinator' => $coordinators[array_rand($coordinators)],
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        DB::table('events')->insert($eventsData);



    }
}
