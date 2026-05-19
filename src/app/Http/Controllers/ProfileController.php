<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show(Request $request)
    {
        $page = $request->page;

        if ($page === 'buy') {
            $items = auth()->user()->purchases->pluck('item');
        } else {
            $items = auth()->user()->items;
        }

        return view('mypage', compact('items'));
    }

    public function edit()
    {
        return view('profile');
    }

    public function update(Request $request)
    {
        $user = auth()->user();

        $user->update($request->all());

        return redirect('/mypage');
    }
}
