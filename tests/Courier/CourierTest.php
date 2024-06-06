<?php

namespace Tests\Courier;

use App\Models\Client;
use App\Models\Courier;
use App\Models\Item;
use App\Models\Order;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class CourierTest extends TestCase
{

    protected $login = 'test';
    protected $password = 'test';

    public function createOrder() : array
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

        return $response->json('response');

    }

    public function testOrder(){

        Courier::where('login', $this->login)->delete();

        Courier::create([
            'login' => $this->login,
            'first_name' => 'test',
            'second_name' => 'test',
            'password' => Hash::make($this->password)
        ]);

        $response = $this->post('/api/couriers/auth/login', [
            'login' => $this->login,
            'password' => $this->password
        ]);

        $response->assertJson(['status' => true]);

        $response = $this->post('/api/couriers/profile/me');
        $response->assertStatus(200);
        $response->assertJson(['status' => true]);

        $order = $this->createOrder();
        $order = Order::findByCode($order['code']);

        $order->status_courier = Order::COURIER_STATUS_SEARCH;
        $order->save();

        $response = $this->post('/api/couriers/orders/get-available', ['page' => 1]);
        $response->dump();
        $response->assertJson(['status' => true]);

        $response = $this->post('/api/couriers/orders/accept/' . $order->id);
        $response->dump();
        $response->assertJson(['status' => true]);

        $response = $this->post('/api/couriers/orders/get-active');
        $response->assertJson(['status' => true]);
        $response->dump();

    }

}
