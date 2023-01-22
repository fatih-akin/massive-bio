<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ExchangeRateResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
          'id'=> $this->id,
          'currency'=> $this->name,
          'rate'=> $this->rate,
          'date'=> $this->exchange_date,
          'created_at'=> $this->created_at,
        ];
    }
}
