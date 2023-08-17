<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class employee extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['name','email','address','image','city','state','country','dob','gender','password','password_confirmation'];

    function notes() {
        return $this->hasMany(Employee::class);
    }
}
