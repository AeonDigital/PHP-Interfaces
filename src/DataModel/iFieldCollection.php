<?php
declare (strict_types=1);

namespace AeonDigital\Interfaces\DataModel;

use AeonDigital\Interfaces\DataModel\iField as iField;








/**
 * Expande a interface ``iField`` dando a ela a capacidade de lidar com coleções de dados.
 *
 * **Propriedades padrão**
 * As seguintes propriedades básicas terão seus valores predefinidos e não devem poder ser
 * alterados:
 *  - allowNull             = ``false``
 *  - allowEmpty            = ``false``
 *  - convertEmptyToNull    = ``false``
 *  - readOnly              = ``false``
 *
 *
 * **Valor padrão**
 * Uma coleção de dados é, por definição, um ``array``, e, diferente de um campo comum, o
 * valor inicial (``undefined``) de uma coleção é caracterizado por um ``array vazio``.
 *
 * Também diferente de um campo comum, a coleção pode voltar a seu estado inicial bastando
 * para isso esvaziar sua coleção de dados ou definir ``[]`` usando o método ``setValue()``.
 *
 *
 * **Valores inválidos**
 *
 * Apenas serão aceitos como membros de uma coleção os valores que poderiam ser definidos
 * para um campo simples ou que seriam aceitos para um campo *reference*.
 *
 * Os valores ``null`` e ``''`` devem também serem impedidos de fazerem parte de uma coleção.
 *
 *
 * @package     AeonDigital\Interfaces\DataModel
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
interface iFieldCollection extends iField
{





    /**
     * Retorna o código de estado de uma coleção de dados.
     *
     * @return      string
     */
    function collectionGetState() : string;
    /**
     * Retornará ``valid`` caso a última validação de uma coleção tenha ocorrido sem falhas.
     * Caso a validação tenha falhado, retornará o código que identifica a natureza do erro.
     *
     * @return      string
     */
    function collectionGetLastValidateState() : string;



    /**
     * Indica se esta coleção exige que cada um de seus valores seja único.
     *
     * @return      bool
     */
    function collectionIsDistinct() : bool;
    /**
     * SET
     * Define se esta coleção exige que cada um de seus valores seja único.
     * Por padrão este valor deve ser ``false``.
     */



     /**
     * Retorna a coleção de nomes de campos (chaves) que permitem avaliar quando uma coleção
     * de modelos de dados possui objetos iguais.
     *
     * Usado apenas para casos de coleções de modelos de dados ``iModel``.
     *
     * Se nenhuma coleção for definida para ``distinctKeys`` então deverá usar TODOS os
     * campos do modelo de dados para efetuar a comparação.
     *
     * @return      ?array
     */
    function collectionGetDistinctKeys() : ?array;



    /**
     * Adiciona um novo valor para esta coleção.
     *
     * Para a aceitação do valor serão seguidas as mesmas regras especificadas para campos
     * simples e *reference*.
     *
     * @param       mixed $v
     *              Valor a ser adicionado na coleção.
     *
     * @return      bool
     *              Retornará ``true`` se o valor tornou o campo válido ou ``false`` caso
     *              agora ele esteja inválido. Também retornará ``false`` caso o valor seja
     *              totalmente incompatível com o campo.
     */
    function collectionAddValue($v) : bool;



    /**
     * Procura pelo valor indicado na coleção atualmente armazenada e retorna o índice do mesmo.
     * Valores que não estão aptos a serem armazenados neste campo irão sempre retornar ``null``.
     *
     * Havendo mais de 1 valor igual na coleção, retornará o índice da primeira ocorrência
     * encontrada.
     *
     * @param       mixed $v
     *              Valor que será verificado.
     *
     * @return      ?int
     */
    function collectionGetIndexOfValue($v) : ?int;



    /**
     * Retorna a contagem de ocorrências do valor passado na coleção atualmente armazenada.
     *
     * @param       mixed $v
     *              Valor que será verificado.
     *
     * @return      int
     */
    function collectionCountOccurrenciesOfValue($v) : int;



    /**
     * Verifica se o valor informado existe na coleção de valores atuais deste campo.
     *
     * @param       mixed $v
     *              Valor que será verificado.
     *
     * @return      bool
     */
    function collectionHasValue($v) : bool;



    /**
     * Retorna a quantidade de valores que estão atualmente definidos na coleção do campo.
     *
     * @return      int
     */
    function collectionCount() : int;



    /**
     * Removerá da coleção de valores a primeira ocorrência do valor informado.
     *
     * @param       mixed $v
     *              Valor que será removido.
     *
     * @param       bool $all
     *              Quando ``true`` irá remover TODAS as ocorrências do valor indicado.
     *
     * @return      void
     */
    function collectionUnsetValue($v, bool $all = false) : void;



    /**
     * Removerá da coleção de valores o item na posição indicada.
     *
     * @param       int $i
     *              Índice que será removido.
     *
     * @return      void
     */
    function collectionUnsetIndex(int $i) : void;





    /**
     * Resgata as regras de aceitação para a contagem de itens em uma coleção de dados.
     *
     * O retorno deve ser um ``array`` associativo seguindo as seguintes orientações:
     *
     * ``` php
     *      $arr = [
     *          // int      Coleção de valores exatos que podem ser encontrados na contagem dos itens em uma coleção.
     *          "exactValues" => 0,
     *
     *          // int[]    Coleção que indica os múltiplos que a coleção pode possuir.
     *          "multiples" => [],
     *
     *          // int      Número mínimo de itens que a coleção deve ter.
     *          "min" => 0,
     *
     *          // int      Número máximo de itens que a coleção deve ter.
     *          "max" => 0
     *      ];
     * ```
     *
     * @return      ?array
     */
    function collectionGetAcceptedCount() : ?array;
    /**
     * SET
     * Se definido, permite informar uma composição de regras que especificam as contagens
     * de valores que serão válidas para a coleção de itens armazenados neste campo.
     *
     * As seguintes variáveis podem ser definidas:
     * - Número exato de de valores que torna a coleção válida.
     * - Indicação de um número múltiplo que, se observado, torna a coleção válida.
     * - Número mínimo de valores para a coleção.
     * - Número máximo de valores para a coleção.
     *
     * As regras podem ser definidas em conjunto e em qualquer ordem bastando seguir as
     * orientações:
     * - Números Exatos [podem ser definidos vários].
     *   Números inteiros separados por ``|``.
     *
     * - Número de Múltiplo [podem ser definidos vários].
     *   Números inteiros, precedidos por ``*``.
     *   Como regra especial, usando ``*0`` aceitará apenas números PARES e
     *   declarando ``*1`` aceitará apenas números ÍMPARES.
     *
     * - Número mínimo e máximo [apenas 1 pode ser definido].
     *   Par de números inteiros, sempre separados por ``,``.
     *   O primeiro é sempre o número mínimo a ser aceito e o segundo o número
     *   máximo de componentes que a coleção pode atinjir.
     *
     * **Exemplo**
     *  Regra: ``2``
     *  Indica que a coleção será válida somente se houverem exatos 2 itens na coleção.
     *
     *  Regra: ``2|5``
     *  Neste caso a coleção será válida somente se houverem exatos 2 ou 5 itens.
     *
     *  Regra: ``*3``
     *  Para este caso, a coleção será válida apenas se a quantidade total dos itens
     *  for um múltiplo de 3. Sendo ``0`` um valor aceito também pois não foi exigido
     *  um número mínimo de itens.
     *
     *  Regra: ``2,10``
     *  Com esta regra a coleção deverá ter ao menos 2 itens e no máximo 10 para ser
     *  considerada válida.
     *
     *  Regra: ``*3|3,12``
     *  Com estas 2 regras definidas juntamente a coleção será validada apenas se contiver
     *  3, 6, 9 ou 12 itens pois exige ao menos 3 itens e no máximo 12 sendo que
     *  necessariamente precisa ser um múltiplo de 3.
     *
     *  Regra: ``2|3|5|*3|*5|0,20``
     *  Com esta regra será considerado válido um conjunto que tenha exatos 2, 3 ou 5
     *  itens ou uma quantidade múltipla de 3 ou 5 dentro do limite de até 20 itens.
     *  Também é aceito um conjunto vazio, sem item algum.
     */



    /**
     * Retornará o número mínimo de itens que esta coleção pode possuir para ser considerada
     * válida.
     *
     * @return      ?int
     */
    function collectionGetMin() : ?int;



    /**
     * Retornará o número máximo de itens que esta coleção pode possuir para ser considerada
     * válida.
     *
     * @return      ?int
     */
    function collectionGetMax() : ?int;
}
