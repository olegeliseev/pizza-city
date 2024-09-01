<?php

namespace App\View\Components\Panels\Filter;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SortButton extends Component
{
    public string $nextValue;

    public function __construct(public readonly string $name, public readonly ?string $currentValue)
    {
        $this->nextValue = match ($this->currentValue) {
            'asc' => 'desc',
            'desc' => '',
            default => 'asc',
        };
    }

    public function render(): View|Closure|string
    {
        return view('components.panels.filter.sort-button');
    }

    public function showAscIcon(): bool
    {
        return $this->currentValue === 'asc';
    }

    public function showDescIcon(): bool
    {
        return $this->currentValue === 'desc';
    }
}
