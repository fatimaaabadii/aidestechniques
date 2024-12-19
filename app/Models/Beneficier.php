<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Beneficier extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function delegations()
    {
        return $this->belongsTo(Delegation::class,'delegation_id');
    }
    public function user()
    {
        return $this->belongsTo(user::class,'deleted_id');
    }
    public function disabilities()
    {
        return $this->belongsTo(Disabilitie::class,'disabilitie_id');
    }
    public function typeofconverages()
    {
        return $this->belongsTo(Typeofcoverage::class,'type_health_coverage');
    }
    public function equipements()
    {
        return $this->belongsTo(Equipement::class,'equipement_id');
    }

    public function demands()
    {
        return $this->hasMany(Demand::class);
    }

    public static function boot() {
        parent::boot();
        self::deleting(function($beneficier) { // before delete() method call this
             
            $beneficier->deleted_id  =  Auth::user()->id;
            $beneficier->save();
             // do the rest of the cleanup...
        });
    }
}
