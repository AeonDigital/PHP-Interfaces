<?php
declare (strict_types=1);

namespace AeonDigital\Interfaces\Objects\Standart\SType;

use AeonDigital\Interfaces\Objects\Standart\Primitive\iPLongUnsigned as iPLongUnsigned;
use AeonDigital\Interfaces\Objects\Standart\Flag\iReadWrite as iReadWrite;
use AeonDigital\Interfaces\Objects\Standart\Flag\iNullable as iNullable;






/**
 * ``Standart Nullable Unsigned Long`` (inteiro de 64 bits).
 *
 * @package     AeonDigital\Interfaces\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
interface iNULong extends iPLongUnsigned, iReadWrite, iNullable
{
}
