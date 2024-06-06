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

class ApiErrorsTest extends TestCase
{

    public function testErrors(){

        //Auth test
        $response = $this->post('/api/clients/profile/me');
        $response->dump();
        $response->assertJson(['status' => false, 'code' => 403]);

        //Validate test
        $response = $this->post('/api/clients/orders/create');
        $response->dump();
        $response->assertJson(['status' => false, 'code' => 422]);

        //Bind error
        $response = $this->post('/api/clients/basket/remove/{223232}');
        $response->dump();
        $response->assertJson(['status' => false, 'code' => 404]);

        //Api error
        $response = $this->post('/api/clients/auth/login', [
            'phone' => 'dick',
            'password' => 'dick'
        ]);
        $response->dump();
        $response->assertJson(['status' => false, 'code' => 422]);

    }

    public function testSuccess(){

        $response = $this->post('/api/clients/items/list');
        $response->assertJson(['status' => true]);

    }

}
