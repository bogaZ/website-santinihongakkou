<?php

namespace Modules\AppSetting\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AppSetting extends Model
{
    protected $fillable = [
        'app_name',
        'icon',
        'app_detail',
        'email',
        'email2',
        'email3',
        'phone',
        'facebook',
        'instagram',
        'linkedln',
        'tiktok',
        'youtube',
        'whatsapp',
        'address',
        'address2',
        'updated_by',
        'navbar_section_id',
    ];

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function navbarSection()
    {
        return $this->belongsTo(\Modules\AppSetting\Entities\NavbarSection::class);
    }

}