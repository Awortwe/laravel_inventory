<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        $notification = array(
            'message' => 'User logged out successfully',
            'alert-type' => 'success'
        );
        return redirect('/login')->with($notification);
    }

    public function admin_profile()
    {
        $id = Auth::user()->id;
        $admin_profile = User::find($id);
        return view('admin.admin_profile', compact('admin_profile'));
    }

    public function edit_profile()
    {
        $id = Auth::user()->id;
        $edit_profile = User::find($id);
        return view('admin.edit_profile', compact('edit_profile'));
    }

    public function update_profile(Request $request)
    {
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->username = $request->username;
        $data->email = $request->email;

        if($request->file('profile_image'))
        {
            $file = $request->file('profile_image');
            $filename = time(). '.' .$file->getClientOriginalExtension();
            $file->move(public_path('uploads/admin_images/'), $filename);
            $data['profile_image'] = $filename;
        }

        $data->save();
        $notification = array(
            'message' => 'User profile updated successfully',
            'alert-type' => 'success'
        );
        return redirect()-> route('admin.profile')->with($notification);
    }

    public function change_password()
    {
        return view('admin.admin_change_password');
    }

    public function update_password(Request $request)
    {
         $request->validate([
            'oldpassword' => 'required',
            'newpassword' => 'required',
            'confirmpassword' => 'required|same:newpassword'
        ]);

        $hashedpassword = Auth::user()->password;
        if(Hash::check($request->oldpassword, $hashedpassword))
        {
            $id = Auth::user()->id;
            $user = User::find($id);
            $user->password = bcrypt($request->newpassword);
            $user->save();

            session()->flash('message', 'Password updated successfully');
            return redirect()->back();
        }
        else
        {
            session()->flash('message', 'Old passwords do not match');
            return redirect()->back();
        }
    }
}
