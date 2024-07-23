<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentFamily extends Model
{
    protected $fillable = ['prospective_student_id', 'relationship', 'name', 'age', 'occupation'];

    public function prospectiveStudent()
    {
        return $this->belongsTo(\App\Models\ProspectiveStudent::class, 'prospective_student_id');
    }
}
