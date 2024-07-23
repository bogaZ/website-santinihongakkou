<?php

namespace Modules\Feature\Entities;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Feature extends Model
{
    use HasTranslations;

    protected $fillable = [
        'title',
        'icon',
        'short_content',
        'content',
        'slug',
    ];

    public $translatable = ['title', 'short_content', 'content', 'slug'];
}
