<?php
declare (strict_types = 1);

namespace AeonDigital\Interfaces\DataFormat;

use AeonDigital\Interfaces\DataFormat\iStringFormat as iStringFormat;








/**
 * Especializa a interface ``iStringFormat`` preparando-a para representar formatos numéricos.
 *
 * @package     AeonDigital\Interfaces\DataFormat
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
interface iNumberFormat extends iStringFormat
{





    /**
     * String usado como separador decimal.
     *
     * @var         string
     */
    const Decimal = ".";



    /**
     * String usado como separador de milhar.
     *
     * @var         string
     */
    const Thousand = ",";
}
