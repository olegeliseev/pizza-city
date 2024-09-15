<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = [
            'пицца',
            'моцарелла',
            'сыр',
            'вегетарианская',
            'соус',
            'бекон',
            'курица',
            'огурцы',
            'помидоры',
            'картошка',
            'лук',
            'грибы',
            'ананасы',
        ];

        foreach ($tags as $tag) {
            Tag::factory()->create(['name' => $tag]);
        }
    }
}
