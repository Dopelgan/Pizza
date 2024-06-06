<?php

namespace App\Http\Controllers;

use App\Helpers\Api\ApiPrepare;
use App\Helpers\Api\ApiResponses;
use App\Models\Category;
use App\Models\Item;
use App\Models\ItemVariant;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    use ApiResponses, ApiPrepare;

    public function index()
    {
        $items = Item::inRandomOrder()->limit(5)->get();

        return view('welcome', compact('items'));
    }
}
