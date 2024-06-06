<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;
    protected $fillable = [
            'nama',
            'alamat',
            'no_hp',
            'email',
            'jabatan',
    ];

    public function penilaian()
    {
        return $this->hasMany(Penilaian::class);
    }
}
