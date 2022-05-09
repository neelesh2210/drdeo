<?php

namespace App\CPU;

use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ImageManager
{

    public static function upload(string $dir, string $format, $image = null)
    {
        if ($image != null)
        {
            $imageName = Carbon::now()->toDateString() . "-" . uniqid() . "." . $format;
            if (!Storage::disk('public')->exists($dir))
            {
                Storage::disk('public')->makeDirectory($dir);
            }
            Storage::disk('public')->put($dir . $imageName, file_get_contents($image));

            $src= Storage::path('public/'.$dir.'/'.$imageName);
            $dist= Storage::path('public/'.$dir.'/'.$imageName);
            $dis_width =500;
            $img = '';
	        $extension = strtolower(strrchr($src, '.'));
	        switch($extension)
	        {
		        case '.jpg':
		        case '.jpeg':
			        $img = imagecreatefromjpeg($src);
			        break;
		        case '.gif':
			        $img = imagecreatefromgif($src);
			        break;
		        case '.png':
			        $img = imagecreatefrompng($src);
			        break;
		        case '.webp':
			        $img = imagecreatefromwebp($src);
			        break;
	        }
	        $width = imagesx($img);
	        $height = imagesy($img);
	        $dis_height = $dis_width * ($height / $width);
	        $new_image = imagecreatetruecolor($dis_width, $dis_height);
            imagefill($new_image, 0, 0, imagecolorallocate($new_image, 255, 255, 255));
	        imagecopyresampled($new_image, $img, 0, 0, 0, 0, $dis_width, $dis_height, $width, $height);
	        $imageQuality = 90;
	        switch($extension)
	        {
		        case '.jpg':
		        case '.jpeg':
                    if (imagetypes() & IMG_JPG)
                    {
                        imagejpeg($new_image, $dist, $imageQuality);
                    }
                    break;
		        case '.gif':
                    if (imagetypes() & IMG_GIF)
                    {
                        imagegif($new_image, $dist);
                    }
			        break;
		        case '.png':
			        $scaleQuality = round(($imageQuality/100) * 9);
			        $invertScaleQuality = 9 - $scaleQuality;
			        if (imagetypes() & IMG_PNG)
                    {
				        imagepng($new_image, $dist, $invertScaleQuality);
			        }
			        break;
	        }
	        imagedestroy($new_image);

        }
        else
        {
            $imageName = 'def.png';
        }
        return $imageName;
    }

    public static function update(string $dir, $old_image, string $format, $image = null)
    {
        if (Storage::disk('public')->exists($dir . $old_image)) {
            Storage::disk('public')->delete($dir . $old_image);
        }
        $imageName = ImageManager::upload($dir, $format, $image);
        return $imageName;
    }

    public static function delete($full_path)
    {
        if (Storage::disk('public')->exists($full_path)) {
            Storage::disk('public')->delete($full_path);
        }

        return [
            'success' => 1,
            'message' => 'Removed successfully !'
        ];

    }
}
