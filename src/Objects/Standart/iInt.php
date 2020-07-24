<?php
declare (strict_types=1);

namespace AeonDigital\Interfaces\Objects\Standart;

use AeonDigital\Interfaces\Objects\iNumericInteger as iNumericInteger;








/**
 * Define um ``Standart`` para o tipo ``int`` (inteiro de 32 bits).
 *
 * @package     AeonDigital\Interfaces\Objects\Standart
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
interface iInt extends iNumericInteger
{



    /**
     * Nome deste tipo
     * OU
     * Namespace completa para quando tratar-se de uma classe.
     *
     * @var         string
     */
    const TYPE = "Int";
}
