<?php

function goufone_option_1(array $input): array
{
    return $input;
}

function goufone_option_2(array $input): array
{
    return array_reverse(goufone_option_1($input));
}

function goufone_option_3(array $input): array
{
    sort($input);

    return $input;
}

function goufone_option_4(array $input): array
{
    return array_reverse(goufone_option_3($input));
}

function goufone_option_5(array $input, string $type): array
{
    return in_array($type, PHP_TYPES_OF_A_VARIABLE)
        ? array_filter($input, function($var) use($type) {
            return goufone_array_filter_by_type($var, $type);
        })
        : array();
}

function goufone_option_6(array $input, string $type): array
{
    return array_reverse(goufone_option_5($input, $type));
}

function goufone_option_7(array $input): array
{
    shuffle($input);

    return $input;
}

function goufone_option_8(array $input): array
{
    return array();
}

function goufone_option_9(array $input): array
{
    return array_filter($input, function($var) {
        return goufone_substr_more_than_3_characters_between_n_t($var);
    });
}

/**
 * Returns whether the input type is type
 *
 * @param mixed $var
 * @param string $type
 * @return boolean
 */
function goufone_array_filter_by_type(mixed $var, string $type): bool
{
    return strcasecmp(gettype($var), $type) == 0;
}

/**
 * Returns whether the input has more than 3 characters between 'n' and 't'
 *
 * @param mixed $var
 * @return boolean
 */
function goufone_substr_more_than_3_characters_between_n_t(mixed $var): bool
{
    $pattern = '/n.{4,}t/i';
    $matches = array();

    if (gettype($var) === 'string')
    {
        preg_match($pattern, $var, $matches);
    }
    else if (gettype($var) === 'array')
    {
        foreach ($var as $value)
        {
            if (gettype($value) === 'string')
            {
                preg_match($pattern, $value, $matches);

                if (! empty($matches)) break;
            }
        }
    }

    return ! empty($matches);
}
