<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delegation extends Model
{
    use HasFactory;

    public function disabilities()
    {
        return $this->hasMany(Disabilitie::class);
    }

    public function beneficiers()
    {
        return $this->hasMany(Beneficier::class);
    }
    public function demands()
    {
        return $this->hasMany(Demand::class);
    }
    public function stocks()
    {
        return $this->hasMany(Stock::class);
    }

    public function region()
    {
        return $this->belongsTo(Region::class, 'region_id');
    }
    public function tranferts()
    {
        return $this->hasMany(Transfert::class);
    }
}
