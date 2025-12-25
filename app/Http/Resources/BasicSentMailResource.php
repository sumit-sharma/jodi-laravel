<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BasicSentMailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        if ($this->cid == $this->rno) {
            $id = $this->proposal;
            $text = $this->receiver->refname;
            $status = $this->receiver->status;
        } else {
            $id = $this->rno;
            $text = $this->sender->refname;
            $status = $this->sender->status;
        }
        return [
            'id'   => $id,
            'text' => $text,
            'status' => $status,
        ];
    }
}
