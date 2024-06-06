<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Api\ApiPrepare;
use App\Helpers\Api\ApiResponses;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminCategoriesController extends Controller
{

    use ApiResponses, ApiPrepare;

    /**
     * Список категорий
     */
    public function list(Request $request) : array
    {

        $data = $request->validate([
            'page' => ['required', 'integer', 'min:1', 'max:99999']
        ]);

        $categories = Category::query()
            ->orderBy('id', 'asc')
            ->paginate(30, ['*'], 'page', $data['page']);

        return $this->paginateToJson($categories, 'categories', function(Category $category){
            return $this->prepareCategory($category);
        });

    }

    /**
     * Информация по категории
     */
    public function get(Request $request, Category $category) : array
    {
        return $this->prepareCategory($category);
    }

    /**
     * Добавить категорию
     */
    public function add(Request $request) : array
    {

        $data = $request->validate([
            'name' => ['required', 'string', 'max:255']
        ], [
            'name.max' => 'Название слишком длинное'
        ]);

        $category = Category::create([
            'name' => $data['name']
        ]);

        return $this->prepareCategory($category);


    }

    /**
     * Редактировать категорию
     */
    public function edit(Request $request, Category $category) : array
    {

        $data = $request->validate([
            'name' => ['required', 'string', 'max:255']
        ]);

        $category->name = $data['name'];
        $category->save();

        return $this->prepareCategory($category);

    }

    /**
     * Удалить категорию
     */
    public function remove(Request $request, Category $category) : string
    {

        //Удаляем дочерние узлы, так как у нас SoftDeletes
        DB::transaction(function() use ($category){

            foreach($category->items as $item){

                $item->itemVariants()->delete();
                $item->delete();

            }

            $category->delete();

        });

        return "OK";

    }

}
