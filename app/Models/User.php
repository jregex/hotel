<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

// use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = ['id'];

    public function setJabatanAttribute($value)
    {
        $this->attributes['jabatan'] = ucfirst($value);
    }
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = ucfirst($value);
    }
    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
