<?php

namespace App\Http\Controllers;


use App\Http\Requests\UpdateClientRequest;
use App\Models\Admin\Client;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;

class MyProfile extends Controller
{

    public function index()
    {
        return view('profile.account_profile');
    }

    public function update(UpdateClientRequest $request, $id)
    {
        $id=Crypt::decrypt($id);
        $user=Client::find($id);
        // dd($request->all());

        if ($request->hasFile('profile_img')) {

            //deleting the previous Image
            Storage::disk('public')->delete('users/' . $user->profile_img);
            //getting the image name
            $image_full_name = $request->profile_img->getClientOriginalName();
            $filename = pathinfo($image_full_name, PATHINFO_FILENAME);
            $extension = pathinfo($image_full_name, PATHINFO_EXTENSION);
            $image_name = $filename . time() . '.' . $extension;

            //storing image at public/storage/products/$image_name
            $request->profile_img->storeAs('users', $image_name, 'public');
        } else {
            $image_name = 'user-placeholder.jpg';
        }




       $test=$user->update([
           'first_name' => $request->first_name,
           'last_name' => $request->last_name,
           'email' => $request->email,
           'profile_img' => $image_name,
           'password' => Crypt::encrypt($request->password),
       ]);

    //    dd($test);



        //setting up success message
        if ($user) {
            $notification = array(
                'message' => 'Profile Updated',
                'alert-type' => 'success'
            );
        }
        //setting up error message
        else {
            $notification = array(
                'message' => 'Something went wrong!',
                'alert-type' => 'error'
            );
        }

        return redirect()->route('account')->with($notification);
    }
}
