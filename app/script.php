<?php

define('AUTHOR', 'Álvaro Rodríguez Santa Cruz');

require '../config/config.php';
require './1stPart.php';
require '../library/library.php';
// require '../library/cli.php';

// 2ndPart

class Test
{
    public array $types_of_a_variable = [
        'boolean', 'integer', 'double', 'string', 'array', 'object', 'resource', 'null', 'unknown type',
    ];

    public array $original;
    public array $input;

    public function __construct(array $input) {
        $this->original = $input;
        $this->input = $input;
    }

    public function __toString() {
        echo '---- array content is:';
        echo PHP_EOL;

        return print_r($this->input, TRUE);
    }

    public function reset() {
        echo '############## With execution stack:';
        echo PHP_EOL;
        echo __FUNCTION__;
        echo PHP_EOL;

        $this->input = $this->original;

        return $this;
    }

    public function shuffle() {
        echo __FUNCTION__;
        echo PHP_EOL;

        shuffle($this->input);

        return $this;
    }

    public function sort(bool $reverse = FALSE) {
        echo __FUNCTION__;
        echo $reverse ? ' (inverse)' : NULL;
        echo PHP_EOL;

        if ($reverse) {
            $this->input = array_reverse($this->input);
        }

        return $this;
    }

    public function sortByType(bool $reverse = FALSE) {
        echo __FUNCTION__;
        echo $reverse ? ' (inverse)' : NULL;
        echo PHP_EOL;

        sort($this->input);

        if ($reverse) {
            $this->input = array_reverse($this->input);
        }

        return $this;
    }

    public function filterByType(string $type, bool $reverse = FALSE) {
        echo __FUNCTION__ . " '{$type}'";
        echo $reverse ? ' (inverse)' : NULL;
        echo PHP_EOL;

        $this->input = in_array($type, $this->types_of_a_variable)
            ? array_filter($this->input, function($var) use($type) {
                return strcasecmp(gettype($var), $type) == 0;
            })
            : array();

        if ($reverse) {
            $this->input = array_reverse($this->input);
        }

        return $this;
    }

    public function filterByRegex() {
        echo __FUNCTION__;
        echo PHP_EOL;

        $this->input = array_filter($this->input, function($var) {
            return $this->goufone_substr_more_than_3_characters_between_n_t($var);
        });

        return $this;
    }

    private function goufone_substr_more_than_3_characters_between_n_t(mixed $var): bool {
        $pattern = '/n.{4,}t/i';
        $matches = array();

        if (strcasecmp(gettype($var), 'string') == 0)
        {
            preg_match($pattern, $var, $matches);
        }
        else if (strcasecmp(gettype($var), 'array') == 0)
        {
            foreach ($var as $value)
            {
                if (strcasecmp(gettype($var), 'string') == 0)
                {
                    preg_match($pattern, $value, $matches);

                    if (! empty($matches)) break;
                }
            }
        }

        return ! empty($matches);
    }
}

// Test run
$test = new Test($input);

echo $test->reset()->shuffle()->filterByType('string', TRUE)->sortByType(TRUE);
echo $test->reset()->filterByRegex()->sort();
echo $test->reset()->filterByType('integer')->sort(TRUE);
