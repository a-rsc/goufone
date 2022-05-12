<?php

/**
 * Returns whether the input type is type
 *
 * @param mixed $var
 * @param string $type
 * @return boolean
 */
function filter_by_type(mixed $var, string $type): bool
{
    return gettype($var) === $type;
}