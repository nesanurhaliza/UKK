<?php

namespace App\Models;

use App\Http\Controllers\standarController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Examination extends Model
{
    use HasFactory;

    protected $table = 'examinations'; // Nama tabel

    protected $guarded = [];


    public function student()
    {
        return $this->belongsTo(Student::class, );
    }


    public function assessor()
    {
        return $this->belongsTo(Assessor::class);
    }

    public function element()
    {
        return $this->belongsTo(CompetencyElement::class);
    }
    // Relasi ke competency_standard melalui competency_elements
    public function competencyStandard()
    {
        return $this->hasOneThrough(
            StandarKompetensi::class,
            CompetencyElement::class,
            'id', // Foreign key on competency_elements table
            'id', // Foreign key on competency_standard table
            'element_id', // Local key on examinations table
            'competency_id' // Local key on competency_elements table
        );
    }

public function standar()
{
    return $this->belongsTo(StandarKompetensi::class);
}

}
