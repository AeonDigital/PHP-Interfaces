<?php

declare(strict_types=1);

namespace AeonDigital\Interfaces\SimpleFields;

use AeonDigital\Interfaces\SimpleTypes\iSimpleType as iSimpleType;
use AeonDigital\Interfaces\DataFormat\iFormat as iFormat;
use AeonDigital\Interfaces\iRealType as iRealType;
use AeonDigital\undefined as undefined;




/**
 * Interface fundamental para instancias de campos de dados.
 *
 * @package     AeonDigital\SimpleTypes
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2023, Rianna Cantarelli
 * @license     MIT
 */
interface iSimpleField
{


    /*
     * Sobre valores
     *
     * - Toda nova instância de um campo ao ser definida virá com seu valor equivalente à ``undefined``.
     *
     * - Se um valor padrão estiver configurado, então o valor inicial de uma nova instância será
     *   alterada para corresponder ao mesmo. Mesmo assim, o campo ainda é considerado como estando
     *   com o estado indefinido ``$this->isUndefined() === true``.
     *
     * - Os valores dos métodos ``$this->isUndefined()`` e ``$this->isDefined()`` apenas são alterados
     *   a partir do momento em que um valor for atribuído ao campo pelo método ``$this->set()``
     *   independente de isto ter tornado o campo inválido ou não (veja abaixo).
     *
     * - Quando um valor for atribuido deve ocorrer o seguinte:
     *   - SE o valor NÃO corresponde ao tipo ``$this->getType()::TYPE`` configurado, o valor atual
     *     do campo não deve ser alterado. Com isto o estado de validade ou não do campo deve ser
     *     mantido como se a tentativa de atribuição nunca tivesse ocorrido.
     *
     *   - SE o valor CORRESPONDE ao tipo ``$this->getType()::TYPE`` configurado MAS NÂO É VALIDADO
     *     por conta de alguma outra regra configurada, o valor DEVE SER atribuído ao campo e seu
     *     estado deve ser alterado para não ser mais reconhecido como válido. Neste caso o campo
     *     já não deve mais ser considerado como indefinido; ou seja ``$this->isUndefined() === false``.
     *
     *   - Se o valor for aceito e passar na validação o campo ele deve ser reconhecido como válido.
     *
     * - Campos do tipo ``readonly`` apenas podem receber novos valores a partir do momento da criação
     *   da instância e enquanto ainda não receberam um valor aceito e validado. A partir deste momento
     *   as tentativas de alteração do valor do campo deverão sempre falhar.
     */





    /**
     * Tipo primitivo representado por este campo.
     *
     * @var iSimpleType
     */
    public static function getType(): iSimpleType;



    /**
     * Informa se este campo aceita ``null`` como válido.
     * Valor padrão é ``true``.
     *
     * @return bool
     */
    public function isAllowNull(): bool;

    /**
     * Informa se este campo é ``readonly``.
     * Valor padrão é ``false``.
     *
     * @return bool
     */
    public function isReadOnly(): bool;

    /**
     * Informa se este campo aceita ``""`` como um valor válido em campos String.
     * Valor padrão é ``true``.
     *
     * @return ?bool
     * Aplicável apenas em tipo String.
     * Deve retornar ``null`` para todos os demais tipos.
     */
    public function isAllowEmpty(): ?bool;



    /**
     * Valor inicial para o campo.
     *
     * @return undefined|null|bool|int|float|iRealType|\DateTime|string|array
     */
    public function getDefault(): undefined|null|bool|int|float|iRealType|\DateTime|string|array;



    /**
     * Retorna o menor valor aceitável para este campo.
     * Em tipos ``String`` informa o menor número de caracteres que um valor deve ter.
     *
     * @return null|int|float|iRealType|\DateTime
     * Quando ``null`` indica que não há limites definidos ou que isto não se aplica
     * para o tipo indicado.
     */
    public function getMin(): null|int|float|iRealType|\DateTime;

    /**
     * Retorna o maior valor aceitável para este campo.
     * Em tipos ``String`` informa o menor número de caracteres que um valor deve ter.
     *
     * @return null|int|float|iRealType|\DateTime
     * Quando ``null`` indica que não há limites definidos ou que isto não se aplica
     * para o tipo indicado.
     */
    public function getMax(): null|int|float|iRealType|\DateTime;

    /**
     * Retorna o número máximo de caracteres que podem ser usados para representar um
     * valor ``String`` neste campo.
     * É usado APENAS em tipos ``String``.
     *
     * @return ?int
     * Retornará ``null`` para todos campos que não sejam do tipo ``String``.
     * Quando ``String`` o valor retornado será o mesmo indicado em ``$this->getMax()``.
     */
    public function getMaxLength(): ?int;

    /**
     * Quantodade de caracters que o valor atualmente definido possui.
     * É usado APENAS em tipos ``String``.
     *
     * @return ?int
     * Retornará ``null`` para todos campos que não sejam do tipo ``String``.
     */
    public function getLength(): ?int;



    /**
     * Retorna um enumerador com a coleção de valores que este campo está apto a assumir.
     * Os valores de cada ``case`` do enumerador devem seguir as regras de validade
     * especificadas para este campo. Valores inválidos apenas não serão passíveis de
     * serem atribuídos como valor mas não causarão erro explicito.
     *
     * @return ?\BackedEnum;
     */
    public function getEnumerator(bool $onlyValues = false): ?\BackedEnum;
    /*
     * SET
     * Define um enumerador a ser usado como coleção de valores válidos para este campo.
     *
     * @param ?\BackedEnum
     * Enumerador que será usado.
     */



