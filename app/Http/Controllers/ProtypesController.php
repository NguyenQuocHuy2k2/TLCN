<?php

namespace App\Http\Controllers;

use App\Models\Protypes;
use Illuminate\Http\Request;

class ProtypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $protypes = Protypes::paginate(6);
        return view('admin.protypes.index', ['protypes' => $protypes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$protypes = Protypes::get();
        return view('admin.protypes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $type_name = $request->input('type_name');
        $protypes = Protypes::create(['type_name' => $type_name]);
        $protypes->save();
        return redirect('admin/protypes')->with('success', 'Add New Protype Successfully!');
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
        $typebyid = Protypes::select()->where('type_id', $id)->get();
        return view('admin.protypes.update', ['typebyid' => $typebyid]); 
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
        $protypes = Protypes::find($id);
        $type_name = $request->input('type_name');
        $protypes->update(['type_name' => $type_name]);
        return redirect('admin/protypes')->with('success', 'Update Protype Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $protypes = Protypes::find($id);
        $protypes->delete();
        return redirect('admin/protypes')->with('success', 'Delete Protype Successfully!');
    }
}
