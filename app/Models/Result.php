<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;
//
//    protected $fillable =
//        [
//            'question_id','target_id', 'nomination_id'
//        ];

    protected $guarded = [];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function target()
    {
        return $this->belongsTo(Target::class);
    }

}
