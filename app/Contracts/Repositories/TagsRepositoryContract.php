<?php

namespace App\Contracts\Repositories;

use App\Contracts\HasTagsContract;
use App\Models\Tag;

interface TagsRepositoryContract
{
    public function firstOrCreateByName(string $name): Tag;

    public function syncTags(HasTagsContract $model, array $tags): void;

    public function getModel(): Tag;

    public function deleteUnusedTags(): void;
}
