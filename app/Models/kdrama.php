<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kdrama extends Model
{
    use HasFactory;
    protected $table = 'kdramas';
    protected $fillable = [
        'judul',
        'pengarang',
        'penerbit',
        'gambar'
    ];
}
