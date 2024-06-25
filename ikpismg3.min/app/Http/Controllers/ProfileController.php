<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProfileRequest;
use App\Http\Requests\PasswordRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
// use Image;
use DB;
use File;

class ProfileController extends Controller
{
    /**
     * Show the form for editing the profile.
     *
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        return view('profile.edit');
    }

    /**
     * Update the profile
     *
     * @param  \App\Http\Requests\ProfileRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProfileRequest $request)
    {
        auth()->user()->update($request->all());

        return Redirect::to(URL::previous() . "#userProfile")->withStatus(__('Profile successfully updated.'));

        // return back()->withStatus(__('Profile successfully updated.'));
    }

    /**
     * Change the password
     *
     * @param  \App\Http\Requests\PasswordRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function password(PasswordRequest $request)
    {
        auth()->user()->update(['password' => Hash::make($request->get('password'))]);

        return Redirect::to(URL::previous() . "#userPasswordProfile")->withStatusPassword(__('Password successfully updated.'));
    }

    /**
     * Update the avatar
     *
     * @param  \App\Http\Requests\PasswordRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update_avatar(Request $request) {
        
        // Validate first
        $this->validate($request, [
          'avatar' => 'required|image|mimes:jpg,png,jpeg,bmp,gif,svg,ico',
        ]);

        //get info file path
        $fileName = DB::table('users')
                    ->where('id', $request->user_id)
                    ->get(array(
                        'avatar'
        ));

        // get file path
        foreach ($fileName as $fn) {
            // $fName = $fn->avatar;
            // $image_path = public_path('storage\avatars\\'.$fn->avatar);
            $image_path = $fn->avatar;
        }

        //remove the old one if exists
        if (File::exists($image_path)){
            File::delete($image_path);
        }

        //if upload submitted
        if($request->hasFile('avatar')){
            $resource = $request->file('avatar');
            $fileType = $request->file('avatar')->getMimeType();
            $avatarName = auth()->user()->id.'_avatar'.time().'.'.request()->avatar->getClientOriginalExtension();
            
            $uploadpath = 'storage/avatars/';
            $resource->move($uploadpath, $avatarName);

            $avatarName_thumb = 'thumb_'.$avatarName;
            //set location
            $loc = ''.$uploadpath.''.$avatarName;
            $thumbImageLoc = $uploadpath.'thumbs/'.$avatarName_thumb;
            chmod (public_path($loc), 0777);

            //get dimensions of the original image
            list($width_org, $height_org) = getimagesize($loc);

            //get image coords
            $x = $request->x;
            $y = $request->y;
            $width = $request->w;
            $height = $request->h;
            $scaled_width = $request->sw;
            $scaled_height = $request->sh;

            //define the final size of the cropped image
            $width_new = Round($width*($width_org/$scaled_width));
            $height_new = Round($height*($height_org/$scaled_height));

            $swidth = Round($width*($width_org/$scaled_width));
            $sheight = Round($height*($height_org/$scaled_height));

            $finalX = Round($x*($width_org/$scaled_width));
            $finalY = Round($y*($height_org/$scaled_height));
            
            //crop and resize image
            $newImage = imagecreatetruecolor($width_new,$height_new);

            switch($fileType) {
                case "image/gif":
                    $source = imagecreatefromgif($loc); 
                    break;
                case "image/pjpeg":
                case "image/jpeg":
                case "image/jpg":
                    $source = imagecreatefromjpeg($loc); 
                    break;
                case "image/png":
                case "image/x-png":
                    $source = imagecreatefrompng($loc); 
                    break;
            }
            
            imagecopyresampled($newImage,$source,0,0,$finalX,$finalY,$width_new,$height_new,$swidth,$sheight);

            switch($fileType) {
                case "image/gif":
                    imagegif($newImage,$thumbImageLoc); 
                    break;
                case "image/pjpeg":
                case "image/jpeg":
                case "image/jpg":
                    imagejpeg($newImage,$thumbImageLoc); 
                    break;
                case "image/png":
                case "image/x-png":
                    imagepng($newImage,$thumbImageLoc);  
                    break;
            }

            // $uploadpath_new = $uploadpath.'/thumbs';
            // $avatarName_new = 'thumb_'.$avatarName;

            // $newImage->move($uploadpath_new, $avatarName);

            $save = DB::table('users')
                ->where('id', $request->user_id)
                ->update(['avatar' => $thumbImageLoc]);
            
            imagedestroy($newImage);
            File::delete($loc);

            return Redirect::to(URL::previous() . "#userImageProfile")
            ->with('success','You have successfully upload image.');
        }else{
            return Redirect::to(URL::previous() . "#userImageProfile")
            ->with('Image upload failed.');
            // echo "Gagal upload gambar";
        }
    }
}
