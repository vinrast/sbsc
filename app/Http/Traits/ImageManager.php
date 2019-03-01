<?php

namespace App\Http\Traits;
use Intervention\Image\Facades\Image;

trait ImageManager
{
  public function uploadImage($avatar)
  {
    $filename = time() . '.' . $avatar->getClientOriginalExtension();
    Image::make($avatar)->resize(300, 300)->save( public_path('/vendor/adminlte/images/' . $filename));
    return $filename;
  }
}
