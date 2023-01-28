<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestResult extends Model
{
    use HasFactory;

    protected $table = 'test_results';
    protected $guarded = false;

    public function test(){
        return $this->belongsTo(Test::class, 'test_id', 'id');
    }
}