    /**
     * Retorna a classe ``iFormat`` contendo as regras de formatação para o valor que
     * este campo está armazenando.
     *
     * @return ?iFormat
     */
    public function getInputFormat(): ?iFormat;
    /*
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
     * Indica quando o campo ainda está com o estado de **indefinido**.
     *
     * @return bool
     * Retorna ``true`` enquanto nenhum valor aceito pelo campo estiver definido
     * através do uso do método ``$this->set()``.
     */
    public function isUndefined(): bool;

    /**
     * Indica quando o campo está com o estado de **definido**.
     *
     * @return bool
     * Retorna ``true`` a partir do momento em que um valor for aceito pelo campo
     * através do uso do método ``$this->set()``.
     */
    public function isDefined(): bool;

    /**
     * Informa se o valor atualmente definido é O MESMO que está configurado em
     * ``$this->getType()::NULL_EQUIVALENT``.
     *
     * @return bool
     * Retornará ``true`` caso o valor atualmente definido para o campo seja O MESMO
     * que está configurado em ``$this->getType()::NULL_EQUIVALENT``.
     * Retornará ``false`` caso contrário e também em caso o valor atualmente definido
     * seja o próprio ``null``.
     */
    public function isNullEquivalent(): bool;

    /**
     * Informa se o valor atualmente definido é ``null`` OU se é O MESMO que está
     * configurado em ``$this->getType()::NULL_EQUIVALENT``.
     *
     * @return bool
     * Retornará ``true`` caso o valor atualmente definido para o campo seja O MESMO
     * que está configurado em ``$this->getType()::NULL_EQUIVALENT`` ou se for ``null``.
     */
    public function isNullOrEquivalent(): bool;

    /**
     * Indica se o valor atualmente definido para este campo é válido
     *
     * @return bool
     * Retornará ``true`` caso o valor esteja em conformidade com todos os critérios
     * de validação para o mesmo e ``false`` em caso contrário.
     */
    public function isValid(): bool;





    /**
     * Verifica se o valor indicado satisfaz os critérios de aceitação para este campo..
     *
     * @param mixed $v
     * Valor que será verificado.
     *
     * @return bool
     */
    public function validate(mixed $v): bool;

    /**
     * Retorna o último código da última validação realizada.
     *
     * @return string
     * Retornará ``valid`` caso não existam erros ou o código do erro
     * ocorrido
     */
    public function getLastValidateState(): string;





    /**
     * Define um novo valor para a instância.
     *
     * @param null|bool|int|float|iRealType|\DateTime|string|array $v
     * Valor a ser atribuido.
     *
     * @return bool
     */
    public function set(null|bool|int|float|iRealType|\DateTime|string|array $v): bool;
    /**
     * Retorna o último código da última validação realizada para o uso
     * do método ``$this->set()``.
     *
     * @return string
     * Retornará ``valid`` caso não existam erros ou o código do erro
     * ocorrido
     */
    public function getLastSetState(): string;





    /**
     * Retorna o valor atualmente definido para este campo.
     *
     * @return undefined|null|bool|int|float|iRealType|\DateTime|string|array
     * Se existir um ``inputFormat`` definido, aplicará o formato indicado
     * para o valor atualmente setado.
     */
    public function get(): undefined|null|bool|int|float|iRealType|\DateTime|string|array;

    /**
     * Retorna o valor atualmente definido para a instância atual mas caso o
     * valor seja ``null``, retornará o valor definido em ``NULL_EQUIVALENT``.
     *
     * @return undefined|null|bool|int|float|iRealType|\DateTime|string|array
     * Se existir um ``inputFormat`` definido, aplicará o formato indicado
     * para o valor atualmente setado.
     *
     * Se o campo ainda estiver com o valor inicial ``undefined``, o mesmo será
     * retornado.
     */
    public function getNotNull(): undefined|null|bool|int|float|iRealType|\DateTime|string|array;

    /**
     * Retorna o valor atualmente definido em seu formato de armazenamento.
     *
     * Apenas terá um efeito se um ``inputFormat`` estiver definido, caso contrário
     * retornará o mesmo valor existente em ``$this->get()``.
     *
     * @return undefined|null|bool|int|float|iRealType|\DateTime|string|array
     */
    public function getStorageValue(): undefined|null|bool|int|float|iRealType|\DateTime|string|array;

    /**
     * Retorna o valor atualmente definido em seu formato ``raw`` que é aquele
     * que foi passado na execução do método ``$this->set()``.
     *
     * @return undefined|null|bool|int|float|iRealType|\DateTime|string|array
     */
    public function getRawValue(): undefined|null|bool|int|float|iRealType|\DateTime|string|array;





    /**
     * Converte o valor atualmente definido para uma ``string``.
     *
     * @return string
     */
    public function toString(): string;





    /**
     * Retorna uma instância definida com as propriedades indicadas no
     * ``array`` de configuração.
     *
     * @param array $cfg
     * Array associativo contendo as configurações para a definição da instância resultante.
     *
     * @return iSimpleType
     */
    public static function fromArray(array $cfg): iSimpleType;
}