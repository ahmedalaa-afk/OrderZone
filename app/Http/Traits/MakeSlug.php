<?php

namespace App\Http\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

trait makeSlug
{
    public function slugable(Model $model, string $slug): string
    {
        $newSlug = Str::slug($slug);
        $originalSlug = $newSlug;

        $counter = random_int(1, 1000);

        while ($model->where('slug', $newSlug)->exists()) {
            $newSlug = "{$originalSlug}-" . $counter;
        }

        return $newSlug;
    }
}
