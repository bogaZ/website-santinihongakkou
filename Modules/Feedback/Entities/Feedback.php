<?php

namespace Modules\Feedback\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Feedback extends Model
{
    protected $fillable = ['name', 'email', 'subject', 'body', 'email_sent', 'error_message'];
}
