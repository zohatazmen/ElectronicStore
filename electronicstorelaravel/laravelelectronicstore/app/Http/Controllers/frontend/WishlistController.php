<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\frontend\Wishlist;
use App\Models\Shop;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function index()
    {
        $wishlistItems = Wishlist::where('user_id', Auth::id())->with('shop')->get();
        return view('frontend.wishlist', compact('wishlistItems'));
    }

    public function add(Request $request)
    {
        $wishlist = Wishlist::firstOrCreate(
            ['user_id' => Auth::id(), 'shop_id' => $request->shop_id]
        );

        return redirect()->back()->with('success', 'Item added to wishlist!');
    }

    public function remove($id)
    {
        $wishlistItem = Wishlist::where('id', $id)->where('user_id', Auth::id())->first();
        if ($wishlistItem) {
            $wishlistItem->delete();
        }

        return redirect()->back()->with('success', 'Item removed from wishlist!');
    }
}