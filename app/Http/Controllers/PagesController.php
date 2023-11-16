<?php

namespace App\Http\Controllers;

use App\Models\Protypes;
use App\Models\Products;
use App\Models\Manufactures;
use App\Models\Coupons;
use App\Models\Roles;
use App\Models\Users;
use App\Models\Orders;
use App\Models\Payments;
use Illuminate\Http\Request;

class PagesController extends Controller
{

    public function index()
    {
        return view('admin.index');
    }
    public function count()
    {
        $products = Products::get();
        $protypes = Protypes::get();
        $manufatures = Manufactures::get();
        $coupons = Coupons::get();
        $roles = Roles::get();
        $users = Users::get();
        $orders = Orders::get();
        $payments = Payments::get();
        return view('admin.index', [
            'products' => $products,
            'protypes' => $protypes,
            'manufactures' => $manufatures,
            'coupons' => $coupons,
            'roles' => $roles,
            'users' => $users,
            'orders' => $orders,
            'payments' => $payments
        ]);
    }
}
