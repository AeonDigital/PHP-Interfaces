<?php
declare (strict_types=1);

namespace AeonDigital\Interfaces\Objects\Standart\Types;

use AeonDigital\Interfaces\Objects\Standart\Primitive\iPDateTimeSigned as iPDateTimeSigned;
use AeonDigital\Interfaces\Objects\Standart\Flag\iReadOnly as iReadOnly;
use AeonDigital\Interfaces\Objects\Standart\Flag\iNotNullable as iNotNullable;






/**
 * ``Standart ReadOnly DateTime``.
 *
 * @package     AeonDigital\Interfaces\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
interface iRODateTime extends iPDateTimeSigned, iReadOnly, iNotNullable
{
}