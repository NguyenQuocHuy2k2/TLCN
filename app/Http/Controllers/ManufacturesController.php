<?php

namespace App\Http\Controllers;

use App\Models\Manufactures;
use Illuminate\Http\Request;

class ManufacturesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $manufactures = Manufactures::get();
        return view('admin.manufactures.index', ['manufactures' => $manufactures]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.manufactures.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $manu_name = $request->input('manu_name');
        $manufactures = Manufactures::create(['manu_name' => $manu_name]);
        $manufactures->save();
        return redirect('admin/manufactures')->with('success', 'Add New Manufacture Successfully!');
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
        $manubyid = Manufactures::select()->where('manu_id', $id)->get();
        return view('admin.manufactures.update', ['manubyid' => $manubyid]);  
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
        $manufactures = Manufactures::find($id);
        $manu_name = $request->input('manu_name');
        $manufactures->update(['manu_name' => $manu_name]);
        return redirect('admin/manufactures')->with('success', 'Update Manufacture Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $manufactures = Manufactures::find($id);
        $manufactures->delete();
        return redirect('admin/manufactures')->with('success', 'Delete Manufacture Successfully!');
    }
}
