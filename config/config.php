<?php

$types_of_a_variable = [
    'boolean', 'integer', 'double', 'string', 'array', 'object', 'resource', 'NULL', 'unknown type',
];

$options = [
    [
        'order' => 1,
        'question' => 'Ordenar original (el mateix input)',
    ],
    [
        'order' => 2,
        'question' => 'Ordenar inversament',
    ],
    [
        'order' => 3,
        'question' => 'Ordenar per tipus',
    ],
    [
        'order' => 4,
        'question' => 'Ordenar per tipus inversament',
    ],
    [
        'order' => 5,
        'question' => 'Filtrar per tipus',
    ],
    [
        'order' => 6,
        'question' => 'Filtrar per tipus inversament',
    ],
    [
        'order' => 7,
        'question' => 'Barrejar (Reordenar aleatòriament)',
    ],
    [
        'order' => 8,
        'question' => 'Resetejar al contingut a l\'array original',
    ],
    [
        'order' => 9,
        'question' => 'Eliminar tots els elements que no continguin més de 3 caràcters entre \'n\' i \'t\' (minúscules o majúscules',
    ],
];
