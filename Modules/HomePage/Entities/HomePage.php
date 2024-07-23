<?php

namespace Modules\HomePage\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Translatable\HasTranslations;

class HomePage extends Model
{
    use HasTranslations;
    protected $fillable = [
        'section1_title',
        'section1_description',
        'section2_title',
        'section2_btn_label',
        'section2_description',
        'section3_title',
        'section3_btn_label',
        'section3_description',
        'section4_title',
        'section4_description',
        'section5_title',
        'section5_description',
        'section6_title',
        'section6_description',
        'section7_title',
        'section7_description',
        'banner_id',
        'updated_by'
    ];

    public $translatable = [
        'section1_title',
        'section1_description',
        'section2_title',
        'section2_btn_label',
        'section2_description',
        'section3_title',
        'section3_btn_label',
        'section3_description',
        'section4_title',
        'section4_description',
        'section5_title',
        'section5_description',
        'section6_title',
        'section6_description',
        'section7_title',
        'section7_description',
    ];
    public function updatedBy()
    {
        return $this->belongsTo(\App\Models\User::class, 'updated_by');
    }
    public function banner()
    {
        return $this->belongsTo(\App\Models\Banner::class);
    }
    public function features()
    {
        return $this->belongsToMany(\Modules\Feature\Entities\Feature::class, 'home_pages_features');
    }
    public function programs()
    {
        return $this->belongsToMany(\Modules\Program\Entities\Program::class);
    }
    public function workProcess()
    {
        return $this->hasOne(\Modules\HomePage\Entities\WorkProcess::class);
    }
}
