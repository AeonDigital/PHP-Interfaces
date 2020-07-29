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
     * Em classes genéricas deve retornar ``tpGeneric``.
     *
     * @return      string
     */
    static function standart() : string;
    /**
     * Retorna o namespace completo da classe usada por esta instância.
     *
     * Classes concretas vinculadas a um tipo ``Standart`` devem retornar ``""``.
     *
     * @return      string
     */
    function getGenericType() : string;



    /**
     * Indica qual valor (para esta instância) deve ser considerado equivalente a ``null``
     * para fins de comparação.
     *
     * @return      mixed
     */
    function nullEquivalent();
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
     * Informa se esta instância é ``nullable``.
     *
     * @return      bool
     */
    function isNullable() : bool;
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
     * Informa se o valor atualmente definido é o mesmo que ``nullEquivalent``.
     * Retornará ``false`` caso o valor seja ``null``.
     *
     * @return      bool
     */
    function isNullEquivalent() : bool;
    /**
     * Informa se o valor atualmente definido é ``null`` ou se é o mesmo que
     * ``nullEquivalent``.
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
     * valor seja ``null``, retornará o valor definido em ``self::nullEquivalent``.
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
}
