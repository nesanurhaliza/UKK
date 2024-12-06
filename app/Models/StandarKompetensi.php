<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class StandarKompetensi extends Model
{
    use HasFactory;

    protected $table = 'standar_kompetensi';
    protected $fillable = [
        'unit_code',
        'unit_title',
        'unit_deskripsi',
        'jurusan_id',
        'assessor_id',
        'student_id'
    ];

    // Relasi ke jurusan
    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class);
    }
    public function assessor()
    {
        return $this->belongsTo(Assessor::class ,'assessor_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function competencyElements()
    {
        return $this->hasMany(CompetencyElement::class, 'competency_standard_id');
    }
    public function competencyStandard()
{
    return $this->belongsTo(StandarKompetensi::class, 'competency_standard_id');
}



}


