<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;



    protected $fillable = [
        'title',
        'details',
        'date',
        'time_start',
        'time_end'
    ];

    // protected $casts = [
    //     'time_start' => 'hh:mm:ss',
    //     'time_end' => 'hh:mm:ss'
    // ];
    /**
     * Get the items for the user.
     */
    public function items()
    {
        return $this->hasMany(Item::class);
    }

    /**
     * The users that belong to the event.
     */
    public function users()
    {
        return $this->belongsToMany(User::class,
        'events_users',
        'event_id',
        'user_id');
    }

    // /**
    //  * user_has_rated
    //  *
    //  * @param  mixed $user_id
    //  * @return void
    //  */
    // public function user_has_rated($user_id = null)
    // {
    //     // find user's favourite for this listing
    //     $rating = $this->ratings->where('user_id', $user_id)->first();

    //     // if rating found return true (user has rated the ad)
    //     if ($rating) return $rating;

    //     // no rating found (user has not rated this ad)
    //     return null;
    // }

    /**
     * Get the user readable date.
     *
     * @return string
     */
    public function getReadableDateAttribute()
    {
        // set human readable date
        return $this->created_at->diffForHumans();
    }

    /**
     * Get all of the event's images.
     */
    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
