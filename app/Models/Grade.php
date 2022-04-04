<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;


class Grade extends Model
{
    use HasTranslations;

    protected $fillable = [
        'name', 'notes'
    ];

    public $timestamps = true;
    public $translatable = ['name'];

    public function classes()
    {
        return $this->hasMany(Classes::class);
    }


}
