<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ClassroomCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */

    public $collects = ClassroomResource::class;
    public function toArray(Request $request): array
    {
        $data = $this->collection->map(function ($model) {
            return [
                'data' => $model->collection,
                'id' => $model->id,
                'name' => $model->name,
                'code' => $model->code,
                'meta' => [
                    'section' => $model->sections,
                    'room' => $model->room,
                    'subject' => $model->subject,
                    'cover_image_url' => $model->cover_image_url,
                    'students_count' => $model->syudents_count ?? 0,
                    'theme' => $model->theme,
                ],
                'user' => [
                    'name' => $model->user?->name,
                ],
            ];
        });
        return [
            'data' => $this->collection,
        ];
    }
}
