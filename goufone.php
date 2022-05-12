<?php

/**
 * Returns whether the input type is type
 *
 * @param mixed $var
 * @param string $type
 * @return boolean
 */
function goufone_array_filter_by_type(mixed $var, string $type): bool
{
    return gettype($var) === $type;
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