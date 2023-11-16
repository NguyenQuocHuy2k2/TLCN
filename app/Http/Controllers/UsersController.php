<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use App\Models\Users;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = Users::select('users.*', 'roles.*')
            ->join('roles', 'users.role_id', '=', 'roles.role_id')
            ->paginate(5);
        ;
        return view('admin.users.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Roles::get();
        return view('admin.users.create', ['roles' => $roles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $First_name = $request->input('First_name');
        $Last_name = $request->input('Last_name');
        $phone = $request->input('phone');
        $username = $request->input('username');
        $password = bcrypt($request->input('password'));
        $role = $request->input('role');
        $users = Users::get();
        if (!is_numeric($phone)) {
            return redirect('admin/users')->with('error', 'This Phone Not Valid!');
        }
        foreach ($users as $value) {
            if ($username == $value->username) {
                return redirect('admin/users')->with('error', 'This Username Already Exists! Please enter a different other');
            }
        }
        if (empty($role)) {
            return redirect('admin/users')->with('warning', 'Please Choose a Role!');
        }
        if ($request->hasFile('image')) {
            $image = $request->file('image')->getClientOriginalName();
            $target_dir = public_path('assets/img/');
            $target_file = $target_dir . basename($image);

            $imgFileType = pathinfo($target_file, PATHINFO_EXTENSION);

            if (!in_array($imgFileType, ['png', 'jpg', 'webp'])) {
                return redirect('admin/users')->with('warning', 'Only accept image formats JPG, PNG, or WEBP!');
            }

            $image_name = 'image' . time() . '-' . $request->name . '.'
                . $request->image->extension();
            $request->image->move(public_path('assets/img'), $image_name);

            $users = Users::create([
                'First_name' => $First_name,
                'Last_name' => $Last_name,
                'phone' => $phone,
                'username' => $username,
                'password' => $password,
                'role_id' => $role,
                'image' => $image_name
            ]);
        } else {
            $users = Users::create([
                'First_name' => $First_name,
                'Last_name' => $Last_name,
                'phone' => $phone,
                'username' => $username,
                'password' => $password,
                'role_id' => $role
            ]);
        }
        $users->save();
        return redirect('admin/users')->with('success', 'Create New User Successfully!');
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
        $roles = Roles::get();
        $userbyid = Users::get()
            ->where('id', $id);
        return view('admin.users.update', ['userbyid' => $userbyid, 'roles' => $roles]);
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
        $First_name = $request->input('First_name');
        $Last_name = $request->input('Last_name');
        $phone = $request->input('phone');
        $username = $request->input('username');
        $password = bcrypt($request->input('newpass'));
        $role = $request->input('role');
        $oldpass = $request->input('oldpass');
        $users = Users::find($id);
        if (!is_numeric($phone)) {
            return redirect('admin/users')->with('error', 'This Phone Number Not Valid!');
        }
        if (empty($role)) {
            return redirect('admin/users')->with('warning', 'Please Choose a Role!');
        }
        if ($request->hasFile('image')) {
            $image = $request->file('image')->getClientOriginalName();
            $target_dir = public_path('assets/img/');
            $target_file = $target_dir . basename($image);

            $imgFileType = pathinfo($target_file, PATHINFO_EXTENSION);

            if (!in_array($imgFileType, ['png', 'jpg', 'webp'])) {
                return redirect('admin/users')->with('warning', 'Only accept image formats JPG, PNG, or WEBP!');
            }

            $image_name = 'image' . time() . '-' . $request->name . '.'
                . $request->image->extension();
            $request->image->move(public_path('assets/img'), $image_name);
            if (!empty($password)) {
                $users->update([
                    'First_name' => $First_name,
                    'Last_name' => $Last_name,
                    'phone' => $phone,
                    'username' => $username,
                    'password' => $password,
                    'role_id' => $role,
                    'image' => $image_name
                ]);
            } else {
                $users->update([
                    'First_name' => $First_name,
                    'Last_name' => $Last_name,
                    'phone' => $phone,
                    'username' => $username,
                    'password' => $oldpass,
                    'role_id' => $role,
                    'image' => $image_name
                ]);
            }
        } else {
            $userimg = Users::get()->where('id', $id);
            foreach ($userimg as $user){
                $image_name = $user->image;
            }
            if (!empty($password)) {
                $users->update([
                    'First_name' => $First_name,
                    'Last_name' => $Last_name,
                    'phone' => $phone,
                    'username' => $username,
                    'password' => $password,
                    'role_id' => $role,
                    'image' => $image_name
                ]);
            } else {
                $users->update([
                    'First_name' => $First_name,
                    'Last_name' => $Last_name,
                    'phone' => $phone,
                    'username' => $username,
                    'password' => $oldpass,
                    'role_id' => $role,
                    'image' => $image_name
                ]);
            }
        }
        return redirect('admin/users')->with('success', 'Update User Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $users = Users::find($id);
        $users->delete();
        return redirect('admin/users')->with('success', 'Delete User Successfully!');
    }
}
