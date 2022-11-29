<?php

declare(strict_types=1);

namespace AeonDigital\Interfaces\ORM;

use AeonDigital\Interfaces\DataModel\iModelFactory as iModelFactory;
use AeonDigital\Interfaces\DataModel\iModel as iModel;
use AeonDigital\Interfaces\ORM\iTable as iTable;
use AeonDigital\Interfaces\DAL\iDAL as iDAL;




/**
 * Especializa a interface ``iModelFactory`` para que sirva de provedora de objetos ``iTable``.
 *
 * @package     AeonDigital\ORM
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
interface iDataTableFactory extends iModelFactory
{





    /**
     * Retorna o objeto ``DAL`` que está sendo usado por esta instância.
     *
     * @return iDAL
     */
    public function getDAL(): iDAL;


    /**
     * Nome do projeto.
     * Geralmente é o mesmo nome do banco de dados definido na instância ``iDAL`` usada.
     *
     * @return string
     */
    public function getProjectName(): string;


    /**
     * Retorna o caminho completo até o diretório onde estão os arquivos que descrevem os
     * modelos de dados utilizado por este projeto.
     *
     * Dentro do mesmo diretório deve haver um outro chamado ``enum`` contendo os
     * enumeradores usados pelo projeto.
     *
     * @return string
     */
    public function getProjectDirectory(): string;


    /**
     * Cria um arquivo ``_projectData.php`` no diretório principal do projeto.
     * Este arquivo armazenará um array associativo contendo o nome das tabelas de dados
     * usadas no projeto e seus respectivos arquivos de configuração.
     *
     * Caso o arquivo já exista, será substituído por um novo.
     *
     * @return void
     */
    public function recreateProjectDataFile(): void;


    /**
     * Retorna um array com a lista de todas as tabelas de dados existêntes neste projeto.
     *
     * @return array
     */
    public function getDataTableList(): array;


    /**
     * Identifica se esta fábrica pode fornecer um objeto compatível com o nome do Identificador
     * passado.
     *
     * @param string $idName
     * Identificador único do modelo de dados dentro do escopo definido.
     *
     * @return bool
     */
    public function hasDataModel(string $idName): bool;


    /**
     * Identifica se no atual projeto existe uma tabela de dados com o nome passado.
     *
     * @param string $tableName
     * Nome da tabela de dados.
     *
     * @return bool
     */
    public function hasDataTable(string $tableName): bool;



    /**
     * Retorna um objeto ``iModel`` com as configurações equivalentes ao identificador único
     * do mesmo.
     *
     * @param string $idName
     * Identificador único do modelo de dados dentro do escopo definido.
     *
     * @param mixed $initialValues
     * Coleção de valores a serem setados para a nova instância que será retornada.
     *
     * @return iModel
     *
     * @throws \InvalidArgumentException
     * Caso o nome da tabela seja inexistente.
     */
    public function createDataModel(string $idName, mixed $initialValues = null): iModel;


    /**
     * Retorna uma tabela de dados correspondente ao nome informado no argumento ``$tableName``.
     *
     * @param string $tableName
     * Nome da tabela de dados.
     *
     * @param mixed $initialValues
     * Coleção de valores a serem setados para a nova instância que será retornada.
     *
     * @return iTable
     *
     * @throws \InvalidArgumentException
     * Caso o nome da tabela seja inexistente.
     */
    public function createDataTable(string $tableName, mixed $initialValues = null): iTable;
}
