<?php
declare (strict_types=1);

namespace AeonDigital\Interfaces\Objects\Standart\STypes;

use AeonDigital\Interfaces\Objects\Standart\Primitive\iPLongUnsigned as iPLongUnsigned;
use AeonDigital\Interfaces\Objects\Standart\Flag\iReadWrite as iReadWrite;
use AeonDigital\Interfaces\Objects\Standart\Flag\iNotNullable as iNotNullable;






/**
 * ``Standart Unsigned Long`` (inteiro de 64 bits).
 *
 * @package     AeonDigital\Interfaces\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
interface iULong extends iPLongUnsigned, iReadWrite, iNotNullable
{
}
