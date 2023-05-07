<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function users()
    {
        //Relacionamento N:N
        return $this->belongsToMany(User::class, 'permission_user');
    }
}
