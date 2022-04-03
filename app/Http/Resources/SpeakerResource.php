<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\ItemResource;


class SpeakerResource extends JsonResource
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
            'id'                => $this->id,
            'fullname'          => $this->fullname,
            'title'             => $this->title,
            'qualifications'    => $this->qualifications,
            'topic_details'     => $this->topic_details,
            'item_id'           => $this->item_id,
            'topic_title'       => $this->item->title,
            'created_at'        => (string) $this->created_at,
            'updated_at'        => (string) $this->updated_at,
            ];
    }
}
