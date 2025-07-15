<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;

   // protected $primaryKey = 'id_skills';

    protected $fillable = ['skill_name'];

    public function volunteerSkills()
    {
        return $this->hasMany(VolunteerSkill::class, 'id');
    }
}