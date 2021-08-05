<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'question_name',
    ];
    protected $casts = [
        'question_name' => 'array'
    ];

    protected $guarded = [];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function surveys(): BelongsTo
    {
        return $this->belongsTo(Survey::class);
    }

    public function rating(): HasMany
    {
        return $this->hasMany(Result::class);
    }

    public function targets(): HasManyThrough
    {
        return $this->hasManyThrough(Target::class, Result::class);
    }
}
