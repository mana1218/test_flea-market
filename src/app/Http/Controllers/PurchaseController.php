<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use App\Models\Item;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    public function create($item_id)
    {
        $item = Item::findOrFail($item_id);
        $address = auth()->user();

        return view('purchase', compact('item','address'));
    }

    public function store(Request $request, $item_id)
    {
        $item = Item::findOrFail($item_id);

        if ($item->sold) {
            return back();
        }

        $item->update([
            'sold' => true
        ]);

        Purchase::create([
            'user_id' => auth()->id(),
            'item_id' => $item_id
        ]);

        return redirect('/');
    }

    public function edit($item_id)
    {
        $item = Item::findOrFail($item_id);
        $user = auth()->user();

        return view('address', compact('item', 'user'));
    }

    public function update(Request $request, $item_id)
    {
        $item = Item::findOrFail($item_id);
        $user = auth()->user();

        $user->update([
            'postal_code' => $request->postal_code,
            'address' => $request->address,
            'building' => $request->building
        ]);

        return redirect('/purchase/' . $item_id);
    }
}
