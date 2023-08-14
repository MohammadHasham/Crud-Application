<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employee extends Model
{
    use HasFactory;

    protected $fillable = ['name','email','address','image','city','state','country','dob','gender','password','password_confirmation'];

    function notes() {
        return $this->hasMany(Employee::class);
    }
}
