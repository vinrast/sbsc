<?php

namespace App\Http\Traits;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
trait ImageManager
{
  public function uploadImage($avatar)
  {
    $filename = time() . '.' . $avatar->getClientOriginalExtension();
    Image::make($avatar)->resize(190, 215)->save( public_path('/vendor/adminlte/images/' . $filename));
    return $filename;
  }

  public function deleteImage($image)
  {
    $image_path = public_path('vendor/adminlte/images/').$image;
    if(File::exists($image_path))
    {
      File::delete($image_path);
    }
  }
}
