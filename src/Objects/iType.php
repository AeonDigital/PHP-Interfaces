<?php
declare (strict_types=1);

namespace AeonDigital\Interfaces\Objects;










/**
 * Interface que orienta a criação de classes concretas capazes de representar
 * ou especializar tipos ``iStandart`` definidos.
 *
 * @package     AeonDigital\Interfaces\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
interface iType
{



    /**
     * Retorna o namespace completo da classe ``Standart`` que
     * define esta instância.
     *
     * @return      string
     */
    static function standart() : string;
    /**
     * Retorna o namespace completo da classe usada por esta instância.
     * Em classes de tipo invariável retornará o mesmo resultado obtido pelo
     * método ``static::standart()``.
     *
     * @return      string
     */
    function getType() : string;



    /**
     * Valor padrão a ser definido para este tipo de instância caso nenhum valor válido
     * tenha sido explicitamente definido.
     *
     * @return      mixed
     */
    function default();
    /**
     * Retorna o menor valor aceitável para esta instância.
     * Quando ``null`` indica que não há limites definidos ou que isto não se aplica
     * para o tipo indicado.
     *
     * @return      mixed
     */
    function min();
    /**
     * Retorna o maior valor aceitável para esta instância.
     * Quando ``null`` indica que não há limites definidos ou que isto não se aplica
     * para o tipo indicado.
     *
     * @return      mixed
     */
    function max();



    /**
     * Retornará ``true`` enquanto nenhum valor for definido para
     * esta instância de forma explicita.
     *
     * @return      bool
     */
    function isUndefined() : bool;
    /**
     * Informa se esta instância aceita ``null`` como válido.
     *
     * @return      bool
     */
    function isAllowNull() : bool;
    /**
     * Informa se esta instância aceita ``""`` como um valor válido.
     * Esta configuação funciona apenas em casos de tipo ``string``.
     *
     * @return      bool
     */
    function isAllowEmpty() : bool;
    /**
     * Informa se esta instância é ``readonly``.
     *
     * Quando ``true``, após a criação da instância nenhum outro valor poderá
     * ser definido para a mesma
     *
     * @return      bool
     */
    function isReadOnly() : bool;
    /**
     * Informa se o valor atualmente definido é o mesmo que ``static::nullEquivalent()``.
     * Retornará ``false`` caso o valor seja ``null``.
     *
     * @return      bool
     */
    function isNullEquivalent() : bool;
    /**
     * Informa se o valor atualmente definido é ``null`` ou se é o mesmo que
     * ``static::nullEquivalent()``.
     *
     * @return      bool
     */
    function isNullOrEquivalent() : bool;





    /**
     * Retorna o último código de erro encontrado ao tentar definir um valor
     * para a instância. ``""`` será retornado caso não tenha havido erros.
     *
     * @return      string
     */
    function getLastSetError() : string;



    /**
     * Define um novo valor para a instância.
     *
     * @param       mixed $v
     *              Valor a ser atribuido.
     */
    function set($v) : bool;
    /**
     * Retorna o valor atualmente definido para a instância atual.
     *
     * @return      mixed
     */
    function get();
    /**
     * Retorna o valor atualmente definido para a instância atual mas caso o
     * valor seja ``null``, retornará o valor definido em ``static::nullEquivalent()``.
     *
     * @return      mixed
     */
    function getNotNull();





    /**
     * Converte o valor atualmente definido para uma ``string``.
     *
     * @return      string
     */
    function toString() : string;



    /**
     * Retorna uma instância definida com as propriedades definidas no
     * ``array`` de configuração.
     *
     * @param       array $cfg
     *              Array associativo contendo as configurações para a
     *              definição da instância resultante.
     *
     * @return      iType
     */
    static function fromArray(array $cfg) : iType;
}
