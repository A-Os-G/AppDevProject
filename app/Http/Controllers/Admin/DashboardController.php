<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\Models\Order;
use illuminate\support\Carbon;
class DashboardController extends Controller
{    public function index()
     {
        $totalProducts = Product::count();
        $totalCategories = Category::count();
        $totalBrands = Brand::count();

        $totalAllUsers = User::count();
        $totalUser = User::where('role_as','0')->count();
        $totalAdmin = User::where('role_as','1')->count();

        $todayDate = Carbon::now()->format('d-w-m');
        $thisWeek = Carbon::now()->format('w');
        $thisMonth = Carbon::now()->format('m');

        $totalOrder = Order::count();
        $todayOrder = Order::whereDate('created_at',$todayDate)->count();
        $thisWeekOrder = Order::whereWeek('created_at',$thisWeek)->count();
        $thisMonthOrder = Order::whereWeek('created_at',$thisMonth)->count();
        return view('admin.dashboard', compact('totalProducts','totalCategories','totalBrands','totalAllUsers','totalUsers','totalAdmin','totalOrder','todayOrder','thisWeekOrder','thisMonthOrder'));
    }
}
