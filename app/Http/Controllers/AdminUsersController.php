<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Photo;
use App\Role;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\View\View;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Http\Response|View
     */
    public function index()
    {
        //
        $users=User::all();
        return  View('admin.users.index' ,compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Http\Response|View
     */
    public function create()
    {
        //
        $arrayOfRolesNames=[];
        $roles=Role::all();
        foreach ($roles as $role){
            array_push($arrayOfRolesNames,  $role->name);
        }
    //    var_dump($arrayOfRolesNames);

        return view('admin.users.create' ,compact('arrayOfRolesNames'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    public function store(UserRequest $request)
    {
        // UserRequest to apply required fields
        if($request->password==''){
            $input=$request->except('password');
        }
        $input=$request->all();
        if($file=$request->file('photo_id')){
            $name=time().$file->getClientOriginalName();
            $file->move('images' ,$name) ;

            $photo=Photo::create(['file'=>$name]);
            $input['photo_id']=$photo->id ;
           // return  'photo exist' ;
        }
        $input['password']=bcrypt($request->password);
        User::create($input);

        return  redirect('/admin/users');
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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Http\Response|View
     */
    public function edit($id)
    {
        //
        $user=User::findorfail($id);
        $arrayOfRolesNames=[];
        $roles=Role::all();
        foreach ($roles as $role){
            array_push($arrayOfRolesNames,  $role->name);
        }
        return  view('admin.users.edit' ,compact('arrayOfRolesNames' ,'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Http\Response|View
     */
    public function update(Request $request, $id)
    {
        //
        $user=User::findOrFail($id);

      //  return view('admin.users.index');
        $input=$request->all();
        if($file=$request->file('photo_id')){
            $name=time().$file->getClientOriginalName();
            $file->move('images' ,$name) ;

            $photo=Photo::create(['file'=>$name]);
            $input['photo_id']=$photo->id ;
            // return  'photo exist' ;
        }
        $input['password']=bcrypt($request->password);
        $user->update($input);

        return  redirect('/admin/users');
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
    }
}
