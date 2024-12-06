<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\PrettyPrinter\Standard;

class Jurusan extends Model
{
    use HasFactory;

    protected $table = 'jurusans';

    // Tentukan kolom yang bisa diisi mass-assignment
    protected $fillable =
     [
        'nama_jurusan',
        'desc',
    ];
    public function standards()
    {
        return $this->hasMany(Standard::class);
    }
    public function students()
    {
        return $this->hasMany(Student::class, 'major_id');
    }


}
