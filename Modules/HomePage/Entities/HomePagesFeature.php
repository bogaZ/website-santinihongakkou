<?php

namespace Modules\HomePage\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HomePagesFeature extends Model
{
    use HasFactory;

    protected $fillable = [];
    
    protected static function newFactory()
    {
        return \Modules\HomePage\Database\factories\HomePagesFeatureFactory::new();
    }
}
