<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;


class Typeofcoverage extends Model
{
    protected $table = "type_of_coverages";
    use HasFactory;
    use SoftDeletes;

    public function beneficiers()
    {
        return $this->hasMany(Beneficier::class);
    }

    public static function boot() {
        parent::boot();
        self::deleting(function($typecoverage) { // before delete() method call this
             
            $typecoverage->deleted_id  =  Auth::user()->id;
            $typecoverage->save();
             // do the rest of the cleanup...
        });

    }
}