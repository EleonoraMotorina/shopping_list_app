<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShoppingListItem;
use Illuminate\Support\Facades\Validator;

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
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:2',
            'price' => 'required|numeric|min:0',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('shopping-list.create')
                ->withErrors($validator)
                ->withInput();
        }

        ShoppingListItem::create($request->all());

        return redirect()->route('shopping-list.index');
    }

    public function edit($id)
    {
        $shoppingListItem = ShoppingListItem::findOrFail($id);
        return view('shopping-list.edit', compact('shoppingListItem'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:2',
            'price' => 'required|numeric|min:0',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('shopping-list.edit', $id)
                ->withErrors($validator)
                ->withInput();
        }

        $shoppingListItem = ShoppingListItem::findOrFail($id);
        $shoppingListItem->update($request->all());

        return redirect()->route('shopping-list.index');
    }

    public function destroy($id)
    {
        try {
            $shoppingListItem = ShoppingListItem::findOrFail($id);
            $shoppingListItem->delete();

            return response()->json(['message' => 'Item deleted successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to delete item'], 500);
        }
        return redirect()->route('shopping-list.index');
    }

    // public function getTotalAmount()
    // {
    //     $totalAmount = ShoppingListItem::sum('price');
    //     return view('shopping-list.total', compact('totalAmount'));
    // }
}
