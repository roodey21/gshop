<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\City;
use App\Models\Courier;
use App\Models\Product;
use App\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CartController extends Controller
{
    public function index()
    {
        $provinces = Province::all();
        $carts = auth()->user()->carts;
        return view('shop.cart', compact('provinces','carts'));
    }

    public function store(Request $request, Product $product)
    {
        // dd($request->all());
        $user = auth()->user();
        $cart = $user->carts()->where('product_id', $product->id)->first();
        if ($cart) {
            $cart->update([
                'qty' => $cart->qty + $request->qty,
            ]);
        } else {
            $user->carts()->create([
                'product_id' => $product->id,
                'qty' => $request->qty,
            ]);
        }
        return redirect()->back()->with('success', 'Produk berhasil ditambahkan ke keranjang');
    }

    public function update(Request $request, Cart $cart)
    {
        $cart = auth()->user()->carts()->where('id', $cart->id)->firstOrFail();
        $cart->update([
            'qty' => $request->qty,
        ]);
        return response()->json([
            'success' => true,
            'message' => 'Berhasil update keranjang',
        ]);
    }

    public function destroy($cart)
    {
        $cart = auth()->user()->carts()->where('id', $cart)->firstOrFail();
        $cart->delete();
        return redirect()->back()->with('success', 'Produk berhasil dihapus dari keranjang');
    }

    public function getCity()
    {
        $province_id = request()->province_id;
        $cities = City::where('province_id', $province_id)->get();
        return response()->json([
            'success' => true,
            'data' => $cities,
        ]);
    }

    public function getSubdistrict()
    {
        $city_id = request()->city_id;
        // get data from api rajaongkir
        if (env('APP_ENV') == 'local')  {
            $response = Http::withoutVerifying()->get('https://pro.rajaongkir.com/api/subdistrict', [
                'key' => env('RAJAONGKIR_API_KEY'),
                'city' => $city_id,
            ]);
        } else {
            $response = Http::get('https://pro.rajaongkir.com/api/subdistrict', [
                'key' => env('RAJAONGKIR_API_KEY'),
                'city' => $city_id,
            ]);
        }
        $data = $response->json();
        return response()->json([
            'success' => true,
            'data' => $data['rajaongkir']['results'],
        ]);
    }

    public function cekOngkir()
    {
        $origin = 210;
        $originType = 'city';
        $destination = request('subdistrict');
        $destinationType = 'subdistrict';
        $weight = 1000;
        $courier = Courier::where('code', '!=', 'adt')->where('status', 1)->pluck('code')->implode(':');
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
        // dd($data);
        $results = $data['rajaongkir']['results'];
        return redirect()->back()->with('data-ongkir', $results);
    }
}
