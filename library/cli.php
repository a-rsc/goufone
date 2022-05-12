<?php

do {
    // popen('clear', 'w');
    echo PHP_EOL;
    echo chr(9) . 'Hola, a continuació es mostra el menú de les operacions disponibles:' . PHP_EOL;

    echo PHP_EOL;
    foreach ($options as $option) {
        echo chr(9) . "{$option['order']}. {$option['question']}" . PHP_EOL;
    }

    echo PHP_EOL;
    echo chr(9) . 'Escriu l\'opció desitjada [1-' . count($options) . '] o bé atura l\'execució [0|exit]: ';

    $handle = fopen ('php://stdin', 'r');
    $line = fgets($handle);
    $line = strtolower(trim($line));

    if (array_search($line, array_column($options, 'order')) !== false)
    {
        // 5. Filtrar per tipus
        // 6. Filtrar per tipus inversament
        if ($line === '5' OR $line === '6')
        {
            do {
                echo PHP_EOL;
                echo chr(9) . chr(9) . 'Per quin tipus de variable vols filtrar [' . implode('|', $types_of_a_variable) . ']: ';

                $subline = fgets($handle);
                $subline = strtolower(trim($subline));
            } while (! in_array($subline, $types_of_a_variable));

            $output = call_user_func("goufone_option_{$line}", $input, $subline, $types_of_a_variable);
        }
        else
        {
            $output = call_user_func("goufone_option_{$line}", $input);
        }

        echo PHP_EOL;
        print_r($output);
    }
} while ($line != '0' AND $line != 'exit');

echo PHP_EOL;
echo chr(9) . 'Moltes gràcies, ' . constant('AUTHOR') . '...' . PHP_EOL;

echo PHP_EOL;
