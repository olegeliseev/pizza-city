<?php

namespace Database\Seeders;

use App\Contracts\Services\ImagesServiceContract;
use App\Models\Banner;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(ImagesServiceContract $imagesService): void
    {
        foreach ($this->banners() as $banner) {

            if (!empty($banner['image'])) {
                $image = $imagesService->createImage(resource_path($banner['image']));
                $banner['image_id'] = $image->id;
            }
            unset($banner['image']);

            Banner::factory()->create($banner);
        }
    }

    public function banners(): array
    {
        return [
            [
                'title' => 'Акция 2 + 1',
                'description' => 'Третья пицца в подарок!',
                'link' => 'lorem-ipsum',
                'image' => 'assets/images/banners/banner1.jpg',
            ],
            [
                'title' => 'Акция 2 + 1',
                'description' => 'Третья пицца в подарок!',
                'link' => 'lorem-ipsum',
                'image' => 'assets/images/banners/banner2.jpg',
            ],
            [
                'title' => 'Акция 2 + 1',
                'description' => 'Третья пицца в подарок!',
                'link' => 'lorem-ipsum',
                'image' => 'assets/images/banners/banner3.jpg',
            ],
        ];
    }
}
