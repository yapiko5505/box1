<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function getIndex()
    {
        $items = Customer::all();
        return view('customer.list')->with('items', $items);
    }

    public function new_index()
    {
        return view('customer.new_index');
    }

    public function new_confirm(Request $request)
    {
        $data = $request->all();
        return view('customer.new_confirm')->with($data);
    }

    public function new_finish(Request $request)
    {
        // customerオブジェクト生成
        $item = new Customer;
 
        // 値の登録
        $item->name = $request->name;
        $item->postal = $request->postal;
        $item->address = $request->address;
        $item->phone = $request->phone;
        $item->email = $request->email;
        $item->todo = $request->todo;
 
        // 保存
        $item->save();
 
        // 一覧にリダイレクト
        return redirect()->to('customer/list');
    }

    public function edit_index($id)
    {
        $item = Customer::findOrFail($id);
        return view('customer.edit_index')->with('item', $item);
    }

    public function edit_confirm(Request $request)
    {
        $data = $request->all();
        return view('customer.edit_confirm')->with($data);
    }

    public function edit_finish(Request $request, $id)
    {
        // customerオブジェクト生成
        $item = Customer::findOrFail($id);

        // 値の登録
        $item->name = $request->name;
        $item->postal = $request->postal;
        $item->address = $request->address;
        $item->phone = $request->phone;
        $item->email = $request->email;
        $item->todo = $request->todo;

        // 保存
        $item->save();

        // 一覧にリダイレクト
        return redirect()->to('customer/list');
    }

    public function delete(Request $request)
    {
        $customer = Customer::find($request->id);
        return view('customer.delete', ['form' => $customer]);
    }   

    public function remove(Request $request)
    {
        Customer::find($request->id)->delete();
        return redirect()->to('customer/list');
    }
}