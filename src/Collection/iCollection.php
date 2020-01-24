<?php
declare (strict_types=1);

namespace AeonDigital\Interfaces\Collection;

use AeonDigital\Interfaces\Collection\iBasicCollection as iBasicCollection;








/**
 * Expande a interface ``iBasicCollection`` dando habilidade de lidar com processamento em lote
 * dos valores ao inserir, resgatar ou remove-los.
 *
 * @package     AeonDigital\Interfaces\Collection
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2019, Rianna Cantarelli
 * @license     MIT
 */
interface iCollection extends iBasicCollection
{



    /**
     * Converte a coleção atualmente armazenada em um ``Array Associativo``.
     * Retorna toda a coleção atualmente armazenada em um
     *
     * @param       bool $originalKeys
     *              Quando ``true`` irá usar as chaves conforme foram definidas na função ``set``.
     *              Se no armazenamento interno elas sofrerem qualquer alteração e for definido
     *              ``false`` então elas retornarão seu formato alterado.
     *
     * @return      array
     *              Retorna um ``Array Associativo`` ou ``[]`` caso a coleção esteja vazia.
     */
    function toArray(?bool $originalKeys = false) : array;



    /**
     * Permite inserir multiplos dados de uma única vez na coleção.
     *
     * @param       array $newValues
     *              ``Array Associativo`` contendo os novos valores a serem definidos para a coleção.
     *
     * @return      bool
     *              Retornará ``true`` caso TODOS os novos valores sejam adicionados e ``false``
     *              caso 1 deles falhe. No caso de falha, NENHUM valor deve ser adicionado.
     *
     * @throws      \InvalidArgumentException
     *              Lançada caso na classe concreta exista alguma restrição quanto to tipo/valor de
     *              cada item a ser armazenado.
     *
     * @throws      \RuntimeException
     *              Lançada caso na classe concreta exista alguma regra que impeça esta ação de
     *              prosseguir.
     */
    function insert(array $newValues) : bool;



    /**
     * Limpa totalmente a coleção de dados eliminando toda informação armazenada no momento.
     *
     * @return      bool
     *              Retornará ``true`` caso a exclusão dos dados tenha sido executada.
     *
     * @throws      \RuntimeException
     *              Lançada caso alguma restrição na classe concreta impeça que os dados sejam
     *              eliminados.
     */
    function clean() : bool;
}
