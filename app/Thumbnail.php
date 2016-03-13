<?php
/**
 * Created by PhpStorm.
 * User: James
 * Date: 12/20/2015
 * Time: 1:33 AM
 */

namespace App;

use Intervention\Image\Facades\Image;


class Thumbnail
{
    public function make($src, $destination)
    {
        Image::make($src)
            ->fit(200)
            ->save($destination);
    }
}