<?php
namespace App\Http\Controllers;

use App\Models\Item;

class TestController extends Controller
{

    public function test(){
        return Item::with('category')->get();
    }

}
