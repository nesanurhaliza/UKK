<?php

namespace App\Models;

use App\Http\Controllers\ExaminationController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = 'students';
    protected $fillable = [
        'nisn',
        'grade_level',
        'jurusan_id',
        'user_id',
    ];
    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class,'jurusan_id');
    }

    /**
     * Relasi ke tabel users.
     */public function user() {
    return $this->belongsTo(User::class);
}
    public function results()
    {
        return $this->hasMany(Result::class); // Asumsi hubungan one-to-many
    }
    public function standarKompetensi()
{
    return $this->hasMany(StandarKompetensi::class, 'student_id'); // Ubah 'student_id' sesuai kolom foreign key sebenarnya
}







}
