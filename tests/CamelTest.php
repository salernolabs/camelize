<?php
/**
 * Tests for Camel Casing
 *
 * @package SalernoLabs
 * @subpackage Tests
 * @author Eric Salerno
 */
namespace SalernoLabs\Tests\Camelize;

class CamelTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @param $input
     * @param $expectedOutput
     * @dataProvider dataProviderForCamelCasing
     */
    public function testCamelCasing($input, $expectedOutput)
    {
        $camelCaser = new \SalernoLabs\Camelize\Camel();

        $this->assertEquals($expectedOutput, $camelCaser->camelize($input));
    }

    /**
     * Data provider for camel casing test
     */
    public function dataProviderForCamelCasing()
    {
        $output = [
            ['some_text_WITH_hungarian', 'SomeTextWithHungarian'],
            ['more random_Strange notation', 'MoreRandomStrangeNotation'],
            ['  asdf', 'Asdf']
        ];
    }
}