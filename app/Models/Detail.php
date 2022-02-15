<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    use HasFactory;

    protected $fillable = [
        'details',
        'phone_1',
        'phone_2',
        'phone_3',
        'email_1',
        'email_2',
        'email_3',
        'facebook',
        'linkedin',
        'youtube',
        'instagram'
    ];
}
