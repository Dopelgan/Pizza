<?php

namespace App\Helpers\ImageEditor;

class ImageEditor
{

    protected $image;
    public $w;
    public $h;

    public function __construct($resource)
    {
        $this->image = $resource;
        $this->w = imagesx($this->image);
        $this->h = imagesy($this->image);
    }

    static public function createFromPath(string $path) : ImageEditor
    {
        return new ImageEditor(
            self::parseImage($path)
        );
    }

    static protected function parseImage(string $path)
    {

        try{

            $type = exif_imagetype($path);

            switch ($type){

                case IMAGETYPE_GIF:
                    return imagecreatefromgif($path);

                case IMAGETYPE_JPEG:
                    return imagecreatefromjpeg($path);

                case IMAGETYPE_PNG:
                    return imagecreatefrompng($path);

            }

        }catch (\Throwable $e){

        }

        throw new ImageEditorTypeError;

    }

    public function resize(int $w, int $h) : ImageEditor
    {

        $result = imagecreatetruecolor($w, $h);

        imagecopyresampled($result, $this->image, 0, 0, 0, 0, $w, $h, $this->w, $this->h);

        return new ImageEditor($result);

    }

    public function resizeAutoByW(int $w) : ImageEditor
    {

        $h = $this->h * ($w / $this->w);
        $h = (int)$h;

        return $this->resize($w, $h);

    }

    public function resizeAutoByH(int $h) : ImageEditor
    {

        $w = $this->w * ($h / $this->h);
        $w = (int)$w;

        return $this->resize($w, $h);

    }

    public function saveTo(string $path, int $type) : bool
    {

        switch($type){

            case IMAGETYPE_PNG:
                imagepng($this->image, $path);
                return true;

            case IMAGETYPE_JPEG:
                imagejpeg($this->image, $path);
                return true;

            case IMAGETYPE_GIF:
                imagegif($this->image, $path);
                return true;

        }

        return false;

    }

    public function saveToPNG(string $path) : bool {
        return $this->saveTo($path, IMAGETYPE_PNG);
    }

    public function saveToJPEG(string $path) : bool {
        return $this->saveTo($path, IMAGETYPE_JPEG);
    }

    public function saveToGIF(string $path) : bool {
        return $this->saveTo($path, IMAGETYPE_GIF);
    }

}
