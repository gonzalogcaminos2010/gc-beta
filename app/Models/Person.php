<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'dni',
        'cuil',
        'employment_type',
        'phone',
        'email',
        'birth_date',
        'hire_date',
        'address',
        'city',
        'state',
        'country',
        'approved'
    ];

    const EMPLOYMENT_TYPES = [
        'full_time' => 'Full Time',
        'part_time' => 'Part Time',
        'contract' => 'Contract'
    ];
<<<<<<< HEAD
=======

     // Define the relationship with documents
     public function documents()
     {
         return $this->hasMany(Document::class);
     }
>>>>>>> 657f32a (hola)
}
