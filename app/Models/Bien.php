<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bien extends Model
{
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
        // ajoute les autres champs nécessaires
    ];
}
