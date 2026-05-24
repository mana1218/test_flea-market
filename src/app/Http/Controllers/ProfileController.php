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
        $user = auth()->user();

        return view('profile', compact('user'));
    }

    public function update(Request $request)
    {
        $user = auth()->user();

        $data = [
            'name' => $request->name,
            'postal_code' => $request->postal_code,
            'address' => $request->address,
            'building' => $request->building
        ];

        if ($request->hasFile('picture')) {
            $path = $request->file('picture')->store('profile_image', 'public');

            $data['picture'] = $path;
        }
        
        $user->update($data);
        
        return redirect('/mypage');
    }
}
