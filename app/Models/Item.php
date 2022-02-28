<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'details',
        'title',
        'date',
        'time'
    ];

        /**
         * Get the user that owns the Item
         *
         * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
         */
        public function event(): BelongsTo
        {
            return $this->belongsTo(Event::class, 'event_id');
            // return $this->belongsTo(Event::class, 'event_id', 'other_key');

        }
}
