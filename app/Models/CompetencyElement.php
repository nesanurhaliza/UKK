<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompetencyElement extends Model
{
    use HasFactory;

    protected $table = 'elements';

    // Kolom yang dapat diisi (mass assignable)
    protected $fillable = [
        'criteria',
        'competency_standard_id',

    ];

    public function standar()
    {
        return $this->belongsTo(StandarKompetensi::class, 'competency_standard_id' );
    }

}
