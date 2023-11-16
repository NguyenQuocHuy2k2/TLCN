<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Coupons;
use App\Models\CouponTypes;
use Illuminate\Http\Request;

class CouponsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $couponlist = Coupons::select('coupons.*', 'coupons_type.type_name')
            ->join('coupons_type', 'coupons.coupon_type', '=', 'coupons_type.coupon_type')
            ->orderBy('coupon_id', 'desc')
            ->paginate(9);
        return view('admin.coupons.index', ['couponlist' => $couponlist]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $coupons_type = CouponTypes::get();
        return view('admin.coupons.create', ['coupons_type' => $coupons_type]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $coupon_code = $request->input('coupon_code');
        $coupon_type = $request->input('coupon_type');
        $coupon_amount = $request->input('coupon_discount');
        $min_order = $request->input('min_order');
        $coupon_quantity = $request->input('coupon_quantity');
        $coupon_expired = $request->input('coupon_expired');
        $parsedDate = Carbon::createFromFormat('Y-m-d', $coupon_expired);
        $coupons = Coupons::get();
        foreach ($coupons as $value) {
            $coupon_name = $value->coupon_code;
            if ($coupon_code == $coupon_name) {
                return redirect('admin/coupons')->with('warning', 'This coupon already exists! Please enter a different code');
            }
        }
        if ($coupon_type == 1 && ($coupon_amount >= 100 || $coupon_amount <= 0)) {
            return redirect('admin/coupons')->with('warning', 'Please enter a Discount Percentage between 1% and 99% !');
        }
        switch (true) {
            case (!$parsedDate->isValid() || $parsedDate->isPast()):
                return redirect('admin/coupons')->with('warning', 'Please enter a valid future date!');
            case !is_numeric($coupon_type):
                return redirect('admin/coupons')->with('warning', 'Please choose a Coupon Type!');
            case !is_numeric($coupon_amount):
                return redirect('admin/coupons')->with('warning', 'Invalid Discount! Please enter a numeric value');
            case !is_numeric($min_order):
                return redirect('admin/coupons')->with('warning', 'Invalid Min order! Please enter a numeric value');
            case !is_numeric($coupon_quantity):
                return redirect('admin/coupons')->with('warning', 'Invalid Quantity! Please enter a numeric value');
            default:
                $coupons = Coupons::create([
                    'coupon_code' => $coupon_code,
                    'coupon_type' => $coupon_type,
                    'coupon_amount' => $coupon_amount,
                    'min_order' => $min_order,
                    'coupon_quantity' => $coupon_quantity,
                    'coupon_used' => 0,
                    'coupon_remain' => $coupon_quantity,
                    'coupon_expired' => $parsedDate,
                ]);
                $coupons->save();
                return redirect('admin/coupons')->with('success', 'Add New Coupon Successfully!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $coupontypes = CouponTypes::get();
        $couponbyid = Coupons::select()->where('coupon_id', $id)->get();
        return view('admin.coupons.update', ['couponbyid' => $couponbyid, 'coupontypes' => $coupontypes]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $coupon_code = $request->input('coupon_code');
        $coupon_type = $request->input('coupon_type');
        $coupon_amount = $request->input('coupon_discount');
        $min_order = $request->input('min_order');
        $coupon_quantity = $request->input('coupon_quantity');
        $coupon_used = $request->input('coupon_used');
        $coupon_remain = $request->input('coupon_remain');
        $coupon_expired = $request->input('coupon_expired');
        $coupon_id = $request->input('coupon_id');
        $parsedDate = Carbon::createFromFormat('Y-m-d', $coupon_expired);
        $coupon_except = Coupons::whereNotIn('coupon_id', [$coupon_id])->get();
        foreach ($coupon_except as $value) {
            $coupon_name = $value->coupon_code;
            if ($coupon_id != $value->coupon_id && $coupon_code == $coupon_name) {
                return redirect('admin/coupons')->with('warning', 'This coupon already exists! Please enter a different code');
            }
        }
        if ($coupon_type == 1 && ($coupon_amount >= 100 || $coupon_amount <= 0)) {
            return redirect('admin/coupons')->with('warning', 'Please enter a Discount Percentage between 1% and 99% !');
        }
        switch (true) {
            case (!$parsedDate->isValid() || $parsedDate->isPast()):
                return redirect('admin/coupons')->with('error', 'Invalid or Expired Date! Please enter a valid future date');
            case !is_numeric($coupon_type):
                return redirect('admin/coupons')->with('error', 'Invalid Type! Please choose a Coupon Type');
            case !is_numeric($coupon_amount):
                return redirect('admin/coupons')->with('error', 'Invalid Discount! Please enter a numeric value');
            case !is_numeric($min_order):
                return redirect('admin/coupons')->with('error', 'Invalid Min order! Please enter a numeric value');
            case !is_numeric($coupon_quantity):
                return redirect('admin/coupons')->with('error', 'Invalid Quantity! Please enter a numeric value');
            default:
                $coupons = Coupons::find($id)->update([
                    'coupon_code' => $coupon_code,
                    'coupon_type' => $coupon_type,
                    'coupon_amount' => $coupon_amount,
                    'min_order' => $min_order,
                    'coupon_quantity' => $coupon_quantity,
                    'coupon_used' => $coupon_used,
                    'coupon_remain' => $coupon_remain,
                    'coupon_expired' => $parsedDate,
                ]);
                return redirect('admin/coupons')->with('success', 'Update Coupon Successfully!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $coupons = Coupons::find($id);
        $coupons->delete();
        return redirect('admin/coupons')->with('success', 'Delete Coupon Successfully!');
    }
}
