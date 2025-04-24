<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $fillable = ['city_name'];

    protected $table = 'cities';

    public function stores()
    {
        return $this->hasMany(Store::class);
    }

    public function addresses()
    {
        return $this->hasMany(Address::class);
    }
}

