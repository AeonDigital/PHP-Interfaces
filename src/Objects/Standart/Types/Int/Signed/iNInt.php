<?php
declare (strict_types=1);

namespace AeonDigital\Interfaces\Objects\Standart\Types;

use AeonDigital\Interfaces\Objects\Standart\Primitive\iPIntSigned as iPIntSigned;
use AeonDigital\Interfaces\Objects\Standart\Flag\iReadWrite as iReadWrite;
use AeonDigital\Interfaces\Objects\Standart\Flag\iNullable as iNullable;






/**
 * ``Standart Nullable Int`` (inteiro de 32 bits).
 *
 * @package     AeonDigital\Interfaces\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
interface iNInt extends iPIntSigned, iReadWrite, iNullable
{
}
