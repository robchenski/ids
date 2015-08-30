<?php 
defined('C5_EXECUTE') or die(_("Access Denied."));

class DeluxeImageGalleryHelper {
	
	//Scales and crops (if necessary) the given image to fit the new dimensions,
	// and saves it to the new path.
	public function create($originalPath, $newPath, $newWidth, $newHeight) {
		$originalImageData = @getimagesize($originalPath);
		$originalWidth = $originalImageData[0];
		$originalHeight = $originalImageData[1];
		
		if (($newWidth >= $originalWidth) && ($newHeight >= $originalHeight)) {
			//new width+height is BIGGER than original width+height -- do not scale or crop.
			$scaleToWidth = $originalWidth;
			$scaleToHeight = $originalHeight;
			$newWidth = $originalWidth;
			$newHeight = $originalHeight;
			$cropWidth = false;
			$cropHeight = false;
		} else if ($newHeight >= $originalHeight && $newWidth <= $originalWidth) {
			//crop to width only -- don't scale anything
			$scaleToWidth = $originalWidth;
			$scaleToHeight = $originalHeight;
			$newHeight = $originalHeight;
			$cropWidth = true;
			$cropHeight = false;
		} else if ($newWidth >= $originalWidth && $newHeight <= $originalHeight) {
			//crop to height only -- don't scale anything
			$scaleToHeight = $originalHeight;
			$scaleToWidth = $originalWidth;
			$newWidth = $originalWidth;
			$cropWidth = false;
			$cropHeight = true;
		} else {
			//Scale down until we hit one of the new dimensions, then crop the other dimension.
			$widthRatio = $originalWidth / $newWidth;
			$heightRatio = $originalHeight / $newHeight;
			
			if ($widthRatio < $heightRatio) {
				//we'll scale to width's proportion, then crop height to target
				$scaleToWidth = $newWidth;
				$scaleToHeight = $originalHeight / $widthRatio;
				$cropWidth = false;
				$cropHeight = true;
			} else {
				//we'll scale to height's proportion, then crop width to target
				$scaleToWidth = $originalWidth / $heightRatio;
				$scaleToHeight = $newHeight;
				$cropWidth = true;
				$cropHeight = false;
			}
		}

		$newImage = @imageCreateTrueColor($newWidth, $newHeight);
				
		$imageType = $originalImageData[2];
		switch($imageType) {
			case IMAGETYPE_GIF:
				$im = @imageCreateFromGIF($originalPath);
				break;
			case IMAGETYPE_JPEG:
				$im = @imageCreateFromJPEG($originalPath);
				break;
			case IMAGETYPE_PNG:
				$im = @imageCreateFromPNG($originalPath);
				break;
		}


		if ($im) {
			
			// Better transparency - thanks for the ideas and some code from mediumexposure.com
			if (($imageType == IMAGETYPE_GIF) || ($imageType == IMAGETYPE_PNG)) {
				$trnprt_indx = imagecolortransparent($im);
				
				// If we have a specific transparent color
				if ($trnprt_indx >= 0) {
			
					// Get the original image's transparent color's RGB values
					$trnprt_color = imagecolorsforindex($im, $trnprt_indx);
					
					// Allocate the same color in the new image resource
					$trnprt_indx = imagecolorallocate($newImage, $trnprt_color['red'], $trnprt_color['green'], $trnprt_color['blue']);
					
					// Completely fill the background of the new image with allocated color.
					imagefill($newImage, 0, 0, $trnprt_indx);
					
					// Set the background color for new image to transparent
					imagecolortransparent($newImage, $trnprt_indx);
					
				
				} else if ($imageType == IMAGETYPE_PNG) {
				
					// Turn off transparency blending (temporarily)
					imagealphablending($newImage, false);
					
					// Create a new transparent color for image
					$color = imagecolorallocatealpha($newImage, 0, 0, 0, 127);
					
					// Completely fill the background of the new image with allocated color.
					imagefill($newImage, 0, 0, $color);
					
					// Restore transparency blending
					imagesavealpha($newImage, true);
			
				}
			}
			

			//FIGURE OUT CROP DIMENSIONS...
			$src_x = 0;
			$src_y = 0;
			
			//Calculate cropping to center image
			if ($cropWidth) {
			   $src_x = round(($originalWidth - ($newWidth * $originalHeight / $newHeight)) * 0.5);
			}
			if ($cropHeight) {
			   $src_y = round(($originalHeight - ($newHeight * $originalWidth / $newWidth)) * 0.5);
			}

			//SCALE/CROP:
			$res = @imageCopyResampled($newImage, $im, 0, 0, $src_x, $src_y, $scaleToWidth, $scaleToHeight, $originalWidth, $originalHeight);
			if ($res) {
				switch($imageType) {
					case IMAGETYPE_GIF:
						imageGIF($newImage, $newPath);
						break;
					case IMAGETYPE_JPEG:
						$compression = defined('AL_THUMBNAIL_JPEG_COMPRESSION') ? AL_THUMBNAIL_JPEG_COMPRESSION : 80; //Concrete < 5.4.1 didn't have this constant
						imageJPEG($newImage, $newPath, $compression);
						break;
					case IMAGETYPE_PNG:
						imagePNG($newImage, $newPath);
						break;
				}
			}
		}
	}
	
	/** 
	 * Returns a path to the specified item, resized to meet max width and height. $obj can either be
	 * a string (path) or a file object. 
	 * Returns an object with the following properties: src, width, height, alt
	 * @param mixed $obj
	 * @param int $maxWidth
	 * @param int $maxHeight
	 */
	public function getThumbnail($obj, $maxWidth, $maxHeight) {
		if ($obj instanceof File) {
			$path = $obj->getPath();
		} else {
			$path = $obj;
		}		
		
		$fh = Loader::helper('file');
		if (file_exists($path)) {
			$filename = md5('cropped:' . $path . ':' . $maxWidth . ':' . $maxHeight . ':' . filemtime($path)) . '.' . $fh->getExtension($path);
		} else {
			$filename = md5('cropped:' . $path . ':' . $maxWidth . ':' . $maxHeight . ':') . $fh->getExtension($path);
		}
		//Note that we prefixed paths with 'cropped' to differentiate these from those created by the normal image helper.

		if (!file_exists(DIR_FILES_CACHE . '/' . $filename)) {
			// create image there
			$this->create($path, DIR_FILES_CACHE . '/' . $filename, $maxWidth, $maxHeight);
		}
		
		$src = REL_DIR_FILES_CACHE . '/' . $filename;
		$abspath = DIR_FILES_CACHE . '/' . $filename;
		$thumb = new stdClass;
		if (isset($abspath) && file_exists($abspath)) {			
			$thumb->src = $src;
			$dimensions = getimagesize($abspath);
			$thumb->width = $dimensions[0];
			$thumb->height = $dimensions[1];
			return $thumb;
		}					
	}
}
