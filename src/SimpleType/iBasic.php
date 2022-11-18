<?php

declare(strict_types=1);

namespace AeonDigital\Interfaces\SimpleType;









/**
 * Interface que especifica os requistos mínimos que uma classe definidora de um tipo
 * simples deve ter.
 *
 * NÃO DEVE ser usada diretamente em uma classe concreta. ANTES, deve ser expandida
 * por alguma interface que defina um tipo que possa tornar-se concreto.
 *
 * @package     AeonDigital\Interfaces\SimpleType
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
interface iBasic
{





    /**
     * Verifica se o valor indicado pode ser convertido e usado como um valor válido
     * dentro das definições deste tipo.
     *
     * @param mixed $v
     * Valor que será verificado.
     *
     * @return bool
     */
    static function validate(mixed $v): bool;



    /**
     * Tenta efetuar a conversão do valor indicado para o tipo ``string``. Caso não
     * seja possível converter o valor, retorna ``null``.
     *
     * @param mixed $v
     * Valor que será convertido.
     *
     * @return ?string
     */
    static function toString(mixed $v): ?string;



    /**
     * Efetuará a conversão do valor indicado para o tipo que esta classe representa
     * apenas se passar na validação.
     *
     * Caso não passe retornará um código que identifica o erro ocorrido na variável
     * ``$err``.
     *
     * @param mixed $v
     * Valor que será convertido.
     *
     * @param ?string $err
     * Código do erro da validação.
     *
     * @return mixed
     */
    static function parseIfValidate(mixed $v, ?string &$err = null): mixed;
}
