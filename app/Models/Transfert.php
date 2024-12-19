<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transfert extends Model
{
    use HasFactory;
    public function delegationTo()
    {
        return $this->belongsTo(Delegation::class,'delegation_to');
    }
    public function delegationFrom()
    {
        return $this->belongsTo(Delegation::class,'delegation_from');
    }
    public function equipements()
    {
        return $this->belongsTo(Equipement::class,'equipement_id');
    }
}
