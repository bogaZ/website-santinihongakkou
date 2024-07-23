<?php

namespace Modules\Partnership\Entities;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Partnership extends Model
{
    use HasFactory, HasTranslations;
    public $translatable = ['title', 'content', 'slug'];
    protected $fillable = ['title', 'image', 'content', 'link', 'slug'];
}
