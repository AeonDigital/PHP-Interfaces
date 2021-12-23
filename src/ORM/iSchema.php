<?php
declare (strict_types=1);

namespace AeonDigital\Interfaces\ORM;

use AeonDigital\Interfaces\DAL\iDAL as iDAL;








/**
 * Define uma classe capaz de gerar num banco de dados um schema baseada na documentação
 * de modelos de dados.
 *
 * @package     AeonDigital\ORM
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
interface iSchema
{





    /**
     * A partir das informações contidas na fábrica de tabelas de dados para o projeto em
     * uso, gera um arquivo ``_schema.php`` contendo todas as instruções SQL necessárias
     * para a criação dos modelos no banco de dados alvo.
     *
     * @return      bool
     */
    function generateCreateSchemaFiles() : bool;





    /**
     * Retorna uma coleção de arrays contendo o nome e a descrição de cada uma das
     * tabelas do atual banco de dados (mesmo aquelas que não estão mapeadas).
     *
     * ``` php
     *      // O array retornado é uma coleção de entradas conforme o exemplo abaixo:
     *      $arr = [
     *          string  "tableName"         Nome da tabela.
     *          string  "tableDescription"  Descrição da tabela.
     *          int     "tableRows"         Contagem de registros na tabela.
     *          bool    "tableMapped"       Indica se a tabela está mapeada nos modelos de dados do atual schema.
     *      ];
     * ```
     *
     *
     * @return      ?array
     */
    function listDataBaseTables() : ?array;



    /**
     * Remove completamente todo o schema atualmente existente dentro do banco de dados
     * alvo.
     *
     * @return      bool
     */
    function executeDropSchema() : bool;



    /**
     * Retorna uma coleção de arrays contendo o nome, tipo e a descrição de cada uma das
     * colunas da tabela indicada.
     *
     * ``` php
     *      // O array retornado é uma coleção de entradas conforme o exemplo abaixo:
     *      $arr = [
     *          bool    "columnPrimaryKey"      Indica se a coluna é uma chave primária.
     *          bool    "columnUniqueKey"       Indica se a coluna é do tipo "unique".
     *          string  "columnName"            Nome da coluna.
     *          string  "columnDescription"     Descrição da coluna.
     *          string  "columnDataType"        Tipo de dados da coluna.
     *          bool    "columnAllowNull"       Indica se a coluna pode assumir NULL como valor.
     *          string  "columnDefaultValue"    Valor padrão para a coluna.
     *      ];
     * ```
     *
     * @param       string $tableName
     *              Nome da tabela de dados alvo.
     *
     * @return      ?array
     */
    function listTableColumns(string $tableName) : ?array;



    /**
     * Retorna um array associativo contendo a coleção de ``constraints`` definidas
     * atualmente no banco de dados.
     *
     * ``` php
     *      // O array retornado é uma coleção de entradas conforme o exemplo abaixo:
     *      $arr = [
     *          string "tableName"              Nome da tabela de dados na qual a regra está vinculada.
     *          string "columnName"             Nome da coluna de dados alvo da regra.
     *          string "constraintName"         Nome da "constraint".
     *          string "constraintType"         Tipo de regra. ["PRIMARY KEY", "FOREIGN KEY", "UNIQUE"]
     *          int    "constraintCardinality"  Cardinalidade da aplicação da regra.
     *      ];
     * ```
     *
     * @param       ?string $tableName
     *              Se for definido, deverá retornar apenas os registros relacionados
     *              com a tabela alvo.
     *
     * @return      ?array
     */
    function listSchemaConstraint(?string $tableName = null) : ?array;




    /**
     * Executa o script de criação do schema gerado por último pela função
     * ``generateCreateSchemaFiles``.
     *
     * @param       bool $dropSchema
     *              Quando ``true`` irá excluir totalmente todas as tabelas de dados
     *              existentes no banco de dados alvo e então recriar o schema.
     *
     * @return      bool
     */
    function executeCreateSchema(bool $dropSchema = false) : bool;
}
