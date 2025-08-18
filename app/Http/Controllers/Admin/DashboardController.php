<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $productCount = Product::count();
        $categoryCount = Category::count();
        $orderCount = Order::count();
        $userCount = User::count();

        return view('admin.dashboard', compact('productCount', 'categoryCount', 'orderCount', 'userCount'));
    }
}
