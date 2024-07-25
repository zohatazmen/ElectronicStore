<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\frontend\ShopModel;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        // Fetch paginated shop data from the database
        $shops = ShopModel::paginate(20); // You can adjust the number of items per page

        // Pass data to the view using compact()
        return view('frontend.shop', compact('shops'));
    }
}