<?php
declare (strict_types = 1);

namespace AeonDigital\Interfaces\SimpleType;

use AeonDigital\Interfaces\SimpleType\iNumeric as iNumeric;
use AeonDigital\Interfaces\SimpleType\iSimpleType as iSimpleType;







/**
 * Especificação de um tipo numérico inteiro de até 64 bits.
 *
 * Por padrão os valores máximos e mínimos do para numerais no PHP variam
 * conforme a versão que está sendo usada (32/64 bits).
 * Portanto é altamente recomendável que, sempre que possível, seja
 * usada a versão x64.
 *
 * @package     AeonDigital\Interfaces\SimpleType
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
interface iInt extends iNumeric, iSimpleType
{





    /**
     * Retorna o menor valor possível para o tipo definido.
     *
     * @return      int
     */
    public static function min() : int;


    /**
     * Retorna o maior valor possível para o tipo definido.
     *
     * @return      int
     */
    public static function max() : int;
}
