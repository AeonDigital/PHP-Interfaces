<?php

declare(strict_types=1);

namespace AeonDigital\Interfaces\SimpleType;

use AeonDigital\Interfaces\SimpleType\iBasic as iBasic;
use AeonDigital\Interfaces\SimpleType\iSimpleType as iSimpleType;






/**
 * Especificação de um tipo DateTime.
 *
 * @package     AeonDigital\Interfaces\SimpleType
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
interface iDateTime extends iBasic, iSimpleType
{





    /**
     * Retorna o menor valor possível para este tipo de data. Se for definido ``null``,
     * o limite será dado pelo próprio sistema.
     *
     * @return ?\DateTime
     */
    public static function min(): ?\DateTime;


    /**
     * Retorna o maior valor possível para este tipo de data. Se for definido ``null``,
     * o limite será dado pelo próprio sistema.
     *
     * @return ?\DateTime
     */
    public static function max(): ?\DateTime;
}
