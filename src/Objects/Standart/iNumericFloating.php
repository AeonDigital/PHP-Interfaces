<?php
declare (strict_types=1);

namespace AeonDigital\Interfaces\Objects\Standart;

use AeonDigital\Interfaces\Objects\Standart\iNumeric as iNumeric;








/**
 * Descreve um ``Standart`` básico para os tipos numéricos de ponto flutuante.
 *
 * @package     AeonDigital\Interfaces\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
interface iNumericFloating extends iNumeric
{



    /**
     * Quando ``true`` indica se este tipo é representado por uma classe.
     *
     * @var         bool
     */
    const IS_CLASS = false;





    /**
     * Indica qual valor (para este tipo) deve ser considerado equivalente a ``null``
     * para fins de comparação.
     *
     * @return      float
     */
    static function getNullEquivalent() : float;



    /**
     * Retorna o menor valor possível para este tipo.
     *
     * @return      float
     */
    static function getMin() : float;



    /**
     * Retorna o maior valor possível para este tipo.
     *
     * @return      float
     */
    static function getMax() : float;
}
