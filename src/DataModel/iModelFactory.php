<?php

declare(strict_types=1);

namespace AeonDigital\Interfaces\DataModel;

use AeonDigital\Interfaces\DataModel\iModel as iModel;







/**
 * Interface que define uma fábrica de modelos de dados.
 *
 * @package     AeonDigital\Interfaces\DataModel
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
interface iModelFactory
{





    /**
     * Identifica se esta fábrica pode fornecer um objeto compatível com o nome do
     * Identificador passado.
     *
     * @param string $idName
     * Identificador único do modelo de dados dentro do escopo definido.
     *
     * @return bool
     */
    function hasDataModel(string $idName): bool;



    /**
     * Retorna um objeto ``iModel`` com as configurações equivalentes ao identificador
     * único do mesmo.
     *
     * @param string $idName
     * Identificador único do modelo de dados dentro do escopo definido.
     *
     * @param mixed $initialValues
     * Coleção de valores a serem setados para a nova instância que será
     * retornada.
     *
     * @return iModel
     */
    function createDataModel(string $idName, mixed $initialValues = null): iModel;
}
