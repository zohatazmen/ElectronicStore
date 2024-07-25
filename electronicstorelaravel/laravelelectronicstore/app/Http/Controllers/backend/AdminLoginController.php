<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\frontend\ContactModel;
use App\Models\frontend\Order;
use App\Models\frontend\ShopModel;
use App\Models\frontend\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('backend.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('admin.dashboard');
        }

        return redirect()->back()->withErrors(['email' => 'Invalid credentials.']);
    }

    public function logout()
    {
        Auth::guard('admin')->logout();

        return redirect()->route('admin.login');
    }

    public function dashboard()
    {
        // Fetching stats
        $shopCount = ShopModel::count();
        $orderCount = Order::count();
        $wishlistCount = Wishlist::count();
        $contactCount = ContactModel::count();

        $ordersByMonth = Order::select(DB::raw('MONTH(created_at) as month'), DB::raw('COUNT(*) as count'))
        ->groupBy('month')
        ->orderBy('month')
        ->pluck('count', 'month')
        ->toArray();

    $months = array_map(function ($month) {
        return date('F', mktime(0, 0, 0, $month, 10));
    }, array_keys($ordersByMonth));

    $orderCounts = array_values($ordersByMonth);

    return view('backend.index', compact('shopCount', 'orderCount', 'wishlistCount', 'contactCount', 'months', 'orderCounts'));
    }
}