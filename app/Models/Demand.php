<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demand extends Model
{
    protected $fillable = ['status','status_delegue'];
    use HasFactory;
    public function delegations()
    {
        return $this->belongsTo(Delegation::class,'delegation_id');
    }
    public function equipements()
    {
        return $this->belongsTo(Equipement::class,'equipement_id');
    }
    public function beneficiers()
    {
        return $this->belongsTo(Beneficier::class,'beneficier_id');
    }
}
