<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function showProfile()
    {
        $user = User::find(Auth::user()->id);
        return view('admin.profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        if ($request->userid == User::findOrFail(Auth::user()->id)->userid) {
            $this->validate($request, [
                'name' => 'required',
                'userid' => 'required',
                'about' => 'sometimes|max:255',
                'image' => 'sometimes|image|mimes:jpg,png,bmp,jpeg|max:2000',
            ]);
        } else {
            $this->validate($request, [
                'name' => 'required',
                'userid' => 'required|unique:users',
                'about' => 'sometimes|max:255',
                'image' => 'sometimes|image|mimes:jpg,png,bmp,jpeg|max:2000',
            ]);
        }


        $user = User::findOrFail(Auth::user()->id);
        if ($request->image != null) {
            //image
            $image = $request->image;
            $imageName = Str::slug($request->name, '-') . uniqid() . '.' . $image->getClientOriginalExtension();

            if (!Storage::disk('public')->exists('user')) {
                Storage::disk('public')->makeDirectory('user');
            }
            //delete old image
            if ($user->image !== 'default.jpg' && Storage::disk('public')->exists('user/' . $user->image)) {
                Storage::disk('public')->delete('user/' . $user->image);
            }
            $userImg = Image::make($image)->fit(200, 200)->stream();
            Storage::disk('public')->put('user/' . $imageName, $userImg);
        } else {
            $imageName = $user->image;
        }
        $user->name = $request->name;
        $user->userid = $request->userid;
        $user->image = $imageName;
        $user->about = $request->about;
        $user->save();

        return redirect()->back();
    }

    public function changePassword(Request $request)
    {
        $this->validate($request, [
            'old_password' => 'required',
            'password' => 'required|max:255|confirmed',
        ]);

        $oldPassword = Auth::user()->password;
        if (Hash::check($request->old_password, $oldPassword)) {
            if (!Hash::check($request->password, $oldPassword)) {
                $user = User::find(Auth::id());
                $user->password = Hash::make($request->password);
                $user->save();
                Auth::logout();
                return redirect()->back();
            } else {
                return redirect()->back();
            }
        } else {
            return redirect()->back();
        }
    }
}
