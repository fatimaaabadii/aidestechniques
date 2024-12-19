<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Equipement extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function typeofequipements()
    {
        return $this->belongsTo(Typeofequipement::class,'type_id');
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

    public static function boot() {
        parent::boot();
        self::deleting(function($equipement) { // before delete() method call this
             
            $equipement->deleted_id  =  Auth::user()->id;
            $equipement->save();
             // do the rest of the cleanup...
        });
    }
}
