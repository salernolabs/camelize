# camelize

Simple library to perform camel and uncamel casing of words or phrases. The library is designed to by multibyte character safe. PHPUnit tests are included.

Not sure just how useful this is as a library but I've used it for some code modification processes in the past.

## Usage

First include the library with composer.

    composer require salernolabs/camelize

### Camel Casing

The camel casing utility assumes your input string is hungarian notation, or something similar. To camel case something, try this:

    $camelizer = new \SalernoLabs\Camelize\Camel();

    $output = $camelizer->camelize('some_text_in_some_notation');

    echo $output;

This should output "SomeTextInSomeNotation". You can also do:

    //Defaults to true
    $camelizer->setShouldCapitalizeFirstCharacter(false);

 And the resulting output would be "someTextInSomeNotation".

 ### Uncamel Casing

 The uncamel casing utility assumes your input string is already in Camel Case notation. To uncamelize something, try this:

    $uncamelizer = new \SalernoLabs\Camelize\Uncamel();

    $output = $uncamelizer->uncamelize('SomeTextInCamelCase');

    echo $output;

This should output "some_text_in_camel_case". You can also do:

    //Defaults to false
    $uncamelizer->setShouldCapitalizeFirstCharacter(true);

And the resulting output would be "Some_Text_In_Camel_Case".