<?php

namespace W360\Support\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Intervention\Image\ImageManager;

trait HasUploadImage
{

    private function loadImage(Request $request, $fieldNewImage="image",  $oldImage="", $namespace="other", $width=360, $height=360): string
    {
        if( $request->hasFile($fieldNewImage) ){
            $image = $request->file($fieldNewImage);
            $fileName = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Log::info( $fileName);

            $destinationPath = public_path('/uploads/'.$namespace.'/'.$width.'x'.$height);
            $manager = new ImageManager();
            $imgFile = $manager->make($image->getRealPath());

            $imgFile->resize($width, $height, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$fileName);

            $originalDestinationPath = public_path('/uploads/'.$namespace);
            $image->move($originalDestinationPath, $fileName);

            return "/uploads/".$namespace."/".$fileName;
        }
        return $oldImage;
    }

}
