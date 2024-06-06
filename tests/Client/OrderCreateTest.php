<?php

namespace Tests\Client;

use App\Models\Client;
use App\Models\Item;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class OrderCreateTest extends TestCase
{

    protected $phone = '79992341234';
    protected $password = 'password';

    public function testOrderGuestCreate(){
        $this->createOrder();
    }

    public function testOrderClientCreate(){

        $this->register();
        $this->createOrder();

        $response = $this->post('/api/clients/orders/list', [
            'page' => 1
        ]);
        $response->assertJson(['status' => true]);
        $response->dump();

    }


    public function register()
    {
        Client::where('phone', $this->phone)->delete();

        $response = $this->post('/api/clients/auth/register', [
            'phone' => $this->phone,
            'password' => $this->password
        ]);

        $response->assertJson(['status' => true]);
    }

    public function createOrder()
    {

        $items = Item::limit(2)->get();

        foreach($items as $item){

            $response = $this->post('/api/clients/basket/add/' . $item->id, [
                'quantity' => rand(1, 5)
            ]);

            $response->assertJson([
                'status' => true
            ]);

        }

        $response = $this->post('/api/clients/orders/create', [
            'phone' => '79996182354',
            'street' => 'test',
            'floor' => '2',
            'entrance' => '3',
            'house' => '4',
            'apartment' => '5'
        ]);

        $response->assertJson(['status' => true]);

        $response = $this->post('/api/clients/orders/get/' . $response->json('response.code') . '/' . $response->json('response.hash'));
        $response->dump();

    }
}
