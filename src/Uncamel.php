<?php
/**
 * Uncamel case a string
 *
 * @package SalernoLabs
 * @subpackage Camelize
 * @author Eric Salerno
 */
namespace SalernoLabs\Camelize;

class Uncamel
{
    /**
     * @var string
     */
    private $replacementCharacter = '_';

    /**
     * @var bool
     */
    private $shouldCapitalizeFirstLetter = false;

    /**
     * Set replacement character
     *
     * @param $character
     * @return $this
     */
    public function setReplacementCharacter($character)
    {
        $this->replacementCharacter = $character;

        return $this;
    }

    /**
     * Set should capitalize first character
     *
     * @param $capitalizeFirstCharacter
     * @return $this
     */
    public function setShouldCapitalizeFirstCharacter($capitalizeFirstCharacter)
    {
        $this->shouldCapitalizeFirstLetter = $capitalizeFirstCharacter;

        return $this;
    }

    /**
     * Uncamelize a string
     *
     * @param $input
     * @return string
     */
    public function uncamelize($input)
    {
        $input = trim($input);

        if (empty($input))
        {
            throw new \Exception("Can not uncamelize an empty string.");
        }

        $output = '';

        for ($i = 0; $i < mb_strlen($input); ++$i)
        {
            $character = mb_substr($input, $i, 1);

            $isCapital = ($character == mb_strtoupper($character));

            if ($isCapital)
            {
                //We don't want to add the replacement character if its the first one in the list so we don't prepend
                if ($i != 0)
                {
                    $output .= $this->replacementCharacter;
                }

                if ($this->shouldCapitalizeFirstLetter)
                {
                    $output .= $character;
                }
                else
                {
                    $output .= mb_strtolower($character);
                }
            }
            else
            {
                if ($i == 0 && $this->shouldCapitalizeFirstLetter)
                {
                    $output .= mb_strtoupper($character);
                }
                else
                {
                    $output .= $character;
                }
            }
        }

        return $output;
    }
}