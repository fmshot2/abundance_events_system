<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

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

            'fullname'         => $this->fullname,
            'title'             => $this->title,
            'qualifications'     => $this->qualifications,
            'topic_details'       => $this->topic_details,
            'created_at'    => (string) $this->created_at,
            'updated_at'    => (string) $this->updated_at,
            ];
    }
}
