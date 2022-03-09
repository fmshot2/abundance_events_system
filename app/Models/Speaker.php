<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Speaker extends Model
{
    use HasFactory;

    protected $fillable = [
        'fullname',
        'title',
        'qualifications',
        'topic_details'
    ];

      /**
         * Get the item that owns the Speaker
         *
         * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
         */
        public function item(): BelongsTo
        {
            return $this->belongsTo(Item::class, 'item_id');
            // return $this->belongsTo(Event::class, 'event_id', 'other_key');

        }
}
