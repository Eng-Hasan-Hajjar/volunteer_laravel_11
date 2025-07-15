<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    use HasFactory;

  //  protected $primaryKey = 'id_organization';

    protected $fillable = ['organization_name', 'address', 'time_of_creation'];

    public function financialSupports()
    {
        return $this->hasMany(FinancialSupport::class, 'id_organization');
    }

    public function fundingOrganizations()
    {
        return $this->hasMany(FundingOrganization::class, 'id_organization');
    }
}