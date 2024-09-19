<?php

namespace App\Contracts\Services;

interface ProductRemoverServiceContract
{
    public function delete(int $id): void;
}
