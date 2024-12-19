<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loginstatus extends Model
{
    protected $table = 'login_status';
    use HasFactory;
    public function loginehistoriques()
    {
        return $this->hasMany(Loginhistorique::class);
    }
}
