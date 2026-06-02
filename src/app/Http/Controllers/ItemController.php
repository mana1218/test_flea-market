<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Condition;
use App\Models\Category;
use App\Http\Requests\ExhibitionRequest;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index(Request $request)
    {
        if ($request->tab === 'mylist') {
            $items = Item::query()
                ->keywordSearch($request->keyword);

            if (auth()->check() && auth()->user()->hasVerifiedEmail()) {
                $items->whereHas('nices', function ($query) {
                    $query->where('user_id', auth()->id());
                });
            } else {
                $items->whereRaw('0 = 1');
            }

            $items = $items->get();

        } else {
            $items = Item::query()
                ->keywordSearch($request->keyword);

            if (auth()->check()) {
                if (!auth()->user()->hasVerifiedEmail()) {
                    return redirect('/email/verify');
                }
                
                $items->where('user_id', '!=', auth()->id());
            }

            $items = $items->get();
        }

        return view('index', compact('items'));
    }

    public function show($item_id)
    {
        $item = Item::with(['comments.user'])->withCount(['nices', 'comments'])->findOrFail($item_id);

        return view('detail', compact('item'));
    }

    public function create()
    {
        $conditions = Condition::all();
        $categories = Category::all();

        return view('sell', compact('conditions', 'categories'));
    }

    public function store(ExhibitionRequest $request)
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
