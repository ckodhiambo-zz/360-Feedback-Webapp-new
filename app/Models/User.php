<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;

//use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    protected $fillable = [
        'name',
        'email',
        'password',
        'photo',
        'phone',
        'position',
        'selectedCompany',
        'department_id'
    ];



    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function relationships()
    {
        return $this->hasManyThrough(Relationship::class,Nominee::class,'user_id','nominee_id','id','id');
    }

//    public function nominees()
//    {
//        return $this->hasMany(Nominee::class);
//    }

    public function companies():BelongsToMany
    {
        return $this->belongsToMany(Company::class);
    }

    public function departments():BelongsToMany
    {
        return $this->belongsToMany(Department::class);
    }

    public function surveys():BelongsToMany
    {
        return $this->belongsToMany(Survey::class);
    }

//    public function nominees():BelongsToMany
//    {
//        return $this->belongsToMany(Nominee::class);
//    }

    public function nominees():HasMany
    {
        return $this->hasMany(Nominee::class);
    }


}
