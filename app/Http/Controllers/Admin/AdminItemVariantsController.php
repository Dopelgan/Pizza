<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Api\ApiError;
use App\Helpers\Api\ApiPrepare;
use App\Helpers\Api\ApiResponses;
use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\ItemVariant;
use Illuminate\Http\Request;

class AdminItemVariantsController extends Controller
{

    use ApiResponses, ApiPrepare;

    /**
     * Список вариантов
     */
    public function list(Request $request) : array
    {

        $data = $request->validate([
            'item_id' => ['required', 'integer', 'exists:items,id'],
            'page' => ['required', 'integer', 'min:1', 'max:99999']
        ], [
            'item_id.exists' => 'Товар не найден'
        ]);

        $itemVariants = ItemVariant::query()
            ->where('item_id', $data['item_id'])
            ->orderBy('id', 'asc')
            ->paginate(30, ['*'], 'page', $data['page']);

        return $this->paginateToJson($itemVariants, 'item_variants', function(ItemVariant $itemVariant){
            return $this->prepareItemVariant($itemVariant);
        });

    }

    /**
     * Добавить вариант
     */
    public function add(Request $request) : array
    {

        $data = $request->validate([
            'item_id' => ['required', 'integer', 'exists:items,id'],
            'name' => ['required', 'string', 'max:255'],
            'price' => ['required', 'integer', 'min:1', 'max:99999']
        ], [
            'item_id.exists' => 'Товар не найден'
        ]);

        $item = ItemVariant::create([
            'name' => $data['name'],
            'price' => $data['price'],
            'item_id' => $data['item_id']
        ]);

        return $this->prepareItem($item);

    }

    /**
     * Редактировать вариант
     */
    public function edit(Request $request, ItemVariant $itemVariant) : array
    {

        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'price' => ['required', 'integer', 'min:1', 'max:99999']
        ]);

        $itemVariant->name = $data['name'];
        $itemVariant->price = $data['price'];
        $itemVariant->save();

        return $this->prepareItemVariant($itemVariant);

    }

    /**
     * Удалить вариант
     */
    public function remove(Request $request, ItemVariant $itemVariant) : string
    {

        $itemVariant->delete();

        return 'OK';

    }

}
