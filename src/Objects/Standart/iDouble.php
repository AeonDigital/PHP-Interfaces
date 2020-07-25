<?php
declare (strict_types=1);

namespace AeonDigital\Interfaces\Objects\Standart;

use AeonDigital\Interfaces\Objects\Standart\iNumericFloating as iNumericFloating;








/**
 * Descreve um ``Standart`` para o tipo ``double`` (flutuante de 64 bits).
 *
 * @package     AeonDigital\Interfaces\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
interface iDouble extends iNumericFloating
{



    /**
     * Nome deste tipo
     * OU
     * Namespace completa para quando tratar-se de uma classe.
     *
     * @var         string
     */
    const TYPE = "Double";
}
