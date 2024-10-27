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

use Cloudinary\Transformation\Argument\ColorValue;

/**
 * Trait CropPadTrait
 *
 * @api
 */
trait CropPadTrait
{
    /**
     * Tries to prevent a "bad crop" by first attempting to use the auto cropping mode, but adding some padding if the
     * algorithm determines that more of the original image needs to be included in the final image.
     *
     * Especially useful if the aspect ratio of the delivered image is considerably different from the original's
     * aspect ratio.
     *
     * Only supported in conjunction with Automatic cropping (Gravity::auto())
     *
     * @param int|float|string|null        $width      The required width of a transformed asset.
     * @param int|float|null               $height     The required height of a transformed asset.
     * @param FocalGravity|string          $gravity    Specifies which part of the original image to include.
     * @param Background|ColorValue|string $background The background color of the image.
     *
     * @return CropPad
     *
     * @see Gravity::auto
     */
    public static function autoPad($width = null, $height = null, $gravity = null, $background = null)
    {
        return new CropPad(CropMode::AUTO_PAD, $width, $height, $gravity, $background);
    }
}
