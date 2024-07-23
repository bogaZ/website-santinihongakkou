<?php

namespace Modules\ProgramPage\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Translatable\HasTranslations;

class ProgramPage extends Model
{
    use HasTranslations;
    protected $fillable = [
        'title',
        'description',
        'banner_id',
        'updated_by'
    ];

    protected $translatable = [
        'title',
        'description',
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
