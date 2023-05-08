<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function preference()
    {
        //Relacionamento 1:1
        return $this->hasOne(Preference::class);
    }

    public function permissions()
    {
        //Relacionamento N:N
        return $this->belongsToMany(Permission::class, 'permission_user')
            //retornar valores da tabela pivot: permission_user
            ->withPivot('active', 'created_at');
    }

    public function image()
    {
        //Model + NameRelationship
        return $this->morphOne(Image::class, 'imageable');
    }

    public function tags()
    {
        //Model + NameRelationship
        return $this->morphToMany(Tag::class, 'taggable');
    }
}
