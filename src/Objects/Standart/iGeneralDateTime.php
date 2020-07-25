<?php
declare (strict_types=1);

namespace AeonDigital\Interfaces\Objects\Standart;

use AeonDigital\Interfaces\Objects\iStandart as iStandart;








/**
 * Descreve um ``Standart`` básico para os tipos ``DateTime``.
 *
 * @package     AeonDigital\Interfaces\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
interface iGeneralDateTime extends iStandart
{



    /**
     * Quando ``true`` indica se este tipo é representado por uma classe.
     *
     * @var         bool
     */
    const IS_CLASS = true;
    /**
     * Quando ``true`` indica que trata-se de um tipo de valor numérico ou comparável
     * em termos de grandeza.
     * Nestes casos há definição explicita para o valor mínimo e máximo que o ítem
     * pode assumir.
     *
     * @var         bool
     */
    const HAS_LIMIT_RANGE = true;





    /**
     * Indica qual valor (para este tipo) deve ser considerado equivalente a ``null``
     * para fins de comparação.
     *
     * @return      \DateTime
     */
    static function nullEquivalent() : \DateTime;



    /**
     * Retorna o menor valor possível para este tipo.
     *
     * @return      \DateTime
     */
    static function min() : \DateTime;



    /**
     * Retorna o maior valor possível para este tipo.
     *
     * @return      \DateTime
     */
    static function max() : \DateTime;
}
