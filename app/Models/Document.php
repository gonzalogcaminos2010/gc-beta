<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $fillable = [
        'person_id',
        'vehicle_id',
        'document_type_id',
        'file_path',
        'expiration_date',
    ];

<<<<<<< HEAD
=======
    // Define the inverse relationship with person
>>>>>>> 657f32a (hola)
    public function person()
    {
        return $this->belongsTo(Person::class);
    }

<<<<<<< HEAD
    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }

=======
>>>>>>> 657f32a (hola)
    public function documentType()
    {
        return $this->belongsTo(DocumentType::class);
    }
}
