 Desenvolvimento
=================

O presente documento traz informações que visam estabelecer regras gerais
para o funcionamento das classes e projetos da AEON DIGITAL.


&nbsp;
&nbsp;


## Classe BObject
-----------------

Tem por objetivo servir de base para TODAS as demais classes geradas em TODOS
os projetos.

Nela, estarão implementados vários ``métodos mágicos`` do PHP com o objetivo
geral de impedir seus usos indevidos (sem o devida definição nas classes
concretas).


&nbsp;
&nbsp;


## Retornos dos métodos
-----------------------

SEMPRE QUE POSSÍVEL, será pedido para que os métodos tenham um retorno que
indique claramente quando ele foi ou não corretamente executado.

Preferencialmente o retorno deve ser um valor booleano ``true/false``.


&nbsp;
&nbsp;


## Exceptions
-------------

Em várias interfaces haverão referências a como implementar exceptions para
alguns métodos. É importante notar que, TANTO QUANTO POSSÍVEL, será pedido
para que, nas classes concretas, as exceptions apenas sejam lançadas se for
considerado REALMENTE IMPORTANTE.

Um método que receba um argumento inválido por exemplo deveria, em princípio,
apenas não funcionar e ter seu retorno marcado como ``false``.

Apenas em casos onde retornar ``false`` possa causar uma falha de interpretação
substancial do real resultado daquele método é que as exceptions deveriam ser
lançadas.
