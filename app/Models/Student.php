<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'fname',
        'lname',
        'age',
        'address',
        'department',
        'yr_level',
        'adviser'
    ];

    // public function account()
    // {
    //     return $this->belongsTo('App\Models\Student',);
    // }
    public function account()
    {
        return $this->belongsTo(Account::class, 'user_id', 'user_id');
    }
}
