<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Disabilitie extends Model
{
    
    use HasFactory;
    use SoftDeletes;
    protected $table = "disabilities";

    public function delegations()
    {
        return $this->belongsTo(Delegation::class,'delegation_id');
    }

    public function beneficiers()
    {
        return $this->hasMany(Beneficier::class);
    }
    
    public static function boot() {
        parent::boot();
        self::deleting(function($disabilitie) { // before delete() method call this
             
            $disabilitie->deleted_id  =  Auth::user()->id;
            $disabilitie->save();
             // do the rest of the cleanup...
        });
    }
}



