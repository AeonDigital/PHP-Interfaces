<?php
declare (strict_types=1);

namespace AeonDigital\Interfaces\Objects\Standart\SType;

use AeonDigital\Interfaces\Objects\Standart\Primitive\iPByteUnsigned as iPByteUnsigned;
use AeonDigital\Interfaces\Objects\Standart\Flag\iReadWrite as iReadWrite;
use AeonDigital\Interfaces\Objects\Standart\Flag\iNullable as iNullable;






/**
 * ``Standart Nullable Unsigned Byte`` (inteiro de 8 bits).
 *
 * @package     AeonDigital\Interfaces\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
interface iNUByte extends iPByteUnsigned, iReadWrite, iNullable
{
}
