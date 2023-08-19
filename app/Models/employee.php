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

    public function setNameAttribute($value) {
        $this->attributes['name'] = ucwords($value);
    }

    public function setEmailAttribute($value) {
        $this->attributes['email'] = strtolower($value);
    }

    public function setAddressAttribute($value) {
        $this->attributes['address'] = ucwords($value);
    }

    public function setCityAttribute($value) {
        $this->attributes['city'] = ucwords($value);
    }

    public function setStateAttribute($value) {
        $this->attributes['state'] = ucwords($value);
    }

    public function setCountryAttribute($value) {
        $this->attributes['country'] = ucwords($value);
    }
}

