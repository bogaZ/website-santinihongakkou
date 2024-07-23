<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Banner extends Model
{
    use HasFactory, HasTranslations;
    protected $fillable = [
        'image_desktop',
        'image_mobile',
        'title',
        'description',
        'button_label',
        'button_link',
    ];
    public $translatable = ['title', 'description', 'button_label', 'button_link'];
}