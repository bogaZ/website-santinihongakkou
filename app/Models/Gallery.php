<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Gallery extends Model
{
    use HasFactory, HasTranslations;
    public $translatable = ['title', 'content', 'slug'];
    protected $fillable = ['title', 'image', 'content', 'link', 'slug'];
}