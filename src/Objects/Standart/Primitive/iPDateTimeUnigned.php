<?php
declare (strict_types=1);

namespace AeonDigital\Interfaces\Objects\Standart\Primitive;

use AeonDigital\Interfaces\Objects\Standart\Primitive\iPDateTime as iPDateTime;
use AeonDigital\Interfaces\Objects\Standart\Flag\iUnsigned as iUnsigned;







/**
 * ``Primitive Standart Unsigned DateTime``.
 *
 * @package     AeonDigital\Interfaces\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
interface iPDateTimeUnsigned extends iPDateTime, iUnsigned
{



    /**
     * Representação em ``string`` do valor mínimo aceitável para este tipo.
     *
     * @var         string
     */
    const MIN = "0001-01-01 00:00:00";
    /**
     * Representação em ``string`` do valor máximo aceitável para este tipo.
     *
     * @var         string
     */
    const MAX = "9999-01-01 23:59:59";
}
