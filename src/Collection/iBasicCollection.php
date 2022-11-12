<?php

declare(strict_types=1);

namespace AeonDigital\Interfaces\Collection;









/**
 * Interface fundamental para qualquer classe que planeje ser uma coleção de dados.
 *
 * Uma coleção (collection) é uma forma mais complexa de um ``array associativo`` que permite,
 * além de acesso a controles especiais, que seja definidos tipos e regras específicas para o
 * tratamento dos dados que ele pode conter.
 *
 * Por padrão, as chaves dos itens da coleção recebem tratamento ``case sensitive``, ou seja,
 * ``Key != key != KEY``.
 *
 * Para complementar este projeto e as classes concretas que venham a ser criadas a partir daqui
 * existem outras 4 interfaces que permitem extender as capacidades das collections, são elas:
 *
 *  - iProtectedCollection
 *  - iAppendOnlyCollection
 *  - iReadOnlyCollection
 *  - iCaseInsensitiveCollection
 *
 * @package     AeonDigital\Interfaces\Collection
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
interface iBasicCollection extends \ArrayAccess, \Countable, \IteratorAggregate
{





    /**
     * Indica se a coleção implementa a interface ``iProtectedCollection``.
     *
     * @return      bool
     *              Quando ``true`` indica que a coleção manterá o estado de todos os seus
     *              objetos não permitindo que eles sejam alterados, no entanto os valores uma
     *              vez definidos PODEM ser excluídos.
     */
    function isProtected(): bool;



    /**
     * Indica se a coleção implementa a interface ``iAppendOnlyCollection``.
     *
     * @return      bool
     *              Quando ``true`` indica que a coleção pode ser apenas incrementada mas jamais
     *              modificada nem reduzida.
     */
    function isAppendOnly(): bool;



    /**
     * Indica se a coleção implementa a interface ``iReadOnlyCollection``.
     *
     * @return      bool
     *              Quando ``true`` indica que a coleção não pode ser alterada após ser definida
     *              durante a construção da instância.
     */
    function isReadOnly(): bool;



    /**
     * Indica se a coleção implementa a interface ``iCaseInsensitiveCollection``.
     *
     * @return      bool
     *              Quando ``true`` indica que os nomes das chaves de cada entrada de dados será
     *              tratado de forma ``case insensitive``, ou seja, ``KeyName = keyname = KEYNAME``.
     */
    function isCaseInsensitive(): bool;





    /**
     * Uma instância com a característica ``autoincrement`` deve permitir que seja omitido o nome
     * das chaves no método ``set`` pois este deve ser controlado internamente como se fosse um
     * ``array`` iniciado em zero.
     *
     * Ainda assim o tratamento das chaves sempre se dará como se fossem ``strings`` e não
     * numerais inteiros como ocorre em um ``array comum``.
     *
     * As implementações desta caracteristica devem também controlar os índices quando estes são
     * removidos. A regra geral é que TODOS os itens existentes mantenham como chave o índice
     * correspondente a sua real posição.
     *
     * ``` php
     *      // Neste caso uma coleção com 10 itens que execute 5 vezes a instrução:
     *      $collection->remove("0");
     *      // Ficará, ao final com 5 itens cada qual ocupando uma posição entre 0 e 4.
     * ```
     *
     * @return      bool
     *              Retorna ``true`` quando a coleção é do tipo ``autoincrement``.
     */
    function isAutoIncrement(): bool;










    /**
     * Indica se a chave de nome indicado existe entre os itens da coleção.
     *
     * @param       string $key
     *              Nome da chave que será identificada.
     *
     * @return      bool
     *              Retorna ``true`` caso a chave indicada existir entre os itens da coleção ou
     *              ``false`` se não existir.
     */
    function has(string $key): bool;



    /**
     * Insere um novo item chave/valor para a coleção de dados.
     *
     * Se já existe um valor com chave de mesmo nome então, o valor antigo será substituído.
     *
     * @param       string $key
     *              Nome da chave.
     *              Pode ser usado ``''`` caso a instância seja do tipo ``autoincrement``.
     *
     * @param       mixed $value
     *              Valor que será associado a esta chave.
     *
     * @return      bool
     *              Retorna ``true`` quando a insersão/atualização do item foi bem sucedido.
     */
    function set(string $key, mixed $value): bool;



    /**
     * Resgata um valor da coleção a partir do nome da chave indicada.
     *
     * @param       string $key
     *              Nome da chave cujo valor deve ser retornado.
     *
     * @return      mixed
     *              Valor armazenado na ``collection`` que correspondente a chave passada.
     *              DEVE retornar ``null`` quando a chave de nome indicado não existir.
     */
    function get(string $key): mixed;



    /**
     * Remove da coleção o item com a chave indicada.
     *
     * @param       string $key
     *              Nome da chave do valor que será excluído.
     *
     * @return      bool
     *              Retornará ``true`` se a chave foi removida, ou, se, ela não existia dentro
     *              da coleção atual e ``false`` caso por algum motivo não seja possível executar
     *              este método.
     */
    function remove(string $key): bool;
}
