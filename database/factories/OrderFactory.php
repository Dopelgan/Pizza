<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class OrderFactory extends Factory
{

    protected $model = Order::class;

    public function definition() : array
    {
        return [];
    }

    public function generateCode() : self
    {

        do{

            $code = Str::uuid();
            $code = mb_substr($code, 0, 6);
            $code = mb_strtoupper($code);

        }while($this->model::findByCode($code));

        return $this->state(['code' => $code]);

    }

    public function generateHash() : self
    {
        return $this->state([
            'hash' => Str::uuid()
        ]);
    }

    public function setAmount(int $amount) : self
    {
        return $this->state(['amount' => $amount]);
    }

    public function setReadyTime(int $minutes) : self
    {
        return $this->state([
           'ready_at' => now()->addMinutes($minutes)
        ]);
    }

    public function setPhone(string $phone) : self
    {
        return $this->state(['phone' => $phone]);
    }

    public function setStreet(string $street) : self
    {
        return $this->state(['street' => $street]);
    }

    public function setFloor(string $floor) : self
    {
        return $this->state(['floor' => $floor]);
    }

    public function setEntrance(string $entrance) : self
    {
        return $this->state(['entrance' => $entrance]);
    }

    public function setHouse(string $house) : self
    {
        return $this->state(['house' => $house]);
    }

    public function setApartment(string $apartment) : self
    {
        return $this->state(['apartment' => $apartment]);
    }

    public function setComment(string $comment) : self
    {
        return $this->state(['comment' => $comment]);
    }

}
