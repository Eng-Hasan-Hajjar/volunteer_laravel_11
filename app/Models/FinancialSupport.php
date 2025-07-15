<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinancialSupport extends Model
{
    use HasFactory;

   // protected $primaryKey = 'id_support';

    protected $fillable = ['id_organization', 'type_support', 'funding_value'];

    public function organization()
    {
        return $this->belongsTo(Organization::class, 'id_organization', 'id');
    }
}