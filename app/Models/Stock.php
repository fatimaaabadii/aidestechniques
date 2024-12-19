<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Stock extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['status','equipement_id'];
    public function delegations()
    {
        return $this->belongsTo(Delegation::class,'delegation_id');
    }
    public function equipements()
    {
        return $this->belongsTo(Equipement::class,'equipement_id');
    }
    public function regions()
    {
        return $this->belongsTo(Region::class,'region_id');
    }
    public static function boot() {
        parent::boot();
        self::deleting(function($stock) { // before delete() method call this
             
            $stock->deleted_id  =  Auth::user()->id;
            $stock->save();
             // do the rest of the cleanup...
        });
    }

}
