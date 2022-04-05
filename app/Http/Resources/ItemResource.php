<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
// use App\Models\Item;
use App\Http\Resources\SpeakerResource;
use Carbon\Carbon;

class ItemResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
        'id'            => $this->id,
        'details'       => $this->details,
        'title'         => $this->title,
        'date'          => $this->date,
        // 'time'          => $this->time,
        'time_start'    => Carbon::parse($this->time_start)->format('h:m'),
        'time_end'      => Carbon::parse($this->time_end)->format('h:m'),
        'created_at'    => (string) $this->created_at,
        'updated_at'    => (string) $this->updated_at,
        'speaker'      => new SpeakerResource($this->speaker),
        ];
    }
}
