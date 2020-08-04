<?php
declare (strict_types=1);

namespace AeonDigital\Interfaces\Objects\Standart\Types;

use AeonDigital\Interfaces\Objects\Standart\Primitive\iPDoubleUnsigned as iPDoubleUnsigned;
use AeonDigital\Interfaces\Objects\Standart\Flag\iReadWrite as iReadWrite;
use AeonDigital\Interfaces\Objects\Standart\Flag\iNullable as iNullable;






/**
 * ``Standart Nullable Unsigned Double`` (flutuante de 64 bits).
 *
 * @package     AeonDigital\Interfaces\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
interface iNUDouble extends iPDoubleUnsigned, iReadWrite, iNullable
{
}
