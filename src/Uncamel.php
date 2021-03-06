<?php
namespace SalernoLabs\Camelize;

/**
 * Uncamel case a string
 *
 * @package SalernoLabs
 * @subpackage Camelize
 * @author Eric Salerno
 */
class Uncamel
{
    /** @var string  */
    private const DEFAULT_REPLACEMENT_CHARACTER = '_';

    /**
     * @var string
     */
    private $replacementCharacter = self::DEFAULT_REPLACEMENT_CHARACTER;

    /**
     * @var bool
     */
    private $shouldCapitalizeFirstLetter = false;

    /**
     * Set replacement character
     * @param string $character The character to insert
     * @return $this
     */
    public function setReplacementCharacter(string $character): self
    {
        $this->replacementCharacter = $character;

        return $this;
    }

    /**
     * Set should capitalize first character
     * @param bool $capitalizeFirstCharacter Should we capitalize the first character or not
     * @return $this
     */
    public function setShouldCapitalizeFirstCharacter(bool $capitalizeFirstCharacter): self
    {
        $this->shouldCapitalizeFirstLetter = $capitalizeFirstCharacter;

        return $this;
    }

    /**
     * Uncamelize a string
     * @param string $input The input string to uncamelize
     * @return string
     * @throws \Exception If input is empty
     */
    public function uncamelize(string $input): string
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
                // We don't want to add the replacement character if its the first one in the list so we don't prepend
                if ($i !== 0)
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
                if ($i === 0 && $this->shouldCapitalizeFirstLetter)
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
