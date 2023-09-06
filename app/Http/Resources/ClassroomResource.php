<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ClassroomResource extends JsonResource
{

    // public function __construct(...$args)
    // {
    //     parent::__construct($args);
    //     ResourceCollection::withoutWrapping();


    // }
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $this->withoutWrapping();
        return [
            'name' => $this->name,
            'code' => $this->code,
            'meta' => [
                'section' => $this->sections,
                'room' => $this->room,
                'subject' => $this->subject,
                'students_count' => $this->syudents_count ?? 0,
            ],
            'user' => [
                'name' => $this->user?->name,
            ],
        ];
    }
}
