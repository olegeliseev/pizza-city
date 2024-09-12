<?php

namespace App\DTO;

class MenuFilterDTO
{
    private ?string $search = null;
    private ?string $order_popularity = null;
    private ?string $order_price = null;
    private ?string $order_name = null;
    private ?string $categorySlug = null;

    public function getSearch(): ?string
    {
        return $this->search;
    }

    public function setSearch(?string $search): static
    {
        $this->search = $search;

        return $this;
    }

    public function getOrderPopularity(): ?string
    {
        return $this->order_popularity;
    }

    public function setOrderPopularity(?string $order_popularity): static
    {
        if ($order_popularity !== null) {
            $order_popularity = $order_popularity === 'desc' ? 'desc' : 'asc';
        }

        $this->order_popularity = $order_popularity;

        return $this;
    }

    public function getOrderPrice(): ?string
    {
        return $this->order_price;
    }

    public function setOrderPrice(?string $order_price): static
    {
        if ($order_price !== null) {
            $order_price = $order_price === 'desc' ? 'desc' : 'asc';
        }

        $this->order_price = $order_price;

        return $this;
    }

    public function getOrderName(): ?string
    {
        return $this->order_name;
    }

    public function setOrderName(?string $order_name): static
    {
        if ($order_name !== null) {
            $order_name = $order_name === 'desc' ? 'desc' : 'asc';
        }

        $this->order_name = $order_name;

        return $this;
    }

    public function getCategorySlug(): ?string
    {
        return $this->categorySlug;
    }

    public function setCategorySlug(?string $categorySlug): static
    {
        $this->categorySlug = $categorySlug;

        return $this;
    }
}
