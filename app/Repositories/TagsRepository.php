<?php

namespace App\Repositories;

use App\Contracts\HasTagsContract;
use App\Contracts\Repositories\TagsRepositoryContract;
use App\Models\Tag;

class TagsRepository implements TagsRepositoryContract
{
    public function __construct(private readonly Tag $model)
    {
    }

    public function firstOrCreateByName(string $name): Tag
    {
        return $this->getModel()->firstOrCreate(['name' => $name]);
    }

    public function syncTags(HasTagsContract $model, array $tags): void
    {
        $model->tags()->sync($tags);
    }

    public function getModel(): Tag
    {
        return $this->model;
    }

    public function deleteUnusedTags(): void
    {
        $this
            ->getModel()
            ->whereDoesntHave('products')
            ->delete()
        ;
    }
}
