<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'second_name', 'national_number', 'birth_date', 'email', 'gender'];

    public function volunteer()
    {
        return $this->hasOne(Volunteer::class, 'id_person', 'id');
    }

    public function events()
    {
        return $this->hasMany(Event::class, 'id_coordinator', 'id_person');
    }

    public function resources()
    {
        return $this->hasMany(EmployedAvailableResource::class, 'id_coordinator', 'id_person');
    }
}