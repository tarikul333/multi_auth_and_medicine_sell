<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employeeSell extends Model
{
    use HasFactory;
    protected $table = 'employee_selles';

    public function user() 
    {
        return $this->belongsTo(User::class);
    }
    public function store() 
    {
        return $this->belongsToMany(Store::class);
    }
    public function medicine() 
    {
        return $this->belongsToMany(Medicine::class);
    }
}
