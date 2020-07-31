<?php
declare (strict_types=1);

namespace AeonDigital\Interfaces\Objects;

use AeonDigital\Interfaces\Objects\iType as iType;








/**
 * Interface que orienta a criação de classes concretas capazes de representar
 * um ``array`` de tipos ``iStandart`` definidos.
 *
 * @package     AeonDigital\Interfaces\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
interface iTypeArray extends iType, \IteratorAggregate, \ArrayAccess, \Serializable, \Countable
{



    /**
     * Informa se as chaves de valores devem ser tratadas de forma
     * ``case-sensitive`` (padrão).
     *
     * @return      bool
     */
    function isCaseSensitive() : bool;
    /**
     * Uma vez acionado, impede a adição e remoção de itens no ``array``.
     *
     * @return      bool
     */
    function lockArray() : bool;
    /**
     * Indica se a instância está bloquada contra alterações.
     *
     * @return      bool
     */
    function isLocked() : bool;





    /**
     * Indica se a chave de nome indicado existe.
     *
     * @param       string $key
     *              Chave que será verificada.
     *
     * @return      bool
     */
    function hasValue(string $key) : bool;
    /**
     * Define um novo valor para a instância.
     *
     * @param       string $key
     *              Chave a ser definido para este valor.
     *
     * @param       mixed $v
     *              Valor a ser adicionado ao ``array``.
     *
     * @return      bool
     *              Retornará ``true`` caso o valor tenha sido aceito e ``false``
     *              caso contrário.
     */
    function setValue(
        string $key,
        $v
    ) : bool;
    /**
     * Remove do ``array`` o item da chave especificada.
     *
     * @param       string $key
     *              Chave a ser excluída.
     *
     * @return      bool
     *              Retornará ``true`` apenas se a chave existir e for removida.
     */
    function unsetValue(string $key) : bool;
    /**
     * Retorna o valor definido para a chave especificada.
     *
     * @param       string $key
     *              Chave do valor que deve ser retornado.
     *
     * @return      mixed
     */
    function getValue(string $key);





    /**
     * Retorna um objeto do mesmo tipo do atual contendo exclusivamente as chaves e
     * respectivos valores nas posições em que os valores não são ``null``.
     *
     * @return      self
     */
    function getValuesNotNull() : self;
    /**
     * Retorna um ``array associativo`` contendo as chaves e respectivos valores atualmente
     * definidos nesta instância.
     *
     * @param       bool $originalKeys
     *              Quando ``true`` irá usar as chaves conforme foram definidas na função ``set``.
     *              Se no armazenamento interno elas sofrerem qualquer alteração e for definido
     *              ``false`` então elas retornarão seu formato alterado.
     *
     * @param       bool $notNull
     *              Retornará no ``array`` resultante apenas os itens que não são ``null``.
     *
     * @return      array
     *              Retorna um ``array associativo`` ou ``[]`` caso a coleção esteja vazia.
     */
    function toArray(
        bool $originalKeys = false,
        bool $notNull = false
    ) : array;





    /**
     * Limpa totalmente o ``array`` eliminando toda informação armazenada no momento.
     *
     * @return      bool
     *              Retornará ``true`` caso a exclusão dos dados tenha sido executada com sucesso
     *              e ``false`` caso ocorra algum erro em algum dos itens.
     *              Neste caso, o ``array`` poderá ficará pela metade.
     */
    function clean() : bool;
}
