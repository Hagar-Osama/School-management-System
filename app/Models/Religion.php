<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Religion extends Model
{
    use HasTranslations;
    
    protected $fillable = ['name'];

    public $translatable = ['name'];


}