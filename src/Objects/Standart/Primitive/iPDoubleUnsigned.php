<?php
declare (strict_types=1);

namespace AeonDigital\Interfaces\Objects\Standart\Primitive;

use AeonDigital\Interfaces\Objects\Standart\Primitive\iPDouble as iPDouble;
use AeonDigital\Interfaces\Objects\Standart\Flag\iUnsigned as iUnsigned;







/**
 * ``Primitive Standart Unsigned Double`` (flutuante de 64 bits).
 *
 * @package     AeonDigital\Interfaces\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
interface iPDoubleUnsigned extends iPDouble, iUnsigned
{



    /**
     * Representação em ``string`` do valor mínimo aceitável para este tipo.
     *
     * @var         string
     */
    const MIN = "0";
    /**
     * Representação em ``string`` do valor máximo aceitável para este tipo.
     *
     * @var         string
     */
    const MAX = "9223372036854775806";
}