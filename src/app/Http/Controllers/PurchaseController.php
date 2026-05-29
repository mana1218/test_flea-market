<?php

namespace App\Http\Controllers;

use Stripe\Stripe;
use Stripe\Checkout\Session;
use App\Models\Purchase;
use App\Models\Item;
use App\Http\Requests\PurchaseRequest;
use App\Http\Requests\AddressRequest;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    public function create($item_id)
    {
        $item = Item::findOrFail($item_id);
        $address = auth()->user();

        return view('purchase', compact('item','address'));
    }

    public function store(PurchaseRequest $request, $item_id)
    {
        $item = Item::findOrFail($item_id);

        if ($request->payment_method === 'card') {

            Stripe::setApiKey(config('services.stripe.secret'));

            $session = Session::create([
                'payment_method_types' => ['card'],
                'line_items' => [[
                    'price_data' => [
                        'currency' => 'jpy',
                        'product_data' => [
                            'name' => $item->name,
                        ],
                        'unit_amount' => $item->price,
                    ],
                    'quantity' => 1,
                ]],
                'mode' => 'payment',
                'success_url' => url('/purchase/success/' . $item->id),
                'cancel_url' => url('/purchase/' . $item->id),
            ]);

            return redirect()->away($session->url);
        }

        if ($request->payment_method === 'convenience') {

            Purchase::create([
                'user_id' => auth()->id(),
                'item_id' => $item_id,
                'payment_method' => 'convenience'
            ]);

            $item->update(['sold' => true]);

            return redirect('/');
        }

        abort(400, '不正な支払い方法です');
    }

    public function success($item_id)
    {
        $item = Item::findOrFail($item_id);
        
        if ($item->sold) {
            return redirect('/');
        }

        $item->update([
            'sold' => true
        ]);

        Purchase::create([
            'user_id' => auth()->id(),
            'item_id' => $item_id,
            'payment_method' => 'card'
        ]);

        return redirect('/');
}

    public function edit($item_id)
    {
        $item = Item::findOrFail($item_id);
        $user = auth()->user();

        return view('address', compact('item', 'user'));
    }

    public function update(AddressRequest $request, $item_id)
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
