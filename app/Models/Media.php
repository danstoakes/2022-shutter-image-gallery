<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Spatie\Image\Image;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media as BaseMedia;

class Media extends BaseMedia implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    /**
     * Returns the width of the image.
     * 
     * @return int  the width
     */
    public function getWidth ()
    {
        $image = Image::load($this->getPath());

        return $image->getWidth();
    }

    /**
     * Returns the height of the image.
     * 
     * @return int  the height
     */
    public function getHeight ()
    {
        $image = Image::load($this->getPath());

        return $image->getHeight();
    }

    /**
     * Returns a string representation of the image dimensions.
     * 
     * @return string  the dimensions as a string
     */
    public function getDimensionsString ()
    {
        return $this->getWidth() . " by " . $this->getHeight() . " pixels";
    }

    /**
     * Returns a human-readable string representation of a file size.
     * 
     * @param int  $size  the file size in bytes
     * @return string  the formatted size string
     */
    public function getHumanReadableSize ($size)
    {
        if ($size == 0)
            return "0.00 B";

        $s = array("B", "KB", "MB", "GB", "TB", "PB");
        $e = floor(log($size, 1024));

        return round($size / pow(1024, $e), 2). " " . $s[$e];
    }
}