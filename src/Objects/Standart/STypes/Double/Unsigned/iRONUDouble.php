<?php
declare (strict_types=1);

namespace AeonDigital\Interfaces\Objects\Standart\STypes;

use AeonDigital\Interfaces\Objects\Standart\Primitive\iPDoubleUnsigned as iPDoubleUnsigned;
use AeonDigital\Interfaces\Objects\Standart\Flag\iReadOnly as iReadOnly;
use AeonDigital\Interfaces\Objects\Standart\Flag\iNullable as iNullable;






/**
 * ``Standart ReadOnly Nullable Unsigned Double`` (flutuante de 64 bits).
 *
 * @package     AeonDigital\Interfaces\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
interface iRONUDouble extends iPDoubleUnsigned, iReadOnly, iNullable
{
}
