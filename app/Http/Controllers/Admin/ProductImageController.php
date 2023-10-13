<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Intervention\Image\Constraint;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\File;



class ProductImageController extends Controller
{
    public function update(Request $request) {

        $image = $request->image;
        $extension = $image->getClientOriginalExtension();
        $sourcePath = $image->getPathName();

        $productImage = new ProductImage();
        $productImage->product_id = $request->product_id;
        $productImage->image = 'NULL';
        $productImage->save();

        $productImageName = $request->product_id.'-'.$productImage->id.'-'.time().'.'.$extension;
        $productImage->image = $productImageName;
        $productImage->save();

         // Generate Themnails.

        // Large.

        $desPath = public_path().'/uploads/products/large/'.$productImageName;
        $image = Image::make($sourcePath);
        $image->resize(1400, null, function ($constraint) {
            $constraint->aspectRatio();
        });

        $image->save($desPath);

        // Small.
        $desPath = public_path().'/uploads/products/small/'.$productImageName;
        $image = Image::make($sourcePath);
        $image->fit(300,300);
        $image->save($desPath);

        return response()->json([
            'status' => true,
            'image_id' => $productImage->id,
            // 'ImagePath' => url('uploads/products/small/'. $productImage->image),
            'message' => 'Image Added SuccessFully'
        ]);
    }


    public function destroy(Request $request) {

    $productImage = ProductImage::find($request->id);

    if (empty($productImage)) {

        return response()->json([
            'status' => false,
            'message' => 'Image Not Found'
        ]);
    }

    // Delete Images
    File::delete(public_path('uploads/products/large/'. $productImage->image));
    File::delete(public_path('uploads/products/small/'. $productImage->image));

    $productImage->delete();

    return response()->json([
        'status' => true,
        'message' => 'Image Delete Successfully',
    ]);

    }
}
