<?php
namespace SalernoLabs\Tests\Camelize;

use PHPUnit\Framework\TestCase;
use SalernoLabs\Camelize\Uncamel;

/**
 * Tests for Uncamelize
 *
 * @package SalernoLabs
 * @subpackage Tests
 * @author Eric Salerno
 */
class UncamelTest extends TestCase
{
    /**
     * @param string $input The input string
     * @param string $expectedOutput The expected output string
     * @dataProvider dataProviderForCamelCasing
     * @throws \Exception But shouldn't here
     */
    public function testUncamelCasing(string $input, string $expectedOutput)
    {
        $uncamelCaser = new Uncamel();

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
     * @param string $input The expected input
     * @param string $expectedOutput The expected output
     * @dataProvider dataProviderForCasedUncamelCasing
     * @throws \Exception But shouldn't here
     */
    public function testUncamelCasingWithCaps(string $input, string $expectedOutput)
    {
        $uncamelCaser = new Uncamel();
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
            ['ThisIsCamelCaseSensitive', 'This_Is_Camel_Case_Sensitive'],
            ['helloWorld', 'Hello_World'],
        ];
    }

    /**
     * Test set replacement character
     * @throws \Exception But it won't
     */
    public function testSetReplacementCharacter()
    {
        $uncamelCaser = new Uncamel();
        $uncamelCaser
            ->setReplacementCharacter('X')
            ->setShouldCapitalizeFirstCharacter(true);

        $this->assertSame('HelloXWorld', $uncamelCaser->uncamelize('helloWorld'));
    }

    /**
     * @throws \Exception Thats why we're here
     */
    public function testInvalidInput()
    {
        $this->expectException(\Exception::class);
        $uncamelCaser = new Uncamel();

        $uncamelCaser->uncamelize('');
    }
}
