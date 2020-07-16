<?php
declare (strict_types=1);

namespace AeonDigital\Interfaces\Objects\Statics\DataTypes;

use AeonDigital\Interfaces\Objects\Statics\DataTypes\iStaticType as iStaticType;








/**
 * Define um ``static data type string``.
 *
 * @package     AeonDigital\Interfaces\Objects\Statics\DataTypes
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
interface iString extends iStaticType
{



    /**
     * Indica qual valor (para este tipo) deve ser considerado equivalente a ``null``
     * para fins de comparação.
     *
     * @return      string
     */
    static function nullEquivalent() : string;
}
