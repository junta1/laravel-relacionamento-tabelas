<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'available'];

    public function modules()
    {
        //Relacionamento 1:N
        return $this->hasMany(Module::class);
    }
}