<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRequest;
use App\Store;

class StoreController extends Controller
{
    public function __construct()
    {
        $this->middleware('store-owner')->only('create', 'store');
    }

    public function index()
    {
        $store = auth()->user()->store;

        return view('admin.stores.index', compact('store'));
    }

    public function create()
    {
        $users = \App\User::all(['id', 'name']);

        return view('admin.stores.create', compact('users'));
    }

    public function store(StoreRequest $request)
    {
        $data = $request->all();
        $user = auth()->user();

        $user->store()->create($data);

        flash('Loja criada com sucecsso')->success();
        return redirect()->route('admin.stores.index');
    }

    public function edit($store)
    {
        $store = auth()->user()->store;

        return view('admin.stores.edit', compact('store'));
    }

    public function update(StoreRequest $request)
    {
        $data = $request->all();

        $store = auth()->user()->store;
        $store->update($data);

        flash('Loja atualizada com sucecsso')->success();
        return redirect()->route('admin.stores.index');
    }

    public function destroy($store)
    {
        $store = \App\Store::find($store);
        $store->delete();

        flash('Loja removida com sucecsso')->success();
        return redirect()->route('admin.stores.index');
    }
}
