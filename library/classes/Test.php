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

    /**
     * Reset
     *
     * @return Test
     */
    public function reset(): Test {
        echo '############## With execution stack:';
        echo PHP_EOL;
        echo __FUNCTION__;
        echo PHP_EOL;

        $this->input = $this->original;

        return $this;
    }

    /**
     * Shuffle
     *
     * @return Test
     */
    public function shuffle(): Test {
        echo __FUNCTION__;
        echo PHP_EOL;

        shuffle($this->input);

        return $this;
    }

    /**
     * Sort
     *
     * @param boolean $reverse
     * @return Test
     */
    public function sort(bool $reverse = FALSE): Test {
        echo __FUNCTION__;
        echo $reverse ? ' (inverse)' : NULL;
        echo PHP_EOL;

        if ($reverse) {
            $this->input = array_reverse($this->input);
        }

        return $this;
    }

    /**
     * Sort by type
     *
     * @param boolean $reverse
     * @return Test
     */
    public function sortByType(bool $reverse = FALSE): Test {
        echo __FUNCTION__;
        echo $reverse ? ' (inverse)' : NULL;
        echo PHP_EOL;

        sort($this->input);

        if ($reverse) {
            $this->input = array_reverse($this->input);
        }

        return $this;
    }

    /**
     * Filter by type
     *
     * @param string $type
     * @param boolean $reverse
     * @return Test
     */
    public function filterByType(string $type, bool $reverse = FALSE): Test {
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

    /**
     * Filter by regex
     *
     * @return Test
     */
    public function filterByRegex(): Test {
        echo __FUNCTION__ . " '{$this->pattern}'";
        echo PHP_EOL;

        $this->input = array_filter($this->input, function($var) {
            return $this->goufone_substr_more_than_3_characters_between_n_t($var);
        });

        return $this;
    }

    /**
     * Returns whether the input has more than 3 characters between 'n' and 't'
     *
     * @param mixed $var
     * @return boolean
     */
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
