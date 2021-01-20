<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Role;

use Illuminate\Http\Request;

class AsignroleController extends Controller
{
    //
    public function index()
    {
        //

        $data = User::all();
      // dd($data[0]->roles);
        return view('asignrole.index', compact('data'));

    }
    public function edit($id)
    {
        //
        $data = User::find($id);
        $allroles = Role::all();
      // echo($data->roles->role_id);
        //dd($allroles);
        //dd($data);
       // dd($data->roles->toArray());
       

        return view('asignrole.edit', compact('data', 'allroles'));
    }
    public function update(Request $request, $id)
    {
        //
        $this->validate($request, [
            'roles_id'     =>  'required'
           
           
        ]);

        $checkedroles = $request->roles_id;

        //$product->shops()->sync([1, 2, 3]);

       
        $user = User::find($id);
       // $user = User::where('id', $id);
        //dd($user->roles);
        $user->roles()->sync($checkedroles);
        


        //User::where('id', $id)->update($form_data);
        //$user->update($form_data);
        return redirect()->route('asignrole.index')
                        ->with('success','Role Assigned successfully');
    }




}
