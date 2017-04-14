<?php
/**
 * Tests for Uncamelize
 *
 * @package SalernoLabs
 * @subpackage Tests
 * @author Eric Salerno
 */
namespace SalernoLabs\Tests\Camelize;

class UncamelTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @param $input
     * @param $expectedOutput
     * @dataProvider dataProviderForCamelCasing
     */
    public function testUncamelCasing($input, $expectedOutput)
    {
        $uncamelCaser = new \SalernoLabs\Camelize\Uncamel();

        $this->assertEquals($expectedOutput, $uncamelCaser->uncamelize($input));
    }

    /**
     * Data provider for camel casing test
     */
    public function dataProviderForCamelCasing()
    {
        $output = [
            ['SomeTextWithHungarian', 'some_text_with_hungarian'],
            ['more random_Strange notation', 'more_random_strange_notation'],
            ['  asdf', 'asdf']
        ];
    }
}