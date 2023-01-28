<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    use HasFactory;

    protected $table = 'tests';
    protected $guarded = false;

    public function lesson(){
        return $this->belongsTo(Lesson::class, 'lesson_id');
    }
    public function question(){
        return $this->hasMany(TestQuestion::class, 'test_id');
    }
}
