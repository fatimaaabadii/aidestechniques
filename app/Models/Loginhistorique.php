<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loginhistorique extends Model
{
    protected $table = 'login_historique';
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function loginstatus()
    {
        return $this->belongsTo(Loginstatus::class , 'login_status_id');
    }
    
}
