<?php
declare (strict_types=1);

namespace AeonDigital\Interfaces\Objects\Standart\STypes;

use AeonDigital\Interfaces\Objects\Standart\Primitive\iPShortUnsigned as iPShortUnsigned;
use AeonDigital\Interfaces\Objects\Standart\Flag\iReadOnly as iReadOnly;
use AeonDigital\Interfaces\Objects\Standart\Flag\iNotNullable as iNotNullable;






/**
 * ``Standart ReadOnly Unsigned Short`` (inteiro de 16 bits).
 *
 * @package     AeonDigital\Interfaces\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
interface iROUShort extends iPShortUnsigned, iReadOnly, iNotNullable
{
}
