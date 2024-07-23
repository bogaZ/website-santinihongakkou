<?php

namespace Modules\AppSetting\Entities;

use Illuminate\Database\Eloquent\Model;

class NavbarSection extends Model
{
    protected $fillable = [
        'label_home',
        'label_about_us',
        'label_our_program',
        'label_our_contact',
        'label_btn_contact_us',
    ];

    // Relasi dengan NavbarProgram
    public function navbarSectionPrograms()
    {
        return $this->belongsToMany(\Modules\Program\Entities\Program::class, 'navbar_section_programs', 'navbar_section_id', 'program_id')->withPivot('id');
    }
}
