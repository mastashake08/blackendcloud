<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class User extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
          'id' => $this->id,
          'email' => $this->email,
          'subscribed' => $this->subscribed('main'),
          'trial' => $this->onGenericTrial(),
          'last4' => $this->card_last_four
        ];
    }
}
