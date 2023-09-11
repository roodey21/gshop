<?php

namespace App\Http\Controllers;

use App\Models\Courier;
use Illuminate\Http\Request;

class CourierController extends Controller
{
    public function index()
    {
        $couriers = Courier::orderBy('status', 'DESC')->orderBy('name', 'ASC')->get();
        return view('admin.courier.index', compact('couriers'));
    }

    public function edit()
    {
        $couriers = Courier::orderBy('status', 'DESC')->orderBy('name', 'ASC')->get();
        return view('admin.courier.edit', compact('couriers'));
    }

    public function update(Request $request)
    {
        Courier::where('status', 1)->update([
            'status' => 0
        ]);
        foreach($request->status as $id => $req)
        {
            Courier::find($id)->update([
                'status' => true
            ]);
        }
        return redirect()->route('admin.courier.index')->with('success', 'Pengaturan kurir berhasil disimpan');
    }
}
