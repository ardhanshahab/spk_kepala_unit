<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alternatif extends Model
{
    use HasFactory;

    protected $fillable = [
        'alternatif',
        'umur',
        'bobot_umur',
        'beratBadan',
        'bobot_beratBadan',
        'tinggiBadan',
        'bobot_tinggiBadan',
        'alergi',
        'bobot_alergi'
    ];
}
