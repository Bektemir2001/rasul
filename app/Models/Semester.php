<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Semester extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'semesters';
    protected $guarded = false;

    public function type(){
        return $this->belongsTo(Type::class, 'type_id', 'id');
    }
    public function lesson(){
        return $this->hasMany(Lesson::class, 'semester_id', 'id');
    }
}
