<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use App\Role;
use Auth;
use Hash;
use App\User;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Admin::all();
        return view('admin.users.show',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $roles = Role::all();
        return view('admin.users.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // dd("store");
        $this->validate($request,[
            'name' => 'required|string|max:255',
            'email' => 'required|max:255|unique:admins',
            'password' => 'required|string|min:6',
            'phone' => 'required|numeric|min:10',
         ]);
            // dd(md5($request->password));
         $request['password'] = bcrypt($request->password);
         $users = Admin::create($request->all());
         $users->roles()->sync($request->role);
         return redirect(route('admin.users.index'));
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
        //
        $user =Admin::find($id);
        $roles = Role::all();
        // dd($roles);
        return view('admin.users.edit',compact('user','roles'));
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

        $this->validate($request,[
            'name' => 'required|string|max:255',
            'email' => 'required|max:255',
            'phone' => 'required|numeric|min:10',
            ]);
            $status = $request->status? : $request['status']=0;
            $user = Admin::where('id',$id)->update($request->except('_token','_method','role'));
            Admin::find($id)->roles()->sync($request->role);
        //   dd($role);
            return redirect(route('admin.users.index'))->with('message','User Updated Successfully...');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Admin::where('id', $id)->delete();
        return redirect(route('admin.users.index'))->with('message','User Deleted Successfully...');
    }
}
