<?php
declare (strict_types=1);

namespace AeonDigital\Interfaces\Objects;










/**
 * Descreve uma interface para uma classe do tipo ``StandartArray``.
 *
 * Tratam-se de arrays especializados em tipos específicos de dados.
 * O Funcionamento é análogo ao ``iStandartType`` porém focado na criação
 * e uso de instâncias e não na definição dos tipos.
 *
 * @package     AeonDigital\Interfaces\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
interface iArray extends IteratorAggregate, ArrayAccess, Serializable, Countable
{
    /**
     * Nas classes concretas deve ser definido uma constante com o nome ``TYPE``
     * que deverá trazer o nome do tipo de dado que aquela classe pretende definir.
     */



    /**
     * Informa se ``null`` será aceito como um valor válido para os itens
     * da instância.
     *
     * @return      bool
     */
    function isNullable() : bool;
    /**
     * Informa se esta instância está ``undefined``.
     * Significa que ela nunca recebeu um valor de forma explicita.
     *
     * @return      bool
     */
    function isUndefined() : bool;



    /**
     * Informa se os itens definidos no ``array`` deve ser protegido contra alterações.
     *
     * O objetivo desta definição é **PROTEGER O ESTADO ORIGINALMENTE DEFINIDO** de um
     * dado valor tal qual ele foi inicialmente inserido. A partir deste momento NENHUMA
     * outra alteração daquele objeto poderá ser feita e o ``array`` será como um
     * provedor daqueles objetos com seus respectivos estados.
     *
     * ``Arrays`` deste tipo PODEM GANHAR ou PERDER valores mas NENHUM item atualmente
     * existênte pode ser alterado.
     *
     * Note que um item qualquer pode ser totalmente removido e depois um novo pode ser
     * adicionado usando a mesma chave do anterior.
     *
     * @return      bool
     */
    function isProtected() : bool;
    /**
     * Informa se o ``array`` é apenas incremental.
     *
     * Quando ``true`` DEVE impedir qualquer forma de remoção de valores previamente
     * definidos. Note que o valor PODE ainda ser alterado, no entanto, uma chave que
     * seja definida uma vez permanecerá no ``array`` até o final da vida do mesmo.
     *
     * A junção desta definição com a ``isProtected`` formará um ``array`` que pode ser
     * incrementado ilimitadamente mas que não poderá ter nenhum de seus valores
     * alterados nem excluídos.
     *
     * @return      bool
     */
    function isAppendOnly() : bool;
    /**
     * Informa se esta instância é ``readonly``.
     *
     * Esta definição deve ser entendida como uma forma ainda mais restritiva da
     * ``isProtected`` pois, além de não permitir que nenhum estado dos objetos
     * armazenados seja alterado, ele também não permite qualquer alteração no ``array``
     * em si.
     *
     * Neste caso o ``array`` DEVE ser definido no construtor da classe e após isto
     * NENHUMA outra alteração pode ser executada nos valores que estão armazenados.
     *
     * @return      bool
     */
    function isReadOnly() : bool;



    /**
     * Informa se as chaves do ``array`` apenas serão aceitas se forem definidas como
     * valores do tipo ``string``.
     *
     * @return      bool
     */
    function isOnlyStringKeys() : bool;
    /**
     * Informa se as chaves de valores devem ser tratadas de forma ``case-sensitive``.
     *
     * @return      bool
     */
    function isCaseSensitive() : bool;





    /**
     * Indica qual valor (para o tipo de dado que este array armazena) deve ser
     * considerado equivalente a ``null``.
     *
     * @return      mixed
     */
    function nullEquivalent();





    /**
     * Indica se a chave de nome indicado existe.
     *
     * @param       string $key
     *              Chave.
     *
     * @return      bool
     */
    function has(string $key) : bool;
    /**
     * Define um novo valor para a instância.
     *
     * @param       string $key
     *              Chave a ser definido para este valor.
     *
     * @param       mixed $v
     *              Valor a ser adicionado ao ``array``.
     *
     * @param       bool $throws
     *              Indica se deve criar uma exception caso o valor seja inválido.
     *
     * @param       ?string $err
     *              Informa o tipo de erro que impediu que o valor fosse atribuido.
     *
     * @return      bool
     *              Retornará ``true`` caso o valor tenha sido aceito e ``false``
     *              caso contrário.
     */
    function set(
        string $key,
        $v,
        bool $throws = true,
        ?string &$err = null
    ) : bool;
    /**
     * Retorna o objeto no Chave especificado.
     *
     * @param       string $key
     *              Chave do valor que deve ser retornado.
     *
     * @return      mixed
     */
    function get(string $key);



    /**
     * Retorna um objeto do mesmo tipo do atual contendo exclusivamente as chaves e
     * respectivos valores nas posições em que os valores não são ``null``.
     *
     * @return      self
     */
    function subSetNotNull() : self;
    /**
     * Converte o objeto atualmente em um ``array associativo``.
     *
     * @param       bool $originalKeys
     *              Quando ``true`` irá usar as chaves conforme foram definidas na função ``set``.
     *              Se no armazenamento interno elas sofrerem qualquer alteração e for definido
     *              ``false`` então elas retornarão seu formato alterado.
     *
     * @return      array
     *              Retorna um ``array associativo`` ou ``[]`` caso a coleção esteja vazia.
     */
    function toArray(bool $originalKeys = false) : array;


    /**
     * Permite inserir multiplos dados de uma única vez.
     *
     * @param       array $newValues
     *              ``array associativo`` contendo os novos valores a serem definidos.
     *
     * @return      bool
     *              Retornará ``true`` caso TODOS os novos valores sejam adicionados e
     *              ``false`` caso 1 deles falhe.
     */
    function insert(array $newValues) : bool;
    /**
     * Limpa totalmente o ``array`` eliminando toda informação armazenada no momento.
     *
     * @return      bool
     *              Retornará ``true`` caso a exclusão dos dados tenha sido executada com sucesso
     *              e ``false`` caso ocorra algum erro em algum dos itens.
     *              Neste caso, o ``array`` poderá ficará pela metade.
     */
    function clean() : bool;










    /**
     * Verifica se o valor indicado pode ser convertido e usado como um valor válido
     * dentro das definições deste tipo.
     *
     * A não ser que seja explicitado o contrário, o valor ``null`` não será aceito.
     *
     * @param       mixed $v
     *              Valor que será verificado.
     *
     * @param       bool $nullable
     *              Quando ``true`` indica que o valor ``null`` é válido para este tipo.
     *
     * @return      bool
     */
    static function validate($v, bool $nullable = false) : bool;



    /**
     * Efetuará a conversão do valor indicado para o tipo que esta classe representa
     * apenas se passar na validação.
     *
     * Caso não passe retornará um código que identifica o erro ocorrido na variável
     * ``$err``.
     *
     * @param       mixed $v
     *              Valor que será convertido.
     *
     * @param       bool $nullable
     *              Quando ``true`` indica que o valor ``null`` é válido para este tipo
     *              e não será convertido.
     *
     * @param       bool $nullEquivalent
     *              Quando ``true``, converterá ``null`` para o valor existente em
     *              ``static::nullEquivalent()``. Se ``$nullable=true`` for definido esta
     *              opção será ignorada.
     *
     * @param       ?string $err
     *              Código do erro da validação.
     *
     * @return      mixed
     */
    static function parseIfValidate(
        $v,
        bool $nullable = false,
        bool $nullEquivalent = false,
        ?string &$err = null
    );



    /**
     * Retorna o menor valor possível para este tipo.
     * Quando ``null`` indica que não há limites definidos ou que isto não se aplica
     * para o tipo indicado.
     *
     * @return      mixed
     */
    static function min();



    /**
     * Retorna o maior valor possível para este tipo.
     * Quando ``null`` indica que não há limites definidos ou que isto não se aplica
     * para o tipo indicado.
     *
     * @return      mixed
     */
    static function max();
}
