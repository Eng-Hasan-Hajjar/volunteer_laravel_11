<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventVolunteer extends Model
{
    use HasFactory;

   // protected $primaryKey = 'id';

    protected $fillable = ['id_event', 'id_volunteer'];

    public function event()
    {
        return $this->belongsTo(Event::class, 'id_event', 'id');
    }

    public function volunteer()
    {
        return $this->belongsTo(Volunteer::class, 'id_volunteer', 'id');
    }
}