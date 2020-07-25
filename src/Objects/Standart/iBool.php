<?php
declare (strict_types=1);

namespace AeonDigital\Interfaces\Objects\Standart;

use AeonDigital\Interfaces\Objects\iStandart as iStandart;








/**
 * Descreve um ``Standart`` para o tipo ``bool``.
 *
 * @package     AeonDigital\Interfaces\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
interface iBool extends iStandart
{



    /**
     * Nome deste tipo
     * OU
     * Namespace completa para quando tratar-se de uma classe.
     *
     * @var         string
     */
    const TYPE = "Bool";
    /**
     * Quando ``true`` indica se este tipo é representado por uma classe.
     *
     * @var         bool
     */
    const IS_CLASS = false;
    /**
     * Quando ``true`` indica que trata-se de um tipo de valor numérico ou comparável
     * em termos de grandeza.
     * Nestes casos há definição explicita para o valor mínimo e máximo que o ítem
     * pode assumir.
     *
     * @var         bool
     */
    const HAS_LIMIT_RANGE = false;





    /**
     * Indica qual valor (para este tipo) deve ser considerado equivalente a ``null``
     * para fins de comparação.
     *
     * @return      bool
     */
    static function nullEquivalent() : bool;
}