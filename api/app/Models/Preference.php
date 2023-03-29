<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Preference extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'notify_emails',
        'notify',
        'background_color'
    ];

    public function user()
    {
        //Relacionamento 1:1 inverso
        return $this->belongsTo(User::class);
    }
}
