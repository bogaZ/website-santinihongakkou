<?php

namespace Modules\AboutPage\Entities;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class AboutPage extends Model
{
    use HasTranslations;

    protected $fillable = [
        'section1_title',
        'section1_description',
        'section1_image',
        'section2_title',
        'section2_description',
        'section2_image',
        'updated_by',
        'banner_id',
    ];

    public $translatable = [
        'section1_title',
        'section1_description',
        'section2_title',
        'section2_description',
    ];

    public function updatedBy()
    {
        return $this->belongsTo(\App\Models\User::class, 'updated_by');
    }
    public function banner()
    {
        return $this->belongsTo(\App\Models\Banner::class);
    }

}
