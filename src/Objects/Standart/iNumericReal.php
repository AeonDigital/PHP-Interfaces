<?php
declare (strict_types=1);

namespace AeonDigital\Interfaces\Objects\Standart;

use AeonDigital\Interfaces\Objects\Standart\iNumeric as iNumeric;
use AeonDigital\Objects\Realtype as Realtype;







/**
 * Define um ``Standart`` para tipos numéricos reais.
 *
 * @package     AeonDigital\Interfaces\Objects\Standart
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
     * Retorna o valor atualmente definido para a instância atual.
     *
     * @return      ?Realtype
     */
    function get() : ?Realtype;
    /**
     * Retorna o valor atualmente definido para a instância atual mas caso o
     * valor seja ``null``, retornará o valor definido em ``self::nullEquivalent()``.
     *
     * @return      Realtype
     */
    function getNotNull() : Realtype;





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
