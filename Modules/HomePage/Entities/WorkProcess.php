<?php

namespace Modules\HomePage\Entities;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WorkProcess extends Model
{
    use HasTranslations;

    protected $fillable = [
        'step1_title',
        'step1_description',
        'step1_icon',
        'step2_title',
        'step2_description',
        'step2_icon',
        'step3_title',
        'step3_description',
        'step3_icon',
        'home_page_id'
    ];

    public $translatable = [
        'step1_title',
        'step1_description',
        'step2_title',
        'step2_description',
        'step3_title',
        'step3_description',
    ];
}
