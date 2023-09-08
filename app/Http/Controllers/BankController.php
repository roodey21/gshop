<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBankRequest;
use App\Http\Requests\UpdateBankRequest;
use App\Models\Bank;
use Illuminate\Http\Request;

class BankController extends Controller
{
    public function index()
    {
        $banks = Bank::latest()->paginate(10);
        return view('admin.bank.index', compact('banks'));
    }

    public function create()
    {
        return view('admin.bank.create');
    }

    public function store(StoreBankRequest $request)
    {
        $data = $request->validated();
        Bank::create($data);
        return redirect()->route('admin.bank.index')->with('success', 'Bank berhasil ditambahkan');
    }

    public function edit(Bank $bank)
    {
        return view('admin.bank.edit', compact('bank'));
    }

    public function update(UpdateBankRequest $request, Bank $bank)
    {
        $data = $request->validated();
        $bank->update($data);
        if(!isset($data['status'])) {
            $bank->update(['status' => 0]);
        }
        return redirect()->route('admin.bank.index')->with('success', 'Bank berhasil diupdate');
    }

    public function destroy(Bank $bank)
    {
        $bank->delete();
        return redirect()->route('admin.bank.index')->with('success', 'Bank berhasil dihapus');
    }
}
