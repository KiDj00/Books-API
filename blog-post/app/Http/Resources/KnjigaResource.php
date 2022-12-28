<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class KnjigaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public static $wrap = 'knjiga';
    public function toArray($request)
    {
        //return parent::toArray($request);
        return[
            'id'=> $this->resource->id,
            'naziv'=> $this->resource->naziv,
            'godina_izdanja'=> $this->resource->godina_izdanja,
            'opis'=> $this->resource->opis,
            'zanr'=>$this->resource->zanr_id,
            'user'=>new UserResource($this->resource->user),
            'autor'=>new AutorResource($this->resource->autor),



        ];
    }
}
