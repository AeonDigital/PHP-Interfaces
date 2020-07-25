<?php
declare (strict_types=1);

namespace AeonDigital\Interfaces\Objects\Standart;

use AeonDigital\Interfaces\Objects\iStandart as iStandart;








/**
 * Descreve um ``Standart`` básico para os tipos numéricos.
 *
 * @package     AeonDigital\Interfaces\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
interface iNumeric extends iStandart
{



    /**
     * Quando ``true`` indica que trata-se de um tipo de valor numérico ou comparável
     * em termos de grandeza.
     * Nestes casos há definição explicita para o valor mínimo e máximo que o ítem
     * pode assumir.
     *
     * @var         bool
     */
    const HAS_LIMIT_RANGE = true;
}
