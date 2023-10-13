<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TempImage;
use Intervention\Image\ImageManagerStatic as Image;


class TempImagesController extends Controller
{
    public function create(Request $request) {
        $image = $request->image;

        if (!empty ($image)) {
            $extension = $image->getClientOriginalExtension();
            $newName = time().'.'.$extension;

            $tempImage = new TempImage();
            $tempImage->name = $newName;
            $tempImage->save();

            $image->move(public_path().'/tempary', $newName);

            // Generate Thembnail.
            $sourcePath = public_path().'/tempary/'.$newName;
            $desPath = public_path(). '/tempary/thumbnail/'. $newName;
            $image = Image::make($sourcePath);
            $image->fit(300,275);
            $image->save($desPath);

        }

        return response()->json([
            'status' => true,
            'image_id' => $tempImage->id,
            'ImagePath' => url('/tempary/thumbnail/'.$newName),
            'message' => 'Image Uploaded Successfully'
        ]);

    }
}
