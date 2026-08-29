<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function index()
    {
        return view('backend.coupons.index');
    }

    public function store(Request $request)
    {
        return redirect()->route('admin.coupons')->with('success', 'Coupon created successfully.');
    }

    public function destroy($id)
    {
        return redirect()->route('admin.coupons')->with('success', 'Coupon deleted successfully.');
    }
}