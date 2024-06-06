<?php

namespace App\Http\Controllers\Client;

use App\Helpers\Api\ApiPrepare;
use App\Helpers\Api\ApiResponses;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Item;
use App\Models\ItemVariant;
use Illuminate\Http\Request;

class ClientItemsController extends Controller
{

    use ApiResponses, ApiPrepare;

    /**
     * Каталог (категории и их товары))
     */
    public function list(Request $request)
    {

        $catalog = Category::query()
            ->with('items')
            ->with('items.itemVariants')
            ->get();

        return $catalog->map(function(Category $category){

            return [
                'category' => $this->prepareCategory($category),
                'items' => $category->items->map(function(Item $item){

                    $additional = [
                        'item_variants' => $item->itemVariants->map(function(ItemVariant $itemVariant) {
                            return $this->prepareItemVariant($itemVariant);
                        })
                    ];

                    return $this->prepareItem($item) + $additional;

                })
            ];

        });


    }

    /**
     * Информация о конкретном товаре
     */
    public function get(Request $request, Item $item) : array
    {

        return [
            'item' => $this->prepareItem($item),
            'category' => $this->prepareCategory($item->category),
            'variants' => $item->itemVariants->map(function(ItemVariant $itemVariant){
                return $this->prepareItemVariant($itemVariant);
            })
        ];


    }

}
