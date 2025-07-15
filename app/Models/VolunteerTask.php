<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VolunteerTask extends Model
{
    use HasFactory;

   // protected $primaryKey = 'id';

    protected $fillable = ['id_volunteer', 'id_event', 'designation'];

    public function volunteer()
    {
        return $this->belongsTo(Volunteer::class, 'id_volunteer', 'id');
    }

    public function event()
    {
        return $this->belongsTo(Event::class, 'id_event', 'id');
    }
}