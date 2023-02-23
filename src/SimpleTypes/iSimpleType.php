<?php

declare(strict_types=1);

namespace AeonDigital\Interfaces\SimpleTypes;

use AeonDigital\Interfaces\iRealType;







/**
 * Interface fundamental para todas definições de tipos simples.
 *
 * @package     AeonDigital\Interfaces\SimpleTypes
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2023, Rianna Cantarelli
 * @license     MIT
 */
interface iSimpleType
{


    /**
     * Tipo primitivo representado por esta instância.
     *
     * @var PrimitiveType
     */
    public const TYPE = null;

    /**
     * Indica quando o tipo é representado por uma classe.
     *
     * @var bool
     */
    public const IS_CLASS = false;

    /**
     * Indica quando o tipo é um numero.
     *
     * @var bool
     */
    public const IS_NUMERIC = false;

    /**
     * Indica quando trata-se de um valor numérico que ACEITA valores negativos.
     * O valor ``null`` indica que esta informação não se aplica ao tipo.
     *
     * @var ?bool
     */
    public const SIGNED = null;

    /**
     * Indica quando trata-se de um valor numérico que NÃO ACEITA valores negativos.
     * O valor ``null`` indica que esta informação não se aplica ao tipo.
     *
     * @var ?bool
     */
    public const UNSIGNED = null;

    /**
     * Representação em ``string`` do valor mínimo aceitável para este tipo.
     * O valor ``null`` indica que esta informação não se aplica ao tipo.
     *
     * @var ?string
     */
    public const MIN = null;

    /**
     * Representação em ``string`` do valor máximo aceitável para este tipo.
     * O valor ``null`` indica que esta informação não se aplica ao tipo.
     *
     * @var ?string
     */
    public const MAX = null;

    /**
     * Representação em ``string`` do valor que o tipo deve considerar equivalente a ``null``.
     *
     * @var string
     */
    public const NULL_EQUIVALENT = "";





    /**
     * Retorna o valor indicado em ``MIN`` convertido para
     * o tipo nativo.
     *
     * @return null|int|float|iRealType|\DateTime
     * Usado apenas para tipos Int, Float, Real e DateTime.
     * Retornará ``null`` para todos os demais.
     */
    public static function getMin(): null|int|float|iRealType|\DateTime;


    /**
     * Retorna o valor indicado em ``MAX`` convertido para
     * o tipo nativo.
     *
     * @return null|int|float|iRealType|\DateTime
     * Usado apenas para tipos Int, Float, Real e DateTime.
     * Retornará ``null`` para todos os demais.
     */
    public static function getMax(): null|int|float|iRealType|\DateTime;


    /**
     * Retorna o valor indicado em ``NULL_EQUIVALENT`` convertido para
     * o tipo nativo.
     *
     * Por padrão considere que:
     * - bool -> false
     * - int|float|iRealType -> 0
     * - DateTime -> 0001-01-01 00:00:00
     * - string -> ""
     * - array -> []
     *
     * @return null|bool|int|float|iRealType|\DateTime|string|array
     */
    public static function getNullEquivalent(): null|bool|int|float|iRealType|\DateTime|string|array;


    /**
     * Verifica se o valor indicado pode ser convertido e usado como um valor válido
     * dentro das definições deste tipo.
     *
     * @param mixed $v
     * Valor que será verificado.
     *
     * @return bool
     */
    public static function validate(mixed $v): bool;


    /**
     * Efetuará a conversão do valor indicado para o tipo que esta classe representa
     * apenas se passar na validação.
     *
     * @param mixed $v
     * Valor que será convertido.
     *
     * @return null|bool|int|float|iRealType|\DateTime|string|array
     * Retorna o valor equivalente ao originalmente passado ou, caso a conversão não
     * seja possível, retornará ``null``.
     */
    public static function parseIfValidate(mixed $v): null|bool|int|float|iRealType|\DateTime|string|array;


    /**
     * Tenta efetuar a conversão do valor indicado para o tipo ``string``.
     *
     * @param mixed $v
     * Valor que será convertido.
     *
     * @return ?string
     * Caso não seja possível converter o valor, retornará ``null``.
     */
    public static function toString(mixed $v): ?string;
}