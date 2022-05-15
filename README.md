# Goufone prueba de PHP

> Realizado por Álvaro Rodríguez Santa Cruz

Resolución de la prueba técnica:

Empezamos...

Clonar el repositorio <https://github.com/a-rsc/goufone>

`git clone https://github.com/a-rsc/goufone goufone`

---
## Terminal

Ejecutar el siguiente comando por el terminal:

`php app\script.php`

y seguir las instrucciones que se muestran.

---
## Comentarios:

### Primera parte

La verdad es que en líneas generales no me ha resultado muy difícil, aún así un ejercicio de este tipo require su tiempo y una buena organización.

Reconozco que he consultado ciertas cosas por google como por ejemplo: interactuar con el usuario a través del terminal, algunas funciones nativas de php (arrays), etc.

Tampoco estoy convencido si el enunciado (requerimientos iniciales) corresponde a cómo lo he planteado. Por ejemplo:
Quizás, se pedía introducir el array input a través del cliente... ;-((  He supuesto que el input se introduce en el mismo fichero enunciado ***1stPart.php***.
Quizás, todas las funciones de las opciones del menú se deberían pasar por referencia y, de este modo, alterar continuamente el array ***$input*** según las opciones escogidas por el usuario. Lo he pensado cuando he intentado resolver la opción 'Resetear el input inicial'. La verdad es que yo no lo reseteo, ya que siempre opero con el mismo array ***$input***.

En cualquier caso, creo que el desarrollo de la primera parte es suficiente para evaluar mi estilo de código.

### Segunda parte

He diseñado una clase llamado Test para realizar las distintas pruebas que se piden. Lo más curioso que destacaría es que he utilizado la función **strcasecmp(gettype($var), $type) == 0** en lugar de la típica comparación **gettype($var) === $type**. ¿El motivo? Por que me parece mucho más eficiente y se deben emplear menos cambios con tipos como NULL,unknown type, etc.

Muchas gracias, Álvaro Rodríguez Santa Cruz
