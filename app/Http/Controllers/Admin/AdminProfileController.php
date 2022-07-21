<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminProfileController extends Controller
{
    public function adminProfile()
    {
        $adminData = Admin::find(1);

        return view('admin.profile.admin_profile', compact('adminData'));
    }

    public function adminProfileStore(Request $request)
    {
        $data = Admin::find(1);
        $data->name = $request->name;
        $data->email = $request->email;

        // apakah user memasukkan photo?
        if ($request->file('profile_photo_path')) {
            // delete old photo
            @unlink(public_path('storage/' . $data->profile_photo_path));

            // store new photopath
            $photoPath = $request->file('profile_photo_path')->store('upload/admin_images', 'public');
            $data['profile_photo_path'] = $photoPath;
        }

        $data->save();

        $notification = array(
            'message' => 'Succeeded to Update Admin Profile',
            'alert-type' => 'success'
        );
        return Redirect()->route('admin.dashboard')->with($notification);
    }
}
