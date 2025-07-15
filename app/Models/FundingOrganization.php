<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FundingOrganization extends Model
{
    use HasFactory;

   // protected $primaryKey = 'id';

    protected $fillable = ['id_organization', 'id_support', 'funding_value'];

    public function organization()
    {
        return $this->belongsTo(Organization::class, 'id_organization', 'id');
    }

    public function financialSupport()
    {
        return $this->belongsTo(FinancialSupport::class, 'id_support', 'id');
    }
}