<?php

declare(strict_types=1);

namespace AeonDigital\Interfaces\Collection;

use AeonDigital\Interfaces\Collection\iBasicCollection as iBasicCollection;







/**
 * Expande a interface ``iBasicCollection`` definindo a criação de uma coleção especializada
 * nos objetos de tipos definidos.
 *
 * Ex:
 * ```php
 *      $coll = new iTypedCollection("string");
 *      $coll->set("key1", "value1");    // true
 *      $coll->set("key2", "value2");    // true
 *      $coll->set("key3", 1);           // false
 *      $coll->set("key4", null);        // false
 * ```
 *
 *
 * Por padrão o valor ``null`` NÃO É ACEITO para nenhum item da coleção a não ser que seja
 * explicitamente definido que sim. Para isso se usa o caracter de interrogação ``?`` na frente
 * de qualquer tipo definido.
 *
 * Ex:
 * ```php
 *      $coll = new iTypedCollection("?string");
 *      $coll->set("key1", "value1");    // true
 *      $coll->set("key2", "value2");    // true
 *      $coll->set("key3", 1);           // false
 *      $coll->set("key4", null);        // true
 * ```
 *
 *
 * Uma coleção deve poder se especializar também em formatos compostos, em instâncias de classes,
 * ou objetos que implementem uma determinada interface.
 *
 * Ex:
 * ```php
 *      $coll = new iTypedCollection("[string, int, mixed]");
 *      $coll->set("key1", ["value1", 1, 10]);                      // true
 *      $coll->set("key2", ["value2", 2, "20"]);                    // true
 *      $coll->set("key3", ["value3", 3, null]);                    // true
 *      $coll->set("key4", ["value4", "4", 40]);                    // false
 *
 *      $coll = new iTypedCollection("[string => [DateTime, iTarget]]");
 *      $coll->set("key1", ["value1" => [$objDT1, $objITarget]]);   // true
 *      $coll->set("key2", ["value2" => [$objDT2, $nonITarget]]);   // false
 * ```
 *
 *
 * Por último, uma coleção deve poder ser ``autoincrement``, ou seja, permitir que o nome da chave
 * seja omitido ao inserir novos itens. Neste caso o nome será dado internamente por um contador
 * iniciando em zero.
 *
 *
 * Ex:
 * ```php
 *      $coll = new iTypedCollection("string", [], true);
 *      $coll->set("", "value1");                   // true
 *      $coll->set("", "value2");                   // true
 *
 *      var_dump($coll->toArray());
 *      // output:
 *      // [ ["0"] => "value1", ["1"] => "value2" ]
 * ```
 *
 *
 * **IMPORTANTE**:
 *
 * O tipo da coleção deve ser definido durante a etapa de construção da instância e após isto não
 * pode mais ser alterada.
 *
 *
 * @package     AeonDigital\Interfaces\Collection
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
interface iTypedCollection extends iBasicCollection
{



    /**
     * Indica se a coleção aceita valores ``null`` para seus valores.
     *
     * @return bool
     * Retornará ``true`` se valores ``null`` puderem ser definidos.
     */
    function isNullable(): bool;



    /**
     * Retorna o tipo de dado que é aceito para o valor dos itens da coleção.
     *
     * Se nenhum tipo for definido, o valor padrão é ``mixed``.
     *
     * Um sinal de interrogação ``?`` no início do nome do tipo indica que além de objetos
     * daquele próprio tipo, é aceito também ``null`` como um valor válido de ser armazenado na
     * coleção.
     *
     * @return string
     * ``String`` que demonstra o tipo de dado aceito para esta coleção.
     */
    function getType(): string;
}
