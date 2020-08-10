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
     * Retorna o nome da classe que determina o formato de entrada que o valor a ser
     * armazenado pode assumir
     * **OU**
     * retorna o nome de uma instrução especial de transformação de caracteres para
     * campos do tipo ``string``.
     *
     * @return      ?string
     */
    function getInputFormat() : ?string;
    /**
     * SET
     * Define um formato para a informação armazenada neste campo.
     *
     * A classe informada deve implementar a interface
     * ``AeonDigital\Interfaces\DataFormat\iFormat``
     * **OU**
     * pode ser passado um ``array`` conforme as definições especificadas abaixo:
     *
     * ``` php
     *      $arr = [
     *          // string   Nome deste tipo de transformação.
     *          "name" => ,
     *
     *          // int      Tamanho máximo que uma string pode ter para ser aceita por este formato.
     *          "length" => ,
     *
     *          // callable Função que valida a string para o tipo de formatação a ser definida.
     *          "check" => ,
     *
     *          // callable Função que remove a formatação padrão.
     *          "removeFormat" => ,
     *
     *          // callable Função que efetivamente formata a string para seu formato final.
     *          "format" => ,
     *
     *          // callable Função que converte o valor para seu formato de armazenamento.
     *          "storageFormat" =>
     *      ];
     * ```
     */



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



    /**
     * Verifica se o valor indicado satisfaz os critérios de aceitação para este campo.
     *
     * @param       mixed $v
     *              Valor que será testado.
     *
     * @return      bool
     */
    function validateValue($v) : bool;





    /**
     * Retorna o valor atual deste campo em seu formato de armazenamento.
     *
     * @return      mixed
     */
    function getStorageValue();



    /**
     * Retorna o valor que está definido para este campo assim como ele foi passado em
     * ``setValue()``.
     *
     * @return      mixed
     */
    function getRawValue();
}
