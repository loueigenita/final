<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    protected $fillable = [
        'fname',
        'lname',
        'address',
        'email',
        'phone_no',
        'type',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // public function students()
    // {
    //     return $this->hasMany(Student::class);
    // }
    public function students()
    {
        return $this->hasMany(Student::class, 'user_id', 'user_id');
    }
}
