<?php

declare(strict_types=1);

namespace AeonDigital\Interfaces\DataFormat;

use AeonDigital\Interfaces\DataFormat\iStringFormat as iStringFormat;







/**
 * Especializa a interface ``iStringFormat`` preparando-a para lidar com senhas.
 *
 * @package     AeonDigital\Interfaces\DataFormat
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
interface iPasswordFormat extends iStringFormat
{



    /**
     * Caracteres comuns a serem aceitos.
     *
     * @var         string
     */
    const CommomChars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";


    /**
     * Caracteres especiais que podem ser usados.
     *
     * @var         string
     */
    const SpecialChars = "!@#$%¨*()-_+=?";





    /**
     * Testa a força da string enquanto senha e retorna sua pontuação.
     *
     * **Pontuação**
     * ``+ 10 pontos``  :   Por cada caracter diferente onde ``T != t``
     * ``+ 05 pontos``  :   Se houver ao menos 3 numerais diferentes.
     * ``+ 05 pontos``  :   Se houver ao menos 2 simbolos diferentes ``!@#$+-_=[]{}?``
     * ``+ 10 pontos``  :   Por cada familia de caracteres alem da primeira
     * As famílias de caracteres são: ``Minusculas`` | ``Maiusculas`` | ``Numeros`` | ``Simbolos``
     *
     * @param       string $v
     *              Valor a ser ajustado.
     *
     * @return      int
     */
    static function checkStrength(string $v): int;





    /**
     * Gera uma senha de forma aleatória baseada nas configurações passadas. O tamanho da
     * senha será o valor informado em ``$cfg[¨MinLength¨]``
     *
     * **Exemplo de parametro $cfg***
     * ``` php
     *      $arr = [
     *          // Coleção de caracteres comuns aceitos.
     *          "CommomChars"   => "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789",
     *
     *          // Coleção de caracteres especiais.
     *          "SpecialChars"  => "!@#$%¨*()-_+=?"
     *
     *          // Número mínimo de caracteres para compor uma senha.
     *          "MinLength"     => 8
     *
     *          // Número máximo de caracteres para compor uma senha.
     *          "MaxLength"     => 128
     *      ];
     * ```
     *
     * @param       ?array $cfg
     *              Configurações da senha que será gerada. Usará os valores padrões caso
     *              este parametro não seja informado.
     *
     * @return      string
     */
    static function generate(?array $cfg = null): string;





    /**
     * Verifica se o valor passado é uma ``string`` que pode ser aceita como ``password`` válida.
     *
     * Caso não passe na validação, retornará um código que identifica o erro ocorrido na
     * variável ``$err``.
     *
     * **Exemplo de parametro $aux***
     * ``` php
     *      $arr = [
     *          // Coleção de caracteres comuns aceitos.
     *          "CommomChars"   => "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789",
     *
     *          // Coleção de caracteres especiais.
     *          "SpecialChars"  => "!@#$%¨*()-_+=?"
     *
     *          // Número mínimo de caracteres para compor uma senha.
     *          "MinLength"     => 8
     *
     *          // Número máximo de caracteres para compor uma senha.
     *          "MaxLength"     => 128
     *      ];
     * ```
     *
     * @param       ?string $v
     *              Valor a ser testado.
     *
     * @param       ?array $aux
     *              Array associativo trazendo a configuração para formatação da string.
     *
     * @param       ?string $err
     *              Código do erro da validação.
     *
     * @return      bool
     */
    static function checkPassword(?string $v, ?array $aux = null, ?string &$err = null): bool;
}
