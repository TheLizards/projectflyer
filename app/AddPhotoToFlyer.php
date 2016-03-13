<?php

namespace App;

use Symfony\Component\HttpFoundation\File\UploadedFile;


class AddPhotoToFlyer
{
    /**
     * @var Flyer
     */
    protected $flyer;
    /**
     * The Flyer instance
     *
     * @var
     */
    protected $photo;

    /**
     * @var UploadedFile
     */
    protected $file;

    /**
     * @param Flyer $flyer
     * @param UploadedFile $file
     * @param Thumbnail|null $thumbnail
     */
    public function __construct(Flyer $flyer, UploadedFile $file, Thumbnail $thumbnail = null)
    {
        $this->flyer = $flyer;
        $this->file = $file;
        $this->thumbnail = $thumbnail ?: new Thumbnail;
    }

    /**
     * Process the form
     *
     * @return void
     */
    public function save()
    {
        //attach the photo to flyer
        $photo = $this->flyer->addPhoto($this->makePhoto());

        //move the photo to images folder
        $this->file->move($photo->baseDir(), $photo->name);

        //generate thumbnail
        $this->thumbnail->make($photo->path, $photo->thumbnail_path);
    }

    /**
     * @return Photo
     */
    protected function makePhoto()
    {
        return new Photo([
            'name' => $this->makeFileName()
        ]);
    }

    /**
     * @return string
     */
    protected function makeFileName()
    {
        $name = sha1(
            time() . $this->file->getClientOriginalName()
        );

        $extension = $this->file->getClientOriginalExtension();

        return "{$name}.{$extension}";
    }
}