<?php
declare (strict_types=1);

namespace AeonDigital\Interfaces\Objects\Standart\Types;

use AeonDigital\Interfaces\Objects\Standart\Primitive\iPIntUnsigned as iPIntUnsigned;
use AeonDigital\Interfaces\Objects\Standart\Flag\iReadOnly as iReadOnly;
use AeonDigital\Interfaces\Objects\Standart\Flag\iNotNullable as iNotNullable;






/**
 * ``Standart ReadOnly Unsigned Int`` (inteiro de 32 bits).
 *
 * @package     AeonDigital\Interfaces\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
interface iROUInt extends iPIntUnsigned, iReadOnly, iNotNullable
{
}
