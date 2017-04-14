<?php
/**
 * Camel Case Class
 *
 * @package SalernoLabs
 * @subpackage Camelize
 * @author Eric Salerno
 */
namespace SalernoLabs\Camelize;

class Camel
{
    /**
     * @var bool
     */
    private $shouldCapitalizeFirstLetter = true;

    /**
     * Configure the camel caser to capitalize the first letter
     *
     * @param $shouldCapitalize
     * @return $this
     */
    public function setCapitalizeFirstLetter($shouldCapitalize)
    {
        $this->shouldCapitalizeFirstLetter = $shouldCapitalize;

        return $this;
    }

    /**
     * Camel Case a String
     *
     * @param $input
     * @return string
     */
    public function camelize($input)
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
            $character = $input[$i];

            if ($character == '_' || $character == ' ')
            {
                $capitalizeNext = true;
            }
            else
            {
                if ($capitalizeNext)
                {
                    $capitalizeNext = false;
                    $output .= strtoupper($character);
                }
                else
                {
                    $output .= strtolower($character);
                }
            }
        }

        return $output;
    }
}