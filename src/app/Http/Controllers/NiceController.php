<?php

namespace App\Http\Controllers;

use App\Models\Nice;
use Illuminate\Http\Request;

class NiceController extends Controller
{
    public function store($item_id)
    {
        Nice::create([
            'user_id' => auth()->id(),
            'item_id' => $item_id
        ]);
    }

    public function destroy($item_id)
    {
        Nice::where('user_id', auth()->id())
            ->where('item_id', $item_id)
            ->delete();
    }
}
