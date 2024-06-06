<?php

namespace App\Helpers\Api;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;

trait ApiResponses
{

    public function paginateToJson(LengthAwarePaginator $paginator, string $key, callable $prepare) : array
    {

        $items = $paginator->items();
        $items = collect($items);
        $items = $items->map($prepare);

        return [
            $key => $items,
            'pagination' => [
                'current' => $paginator->currentPage(),
                'last' => $paginator->lastPage(),
                'total' => $paginator->total()
            ]
        ];

    }
}
