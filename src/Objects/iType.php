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
     * Indica qual valor (para esta instância) deve ser considerado equivalente a ``null``
     * para fins de comparação.
     *
     * @return      mixed
     */
    function nullEquivalent();
    /**
     * Informa se o valor atualmente definido é o mesmo que ``nullEquivalent``.
     *
     * @return      bool
     */
    function isNullEquivalent() : bool;



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
     * Define um novo valor para a instância.
     *
     * @param       mixed $v
     *              Valor a ser atribuido.
     *
     * @param       bool $throws
     *              Indica se deve criar uma exception caso o valor seja inválido.
     *
     * @param       ?string $err
     *              Informa o tipo de erro que impediu que o valor fosse atribuido.
     *
     * @return      bool
     *              Retornará ``true`` caso o valor tenha sido aceito e ``false``
     *              caso contrário.
     */
    function set($v, bool $throws = true, ?string &$err = null) : bool;
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
