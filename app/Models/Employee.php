<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\DB;

class Employee extends Model
{
    use HasFactory;

    protected $table = "employees";

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'position',

    ];

    public static function getEmployee()
    {
        $employee = DB::table('employees')->select('id','first_name','last_name','email','position')->get()->toArray();
        return $employee;
    }

    public function companies():BelongsToMany
    {
        return $this->belongsToMany(Company::class);
    }

    public function departments():BelongsToMany
    {
        return $this->belongsToMany(Department::class);
    }


}
