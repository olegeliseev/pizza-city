<?php

namespace App\Contracts;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;

interface HasTagsContract
{
    public function tags(): BelongsToMany;
}
