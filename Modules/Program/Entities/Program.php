<?php

namespace Modules\Program\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Program extends Model
{
    use HasTranslations;

    protected $fillable = [
        'title',
        'image',
        'short_content',
        'content',
        'slug',
    ];

    public $translatable = ['title', 'short_content', 'content', 'slug'];

    public function userCreatedBy()
    {
        return $this->hasOne(User::class, 'id', 'created_by');
    }
    public function userUpdatedBy()
    {
        return $this->hasOne(User::class, 'id', 'updated_by');
    }
}
