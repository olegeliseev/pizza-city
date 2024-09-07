<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach($this->categoriesSlugs($this->categories()) as $category) {
            Category::factory()->create($category);
        }
    }

    public function categories(): array
    {
        return [
            ['name' => 'Пиццы'],
            ['name' => 'Закуски'],
            ['name' => 'Напитки'],
            ['name' => 'Дессерты'],
        ];
    }

    public function categoriesSlugs(array $categories): array
    {
        array_walk($categories, function (&$category) {
            $category['slug'] = Str::slug($category['name']);
        });

        return $categories;
    }
}
