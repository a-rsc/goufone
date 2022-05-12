<?php

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

// $input = ['Ontario', new stdClass, 'mike', 'papa', 'leptoN', ['arr1','arr2','arr3'], 1, 'interferon', 2, 'delta', new StdClass, '1', ['arr4','arr5','arr6'], '0', '2', 0, 1, 4];

$input = ['ONaaaaTario', new stdClass, 'mike', 'papa', 'leptoN', ['arr1','arr2','arr3'], 1, 'interferon', 2, 'delta', new StdClass, '1', ['Onaaaatario','arr5','arr6'], '0', '2', 0, 1, 4];

