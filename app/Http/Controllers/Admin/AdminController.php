<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $admin = User::where('id', auth()->user()->id)->where('role', 'admin')->first();

        return view('admin.pages.admin.index', compact('admin'));
    }

    public function edit($id)
    {
        $admin = User::find($id);

        return view('admin.pages.admin.edit', compact('admin'));
    }

    public function update(Request $request, $id)
    {
        $data = User::findOrFail($id);

        if($request->password){
            $request->validate([
                'name'=> 'required|max:25',
                'phone' =>'required|unique:users,phone,'.$id,
                'password'=>'required|string|min:6|max:20',
                'password_confirmation'=>'same:password',
                'role' => 'required'
            ]);
    
            $request->merge([
                'password' => bcrypt($request->password)
            ]);
    
            }else{
                $request->validate([
                    'name'=> 'required|max:25',
                    'phone' =>'required|unique:users,phone,'.$id,
                    'role' => 'required'
                ]);
            }

        if ($request->password) {
            $data->update($request->all());
        }else{
            $data->update($request->except('password'));
        }
        
        return redirect()->route('admins.index')->with('success-edit', 'berhasil mengedit akun admin');
    }
}
