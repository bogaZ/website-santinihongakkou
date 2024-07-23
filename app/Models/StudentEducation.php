<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentEducation extends Model
{
    protected $fillable = ['prospective_student_id', 'school_name', 'degree', 'graduation_year'];

    public function prospectiveStudent()
    {
        return $this->belongsTo(ProspectiveStudent::class, 'prospective_student_id');
    }
}
