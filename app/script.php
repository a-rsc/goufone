<?php

require '../config/config.php';

require './1stPart.php';

// 1stPart - terminal
// require '../library/library.php';
// require '../library/cli.php';

// 2ndPart - test
require '../library/classes/Test.php';

$test = new Test($input);

echo $test->reset()->shuffle()->filterByType('string', TRUE)->sortByType(TRUE);
echo $test->reset()->filterByRegex()->sort();
echo $test->reset()->filterByType('integer')->sort(TRUE);
