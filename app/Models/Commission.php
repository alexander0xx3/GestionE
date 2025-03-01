<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commission extends Model
{
    use HasFactory;

    protected $fillable = ['aula', 'horario', 'course_id', 'professor_id'];

    public function mainProfessor()
{
    return $this->belongsTo(Professor::class, 'professor_id');
}

    

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}

