<?php

namespace Tests\Client;

use App\Models\Client;
use App\Models\Item;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AuthTest extends TestCase
{

    protected $phone = '79992341234';
    protected $password = 'password';

    public function testRegister()
    {

        Client::where('phone', $this->phone)->delete();

        $response = $this->post('/api/clients/auth/register', [
            'phone' => $this->phone,
            'password' => $this->password
        ]);

        $response->assertJson(['status' => true]);

    }

    public function testAuth(){

        $response = $this->post('/api/clients/auth/login', [
            'phone' => $this->phone,
            'password' => $this->password
        ]);

        $response->assertJson(['status' => true]);


        $response = $this->post('/api/clients/profile/me');
        $response->assertStatus(200);
        $response->assertJson(['status' => true]);

        $response->dump();

    }

}
