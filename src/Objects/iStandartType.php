<?php
declare (strict_types=1);

namespace AeonDigital\Interfaces\Objects;










/**
 * Descreve uma interface para uma classe do tipo ``Standart``.
 * Estas classes representam tipos de dados especializados e/ou normatizam os tipos
 * padrões do PHP.
 *
 * Seus membros estáticos trazem as regras que definem cada tipo planeja mapear,
 * descrever e limitar.
 *
 * Neste sentido:
 * - Mapear significa que os tipos de dados representados por futuras classes concretas
 *   poderão operar dentro de sistemas mais complexos de forma interoperável pois
 *   participarão de uma natureza mínima descritiva de suas respectivas composições.
 *
 * - Descrever e Limitar significa indicar formas de validar tal dado ou converter outros
 *   para ele além de identificar seus valores mínimos e máximos aceitáveis* ou mesmo
 *   qual valor será convencionado para representar ``null`` quando o uso do próprio
 *   ``null`` não for válido.
 *
 * * ``aceitável`` significa, neste caso, extritamente do ponto de vista comercial.
 *   Por exemplo: não é nada comum, num sistema comercial o uso de datas anteriores ao
 *   ano 1, portanto, esta poderia ser uma data mínima aceitável e uma data máxima, por
 *   exemplo o ano 3000.
 *
 * @package     AeonDigital\Interfaces\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
interface iStandartType
{
    /**
     * Se esta interface for implementada em uma outra que sugira um tipo específico,
     * é recomendável que as constantes relatadas abaixo sejam definidas já nela.
     *
     * Caso contrário, tal implementação pode ser feita nas classes concretas.
     *
     * CONSTANTES
     *
     * string TYPE
     * Refere-se sempre ao tipo de dado que está sendo definido ou ao namespace completo
     * da classe que se planeja especializar como um tipo.
     *
     * bool IS_CLASS
     * Deve indicar se as classes concretas que implementam aquela definição estão
     * referindo-se a uma classe.
     *
     * bool HAS_LIMIT_RANGE
     * Indica se é uma classe do tipo que é válida a espectativa de possuir um valor
     * mínimo e um máximo.
     */




    /**
     * Informa se esta instância é ``nullable``.
     *
     * @return      bool
     */
    function isNullable() : bool;



    /**
     * Informa se esta instância é ``readonly``.
     *
     * Quando ``true``, após a criação da instância nenhum outro valor poderá
     * ser definido para a mesma
     *
     * @return      bool
     */
    function isReadOnly() : bool;



    /**
     * Informa se esta instância está ``undefined``.
     * Significa que ela nunca recebeu um valor de forma explicita.
     *
     * @return      bool
     */
    function isUndefined() : bool;



    /**
     * Define um novo valor para a instância.
     *
     * @param       mixed $v
     *              Valor a ser atribuido.
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
    function set($v, bool $throws = true, ?string &$err = null) : bool;



    /**
     * Retorna o valor atualmente definido para a instância atual.
     *
     * @return      mixed
     */
    function get();
    /**
     * Retorna o valor atualmente definido para a instância atual mas caso o
     * valor seja ``null``, retornará o valor definido em ``self::nullEquivalent()``.
     *
     * @return      mixed
     */
    function getNotNull();





    /**
     * Tenta efetuar a conversão do valor indicado para o tipo ``string``.
     * Caso não seja possível converter o valor, retorna ``null``.
     *
     * @param       mixed $v
     *              Valor que será convertido.
     *
     * @return      ?string
     */
    static function toString($v) : ?string;



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
     *              ``self::nullEquivalent()``. Se ``$nullable=true`` for definido esta
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
     * Indica qual valor (para este tipo) deve ser considerado equivalente a ``null``
     * para fins de comparação.
     *
     * @return      mixed
     */
    static function nullEquivalent();



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
