<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student;

class Result extends Model
{
    use HasFactory;
    protected $table = 'results';

    // Kolom-kolom yang bisa diisi secara mass-assignment
    protected $fillable = [
        'student_id',
        'exam_name',
        'final_score',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class); // Setiap result milik satu student
    }

    
}
