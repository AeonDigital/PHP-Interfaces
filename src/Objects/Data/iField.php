<?php
declare (strict_types=1);

namespace AeonDigital\Interfaces\Objects\Data;

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
     * Informa se o campo tem no momento um valor que satisfaz os critérios de validação
     * para o mesmo.
     *
     * @return      bool
     */
    function isValid() : bool;



    /**
     * Retorna o código do estado atual deste campo.
     *
     * **Campos Simples**
     * Retornará ``valid`` caso o valor definido seja válido, ou o código da validação
     * que caracteríza a invalidez deste valor.
     *
     * **Campos "reference"**
     * Retornará ``valid`` se **TODOS** os campos estiverem com valores válidos. Caso
     * contrário retornará um ``array`` associativo contendo o estado de cada um dos campos
     * existêntes.
     *
     * **Campos "collection"**
     * Retornará ``valid`` caso **TODOS** os valores estejam de acordo com os critérios de
     * validação ou um ``array`` contendo a validação individual de cada ítem membro da
     * coleção.
     *
     * @return      string|array
     */
    function getState();



    /**
     * Retorna o código de estado da última validação realizada.
     *
     * @return      string|array
     */
    function getLastValidateState();
}
