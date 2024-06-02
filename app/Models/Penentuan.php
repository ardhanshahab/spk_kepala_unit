<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penentuan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'umur',
        'penentuan_umur',
        'beratBadan',
        'penentuan_beratBadan',
        'tinggiBadan',
        'penentuan_tinggiBadan',
        'alergi',
        'penentuan_alergi'
    ];
}
