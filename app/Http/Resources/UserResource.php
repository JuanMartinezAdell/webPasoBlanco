<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);

        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'is_paid' => $this->is_paid,
            'ends_at' => $this->subscription('default')->ends_at->toDateTimeString(),
            'subscribed' => $this->subscribed('default'),
            'plan' => new Planresource($this->plan)
        ];
    }
}
