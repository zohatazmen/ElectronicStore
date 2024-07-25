<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\frontend\ShopModel;
use Illuminate\Http\Request;

class ShopAdminController extends Controller
{
    // Display a paginated list of shops
    public function index()
    {
        $shops = ShopModel::paginate(10); // Adjust the number of items per page if needed

        return view('backend.shops', compact('shops'));
    }

    // Show the form for creating a new shop
    public function create()
    {
        return view('backend.shop-create');
    }

    // Store a newly created shop in storage
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category' => 'required|string|max:255',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $shop = new ShopModel();
        $shop->name = $validatedData['name'];
        $shop->description = $validatedData['description'];
        $shop->category = $validatedData['category'];
        $shop->price = $validatedData['price'];

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $shop->image = $imagePath;
        }

        $shop->save();

        return redirect()->route('admin.shops.index')->with('success', 'Shop added successfully.');
    }

    // Show the form for editing the specified shop
    public function edit(ShopModel $shop)
    {
        return view('backend.shop-edit', compact('shop'));
    }

    // Update the specified shop in storage
    public function update(Request $request, ShopModel $shop)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category' => 'required|string|max:255',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image if it exists
            if ($shop->image) {
                \Storage::delete('public/'.$shop->image);
            }
            $imagePath = $request->file('image')->store('images', 'public');
            $shop->image = $imagePath;
        }

        $shop->update($validatedData);

        return redirect()->route('admin.shops.index')->with('success', 'Shop updated successfully.');
    }

    // Remove the specified shop from storage
    public function destroy(ShopModel $shop)
    {
        // Delete the image if it exists
        if ($shop->image) {
            \Storage::delete('public/'.$shop->image);
        }

        $shop->delete();

        return redirect()->route('admin.shops.index')->with('success', 'Shop deleted successfully.');
    }
}
