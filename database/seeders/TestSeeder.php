<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Item;
use App\Models\ItemVariant;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class TestSeeder extends Seeder
{

    protected function faker(): \Faker\Generator
    {
        return Faker::create('ru');
    }

    public function run()
    {

        $category = Category::create([
            'name' => $this->faker()->name
        ]);

        for($b = 0; $b < 10; $b++){

            DB::transaction(function() use ($category){

                $item = Item::create([
                    'name' => $this->faker()->name(),
                    'category_id' => $category->id
                ]);

                for($i = 0; $i < 5; $i++){

                    ItemVariant::create([
                        'item_id' => $item->id,
                        'name' => $this->faker()->name(),
                        'price' => $this->faker()->numberBetween(100, 1000)
                    ]);

                }

            });

        }

    }
}
