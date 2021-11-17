<?php
declare (strict_types=1);

namespace AeonDigital\Interfaces\DataModel;










/**
 * Interface que define as características mínimas que um campo de dados deve ter.
 *
 * **Propriedades imutáveis**
 * Com excessão de ``value`` todas as propriedades definidas são imutáveis, ou seja,
 * após serem definidas não devem poder ser alteradas.
 *
 * Ao tentar redefinir uma propriedade que não pode ser alterada nenhum erro deve ser
 * lançado e seu valor deve ser mantido sem alteração.
 *
 *
 * **Construtor**
 * Ao implementar esta interface use o construtor para receber todas as configurações
 * necessárias para montar o objeto final.
 *
 *
 * **Definição de valores**
 * Cada campo poderá receber **APENAS** valores que sejam do mesmo tipo que ele próprio **OU**
 * que sejam possíveis de serem convertidos para o formato básico especificado na
 * propriedade ``type``.
 *
 * O valor ``null`` também pode ser definido quando o campo estiver com sua propriedade
 * ``allowNull`` igual a ``true``.
 *
 * Campos definidos com valores que não sejam do mesmo ``type`` **E** cuja conversão não
 * seja possível ficarão atribuidos com o valor ``null``.
 *
 *
 * **Validação e estado do campo**
 * De acordo com o valor atualmente definido para o campo ele pode ser considerado ``válido``
 * ou ``inválido``. Para saber em que estado ele está, basta usar o método ``isValid()``.
 *
 * Usando o método ``getState()`` pode ser obtido o código do estado atual.
 * Um campo com um valor válido irá retornar ``valid``, caso contrário será retornado o
 * código do erro encontrado pela validação.
 *
 * Tanto o método ``setValue()`` quanto ``validateValue()``, ao serem executados deverão rodar
 * internamente a validação do valor recebido. Nestes casos, quando houver alguma falha na
 * validação, o código dos erros ocorridos poderão ser obtidos usando o método
 * ``getLastValidateState()``.
 *
 *
 * @package     AeonDigital\Interfaces\DataModel
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
interface iField
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
     * Retorna o nome completo da classe que determina o tipo deste campo.
     *
     * @return      string
     */
    function getType() : string;
    /**
     * SET
     * Define o nome completo da classe que determina o tipo deste campo.
     *
     * A classe informada deve implementar a interface
     * ``AeonDigital\SimpleTypes\Interfaces\iSimpleType``.
     */



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
     * ``AeonDigital\DataFormat\Interfaces\iFormat``
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
     * Retorna o tamanho máximo (em caracteres) aceitos por este campo.
     * Deve retornar ``null`` quando não há um limite definido.
     *
     * @return      ?int
     */
    function getLength() : ?int;
    /**
     * SET
     * Retorna o tamanho máximo (em caracteres) aceitos por este campo.
     *
     * Apenas poderá ser definido para campos que armazenam ``strings``. Se este campo usa um
     * ``inputFormat``, então esta regra deve ser controlada pela definição que o formato impõe.
     */



    /**
     * Retorna o menor valor possível para um tipo numérico ou ``DateTime``.
     * Por padrão, herdará este valor da definição de seu ``type`` quando isto for aplicável.
     *
     * @return      ?int|?\AeonDigital\Numbers\RealNumber|?\DateTime
     */
    function getMin();
    /**
     * SET
     * Define o menor valor possível para um tipo numérico ou ``DateTime``.
     *
     * Apenas poderá ser definido para campos cujo tipo simples implemente a interface
     * ``AeonDigital\SimpleType\Interfaces\iNumeric`` ou
     * ``AeonDigital\SimpleType\Interfaces\iDateTime``.
     *
     * Por padrão, herdará este valor da definição de seu ``type`` quando isto for aplicável.
     *
     * Se for explicitamente definido, o valor deverá estar dentro dos limites definidos
     * pelo ``type``.
     */



    /**
     * Retorna o maior valor possível para um tipo numérico ou ``DateTime``.
     * Por padrão, herdará este valor da definição de seu ``type`` quando isto for aplicável.
     *
     * @return      ?int|?\AeonDigital\Numbers\RealNumber|?\DateTime
     */
    function getMax();
    /**
     * SET
     * Define o maior valor possível para um tipo numérico ou ``DateTime``.
     *
     * Apenas poderá ser definido para campos cujo tipo simples implemente a interface
     * ``AeonDigital\SimpleType\Interfaces\iNumeric`` ou
     * ``AeonDigital\SimpleType\Interfaces\iDateTime``.
     *
     * Por padrão, herdará este valor da definição de seu ``type`` quando isto for aplicável.
     *
     * Se for explicitamente definido, o valor deverá estar dentro dos limites definidos
     * pelo ``type``.
     */










    /**
     * Indica se é ou não permitido atribuir ``null`` como um valor válido para este campo.
     *
     * @return      bool
     */
    function isAllowNull() : bool;
    /**
     * SET
     * Define se é ou não permitido atribuir ``null`` como um valor válido para este campo.
     *
     * Por padrão este valor deve ser ``true``.
     */



    /**
     * Indica se é ou não permitido atribuir ``''`` como um valor válido para este campo.
     *
     * @return      ?bool
     */
    function isAllowEmpty() : ?bool;
    /**
     * SET
     * Define se é ou não permitido atribuir ``''`` como um valor válido para este campo.
     *
     * Por padrão este valor deve ser ``true``.
     */



    /**
     * Define se, ao receber um valor ``''``, este deverá ser convertido para ``null``.
     *
     * @return      bool
     */
    function isConvertEmptyToNull() : bool;
    /**
     * SET
     * Define se, ao receber um valor ``''``, este deverá ser convertido para ``null``.
     *
     * Por padrão este valor deve ser ``false``.
     */





    /**
     * Indica se este campo é ou não ``readonly``.
     *
     * @return      bool
     */
    function isReadOnly() : bool;
    /**
     * SET
     * Indica se este campo é ``readonly``.
     * Quando ``true`` permitirá que o valor do campo seja atribuido, apenas 1 vez, e após,
     * tal valor não poderá mais ser alterado.
     *
     * Por padrão este valor deve ser ``false``.
     */










    /**
     * Indica quando este campo é do tipo *reference*, ou seja, seu valor é um
     * modelo de dados.
     *
     * @return      bool
     */
    function isReference() : bool;



    /**
     * Indica quando trata-se de um campo capaz de conter uma coleção de valores.
     *
     * @return      bool
     */
    function isCollection() : bool;










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
     * Retornará o resultado da validação conforme o tipo de campo testado.
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
    function getLastValidateState();


    /**
     * Retornará ``true`` caso a última validação realizada permitir que o valor testado
     * seja definido para este campo.
     *
     * **Campos Simples**
     * Valores inválidos podem ser definidos quando eles forem do mesmo ``type`` deste campo.
     *
     * **Campos "reference"**
     * Se **TODOS** os valores passados para um modelo de dados puderem ser assumidos por seus
     * respectivos campos, então tais dados poderão ser utilizados para preencher a instância.
     *
     * **Campos "collection"**
     * Se **TODOS** os valores membros para uma coleção de dados puderem ser setados,
     * independente de serem válidos, então, a coleção poderá assumir aquele grupo de dados.
     *
     * @return      bool
     */
    function getLastValidateCanSet() : bool;


    /**
     * Verifica se o valor indicado satisfaz os critérios que permitem dizer que o valor
     * passado é válido.
     *
     * **Valores especiais e seus efeitos**
     *  ``undefined``
     *  Sempre falhará na validação.
     *
     *  ``null``
     *  Falhará se o campo não permitir este valor [ veja propriedade ``allowNull`` ].
     *
     *  ``''``
     *  Falhará se o campo não permitir este valor e estiver com a conversão de ``''`` em
     *  ``null`` desabilitada [ veja as propriedades ``allowEmpty`` e ``convertEmptyToNull`` ].
     *
     *  ``[]``
     *  Falhará SEMPRE para campos que não forem ``collection``.
     *
     *
     * **Validação dos Campos Simples**
     *  A validação é feita seguindo os seguintes passos:
     *
     *  1. Verifica se o campo está apto a receber um valor ou se ele é do tipo ``readOnly``.
     *  2. Verifica se o valor cai em algum dos valores especiais citados no tópico anterior.
     *  3. Verifica se o valor não é um objeto de um tipo não aceito.
     *    Os tipos aceitos para campos simples são:
     *    ``bool``, ``int``, ``float``, ``RealNumber``, ``DateTime``, ``string``
     *  4. Validação de tipo:
     *  4.1. Havendo um ``inputFormat`` definido, identifica se o valor passa em sua
     *    respectiva validação.
     *  4.2. Verifica se o valor passado é um representante válido do tipo base do campo.
     *  5. Verificação de adequação:
     *  5.1. Enumerador, se houver, verifica se o valor está entre os itens válidos.
     *  5.2. Sendo um campo ``string`` e existindo uma definição de tamanho máximo
     *   [ propriedade ``length`` ] verifica se o valor não excede seu limite.
     *  5.3. Sendo um campo numérico ou de data e existindo limites definidos para seus
     *   valores mínimos e máximos, identifica se o valor passado não excede algum destes
     *   limites.
     *
     * **Valores aceitáveis**
     * ``null``, ``bool``, ``int``, ``float``, ``RealNumber``, ``DateTime``, ``string``
     *
     *
     * **Regras de aceitação**
     *  No passo 4.1, caso falhe na validação de ``inputFormat`` mas tanto o valor passado
     *  quanto o próprio campo são do tipo ``string`` ocorrerá que a validação não impedirá
     *  que tal valor seja definido para este campo, mas ele ficará com o estado inválido.
     *
     *  Com excessão da regra especificada acima, falhas ocorridas até o passo 5 invalida
     *  totalmente o valor para poder ser definido como o valor do campo atual.
     *
     *  Falhas ocorridas no passo 5, apesar de falhar na validação, indica que o valor poderá
     *  passar a representar o valor atual do campo mas seu estado passará a ser "inválido".
     *
     *
     * **Validação de Campos "reference"**
     *  A validação é feita tentando usar o conjunto de valores passado para que ele preencha
     *  os campos de um modelo de dados do mesmo tipo que este campo está apto a representar.
     *  É preciso que **TODAS** as respectivas chaves de dados compatíveis com o modelo de
     *  dados representado pelo campo possam ser aceitos (independente de serem válidos) para
     *  que o objeto seja validado.
     *
     * **Valores aceitáveis**
     *  ``null``, ``iterable``, ``array``, ``iModel``
     *
     *
     * **Validação de Campos "collection"**
     *  A validação é feita submetendo cada um dos membros da coleção indicada a seu
     *  respectivo tipo de validação. Os dados serão utilizados pelo campo se todos os membros
     *  apresentados puderem ser definidos.
     *
     * **Valores aceitáveis**
     * ``null``, ``array``
     *
     *
     * @param       mixed $v
     *              Valor que será testado.
     *
     * @return      bool
     */
    function validateValue($v) : bool;














    /**
     * Retorna o valor padrão que este campo deve ter caso nenhum outro seja definido.
     * Se ``default`` não for definido, ``undefined`` será retornado.
     *
     * @param       bool $getInstruction
     *              Quando ``true``, retorna o nome da instrução especial que define o
     *              valor padrão.
     *
     * @return      mixed
     */
    function getDefault(bool $getInstruction = false);
    /**
     * SET
     * Define o valor padrão que este campo deve ter caso nenhum outro seja definido.
     */





    /**
     * Retorna um ``array`` com a coleção de valores que este campo está apto a assumir.
     * Os valores aqui pré-definidos devem seguir as mesmas regras de validade especificadas
     * nas demais propriedades.
     *
     * @param       bool $getOnlyValues
     *              Quando ``true``, retorna um array unidimensional contendo apenas os
     *              valores válidos de serem selecionados sem seus respectivos ``labels``.
     *
     * @return      ?array
     */
    function getEnumerator(bool $getOnlyValues = false) : ?array;
    /**
     * SET
     * Define a coleção de valores que este campo está apto a assumir.
     *
     * O ``array`` pode ser unidimensional ou multidimensional, no caso de ser
     * multidimensional, cada entrada deverá ser um novo ``array`` com 2 posições onde a
     * primeira será o valor real do campo e o segundo, um ``label`` para o mesmo.
     *
     * Os valores aqui pré-definidos devem seguir as mesmas regras de validação para o campo.
     *
     * ``` php
     *      // Exemplo de definição
     *      $arr = [
     *          ["RS", "Rio Grande do Sul"],
     *          ["SC", "Santa Catarina"],
     *          ["PR", "Paraná"]
     *      ];
     * ```
     */





    /**
     * Define um novo valor para este campo.
     *
     * O valor passado será validado e será definido caso seu valor seja condizente com as
     * regras de aplicação especificadas na descrição do método ``validateValue()``.
     *
     *
     * Define um novo valor para este campo.
     *
     * **undefined**
     * Este valor **NUNCA** será aceito por nenhum tipo de campo e em qualquer circunstância.
     *
     *
     * **Campos Simples**
     * Para que o campo assuma o novo valor ele precisa ser compatível com o ``type`` definido.
     * Caso contrário o campo ficará com o valor ``null``.
     *
     * **Valores aceitáveis**
     * ``null``, ``bool``, ``int``, ``float``, ``RealNumber``, ``DateTime``, ``string``
     *
     *
     * **Campos "reference"**
     * Campos deste tipo apenas aceitarão valores capazes de preencher os campos do modelo
     * de dados ao qual eles se referenciam. Independente de tornar o modelo de dados válido
     * ou não, os valores serão definidos exceto se o valor passado for incompatível com o
     * modelo de dados configurado.
     *
     * **Valores aceitáveis**
     * ``null``, ``iterable``, ``array``, ``iModel``
     *
     *
     * **Campos "collection"**
     * Uma coleção de dados sempre será definida como o valor de um campo que aceite este
     * tipo de valor.
     * Os membros da coleção serão convertidos para o tipo ``type`` definido. Membros que
     * não possam ser convertidos serão substituidos por ``null`` e a coleção será inválida
     * até que estes membros sejam removidos ou substituídos.
     *
     * Coleções do tipo *reference* apenas serão redefinidos se **TODOS** seus itens forem
     * capazes de tornarem-se objetos ``iModel`` do tipo definido para este campo.
     *
     * **Valores aceitáveis**
     * ``null``, ``array``
     *
     *
     * **Estado e validação**
     * Independente de o valor vir a ser efetivamente definido para o campo o estado da
     * validação pode ser verificado usando ``getLastValidateState()``.
     *
     * Uma vez que o valor seja definido, o campo passa a assumir o estado herdado da
     * validação e poderá ser verificado em ``getState()``.
     *
     *
     * @param       mixed $v
     *              Valor a ser definido para o campo.
     *
     * @return      bool
     *              Retornará ``true`` se o valor tornou o campo válido ou ``false`` caso
     *              agora ele esteja inválido. Também retornará ``false`` caso o valor seja
     *              totalmente incompatível com o campo.
     */
    function setValue($v) : bool;



    /**
     * Retorna o valor atual deste campo.
     *
     * **undefined**
     * Este valor será retornado **ENQUANTO** o campo **AINDA** não foi redefinido com qualquer
     * outro valor. Esta regra se aplica para campos simples e *reference*.
     *
     *
     * **Campos Simples**
     * O valor retornado estará sempre no mesmo ``type`` que aquele que o campo está
     * configurado para assumir. Havendo alguma formatação indicada em ``inputFormat``, esta
     * será usada sobrepondo-se ao ``type``.
     *
     *
     * **Campos "reference"**
     * Estes campos apenas são capazes de retornar valores ``undefined``, ``null`` ou um ``array``
     * associativo representando o respectivo modelo de dados que ele está configurado para
     * receber.
     *
     *
     * **Campos "collection"**
     * O valor retornado será **SEMPRE** um ``array`` contendo os itens atualmente definidos.
     * Estes itens serão retornados conforme as regras definidas acima para *campos simples*.
     *
     * Coleções do tipo *reference* apenas retornarão um ``array`` de arrays associativos
     * representando a coleção de modelos de dados que o campo está apto a utilizar.
     *
     * Um *collection* em seu estado inicial retornará sempre um ``array`` vazio.
     *
     * @return      mixed
     */
    function getValue();


    /**
     * Retorna o valor atual deste campo em seu formato de armazenamento.
     *
     * **undefined**
     * O valor ``null`` será retornado no lugar de ``undefined`` para campos simples e
     * *reference*.
     *
     *
     * **Campos Simples**
     * O valor retornado estará sempre no mesmo ``type`` que aquele que o campo está
     * configurado para assumir. Qualquer regra para **REMOÇÃO** de formatação será aplicada
     * caso exista.
     *
     *
     * **Campos "reference"**
     * Estes campos apenas são capazes de retornar valores ``null`` ou arrays associativos
     * representando o respectivo modelo de dados que ele está configurado para receber.
     *
     *
     * **Campos "collection"**
     * O valor retornado será **SEMPRE** um ``array`` contendo os itens atualmente definidos.
     * Estes itens serão retornados conforme as regras definidas acima para *campos simples*.
     *
     * Coleções do tipo *reference* apenas retornarão um ``array`` de arrays associativos
     * representando a coleção de modelos de dados que o campo está apto a utilizar.
     *
     * Campos do tipo *collection* em seu estado inicial retornarsão sempre um ``array`` vazio.
     * Coleções que possuam valores inválidos entre seus membros também retornarão um ``array``
     * vazio.
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
