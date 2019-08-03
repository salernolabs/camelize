<?php
namespace SalernoLabs\Camelize;

/**
 * Camel Case Class
 *
 * @package SalernoLabs
 * @subpackage Camelize
 * @author Eric Salerno
 */
class Camel
{
    /**
     * @var bool
     */
    private $shouldCapitalizeFirstLetter = true;

    /**
     * Configure the camel caser to capitalize the first letter
     * @param bool $shouldCapitalize Should we capitalize or not?
     * @return $this
     */
    public function setCapitalizeFirstLetter(bool $shouldCapitalize): self
    {
        $this->shouldCapitalizeFirstLetter = $shouldCapitalize;

        return $this;
    }

    /**
     * Camel Case a String
     * @param string $input The input string to camelize
     * @return string
     * @throws \Exception If the input is empty
     */
    public function camelize(string $input): string
    {
        $input = trim($input);

        if (empty($input))
        {
            throw new \Exception("Can not camelize an empty string.");
        }

        $output = '';
        $capitalizeNext = $this->shouldCapitalizeFirstLetter;

        for ($i = 0; $i < mb_strlen($input); ++$i)
        {
            $character = mb_substr($input, $i, 1);

            if ($character == '_' || $character == ' ')
            {
                $capitalizeNext = true;
            }
            else
            {
                if ($capitalizeNext)
                {
                    $capitalizeNext = false;
                    $output .= mb_strtoupper($character);
                }
                else
                {
                    $output .= mb_strtolower($character);
                }
            }
        }
        return $output;
    }
}
