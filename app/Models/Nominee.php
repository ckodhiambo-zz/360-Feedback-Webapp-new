<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Nominee extends Model
{
    use HasFactory;

    protected $fillable = [
        'nominee_name'
    ];

//    public function user()
//    {
//        return $this->BelongsTo(User::class);
//    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    public function surveys():BelongsToMany
    {
        return $this->belongsToMany(Survey::class);
    }

}
