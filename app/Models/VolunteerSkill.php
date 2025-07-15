<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VolunteerSkill extends Model
{
    use HasFactory;


    protected $fillable = ['id_volunteer', 'id_skills', 'experience_period'];

    public function volunteer()
    {
        return $this->belongsTo(Volunteer::class, 'id_volunteer', 'id');
    }

    public function skill()
    {
        return $this->belongsTo(Skill::class, 'id_skills', 'id');
    }
}