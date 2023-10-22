<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'gender',
        'position',
        'dob',
    ];

    public function user(){
        return $this->hasOne(User::class, 'id');
    }
}
