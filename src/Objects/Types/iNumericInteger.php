<?php
declare (strict_types=1);

namespace AeonDigital\Interfaces\Objects\Types;

use AeonDigital\Interfaces\Objects\Types\iNumeric as iNumeric;








/**
 * Descreve uma instância para os tipos numéricos inteiros.
 *
 * @package     AeonDigital\Interfaces\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
interface iNumericInteger extends iNumeric
{



    /**
     * Indica qual valor (para esta instância) deve ser considerado equivalente a ``null``
     * para fins de comparação.
     *
     * @return      int
     */
    function nullEquivalent() : int;
    /**
     * Retorna o menor valor aceitável para esta instância.
     *
     * @return      int
     */
    function min() : int;
    /**
     * Retorna o maior valor aceitável para esta instância.
     *
     * @return      int
     */
    function max() : int;



    /**
     * Retorna o valor atualmente definido para a instância atual.
     *
     * @return      ?int
     */
    function get() : ?int;
    /**
     * Retorna o valor atualmente definido para a instância atual mas caso o
     * valor seja ``null``, retornará o valor definido em ``self::nullEquivalent``.
     *
     * @return      int
     */
    function getNotNull() : int;
}
