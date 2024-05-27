<?php
/**
 * This file is part of the Cloudinary PHP package.
 *
 * (c) Cloudinary
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Cloudinary\Transformation;

/**
 * Trait CropTrait
 *
 * @api
 */
trait CropTrait
{
    /**
     * Extracts a region of the given width and height out of the original image.
     *
     * @param int|float|string|null $width   The required width of a transformed asset.
     * @param int|float|null        $height  The required height of a transformed asset.
     * @param Gravity               $gravity Which part of the original image to include.
     * @param int|float|X           $x       Horizontal position for custom-coordinates based cropping
     * @param int|float|Y           $y       Vertical position for custom-coordinates based cropping
     *
     * @return Crop
     */
    public static function crop($width = null, $height = null, $gravity = null, $x = null, $y = null)
    {
        return static::createCrop(CropMode::CROP, $width, $height, $gravity, $x, $y);
    }

    /**
     * The thumb cropping mode is specifically used for creating image thumbnails from either face or custom
     * coordinates, and must always be accompanied by the gravity qualifier set to one of the face detection or custom
     * values.
     *
     * @param int|float|string|null $width   The required width of a transformed asset.
     * @param int|float|null        $height  The required height of a transformed asset.
     * @param Gravity               $gravity Which part of the original image to include.
     * @param int|float|X           $x       Horizontal position for custom-coordinates based cropping
     * @param int|float|Y           $y       Vertical position for custom-coordinates based cropping
     *
     * @return Crop
     */
    public static function thumbnail($width = null, $height = null, $gravity = null, $x = null, $y = null)
    {
        return static::createCrop(CropMode::THUMBNAIL, $width, $height, $gravity, $x, $y);
    }

    /**
     * Automatically determines the best crop based on the gravity and specified dimensions.
     *
     * If the requested dimensions are smaller than the best crop, the result is downscaled.
     * If the requested dimensions are larger than the original image, the result is upscaled.
     * Use this mode in conjunction with the g (gravity) parameter.
     *
     * @param int|float|string|null $width   The required width of a transformed asset.
     * @param int|float|null        $height  The required height of a transformed asset.
     * @param Gravity               $gravity Which part of the original image to include.
     *
     * @return Crop
     */
    public static function auto($width = null, $height = null, $gravity = null)
    {
        return static::createCrop(CropMode::AUTO, $width, $height, $gravity);
    }

    /**
     * Creates Crop instance.
     *
     * @param mixed ...$args
     *
     * @return Crop
     */
    protected static function createCrop(...$args)
    {
        return new Crop(...$args);
    }
}
