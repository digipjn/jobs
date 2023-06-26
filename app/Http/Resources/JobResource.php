<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class JobResource
 * @package App\Http\Resources
 */
class JobResource extends JsonResource
{
    use Timestamps;

    /**
     * @param Request $request
     * @return array
     */
    public function toArray(Request $request): array
    {
        return $this->withTimestamps($this->resource, [
            'id' => $this->resource->id,
            'title' => $this->resource->title,
            'description' => $this->resource->description,
        ]);
    }
}
