<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Typeofequipement extends Model
{
    protected $table = "type_of_equipements";
    use HasFactory;
    use SoftDeletes;

    public function equipements()
    {
        return $this->hasMany(Equipement::class);
    }

    public static function boot() {
        parent::boot();
        self::deleting(function($typeequipement) { // before delete() method call this
             
            $typeequipement->deleted_id  =  Auth::user()->id;
            $typeequipement->save();
             // do the rest of the cleanup...
        });
    }
}
