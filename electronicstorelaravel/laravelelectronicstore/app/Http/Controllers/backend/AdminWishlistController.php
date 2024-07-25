<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\frontend\ShopModel;
use App\Models\frontend\Wishlist;
use App\Models\Shop;
use App\Models\User; // Add User model
use Illuminate\Http\Request;

class AdminWishlistController extends Controller
{
    public function index()
    {
        $wishlists = Wishlist::with('shop', 'user')->get();

        return view('backend.wishlists', compact('wishlists'));
    }

    public function create()
    {
        $shops = ShopModel::all(); // Fetch all shops for dropdown
        $users = User::all(); // Fetch all users for dropdown

        return view('backend.wishlist-create', compact('shops', 'users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'shop_id' => 'required|exists:shops,id',
        ]);

        Wishlist::create($request->all());

        return redirect()->route('admin.wishlists.index')->with('success', 'Wishlist item added successfully.');
    }

    public function edit($id)
    {
        $wishlist = Wishlist::findOrFail($id);
        $shops = ShopModel::all(); // Fetch all shops for dropdown
        $users = User::all(); // Fetch all users for dropdown

        return view('backend.wishlist-edit', compact('wishlist', 'shops', 'users'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'shop_id' => 'required|exists:shops,id',
        ]);

        $wishlist = Wishlist::findOrFail($id);
        $wishlist->update($request->all());

        return redirect()->route('admin.wishlists.index')->with('success', 'Wishlist item updated successfully.');
    }

    public function show($id)
    {
        $wishlist = Wishlist::with('shop', 'user')->findOrFail($id);

        return view('backend.wishlist-show', compact('wishlist'));
    }

    public function destroy($id)
    {
        $wishlist = Wishlist::findOrFail($id);
        $wishlist->delete();

        return redirect()->route('admin.wishlists.index')->with('success', 'Wishlist item removed successfully.');
    }
}