<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'details',
    ];

     /**
     * Get all of the   images.
     */
    public function images()
    {
        return $this->morphMany(Image::class, 'parentable');
    }
}
