<?php
/**
 * This file is part of the Cloudinary PHP package.
 *
 * (c) Cloudinary
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Cloudinary\Test\Unit\Utils;

use Cloudinary\ArrayUtils;
use PHPUnit\Framework\TestCase;

/**
 * Class ArrayUtilsTest
 */
final class ArrayUtilsTest extends TestCase
{
    public function testSortByArray()
    {
        $array = ['y' => 'y', 'z' => 'z', 'b' => 'b', 'a' => 'a'];

        $sortedArray = ['a' => 'a', 'b' => 'b', 'y' => 'y', 'z' => 'z'];

        $testOrder = ['z', 'b', 'y', 'a'];
        self::assertSame(
            ['z' => 'z', 'b' => 'b', 'y' => 'y', 'a' => 'a'],
            ArrayUtils::sortByArray($array, $testOrder)
        );

        $testOrderExtra = ['z', 'b', 'y', 'a', 'c', 'x'];
        self::assertSame(
            ['z' => 'z', 'b' => 'b', 'y' => 'y', 'a' => 'a'],
            ArrayUtils::sortByArray($array, $testOrderExtra)
        );

        $testOrderMissing = ['z', 'b'];
        self::assertSame(
            ['z' => 'z', 'b' => 'b', 'a' => 'a', 'y' => 'y'],
            ArrayUtils::sortByArray($array, $testOrderMissing)
        );

        $testOrderMissingWithExtra = ['z', 'b', 'c', 'x'];
        self::assertSame(
            ['z' => 'z', 'b' => 'b', 'a' => 'a', 'y' => 'y'],
            ArrayUtils::sortByArray($array, $testOrderMissingWithExtra)
        );

        $testEmptyOrder = [];
        self::assertSame(
            $sortedArray,
            ArrayUtils::sortByArray($array, $testEmptyOrder)
        );

        $testIrrelevantOrder = ['i', 'j', 'k'];
        self::assertSame(
            $sortedArray,
            ArrayUtils::sortByArray($array, $testIrrelevantOrder)
        );
    }

    public function testSafeImplode()
    {
        self::assertEquals(
            's,1,1.0,1.1,1.0',
            ArrayUtils::safeImplode(',', ['s', 1, 1.0, 1.1, '1.0'])
        );

        self::assertEquals(
            's,1,1.0,1.1,1.0',
            ArrayUtils::implodeFiltered(',', ['s', 1, 1.0, 1.1, '1.0', null])
        );
    }

    public function testSafeImplodeWithoutFloats()
    {
        self::assertSame('a,b,c', ArrayUtils::safeImplode(',', ['a', 'b', 'c']));
        self::assertSame('1,2,3', ArrayUtils::safeImplode(',', [1, 2, 3]));
        self::assertSame('', ArrayUtils::safeImplode(',', []));
    }

    public function testIsAssoc()
    {
        self::assertFalse(ArrayUtils::isAssoc([]));
        self::assertFalse(ArrayUtils::isAssoc(['a', 'b', 'c']));
        self::assertFalse(ArrayUtils::isAssoc([0 => 'a', 1 => 'b', 2 => 'c']));

        self::assertTrue(ArrayUtils::isAssoc(['a' => 1]));
        self::assertTrue(ArrayUtils::isAssoc([1 => 'a', 2 => 'b']));
        self::assertTrue(ArrayUtils::isAssoc([0 => 'a', 2 => 'c']));

        self::assertFalse(ArrayUtils::isAssoc('not_an_array'));
        self::assertFalse(ArrayUtils::isAssoc(null));
    }
}
