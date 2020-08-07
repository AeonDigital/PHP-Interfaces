<?php
declare (strict_types=1);

namespace AeonDigital\Interfaces\Objects\Standart\Primitive;

use AeonDigital\Interfaces\Objects\Standart\Primitive\iPDateTime as iPDateTime;
use AeonDigital\Interfaces\Objects\Standart\Flag\iSigned as iSigned;







/**
 * ``Primitive Standart Signed DateTime``.
 *
 * @package     AeonDigital\Interfaces\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
interface iPDateTimeSigned extends iPDateTime, iSigned
{



    /**
     * Representação em ``string`` do valor mínimo aceitável para este tipo.
     *
     * @var         string
     */
    const MIN = "-9999-01-01 00:00:00";
    /**
     * Representação em ``string`` do valor máximo aceitável para este tipo.
     *
     * @var         string
     */
    const MAX = "9999-12-31 23:59:59";
}
