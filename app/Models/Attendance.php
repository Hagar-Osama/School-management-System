<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $guarded = [];

    public function student()
    {
        $this->belongsTo(Student::class);
    }


}