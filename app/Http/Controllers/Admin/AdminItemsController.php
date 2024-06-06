<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Api\ApiPrepare;
use App\Helpers\Api\ApiResponses;
use App\Helpers\ImageEditor\ImageEditor;
use App\Http\Controllers\Controller;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AdminItemsController extends Controller
{

    use ApiResponses, ApiPrepare;

    /**
     * Список товаров
     */
    public function list(Request $request) : array
    {

        $data = $request->validate([
            'page' => ['required', 'integer', 'min:1', 'max:99999']
        ]);

        $categories = Item::query()
            ->orderBy('id', 'asc')
            ->with('category')
            ->paginate(30, ['*'], 'page', $data['page']);

        return $this->paginateToJson($categories, 'items', function(Item $item){
            return $this->prepareItem($item) + [
                'category' => $this->prepareCategory($item->category)
            ];
        });

    }

    /**
     * Информация о товаре
     */
    public function get(Request $request, Item $item) : array
    {
        return $this->prepareItem($item);
    }

    /**
     * Добавить товар
     */
    public function add(Request $request) : array
    {

        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:4096'],
            'category_id' => ['required', 'integer', 'exists:categories,id'],
        ], [
            'category_id.exists' => 'Категория не найдена'
        ]);

        $item = Item::create([
            'name' => $data['name'],
            'category_id' => $data['category_id'],
            'description' => Arr::get($data, 'description', ''),
        ]);

        return $this->prepareItem($item);

    }

    /**
     * Редактировать товар
     */
    public function edit(Request $request, Item $item) : array
    {

        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:4096'],
        ]);

        $item->name = $data['name'];
        $item->description = Arr::get($data, 'description', '');
        $item->save();

        return $this->prepareItem($item);

    }

    /**
     * Удалить товар
     */
    public function remove(Request $request, Item $item) : string
    {

        DB::transaction(function() use ($item){
            $item->itemVariants()->delete();
            $item->delete();
        });

        return "OK";

    }

    /**
     * Активировать/деактивировать
     */
    public function changeStatus(Request $request, Item $item, int $status) : string
    {

        $item->is_available = (bool)$status;
        $item->save();

        return 'OK';

    }

    /**
     * Загрузить фото товару
     */
    public function uploadPicture(Request $request, Item $item) : array
    {

        $request->validate([
            'picture' => ['required', 'file', 'image', 'mimes:jpeg,png,jpg', 'max:10240', 'dimensions:min_width=100,min_height=100,max_width=10000,max_height=10000']
        ], [
            'picture.image' => 'Допустимы только изображения PNG, JPEG',
            'picture.mimes' => 'Допустимы только изображения PNG, JPEG',
            'picture.max' => 'Максимальный вес файла - 10МБ',
            'picture.dimensions' => 'Допустим размер от 100x100 до 10000х10000'
        ]);

        $picture = $request->file('picture');
        $picture = $picture->getPathname();
        $picture = ImageEditor::createFromPath($picture);

        if($picture->w > 500){
            $picture = $picture->resizeAutoByW(500);
        }

        if($picture->h > 500){
            $picture = $picture->resizeAutoByH(500);
        }

        $path = '/items/' . $item->id . '.png';

        $picture->saveToPNG(
            storage_path('app/public' . $path)
        );

        $item->picture = $path;
        $item->save();

        return $this->prepareItem($item);

    }

}
