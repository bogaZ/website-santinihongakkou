<?php

namespace App\Models;

use Modules\Program\Entities\Program;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProspectiveStudent extends Model
{
    protected $fillable = [
        'full_name',
        'email',
        'phone',
        'birth_date',
        'address',
        'image',
        'program_id',
        'program_type_id',
        'gender',
        'number_of_siblings',
        'last_education',
        'place_of_birth',
        'identity_number',
        'japanese_language_proficiency_certificate',
        'order_of_siblings'
    ];
    protected $casts = [
        'birth_date' => 'datetime',
    ];
    public function studentEducations()
    {
        return $this->hasMany(StudentEducation::class);
    }
    public function studentFamilies()
    {
        return $this->hasMany(StudentFamily::class);
    }
    public function program()
    {
        return $this->belongsTo(Program::class);
    }
    public function programType()
    {
        return $this->belongsTo(ProgramType::class);
    }
}
