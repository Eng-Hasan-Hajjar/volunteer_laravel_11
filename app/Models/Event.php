<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

   

    protected $fillable = ['event_name', 'start_day', 'end_day', 'id_coordinator', 'main_image'];

    public function coordinator()
    {
        return $this->belongsTo(Person::class, 'id_coordinator', 'id');
    }

    public function eventVolunteers()
    {
        return $this->hasMany(EventVolunteer::class, 'id_event', 'id_event');
    }

    public function volunteerTasks()
    {
        return $this->hasMany(VolunteerTask::class, 'id_event', 'id_event');
    }
    public function galleryImages()
    {
        return $this->hasMany(EventGallery::class, 'event_id', 'id');
    }
}