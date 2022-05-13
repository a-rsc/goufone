<?php

class Test
{
    private array $original, $input;
    private string $pattern = '/n.{4,}t/i';

    public function __construct(array $input) {
        $this->original = $input;
        $this->input = $input;
    }

    public function __toString() {
        echo '---- Array content is:';
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

        $this->input = in_array($type, PHP_TYPES_OF_A_VARIABLE)
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
        echo __FUNCTION__ . " '{$this->pattern}'";
        echo PHP_EOL;

        $this->input = array_filter($this->input, function($var) {
            return $this->goufone_substr_more_than_3_characters_between_n_t($var);
        });

        return $this;
    }

    private function goufone_substr_more_than_3_characters_between_n_t(mixed $var): bool {
        $matches = array();

        if (strcasecmp(gettype($var), 'string') == 0)
        {
            preg_match($this->pattern, $var, $matches);
        }
        else if (strcasecmp(gettype($var), 'array') == 0)
        {
            foreach ($var as $value)
            {
                if (strcasecmp(gettype($var), 'string') == 0)
                {
                    preg_match($this->pattern, $value, $matches);

                    if (! empty($matches)) break;
                }
            }
        }

        return ! empty($matches);
    }
}
