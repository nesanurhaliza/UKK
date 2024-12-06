<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assessor extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'assessor_type',
        'description',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function standarKompetensi()
    {
        return $this->hasMany(StandarKompetensi::class);
    }
}
