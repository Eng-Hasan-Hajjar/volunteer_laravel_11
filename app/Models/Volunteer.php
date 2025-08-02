<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage; // Import the Storage facade

class Volunteer extends Model
{
    use HasFactory;

   // protected $primaryKey = 'id_volunteer';

    protected $fillable = ['id_person', 'image'];

    public function person()
    {
        return $this->belongsTo(Person::class, 'id_person', 'id');
    }

    public function volunteerSkills()
    {
        return $this->hasMany(VolunteerSkill::class, 'id_volunteer', 'id');
    }

    public function eventVolunteers()
    {
        return $this->hasMany(EventVolunteer::class, 'id_volunteer', 'id');
    }

    public function volunteerTasks()
    {
        return $this->hasMany(VolunteerTask::class, 'id_volunteer', 'id_volunteer');
    }


 public function getImageUrlAttribute()
    {
        return $this->image ? asset($this->image) : asset('images/default-avatar.png');
    }


}