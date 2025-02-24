<?php
/**
 * This file is part of the Cloudinary PHP package.
 *
 * (c) Cloudinary
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Cloudinary\Transformation\Expression;

/**
 * Methods for managing operators.
 *
 * @api
 */
class Operator extends BaseOperator
{
    /**
     * @var array $operatorTypes The supported operator types.
     */
    private static array $operatorTypes = [
        ArithmeticOperator::class,
        LogicalOperator::class,
        RelationalOperator::class,
        StringRelationalOperator::class,
    ];

    /**
     * @var array $operators The supported operators.
     */
    protected static array $operators = [];
    /**
     * @var array $friendlyRepresentations The user-friendly representations of the operators.
     */
    protected static array $friendlyRepresentations = [];

    /**
     * Gets all supported operators.
     *
     * @return array The supported operators.
     */
    public static function operators(): array
    {
        if (! empty(self::$operators)) {
            return self::$operators;
        }

        foreach (self::$operatorTypes as $opType) {
            self::$operators += $opType::operators();
        }

        return self::$operators;
    }

    /**
     * Gets user friendly representations of the operators.
     *
     */
    public static function friendlyRepresentations(): array
    {
        if (! empty(self::$friendlyRepresentations)) {
            return self::$friendlyRepresentations;
        }

        foreach (self::$operatorTypes as $opType) {
            self::$friendlyRepresentations += $opType::friendlyRepresentations();
        }

        return self::$friendlyRepresentations;
    }
}
