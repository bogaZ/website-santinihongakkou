<?php

namespace Modules\AppSetting\Entities;

use Illuminate\Database\Eloquent\Model;

class NavbarSectionProgram extends Model
{
    protected $fillable = [
        'navbar_section_id',
        'program_id',
    ];
}
