<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    use HasFactory;

    protected $fillable = [
        'karyawan_id',
        'C1',
        'C2',
        'C3',
        'C4',
        'C5',
    ];

}
