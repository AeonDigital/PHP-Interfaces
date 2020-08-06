<?php
declare (strict_types=1);

namespace AeonDigital\Interfaces\Objects;










/**
 * Interface que orienta a criação de classes concretas capazes de representar
 * e/ou especializar tipos ``iStandart`` definidos.
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
    static function getStandart() : string;
    /**
     * Retorna o namespace completo da classe usada por esta instância.
     *
     * Em classes de tipo invariável retornará o mesmo resultado obtido pelo
     * método ``static::standart()``.
     *
     * @return      string
     */
    function getType() : string;



    /**
     * Informa quando tratar-se de uma instância que lida com ``arrays`` de valores.
     *
     * @return      bool
     */
    function isIterable() : bool;



    /**
     * Informa se esta instância aceita ``null`` como válido.
     * Mesmo valor encontrado na constante ``NULLABLE`` do ``Standart`` utilizado.
     *
     * @return      bool
     */
    function isAllowNull() : bool;
    /**
     * Informa se esta instância é ``readonly``.
     * Mesmo valor encontrado na constante ``READONLY`` do ``Standart`` utilizado.
     *
     * @return      bool
     */
    function isReadOnly() : bool;
    /**
     * Informa se esta instância aceita ``""`` como um valor válido.
     * Mesmo valor encontrado na constante ``EMPTY`` do ``Standart`` utilizado.
     *
     * @return      ?bool
     */
    function isAllowEmpty() : ?bool;
    /**
     * Retorna o valor indicado em ``NULL_EQUIVALENT`` convertido para
     * o tipo nativo.
     *
     * @return      mixed
     */
    function getNullEquivalent();





    /**
     * Valor padrão a ser definido para este tipo de instância caso nenhum valor válido
     * tenha sido explicitamente definido.
     *
     * @return      mixed
     */
    function getDefault();
    /**
     * Retorna o menor valor aceitável para esta instância.
     *
     * Quando ``null`` indica que não há limites definidos ou que isto não se aplica
     * para o tipo indicado.
     * Em tipos ``String`` informa o menor número de caracteres que um valor deve ter.
     *
     * @return      ?int|float|Realtype|\DateTime|string
     */
    function getMin();
    /**
     * Retorna o maior valor aceitável para esta instância.
     *
     * Quando ``null`` indica que não há limites definidos ou que isto não se aplica
     * para o tipo indicado.
     * Em tipos ``String`` informa o maior número de caracteres que um valor deve ter.
     *
     * @return      ?int|float|Realtype|\DateTime|string
     */
    function getMax();
    /**
     * Em tipos ``String`` retorna o maior número de caracteres aceitável para validar
     * o valor. Trata-se do mesmo número indicado em ``self::getMax()``
     *
     * @return      ?int
     */
    function getLength() : ?int;
    /**
     * Retorna um ``array`` com a coleção de valores que este campo está apto a assumir.
     * Os valores aqui pré-definidos devem seguir as regras de validade especificadas.
     *
     * @param       bool $onlyValues
     *              Quando ``true``, retorna um ``array`` unidimensional contendo apenas
     *              os valores sem seus respectivos ``labels``.
     *
     * @return      ?array
     */
    function getEnumerator(bool $onlyValues = false) : ?array;
    /**
     * SET
     * Define a coleção de valores que este campo está apto a assumir.
     *
     * O ``array`` pode ser unidimensional ou multidimensional, no caso de ser
     * multidimensional, cada entrada deverá ser um novo ``array`` com 2 posições onde a
     * primeira será o valor real do campo e o segundo, um ``label`` para o mesmo.
     *
     * ``` php
     *      // Exemplo de definição
     *      $arr = [
     *          ["RS", "Rio Grande do Sul"],
     *          ["SC", "Santa Catarina"],
     *          ["PR", "Paraná"]
     *      ];
     * ```
     */





     /**
     * Retornará ``true`` enquanto nenhum valor for definido para
     * esta instância de forma explicita.
     *
     * @return      bool
     */
    function isUndefined() : bool;
    /**
     * Informa se o valor atualmente definido é o mesmo que ``NULL_EQUIVALENT``.
     * Retornará ``false`` caso o valor seja ``null``.
     *
     * Usado apenas em casos onde ``self::isIterable() = false``.
     * Se ``isIterable = true`` deve retornar ``false``.
     *
     * @return      bool
     */
    function isNullEquivalent() : bool;
    /**
     * Informa se o valor atualmente definido é ``null`` ou se é o mesmo que
     * ``NULL_EQUIVALENT``.
     *
     * Usado apenas em casos onde ``self::isIterable() = false``.
     * Se ``isIterable = true`` deve retornar ``false``.
     *
     * @return      bool
     */
    function isNullOrEquivalent() : bool;





    /**
     * Retorna o último código de erro encontrado ao tentar definir um valor
     * para a instância. ``""`` será retornado caso não existam erros.
     *
     * @return      string
     */
    function getLastSetError() : string;



    /**
     * Define um novo valor para a instância.
     *
     * Usado apenas em casos onde ``self::isIterable() = false``.
     *
     * @param       mixed $v
     *              Valor a ser atribuido.
     */
    function set($v) : bool;
    /**
     * Em classes concretas quando ``allowEmpty = false`` e ``allowNull = true``
     * deverá convertar todo ``""`` em ``null``.
     */



     /**
     * Retorna o valor atualmente definido para a instância atual.
     *
     * Usado apenas em casos onde ``self::isIterable() = false``.
     *
     * @return      mixed
     */
    function get();
    /**
     * Retorna o valor atualmente definido para a instância atual mas caso o
     * valor seja ``null``, retornará o valor definido em ``NULL_EQUIVALENT``.
     *
     * Usado apenas em casos onde ``self::isIterable() = false``.
     *
     * @return      mixed
     */
    function getNotNull();





    /**
     * Converte o valor atualmente definido para uma ``string``.
     *
     * Usado apenas em casos onde ``self::isIterable() = false``.
     * Se ``isIterable = true`` deve retornar sempre ``""``.
     *
     * @return      string
     */
    function toString() : string;
    /**
     * Retorna uma instância definida com as propriedades indicadas no
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
