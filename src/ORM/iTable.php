<?php
declare (strict_types=1);

namespace AeonDigital\Interfaces\ORM;

use AeonDigital\Interfaces\DAL\iDAL as iDAL;
use AeonDigital\Interfaces\DataModel\iModel as iModel;







/**
 * Especializa a interface ``iModel`` para que ela seja capaz de representar uma tabela
 * de um banco de dados.
 *
 * @package     AeonDigital\ORM
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
interface iTable extends iModel
{





    /**
     * Define o objeto ``iDAL`` a ser usado para executar as instruções ``CRUD`` desta
     * tabela.
     *
     * Deve ser definido apenas 1 vez.
     *
     * @param       iDAL $DAL
     *              Objeto DAL a ser usado.
     *
     * @return      void
     */
    function setDAL(iDAL $DAL) : void;



    /**
     * Nome abreviado da tabela de dados.
     * Usado para evitar ambiguidades entre as colunas desta e de outras tabelas de
     * dados.
     *
     * @return      string
     */
    function getAlias() : string;



    /**
     * Retorna um array contendo as instruções que devem ser executadas após a tabela de
     * dados ser criada.
     *
     * @return      ?array
     */
    function getExecuteAfterCreateTable() : ?array;



    /**
     * Retorna um array de arrays contendo em cada qual uma coleção de nomes de colunas de
     * dados desta mesma tabela. Cada conjunto de nomes irá corresponder a uma constraint
     * do tipo unique composta.
     *
     * @return      ?array
     */
    function getUniqueMultipleKeys() : ?array;










    /**
     * Retorna a mensagem de erro referente a última instrução SQL executada internamente
     * pela conexão com o banco de dados.
     * Não havendo erro, retorna ``null``.
     *
     * @return      ?string
     */
    function getLastDALError() : ?string;



    /**
     * Retorna o total de registros existentes nesta tabela de dados.
     *
     * @return      int
     */
    function countRows() : int;



    /**
     * Identifica se existe na tabela de dados um registro com o Id indicado.
     *
     * @param       int $Id
     *              Id do objeto.
     *
     * @return      bool
     */
    function hasId(int $Id) : bool;



    /**
     * Insere ou atualiza os dados da instância atual no banco de dados.
     *
     * @param       ?string $parentTableName
     *              Se definido, deve ser o nome do modelo de dados ao qual o objeto atual
     *              deve ser associado.
     *
     * @param       ?int $parentId
     *              Id do objeto pai ao qual este registro deve estar associado.
     *
     * @return      bool
     *              Retornará ``true`` caso esta ação tenha sido bem sucedida.
     */
    function save(
        ?string $parentTableName = null,
        ?int $parentId = null
    ) : bool;
    /**
     * Insere os dados desta instância em um novo registro no banco de dados.
     *
     * Se este objeto já possui um Id definido esta ação irá falhar.
     *
     * @param       ?string $parentTableName
     *              Se definido, deve ser o nome do modelo de dados ao qual o objeto atual
     *              deve ser associado.
     *
     * @param       ?int $parentId
     *              Id do objeto pai ao qual este registro deve estar associado.
     *
     * @return      bool
     *              Retornará ``true`` caso esta ação tenha sido bem sucedida.
     */
    function insert(
        ?string $parentTableName = null,
        ?int $parentId = null
    ) : bool;
    /**
     * Atualiza os dados desta instância em um novo registro no banco de dados.
     *
     * Se este objeto não possui um Id definido esta ação irá falhar.
     *
     * @param       ?string $parentTableName
     *              Se definido, deve ser o nome do modelo de dados ao qual o objeto atual
     *              deve ser associado.
     *
     * @param       ?int $parentId
     *              Id do objeto pai ao qual este registro deve estar associado.
     *
     * @return      bool
     *              Retornará ``true`` caso esta ação tenha sido bem sucedida.
     */
    function update(
        ?string $parentTableName = null,
        ?int $parentId = null
    ) : bool;





    /**
     * Carrega esta instância com os dados do registro de Id informado.
     *
     * @param       int $Id
     *              Id do registro que será carregado.
     *
     * @param       bool $loadChilds
     *              Quando ``true`` irá carregar todos os objetos que são filhos diretos
     *              deste.
     *
     * @return      bool
     */
    function select(
        int $Id,
        bool $loadChilds = false
    ) : bool;





    /**
     * Retornará o Id do objeto PAI da instância atual na tabela de dados indicada no
     * parametro ``$tableName``.
     *
     * Apenas funcionará para os objetos FILHOS em relações ``1-1`` e ``1-N``.
     *
     * @param       string $tableName
     *              Nome da tabela de dados do objeto pai.
     *
     * @return      ?int
     */
    function selectParentIdOf(string $tableName) : ?int;





    /**
     * Remove o objeto atual do banco de dados.
     * Irá limpar totalmente os objetos filhos substituindo-os por instâncias vazias, ou
     * por coleções vazias.
     *
     * @return      bool
     */
    function delete() : bool;




    /**
     * Permite definir o vínculo da instância atualmente carregada a um de seus possíveis
     * relacionamentos indicados nos modelos de dados.
     *
     * @param       string $tableName
     *              Nome da tabela de dados com a qual esta instância passará a ter um
     *              vínculo referencial.
     *
     * @param       int $tgtId
     *              Id do registro da tabela de dados alvo onde este vinculo será firmado.
     *
     * @return      bool
     */
    function attachWith(string $tableName, int $tgtId) : bool;




    /**
     * Remove o vínculo existente entre este registro e um outro da tabela de dados.
     *
     * O funcionamento deste método depende da *posição* no relacionamento em que a
     * instrução está sendo executada e varia conforme a presença ou não do parametro
     * ``$tgtId``.
     *
     * - Em relações 1-1:
     *   O funcionamento é igual independente da posição em que a instrução está sendo
     *   executada.
     *   Não é preciso definir o parametro ``$tgtId``.
     *   A chave extrangeira será anulada.
     *
     * - Em relações 1-N:
     *   - A partir da instância PAI:
     *     Definindo ``$tgtId``:
     *     Apenas o objeto FILHO de ``$tgtId`` especificado terá seu vínculo desfeito.
     *     Omitindo ``$tgtId``:
     *     TODOS os objetos FILHOS da instância atual perderão seu vínculo.
     *
     *   - A partir da instância FILHA:
     *     Não é preciso definir o parametro ``$tgtId``.
     *     A chave extrangeira será anulada.
     *
     * - Em relações N-N
     *   Independente do lado:
     *   Definindo ``$tgtId``:
     *   Irá remover o vínculo existente entre ambos registros
     *   Omitindo ``$tgtId``:
     *   TODOS os vínculos entre a instância atual e TODOS os demais serão desfeitos.
     *
     * @param       string $tableName
     *              Nome da tabela de dados com a qual esta instância irá romper um vínculo
     *              existente.
     *
     * @param       ?int $tgtId
     *              Id do registro da tabela de dados.
     *
     * @return      bool
     */
    function detachWith(string $tableName, ?int $tgtId = null) : bool;
}
