<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lesson extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'lessons';
    protected $guarded = false;

    public function semester(){
        return $this->belongsTo(Semester::class, 'semester_id', 'id');
    }

    public function files(){
        return $this->hasMany(LessonFile::class, 'lesson_id', 'id');
    }
}
