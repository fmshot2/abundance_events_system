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
        'time_start',
        'time_end',
        'event_id',
        'speaker_id'
    ];

        /**
         * Get the user that owns the Item
         *
         * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
         */
        public function event()
        {
            return $this->belongsTo(Event::class, 'event_id');
            // return $this->belongsTo(Event::class, 'event_id', 'other_key');

        }

        /**
     * Get the listings for the user.
     */
    public function speaker()
    {
        return $this->belongsTo(Speaker::class, 'speaker_id');
    }
}
