<?php

namespace App\Helpers;


use App\Exceptions\ImageOptimizationError;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;


class Image
{
    /**
     * @var ImageManager
     */
    private $manager;

    /**
     * @var \Intervention\Image\Image
     */
    private $image;

    /**
     * Image constructor.
     * @param ImageManager $manager
     */
    public function __construct(ImageManager $manager)
    {
        $this->manager = $manager;
    }

    /**
     * @param Request $request
     * @param string $name
     * @return Image
     * @throws ImageOptimizationError
     */
    public function fromRequest(Request $request, string $name): self
    {
        try {
            $path = $request->file($name)->getRealPath();
            $this->image = $this->manager->make($path);
        } catch (\Throwable $t) {
            throw new ImageOptimizationError($t->getMessage(), $t->getCode(), $t);
        }

        return $this;
    }

    /**
     * @param int $max
     * @return Image
     */
    public function resize(int $max = 400): self
    {
        $this->image->resize($max, null, function($c) {
            $c->aspectRatio();
            $c->upsize();
        });

        return $this;
    }

    /**
     * @param string $format
     * @param int $quality
     * @return Image
     */
    public function encode(string $format = 'jpg', int $quality = 90): self
    {
        $this->image->encode($format, $quality);

        return $this;
    }

    /**
     * @return $this
     */
    public function save(): self
    {
        $this->image->save();

        return $this;
    }
}