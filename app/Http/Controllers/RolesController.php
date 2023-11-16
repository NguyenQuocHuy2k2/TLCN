<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Roles::get();
        return view('admin.roles.index', ['roles' => $roles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $role_name = $request->input('role_name');
        $role_id = $request->input('role_id');
        $roles = Roles::create(['role_name' => $role_name, 'role_id' => $role_id]);
        $roles->save();
        return redirect('admin/roles')->with('success', 'Add New Role Successfully!');
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
        $rolebyid = Roles::select()->where('role_id', $id)->get();
        return view('admin.roles.update', ['rolebyid' => $rolebyid]);  
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
        $roles = Roles::find($id);
        $role_name = $request->input('role_name');
        $roles->update(['role_name' => $role_name]);
        return redirect('admin/roles')->with('success', 'Update Role Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $roles = Roles::find($id);
        $roles->delete();
        return redirect('admin/roles')->with('success', 'Delete Role Successfully!');
    }
}
