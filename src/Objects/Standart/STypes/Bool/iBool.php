<?php
declare (strict_types=1);

namespace AeonDigital\Interfaces\Objects\Standart\STypes;

use AeonDigital\Interfaces\Objects\Standart\Primitive\iPBool as iPBool;
use AeonDigital\Interfaces\Objects\Standart\Flag\iReadWrite as iReadWrite;
use AeonDigital\Interfaces\Objects\Standart\Flag\iNotNullable as iNotNullable;






/**
 * ``Standart Bool``.
 *
 * @package     AeonDigital\Interfaces\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
interface iBool extends iPBool, iReadWrite, iNotNullable
{
}
