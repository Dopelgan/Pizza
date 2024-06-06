<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Api\ApiPrepare;
use App\Helpers\Api\ApiResponses;
use App\Http\Controllers\Controller;
use App\Models\Courier;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminCouriersController extends Controller
{

    use ApiResponses, ApiPrepare;

    /**
     * Список курьеров
     */
    public function list(Request $request) : array
    {

        $data = $request->validate([
            'page' => ['required', 'integer', 'min:1', 'max:99999']
        ]);

        $couriers = Courier::query()
            ->orderBy('id', 'asc')
            ->paginate(30, ['*'], 'page', $data['page']);

        return $this->paginateToJson($couriers, 'couriers', function(Courier $courier){
            return $this->prepareCourier($courier);
        });

    }

    /**
     * Информация о курьере
     */
    public function get(Request $request, Courier $courier) : array
    {
        $this->prepareCourier($courier);
    }

    /**
     * Добавить нового курьера
     */
    public function add(Request $request) : array
    {

        $data = $request->validate([
            'login' => ['required', 'string', 'max:255', 'unique:couriers,login'],
            'first_name' => ['required', 'string', 'max:255'],
            'second_name' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'max:255']
        ], [
            'login.max' => 'Логин слишком длинный',
            'login.unique' => 'Такой логин уже зарегистрирован',
            'first_name.max' => 'Имя слишком длинное',
            'second_name.max' => 'Фамилия слишком длинная',
            'password.max' => 'Пароль слишком длинный'
        ]);

        $courier = Courier::create([
            'login' => $data['login'],
            'first_name' => $data['first_name'],
            'second_name' => $data['second_name'],
            'password' => Hash::make($data['password'])
        ]);

        return $this->prepareCourier($courier);


    }

    /**
     * Редактировать курьера
     */
    public function edit(Request $request, Courier $courier) : array
    {

        $data = $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'second_name' => ['required', 'string', 'max:255']
        ], [
            'first_name.max' => 'Имя слишком длинное',
            'second_name.max' => 'Фамилия слишком длинная'
        ]);

        $courier->first_name = $data['first_name'];
        $courier->second_name = $data['second_name'];
        $courier->save();

        return $this->prepareCourier($courier);

    }

    /**
     * Сменить пароль курьеру
     */
    public function changePassword(Request $request, Courier $courier) : string
    {

        $data = $request->validate([
           'password' => ['required', 'string', 'max:255']
        ]);

        $courier->password = Hash::make($data['password']);
        $courier->save();

        return 'OK';

    }

    /**
     * Удалить курьера
     */
    public function remove(Request $request, Courier $courier) : string
    {

        $order = $courier->getActiveOrder();

        DB::transaction(function() use ($order, $courier){

            //Если у него активный заказ, то ставим на поиск другого курьера
            if($order){
                $order->status_courier = Order::COURIER_STATUS_SEARCH;
                $order->courier_id = null;
                $order->save();
            }

            $courier->delete();

        });



        return "OK";

    }

}
