<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    const COLOR = [
        'red', 'blue', 'green', 'purple'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password', 'color', 'role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $appends = ['initials', 'fullName'];

    public static function boot()
    {
        parent::boot();
        $colors = self::COLOR;
        static::creating(function ($model) use ($colors) {
            $model->color = $colors[rand(0, count($colors) - 1)];
        });
    }

    /**
     * Return the initials from the user first name and last name
     * 
     * @return string
     */
    public function getInitialsAttribute()
    {
        $first = ucfirst(substr($this->first_name, 0, 1));
        $last = ucfirst(substr($this->last_name, 0, 1));

        return $first . '' . $last;
    }

    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
