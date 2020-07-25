<?php
declare (strict_types=1);

namespace AeonDigital\Interfaces\Objects\Standart;

use AeonDigital\Interfaces\Objects\Standart\iNumeric as iNumeric;








/**
 * Descreve um ``Standart`` básico para os tipos numéricos inteiros.
 *
 * @package     AeonDigital\Interfaces\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
interface iNumericInteger extends iNumeric
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
     * @return      int
     */
    static function nullEquivalent() : int;



    /**
     * Retorna o menor valor possível para este tipo.
     *
     * @return      int
     */
    static function min() : int;



    /**
     * Retorna o maior valor possível para este tipo.
     *
     * @return      int
     */
    static function max() : int;
}
