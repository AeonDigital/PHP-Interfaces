<?php
declare (strict_types=1);

namespace AeonDigital\Interfaces\Objects\Standart\Types;

use AeonDigital\Interfaces\Objects\Standart\Types\iNumeric as iNumeric;








/**
 * Define um ``Standart\Types do tipo int``.
 *
 * @package     AeonDigital\Interfaces\Objects\Standart
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
interface iInt extends iNumeric
{



    /**
     * Indica qual valor (para este tipo) deve ser considerado equivalente a ``null``
     * para fins de comparação.
     *
     * @return      int
     */
    static function nullEquivalent() : int;



    /**
     * Retorna o menor valor possível para este tipo.
     *
     * @return      int
     */
    static function min() : int;



    /**
     * Retorna o maior valor possível para este tipo.
     *
     * @return      int
     */
    static function max() : int;
}
