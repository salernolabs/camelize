<?php
namespace SalernoLabs\Tests\Camelize;

use PHPUnit\Framework\TestCase;
use SalernoLabs\Camelize\Camel;

/**
 * Tests for Camel Casing
 *
 * @package SalernoLabs
 * @subpackage Tests
 * @author Eric Salerno
 */
class CamelTest extends TestCase
{
    /**
     * @param string $input The input string
     * @param string $expectedOutput The expected output string
     * @dataProvider dataProviderForCamelCasing
     * @throws \Exception But shouldn't here
     */
    public function testCamelCasing($input, $expectedOutput)
    {
        $camelCaser = new Camel();

        $this->assertEquals($expectedOutput, $camelCaser->camelize($input));
    }

    /**
     * Data provider for camel casing test
     */
    public function dataProviderForCamelCasing()
    {
        return [
            ['some_text_WITH_hungarian', 'SomeTextWithHungarian'],
            ['more random_Strange notation', 'MoreRandomStrangeNotation'],
            ['  asdf', 'Asdf'],
            ['óh_no_yoû_didnt', 'ÓhNoYoûDidnt']
        ];
    }

    /**
     * @throws \Exception But won't
     */
    public function testCapitalizeFirstLetter()
    {
        $camelCaser = new Camel();
        $camelCaser->setCapitalizeFirstLetter(true);

        $this->assertEquals('HelloThere', $camelCaser->camelize('hello there'));
    }

    /**
     * Test invalid input
     * @throws \Exception But thats why we're here
     */
    public function testInvalidInput()
    {
        $camelCaser = new Camel();
        $this->expectException(\Exception::class);
        $camelCaser->camelize('');
    }
}
