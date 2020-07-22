<?php
declare (strict_types=1);

namespace AeonDigital\Interfaces\Objects\Standart\Types;

use AeonDigital\Interfaces\Objects\Standart\iStandartType as iStandartType;








/**
 * Define um ``Standart\Types do tipo string``.
 *
 * @package     AeonDigital\Interfaces\Objects\Standart
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
interface iString extends iStandartType
{



    /**
     * Indica qual valor (para este tipo) deve ser considerado equivalente a ``null``
     * para fins de comparação.
     *
     * @return      string
     */
    static function nullEquivalent() : string;
}
