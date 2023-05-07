<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function course()
    {
        //Relacionamento 1:N inverso
        return $this->belongsTo(Course::class);
    }

    public function lessons()
    {
        //Relacionamento 1:N
        return $this->hasMany(Lesson::class);
    }
}
