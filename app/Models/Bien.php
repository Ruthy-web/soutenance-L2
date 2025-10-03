<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bien extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',
        'description',
        'localisation',
        'latitude',
        'longitude',
        'surface',
        'chambres',
        'salles_bain',
        'prix',
        'type',
        'image_path',
        'document_legal',
        'user_id',
    ];
}
