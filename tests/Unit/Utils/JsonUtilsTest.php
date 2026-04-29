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

use Cloudinary\JsonUtils;
use Exception;
use PHPUnit\Framework\TestCase;

/**
 * Class JsonUtilsTest
 */
final class JsonUtilsTest extends TestCase
{
    public function testDecode()
    {
        self::assertEquals(
            ['foo' => 'bar'],
            JsonUtils::decode('{"foo": "bar"}')
        );

        $this->expectException(Exception::class);
        JsonUtils::decode('{NOT_A_JSON}');
    }

    /**
     * @dataProvider isJsonStringProvider
     */
    public function testIsJsonString(mixed $input, bool $expected): void
    {
        self::assertSame($expected, JsonUtils::isJsonString($input));
    }

    public static function isJsonStringProvider(): array
    {
        return [
            'valid JSON object'               => ['{"foo":"bar"}', true],
            'valid JSON array'                => ['[1,2,3]', true],
            'empty JSON object'               => ['{}', true],
            'empty JSON array'                => ['[]', true],
            'nested JSON object'              => ['{"a":{"b":1}}', true],
            'JSON scalar string'              => ['"hello"', false],
            'JSON scalar integer'             => ['42', false],
            'JSON boolean true'               => ['true', false],
            'JSON null'                       => ['null', false],
            'invalid JSON'                    => ['{NOT_JSON}', false],
            'empty string'                    => ['', false],
            'non-string integer'              => [42, false],
            'non-string array'                => [['foo' => 'bar'], false],
            'non-string null'                 => [null, false],
            'non-string boolean'              => [false, false],
            'object with leading whitespace'  => [' {"foo":"bar"}', false],
        ];
    }
}
