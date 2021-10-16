<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserController extends Controller {
    public function __construct()
    {
        $this->middleware('permission:add user |edit user|delete user',['only'=> ['index','show']]);
    
        $this->middleware('permission:add user',['only'=> ['create','store']]);
        $this->middleware('permission:edit user',['only'=> ['edit','store']]);
        $this->middleware('permission:delete user',['only'=> ['destroy']]);
    }
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function index() {
        // $role = Role::create( ['name' => 'admin'] );
        // $permission = Permission::create( ['name' => 'edit user'] );
        // $role=Role::find(5);
        // $permission=Permission::find(11);
        // $role->givePermissionTo($permission);
        // auth()->user()->assignRole('writer');
        // $user=User::find(1);
        // $user->givePermissionTo('add category');
        // auth()->user()->givePermissionTo('add category');
        $users=User::orderBy('id','DESC')->get();
        return view('user.index')->with(compact('users'));


    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function create() {
        //
        return view('user.create');


    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */

    public function store( Request $request ) {
        //
    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function show( $id ) {
        //
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function edit( $id ) {
        //
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function update( Request $request, $id ) {
        //
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function destroy( $id ) {
        //
    }
    public function phanquyen($id)
    {
        $users=User::find($id);
        // $name_roles=$users->roles->first()->name;
        $role=Role::orderBy('id','DESC')->get();
        $permission=Permission::orderBy('id','DESC')->get();
        $all_column_roles=$users->roles->first();
      
        return view('user.phanquyen')->with(compact('users','role','all_column_roles','permission'));
    }
    public function insert_roles(Request $request ,$id ) {
        $data=$request->all();
        $user=User::find($id);
        $user->syncRoles($data['role']);
        $role_id=$user->roles->first()->id; 
        return redirect()->back()->with('status','Thêm role thành công');
    }
}
