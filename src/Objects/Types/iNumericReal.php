<?php
declare (strict_types=1);

namespace AeonDigital\Interfaces\Objects\Types;

use AeonDigital\Interfaces\Objects\Types\iNumeric as iNumeric;
use AeonDigital\Objects\Realtype as Realtype;







/**
 * Descreve uma instância para os tipos numéricos reais.
 *
 * @package     AeonDigital\Interfaces\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
interface iNumericReal extends iNumeric
{



    /**
     * Indica qual valor (para esta instância) deve ser considerado equivalente a ``null``
     * para fins de comparação.
     *
     * @return      Realtype
     */
    function nullEquivalent() : Realtype;
    /**
     * Retorna o menor valor aceitável para esta instância.
     *
     * @return      Realtype
     */
    function min() : Realtype;
    /**
     * Retorna o maior valor aceitável para esta instância.
     *
     * @return      Realtype
     */
    function max() : Realtype;



    /**
     * Retorna o valor atualmente definido para a instância atual.
     *
     * @return      ?Realtype
     */
    function get() : ?Realtype;
    /**
     * Retorna o valor atualmente definido para a instância atual mas caso o
     * valor seja ``null``, retornará o valor definido em ``self::nullEquivalent``.
     *
     * @return      Realtype
     */
    function getNotNull() : Realtype;
}
