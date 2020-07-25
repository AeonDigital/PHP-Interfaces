<?php
declare (strict_types=1);

namespace AeonDigital\Interfaces\Objects\Standart;

use AeonDigital\Interfaces\Objects\Standart\iGeneralDateTime as iGeneralDateTime;








/**
 * Descreve um ``Standart`` para o tipo ``DateTime``.
 *
 * @package     AeonDigital\Interfaces\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
interface iDateTime extends iGeneralDateTime
{



    /**
     * Nome deste tipo
     * OU
     * Namespace completa para quando tratar-se de uma classe.
     *
     * @var         string
     */
    const TYPE = "DateTime";
}
