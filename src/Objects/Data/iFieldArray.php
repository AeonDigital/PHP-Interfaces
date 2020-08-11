<?php
declare (strict_types=1);

namespace AeonDigital\Interfaces\Objects\Data;

use AeonDigital\Interfaces\Objects\Data\iField as iField;
use AeonDigital\Interfaces\Objects\iTypeArray as iTypeArray;








/**
 * Expande um ``iTypeArray`` para que ele possa ser utilizado
 * como um campo de dados.
 *
 * @package     AeonDigital\Interfaces\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
interface iFieldArray extends iField, iTypeArray
{
}
