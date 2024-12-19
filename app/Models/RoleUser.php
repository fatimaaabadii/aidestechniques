<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model
{
    protected  $table = "role_user";
    protected $fillable = [
        'delegation_id',
    ];

    use HasFactory;



    public function users()
    {
        return $this->hasMany(User::class);
    }
}
