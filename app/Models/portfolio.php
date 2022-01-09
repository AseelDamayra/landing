<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class portfolio extends Model
{
    use HasFactory;

    //laravel translatable
    use HasTranslations;
    public $translatable = ['name'];

    protected $fillable=['name','description'];
}
