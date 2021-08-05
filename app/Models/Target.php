<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Target extends Model
{
    use HasFactory;

    protected $fillable = [
        'rating_level', 'rating_value',
    ];

    public function surveys(): BelongsToMany
    {
        return $this->belongsToMany(Survey::class);
    }

    public function categories(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }


}
