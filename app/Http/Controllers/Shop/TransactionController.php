<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCheckOutRequest;
use App\Models\Cart;
use App\Models\City;
use App\Models\Courier;
use App\Models\Province;
use App\Models\Transaction;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TransactionController extends Controller
{
    //
    public function index()
    {
        if (auth()->user() && auth()->user()->carts->count() === 0) {
            return redirect()->route('shop.cart.index')->with('error', 'Keranjang belanja Anda kosong.');
        }
        $carts = auth()->user()->carts;
        $provinces = Province::all();
        $cities = City::all();
        $couriers = Courier::all();
        return view('shop.checkout', compact('carts', 'provinces', 'cities', 'couriers'));
    }

    public function store(StoreCheckOutRequest $request)
    {
        // dd($request->all());
        if (auth()->user() && auth()->user()->carts->count() === 0) {
            return redirect()->route('shop.cart.index')->with('error', 'Keranjang belanja Anda kosong.');
        }
        $carts = auth()->user()->carts;
        $carts->each(function ($cart) {
            $cart->product->decrement('stock', $cart->qty);
        });
        // $carts->each->delete();
        $weight = $carts->sum(function ($cart) {
            return $cart->qty * $cart->product->weight;
        });
        $data = $request->validated();
        $data['user_id'] = auth()->id();
        $data['status'] = 0;
        $data['code'] = 'INV/' . date('mdY') . rand(100, 999);
        // dd($data);
        $data['delivery_cost'] = $this->cekOngkir($weight, $data['subdistrict'], $data['courier_id']);

        $transaction = Transaction::create($data);
        $carts->each(function ($cart) use ($transaction) {
            $transactionDetail = [
                'transaction_id' => $transaction->id,
                'product_id' => $cart->product_id,
                'qty' => $cart->qty,
                'price' => $cart->product->price,
            ];
            $transaction->transactionDetails()->create($transactionDetail);
            $cart->delete();
        });

        return redirect()->route('cart.payment')->with('success', 'Pesanan berhasil dibuat');
    }

    public function payment()
    {
        return view('shop.payment');
    }

    public function cekOngkir($weight = 1000, $destination, $courier_id)
    {
        // dd($weight);
        $origin = 210;
        $originType = 'city';
        $destinationType = 'subdistrict';
        $courier = Courier::where('id', $courier_id)->first()->code;
        // get data from api rajaongkir
        if (env('APP_ENV') == 'local') {
            $response = Http::withoutVerifying()->post('https://pro.rajaongkir.com/api/cost', [
                'key' => env('RAJAONGKIR_API_KEY'),
                'origin' => $origin,
                'destination' => $destination,
                'destinationType' => $destinationType,
                'weight' => $weight,
                'courier' => $courier,
                'originType' => $originType,
            ]);
        } else {
            $response = Http::post('https://pro.rajaongkir.com/api/cost', [
                'key' => env('RAJAONGKIR_API_KEY'),
                'origin' => $origin,
                'destination' => $destination,
                'destinationType' => $destinationType,
                'weight' => $weight,
                'courier' => $courier,
                'originType' => $originType,
            ]);
        }
        $data = $response->json();
        // dd($data['rajaongkir']['results'][0]['costs'][0]['cost'][0]['value']);
        $results = $data['rajaongkir']['results'][0]['costs'][0]['cost'][0]['value'];
        return $results;
    }

    public function deliveryCost()
    {
        $carts = auth()->user()->carts;
        $weight = $carts->sum(function ($cart) {
            return $cart->qty * $cart->product->weight;
        });
        $courier = Courier::where('id', request('courier_id'))->first()->code;
        $origin = 210;
        $originType = 'city';
        $destinationType = 'subdistrict';
        if (env('APP_ENV') == 'local') {
            $response = Http::withoutVerifying()->post('https://pro.rajaongkir.com/api/cost', [
                'key' => env('RAJAONGKIR_API_KEY'),
                'origin' => $origin,
                'destination' => request('destination'),
                'destinationType' => $destinationType,
                'weight' => $weight,
                'courier' => $courier,
                'originType' => $originType,
            ]);
        } else {
            $response = Http::post('https://pro.rajaongkir.com/api/cost', [
                'key' => env('RAJAONGKIR_API_KEY'),
                'origin' => $origin,
                'destination' => request('destination'),
                'destinationType' => $destinationType,
                'weight' => $weight,
                'courier' => $courier,
                'originType' => $originType,
            ]);
        }
        $data = $response->json();
        // dd($data['rajaongkir']['results'][0]['costs'][0]['cost'][0]['value']);
        $results = $data['rajaongkir']['results'][0]['costs'][0]['cost'][0]['value'];
        return response()->json([
            'success' => true,
            'data' => $results,
        ]);

    }
}
