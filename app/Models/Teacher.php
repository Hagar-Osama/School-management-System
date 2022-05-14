<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Teacher extends Model
{
    use HasTranslations;
    protected $guarded = [];

    public $translatable = ['name'];


    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }

    public function specialization()
    {
        return $this->belongsTo(Specialization::class);
    }

    public function sections()
    {
        return $this->belongsToMany(Section::class);
    }

    public function subject()
    {
        return $this->hasOne(Subject::class);
    }
}
