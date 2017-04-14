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
     * @covers \SalernoLabs\Camelize\Uncamel::uncamelize
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
        return [
            ['ThisIsCamelCaseSensitive', 'this_is_camel_case_sensitive'],
            ['SomeTextWithHungarian', 'some_text_with_hungarian'],
            ['moreRandomStrangeNotation', 'more_random_strange_notation'],
            ['  asdf', 'asdf']
        ];
    }

    /**
     * Test uncamel casing with caps
     * @covers \SalernoLabs\Camelize\Uncamel::setShouldCapitalizeFirstCharacter
     * @param $input
     * @param $expectedOutput
     * @dataProvider dataProviderForCasedUncamelCasing
     */
    public function testUncamelCasingWithCaps($input, $expectedOutput)
    {
        $uncamelCaser = new \SalernoLabs\Camelize\Uncamel();
        $uncamelCaser->setShouldCapitalizeFirstCharacter(true);

        $this->assertEquals($expectedOutput, $uncamelCaser->uncamelize($input));
    }

    /**
     * Data provider
     *
     * @return array
     */
    public function dataProviderForCasedUncamelCasing()
    {
        return [
            ['óhNoYoûDidnt', 'Óh_No_Yoû_Didnt'],
            ['Onebigword', 'Onebigword'],
            ['ThisIsCamelCaseSensitive', 'This_Is_Camel_Case_Sensitive']
        ];
    }
}