<?php
declare (strict_types=1);

namespace AeonDigital\Interfaces\Objects\Statics\DataTypes;

use AeonDigital\Interfaces\Objects\Statics\DataTypes\iStaticDataType as iStaticDataType;








/**
 * Define um ``static data type \DateTime``.
 *
 * @package     AeonDigital\Interfaces\Objects\Statics\DataTypes
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
interface iDateTime extends iStaticDataType
{



    /**
     * Indica qual valor (para este tipo) deve ser considerado equivalente a ``null``
     * para fins de comparação.
     *
     * @return      \DateTime
     */
    static function nullEquivalent() : \DateTime;



    /**
     * Retorna o menor valor possível para este tipo.
     *
     * @return      \DateTime
     */
    static function min() : \DateTime;


    /**
     * Retorna o menor valor possível para este tipo.
     *
     * @return      \DateTime
     */
    static function max() : \DateTime;
}
