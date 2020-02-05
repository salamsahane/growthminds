<?php
namespace App\Utils;

class Image{

    private static function resizeProcess($resourceType, $imageWidth, $imageHeight, $resizeWidth, $resizeHeight)
	{
		$imageLayer = imagecreatetruecolor($resizeWidth, $resizeHeight);
		imagecopyresampled($imageLayer, $resourceType, 0, 0, 0, 0, $resizeWidth, $resizeHeight, $imageWidth, $imageHeight);
		return $imageLayer;
    }
    
    public static function resize(int $imageType, string $imageName, int $src_width, int $src_height, int $new_with, int $new_height, string $path): bool
	{
		switch ($imageType) {
			case IMAGETYPE_JPEG:
				$resourceType = imagecreatefromjpeg($imageName);
				$imageLayer = self::resizeProcess($resourceType, $src_width, $src_height, $new_with, $new_height);
				return imagejpeg($imageLayer, $path);
				break;
			case IMAGETYPE_GIF:
				$resourceType = imagecreatefromgif($imageName);
				$imageLayer = self::resizeProcess($resourceType, $src_width, $src_height, $new_with, $new_height);
				return imagegif($imageLayer, $path);
				break;
			case IMAGETYPE_PNG:
				$resourceType = imagecreatefrompng($imageName);
				$imageLayer = self::resizeProcess($resourceType, $src_width, $src_height, $new_with, $new_height);
				return imagepng($imageLayer, $path);
				break;
			default:
				return false;
				break;
		}
	}

}