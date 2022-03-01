<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
// use App\Models\Item;
use App\Http\Resources\SpeakerResource;

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

        'details'       => $this->details,
        'title'         => $this->title,
        'date'          => $this->date,
        'time'          => $this->time,
        'speakers'      => SpeakerResource::collection($this->speakers),
        'created_at'    => (string) $this->created_at,
        'updated_at'    => (string) $this->updated_at,
        ];
    }
}
