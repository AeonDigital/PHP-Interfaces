<?php
declare (strict_types=1);

namespace AeonDigital\Interfaces\Objects\Standart;

use AeonDigital\Interfaces\Objects\Standart\iNumeric as iNumeric;
use AeonDigital\Objects\Realtype as Realtype;







/**
 * Descreve um ``Standart`` básico para os tipos numéricos reais.
 *
 * @package     AeonDigital\Interfaces\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
interface iNumericReal extends iNumeric
{



    /**
     * Quando ``true`` indica se este tipo é representado por uma classe.
     *
     * @var         bool
     */
    const IS_CLASS = true;





    /**
     * Indica qual valor (para este tipo) deve ser considerado equivalente a ``null``
     * para fins de comparação.
     *
     * @return      Realtype
     */
    static function nullEquivalent() : Realtype;



    /**
     * Retorna o menor valor possível para este tipo.
     *
     * @return      Realtype
     */
    static function min() : Realtype;



    /**
     * Retorna o maior valor possível para este tipo.
     *
     * @return      Realtype
     */
    static function max() : Realtype;
}
