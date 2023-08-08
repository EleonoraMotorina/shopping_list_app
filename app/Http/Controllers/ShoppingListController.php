<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShoppingListItem;

class ShoppingListController extends Controller
{
    public function index()
    {
        $shoppingListItems = ShoppingListItem::all();

        $totalAmount = $shoppingListItems->sum('price');

        return view('shopping-list.index', compact('shoppingListItems', 'totalAmount'));
    }


    public function create()
    {
        return view('shopping-list.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric',
        ]);

        ShoppingListItem::create($data);

        return redirect()->route('shopping-list.index');
    }

    public function edit($id)
    {
        $shoppingListItem = ShoppingListItem::findOrFail($id);
        return view('shopping-list.edit', compact('shoppingListItem'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric',
        ]);

        $shoppingListItem = ShoppingListItem::findOrFail($id);
        $shoppingListItem->update($data);

        return redirect()->route('shopping-list.index');
    }

    public function destroy($id)
    {
        $shoppingListItem = ShoppingListItem::findOrFail($id);
        $shoppingListItem->delete();

        return redirect()->route('shopping-list.index');
    }

    // public function getTotalAmount()
    // {
    //     $totalAmount = ShoppingListItem::sum('price');
    //     return view('shopping-list.total', compact('totalAmount'));
    // }
}
