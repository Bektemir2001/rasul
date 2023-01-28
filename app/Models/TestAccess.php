<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestAccess extends Model
{
    use HasFactory;

    protected $table = 'test_accesses';
    protected $guarded = false;

    public function test(){
        return $this->belongsTo(Test::class, 'test_id');
    }
}
