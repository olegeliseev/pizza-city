<?php

namespace Database\Seeders;

use App\Contracts\Services\ImagesServiceContract;
use App\Models\Category;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(ImagesServiceContract $imagesService): void
    {
        /** @var Collection $tags */
        $tags = Tag::get();

        foreach ($this->products() as $product) {
            if (! empty($product['image'])) {
                $image =
                    $imagesService->createImage(resource_path($product['image']));
                $product['image_id'] = $image->id;
            }

            unset($product['image']);

            $productModel = Product::factory()->create($product);

            $productModel->tags()->attach($tags->random(rand(3, 6)));
        }
    }

    public function products(): array {
        return [
            [
                'name' => '4 сыра',
                'price' => 679,
                'image' => 'assets/images/products/pizza_4-cheese.png',
                'description' => 'Сыр моцарелла, сыр чеддер, сыр блю чиз, сыр пармезан, фирменный сливочный соус',
                'energy_value' => 265,
                'proteins' => 12.6,
                'fats' => 12.1,
                'carbohydrates' => 26.4,
                'new' => false,
                'hit' => true,
                'category_id' => 1,
            ],
            [
                'name' => 'Карбонара',
                'price' => 579,
                'image' => 'assets/images/products/pizza_carbonara.png',
                'description' => 'Бекон, сыр моцарелла, фирменный сливочный соус, сыр пармезан',
                'energy_value' => 265,
                'proteins' => 12.6,
                'fats' => 12.1,
                'carbohydrates' => 26.4,
                'new' => false,
                'hit' => true,
                'category_id' => 1,
            ],
            [
                'name' => 'Пепперони',
                'price' => 479,
                'image' => 'assets/images/products/pizza_pepperoni.png',
                'description' => 'Пикантная пепперони, увеличенная порция моцареллы, фирменный томатный соус',
                'energy_value' => 265,
                'proteins' => 12.6,
                'fats' => 12.1,
                'carbohydrates' => 26.4,
                'new' => false,
                'hit' => true,
                'category_id' => 1,
            ],
            [
                'name' => 'Четыре сезона',
                'price' => 789,
                'image' => 'assets/images/products/pizza_4-seasons.png',
                'description' => 'Увеличенная порция моцареллы, ветчина, пикантная пепперони, кубики брынзы, томаты',
                'energy_value' => 265,
                'proteins' => 12.6,
                'fats' => 12.1,
                'carbohydrates' => 26.4,
                'new' => false,
                'hit' => true,
                'category_id' => 1,
            ],
            [
                'name' => 'Капрезе',
                'price' => 859,
                'image' => 'assets/images/products/pizza_caprese.png',
                'description' => 'Моцарелла Буфалло в кисло сладком соусе на томатной основе, свежий шпинат и прованские травы.',
                'energy_value' => 265,
                'proteins' => 12.6,
                'fats' => 12.1,
                'carbohydrates' => 26.4,
                'new' => true,
                'hit' => false,
                'category_id' => 1,
            ],
            [
                'name' => 'Альфредо',
                'price' => 569,
                'image' => 'assets/images/products/pizza_alfredo.png',
                'description' => 'Курица, творожный сыр, фирменный сливочный соус, сыр моцарелла, кисло-сладкий соус',
                'energy_value' => 265,
                'proteins' => 12.6,
                'fats' => 12.1,
                'carbohydrates' => 26.4,
                'new' => true,
                'hit' => false,
                'category_id' => 1,
            ],
            [
                'name' => 'Чизбургер',
                'price' => 679,
                'image' => 'assets/images/products/pizza_cheeseburger.png',
                'description' => 'Говяжий фарш с соусом болоньезе, сыр моцарелла, огурцы маринованные, красный лук',
                'energy_value' => 265,
                'proteins' => 12.6,
                'fats' => 12.1,
                'carbohydrates' => 26.4,
                'new' => true,
                'hit' => false,
                'category_id' => 1,
            ],
            [
                'name' => 'Сицилийская',
                'price' => 579,
                'image' => 'assets/images/products/pizza_sicilian.png',
                'description' => 'Охотничьи колбаски, томаты, сыр моцарелла, пикантный соус сальса, маслины, прованские травы',
                'energy_value' => 265,
                'proteins' => 12.6,
                'fats' => 12.1,
                'carbohydrates' => 26.4,
                'new' => true,
                'hit' => false,
                'category_id' => 1,
            ],
            [
                'name' => 'Картофель по-деревенски',
                'price' => 189,
                'image' => 'assets/images/products/snack_country-style-potatoes.png',
                'description' => 'Сыр моцарелла, сыр чеддер, сыр блю чиз, сыр пармезан, фирменный сливочный соус',
                'energy_value' => 265,
                'proteins' => 12.6,
                'fats' => 12.1,
                'carbohydrates' => 26.4,
                'new' => false,
                'hit' => false,
                'category_id' => 2,
            ],
            [
                'name' => 'Куриные наггетсы',
                'price' => 179,
                'image' => 'assets/images/products/snack_chicken-nuggets.png',
                'description' => 'Сыр моцарелла, сыр чеддер, сыр блю чиз, сыр пармезан, фирменный сливочный соус',
                'energy_value' => 265,
                'proteins' => 12.6,
                'fats' => 12.1,
                'carbohydrates' => 26.4,
                'new' => false,
                'hit' => false,
                'category_id' => 2,
            ],
            [
                'name' => 'Evervess Cola',
                'price' => 109,
                'image' => 'assets/images/products/drink_evervess-cola.png',
                'description' => 'Сыр моцарелла, сыр чеддер, сыр блю чиз, сыр пармезан, фирменный сливочный соус',
                'energy_value' => 265,
                'proteins' => 12.6,
                'fats' => 12.1,
                'carbohydrates' => 26.4,
                'new' => false,
                'hit' => false,
                'category_id' => 3,
            ],
            [
                'name' => 'Чизкейк',
                'price' => 189,
                'image' => 'assets/images/products/dessert_cheesecake.png',
                'description' => 'Сыр моцарелла, сыр чеддер, сыр блю чиз, сыр пармезан, фирменный сливочный соус',
                'energy_value' => 265,
                'proteins' => 12.6,
                'fats' => 12.1,
                'carbohydrates' => 26.4,
                'new' => false,
                'hit' => false,
                'category_id' => 4,
            ],
        ];
    }
}
