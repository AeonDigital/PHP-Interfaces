<?php
declare (strict_types=1);

namespace AeonDigital\Interfaces\Objects\Standart\STypes;

use AeonDigital\Interfaces\Objects\Standart\Primitive\iPLongSigned as iPLongSigned;
use AeonDigital\Interfaces\Objects\Standart\Flag\iReadWrite as iReadWrite;
use AeonDigital\Interfaces\Objects\Standart\Flag\iNullable as iNullable;






/**
 * ``Standart Nullable Long`` (inteiro de 64 bits).
 *
 * @package     AeonDigital\Interfaces\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
interface iNLong extends iPLongSigned, iReadWrite, iNullable
{
}
