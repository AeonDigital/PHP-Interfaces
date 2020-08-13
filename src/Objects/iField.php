<?php
declare (strict_types=1);

namespace AeonDigital\Interfaces\Objects;

use AeonDigital\Interfaces\Objects\iType as iType;








/**
 * Expande um ``iType`` para que ele possa ser utilizado
 * como um campo de dados.
 *
 * @package     AeonDigital\Interfaces\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
interface iField extends iType
{





    /**
     * Retorna o nome do campo.
     *
     * @return      string
     */
    function getName() : string;
    /**
     * SET
     * Define o nome do campo.
     * O nome de um campo apenas pode aceitar caracteres ``a-zA-Z0-9_``.
     */



     /**
     * Retorna a descrição de uso/funcionalidade do campo.
     *
     * @return      string
     */
    function getDescription() : string;





    /**
     * Indica quando o campo é um modelo de dados.
     *
     * @return      bool
     */
    function isDataModel() : bool;
    /**
     * Indica quando o campo é um array de modelos de dados.
     *
     * @return      bool
     */
    function isDataModelCollection() : bool;





    /**
     * Retorna o código de estado da última tentativa de definição de valor para
     * este campo.
     *
     * **Campos Simples**
     * Retornará ``valid`` se o último valor que foi passado para o campo tiver sido
     * aceito; Caso contrário retornará o código de erro obtido da validação.
     *
     * **Campos Array**
     * Retornará ``valid`` caso **TODOS** os valores contidos no array estejam de acordo
     * com os critérios de aceite; Caso contrário retornará um array associativo contendo
     * a coleção de chaves existentes e seus respectivos códigos de validação.
     *
     * @param       bool $recheckAll
     *              Quando ``true`` efetuará a revalidação do campo obtendo assim
     *              a informação precisa sobre o/s valor/es que está/ão definido/s
     *              neste instante.
     *
     * @return      string|array

    function getLastFieldState(bool $recheckAll = false);
    /**
     * Retornará ``true`` se o valor atualmente definido para esta instância for
     * aceito como válido dentro dos critérios definidos para o campo.
     *
     * Em campos ``iDataModel`` e ``Array`` apenas retornará ``true`` se todas instâncias
     * filhas atualmente definidas forem também válidas.
     *
     * Difere de ``isValid`` pois refere-se exclusivamente a última tentativa de
     * definição de valor para este campo.
     *
     * @return      bool

    function isCurrentFieldStateValid() : bool;
    function getLastValidateState();*/
}
