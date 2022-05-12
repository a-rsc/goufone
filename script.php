<?php

require('./goufone.php');

/**
 * Hola,
 * T'envio el plantejament de la prova.
 * L'execució és lliure, però planteja-ho en tots els aspectes com si fos per un entorn productiu.
 *
 * Hauria d'estar realitzat en PHP, ser senzill, autònom i que funcioni sense requerir cap framework.
 * Un cop tinguis la proposta, jo et passaré un codi amb unes crides d'exemple i les sortides que produeixen i podràs alterar la proposta si creus que cal.
Si tens cap dubte, comentem-ho.
 *
 * DESCRIPCIÓ
 *
 * Et proporciono un array divers $input (més avall);
 * Cal una 'llibreria' que permeti realitzar amb els seus elements, en qualsevol ordre i tants cops com calgui, les següents modificacions:
 *
 * Ordenar (+inversament)
 * Ordenar per tipus (+inversament)
 * Filtrar per tipus (+inversament)
 * Barrejar (Reordenar aleatòriament)
 * Resetejar al contingut a l'array original
 * Eliminar tots els elements que no continguin més de 3 caràcters entre 'n' i 't' (minúscules o majúscules)
 *
 * Pel que fa a la sortida, a més de retornar el resultat final, el codi s'executarà via CLI i també s'hauria de poder imprimir el contingut de l'array en qualsevol moment, així com l'historial de les modificacions que s'ha realitzat per arribar-hi.
 *
 */

$input = ['Ontario', new stdClass, 'mike', 'papa', 'leptoN', ['arr1','arr2','arr3'], 1, 'interferon', 2, 'delta', new StdClass, '1', ['arr4','arr5','arr6'], '0', '2', 0, 1, 4];

print_r($input);

// 1. Ordenar (+inversament)
// Inversament
$input_reverse = array_reverse($input);

// 2. Ordenar per tipus (+inversament) SORT_REGULAR
// Normal
$input_sort_by_type = $input;
sort($input_sort_by_type);
// Inversament
$input_reverse_by_type = array_reverse($input_sort_by_type);

// $type = 'string';
$type = 'integer';
// $type = 'array';
// $type = 'object';

// 3. Filtrar per tipus (+inversament)
print_r(array_filter($input, function($var) use($type) {
    return gettype($var) === $type;
}));






// print_r($input_sort);
// print_r($input_reverse);

