<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Condition;
use App\Models\Category;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index(Request $request)
    {
        $items = Item::all();
        return view('index', compact('items'));
    }

    public function show($item_id)
    {
        $item = Item::withCount(['nices', 'comments'])->findOrFail($item_id);

        return view('detail', compact('item'));
    }

    public function create()
    {
        $conditions = Condition::all();
        $categories = Category::all();

        return view('sell', compact('conditions', 'categories'));
    }

    public function store(Request $request)
    {
        $path = $request->file('picture')->store('images', 'public');

        $item = Item::create([
            'picture' => $path,
            'name' => $request->name,
            'brand' => $request->brand,
            'price' => $request->price,
            'explain' => $request->explain,
            'condition_id' => $request->condition_id,
            'user_id' => auth()->id(),
        ]);

        $item->categories()->attach($request->categories);

        return redirect('/');
    }
}
