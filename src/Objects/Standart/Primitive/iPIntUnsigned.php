<?php
declare (strict_types=1);

namespace AeonDigital\Interfaces\Objects\Standart\Primitive;

use AeonDigital\Interfaces\Objects\Standart\Primitive\iPInt as iPInt;
use AeonDigital\Interfaces\Objects\Standart\Flag\iUnsigned as iUnsigned;







/**
 * ``Primitive Standart Unsigned Int`` (inteiro de 32 bits).
 *
 * @package     AeonDigital\Interfaces\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
interface iPIntUnsigned extends iPInt, iUnsigned
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
    const MAX = "4294967295";
}