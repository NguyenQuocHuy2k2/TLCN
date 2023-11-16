<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Protypes;
use App\Models\Manufactures;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Products::select('products.*', 'manufactures.manu_name', 'protypes.type_name')
            ->join('manufactures', 'products.manu_id', '=', 'manufactures.manu_id')
            ->join('protypes', 'products.type_id', '=', 'protypes.type_id')
            ->orderBy('products.id', 'asc')
            ->paginate(10);
        return view('admin.products.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $manufactures = Manufactures::get();
        $protypes = Protypes::get();
        return view('admin.products.create', ['manufactures' => $manufactures,'protypes' => $protypes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image = $request->file('image')->getClientOriginalName();
        $target_dir = asset('assets/img/');
        $target_file = $target_dir . basename($image);

        $imgFileType = pathinfo($target_file, PATHINFO_EXTENSION);

        $name = $request->input('name');
        $manu = $request->input('manu');
        $type = $request->input('type');
        $price = $request->input('price');
        $desc = $request->input('desc');
        $feature = $request->input('feature');
        $discount_price = $request->input('discount_price');

        if (!is_numeric($price) || !is_numeric($discount_price)) {
            return redirect('admin/products')->with('warning', 'Price and discount price must be numeric!');
        }
        switch (true) {
            case empty($manu):
                return redirect('admin/products')->with('error', 'Please Choose A Manufacture!');
            case empty($type):
                return redirect('admin/products')->with('error', 'Please Choose A Product Type!');
            case empty($desc):
                return redirect('admin/products')->with('error', 'Please Enter Description!');
            case is_null($feature):
                return redirect('admin/products')->with('error', 'Please Choose A Feature!');
            default:
                if ($imgFileType == 'png' || $imgFileType == 'jpg' || $imgFileType == 'webp') {
                    $image_name = 'image' . time() . '-' . $request->name . '.'
                        . $request->image->extension();
                    $request->image->move(public_path('assets/img'), $image_name);
                    $products = Products::create([
                        'name' => $name,
                        'manu_id' => $manu,
                        'type_id' => $type,
                        'description' => $desc,
                        'price' => $price,
                        'discount_price' => $discount_price,
                        'feature' => $feature,
                        'pro_image' => $image_name,
                    ]);
                    $products->save();
                    return redirect('admin/products')->with('success', 'Add New Product Successfully!');
                } else {
                    return redirect('admin/products')->with('warning', 'Only accept image formats JPG, PNG, or WEBP!');
                }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $manufactures = Manufactures::get();
        $protypes = Protypes::get();
        $probyid = Products::select('products.*', 'manufactures.manu_name', 'protypes.type_name')
            ->join('manufactures', 'products.manu_id', '=', 'manufactures.manu_id')
            ->join('protypes', 'products.type_id', '=', 'protypes.type_id')
            ->where('id', $id)
            ->get();
        return view('admin.products.update', ['probyid' => $probyid,'manufactures' => $manufactures,'protypes' => $protypes,'id' => $id]);
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
        $name = $request->input('name');
        $manu = $request->input('manu');
        $type = $request->input('type');
        $desc = $request->input('desc');
        $price = $request->input('price');
        $discount_price = $request->input('discount_price');
        $feature = $request->input('feature');
        $products = Products::find($id);

        if (!is_numeric($price) || !is_numeric($discount_price)) {
            return redirect('admin/products')->with('warning', 'Price and discount price must be numeric!');
        }
        switch (true) {
            case empty($name):
                return redirect('admin/products')->with('error', 'Please Choose A Name!');
            case empty($manu):
                return redirect('admin/products')->with('error', 'Please Choose A Manufacture!');
            case empty($type):
                return redirect('admin/products')->with('error', 'Please Choose A Product Type!');
            case empty($desc):
                return redirect('admin/products')->with('error', 'Please Enter Description!');
            case is_null($feature):
                return redirect('admin/products')->with('error', 'Please Choose A Feature!');
            default:
                if ($request->hasFile('image')) {
                    $image = $request->file('image')->getClientOriginalName();
                    $target_dir = public_path('assets/img/');
                    $target_file = $target_dir . basename($image);

                    $imgFileType = pathinfo($target_file, PATHINFO_EXTENSION);

                    if (!in_array($imgFileType, ['png', 'jpg', 'webp'])) {
                        return redirect('admin/products')->with('warning', 'Only accept image formats JPG, PNG, or WEBP!');
                    }

                    $image_name = 'image' . time() . '-' . $request->name . '.'
                        . $request->image->extension();
                    $request->image->move(public_path('assets/img'), $image_name);

                    $products->update([
                        'name' => $name,
                        'manu_id' => $manu,
                        'type_id' => $type,
                        'description' => $desc,
                        'price' => $price,
                        'discount_price' => $discount_price,
                        'feature' => $feature,
                        'pro_image' => $image_name
                    ]);
                } else {
                    $products->update([
                        'name' => $name,
                        'manu_id' => $manu,
                        'type_id' => $type,
                        'description' => $desc,
                        'price' => $price,
                        'discount_price' => $discount_price,
                        'feature' => $feature
                    ]);
                }
                return redirect('admin/products')->with('success', 'Update Product Successfully!');
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
        $products = Products::find($id);
        $products->delete();
        return redirect('admin/products')->with('success', 'Delete Product Successfully!');
    }
}
