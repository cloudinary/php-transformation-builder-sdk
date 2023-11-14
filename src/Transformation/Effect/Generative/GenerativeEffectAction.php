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
 * Class GenerativeEffectAction
 */
class GenerativeEffectAction extends EffectAction
{
    const MAIN_QUALIFIER = ListEffectQualifier::class;

    const MULTIPLE = 'multiple';
    const PROMPT   = 'prompt';
}
