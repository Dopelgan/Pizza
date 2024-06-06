<?php

namespace Tests\Other;

use App\Models\Client;
use App\Models\Courier;
use App\Models\Item;
use App\Models\Order;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class TestTest extends TestCase
{

    public function testTest(){

        $this->get('/test')->dump();

    }



}
