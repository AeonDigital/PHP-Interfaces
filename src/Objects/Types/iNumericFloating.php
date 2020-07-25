<?php
declare (strict_types=1);

namespace AeonDigital\Interfaces\Objects\Types;

use AeonDigital\Interfaces\Objects\Types\iNumeric as iNumeric;








/**
 * Descreve uma instância para os tipos numéricos de ponto flutuante.
 *
 * @package     AeonDigital\Interfaces\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
interface iNumericFloating extends iNumeric
{



    /**
     * Retorna o valor atualmente definido para a instância atual.
     *
     * @return      ?float
     */
    function get() : ?float;
    /**
     * Retorna o valor atualmente definido para a instância atual mas caso o
     * valor seja ``null``, retornará o valor definido em ``static::nullEquivalent()``.
     *
     * @return      float
     */
    function getNotNull() : float;





    /**
     * Indica qual valor (para esta instância) deve ser considerado equivalente a ``null``
     * para fins de comparação.
     *
     * @return      float
     */
    function nullEquivalent() : float;
    /**
     * Retorna o menor valor aceitável para esta instância.
     *
     * @return      float
     */
    function min() : float;
    /**
     * Retorna o maior valor aceitável para esta instância.
     *
     * @return      float
     */
    function max() : float;
}
