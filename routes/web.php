<?php
use App\Http\Controllers\VolunteerController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

use App\Http\Controllers\RoleController;

use App\Http\Controllers\AdminDashboardController;

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
require __DIR__.'/auth.php';
 // روابط التحكم بالمستخدمين 
Route::get('/users', [UserController::class, 'index'])->name('users.index'); // عرض قائمة المستخدمين
Route::get('/users/create', [UserController::class, 'create'])->name('users.create'); // إضافة مستخدم جديد
Route::post('/users', [UserController::class, 'store'])->name('users.store'); // تخزين مستخدم جديد
Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show'); // عرض تفاصيل مستخدم معين
Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit'); // تعديل مستخدم
Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update'); // تحديث بيانات المستخدم
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy'); // حذف مستخدم
//Route::match(['get', 'post'], '/users/{user}/assign-role', [UserController::class, 'assignRole'])->name('user.assign.role');
Route::post('/users/assign-role', [UserController::class, 'assignRole'])->name('user.assign.role');
//Route::post('/users/{user}/assign-role', [UserController::class, 'assignRole'])->name('user.assign.role');
Route::delete('/users/{user}/remove-role/{role}', [UserController::class, 'removeRole'])->name('user.remove.role');
Route::middleware(['auth'])->group(function () {
    Route::resource('roles', RoleController::class);
    
});
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'dashboard'])->name('dashboard');
});
Route::get('admin-page',function(){
    return view('admin.index');
});
Route::get('template',function(){
    return view('website.index');
});
/**************************************************   website   */

Route::get('/', [VolunteerController::class, 'index_web'])->name('indexproperty'); 



Route::get('about-web',function(){
    return view('website.pages.about');
})->name('about');




use App\Http\Controllers\SkillController;
Route::resource('skills', SkillController::class);

use App\Http\Controllers\OrganizationController;
Route::resource('organizations', OrganizationController::class);
Route::get('/web_organizations',[ OrganizationController::class,'index_web'])->name('web_organizations');
Route::get('/web_organizations_single/{organization}',[ OrganizationController::class,'index_web_single'])->name('web_organizations_single');
use App\Http\Controllers\VolunteerSkillController;
Route::resource('volunteer-skills', VolunteerSkillController::class);


Route::resource('volunteers', VolunteerController::class);
Route::get('/web_volunteers',[ VolunteerController::class,'index_web'])->name('web_volunteers');
Route::get('/web_volunteers_single/{volunteer}',[ VolunteerController::class,'index_web_single'])->name('web_volunteers_single');



use App\Http\Controllers\PersonController;
Route::resource('people', PersonController::class);



use App\Http\Controllers\EventController;
Route::resource('events', EventController::class);


use App\Http\Controllers\EventVolunteerController;
Route::resource('event-volunteers', EventVolunteerController::class);

use App\Http\Controllers\VolunteerTaskController;
Route::resource('volunteer-tasks', VolunteerTaskController::class);

use App\Http\Controllers\FinancialSupportController;
Route::resource('financial-supports', FinancialSupportController::class);


use App\Http\Controllers\FundingOrganizationController;
Route::resource('funding-organizations', FundingOrganizationController::class);


use App\Http\Controllers\EmployedAvailableResourceController;
Route::resource('employed-available-resources', EmployedAvailableResourceController::class);

