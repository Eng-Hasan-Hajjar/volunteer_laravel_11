<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployedAvailableResource extends Model
{
    use HasFactory;

 //   protected $primaryKey = 'id_resources';

    protected $fillable = ['id_coordinator', 'type_resources', 'price_resources'];

    public function coordinator()
    {
        return $this->belongsTo(Person::class, 'id_coordinator', 'id');
    }
}