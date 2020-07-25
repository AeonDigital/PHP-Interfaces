<?php
declare (strict_types=1);

namespace AeonDigital\Interfaces\Objects\Types;

use AeonDigital\Interfaces\Objects\iType as iType;
use AeonDigital\Interfaces\Objects\iStandart as iStandart;







/**
 * Descreve uma instância para o tipo ``bool``.
 *
 * @package     AeonDigital\Interfaces\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
interface iBool extends iType
{



    /**
     * Retorna o valor atualmente definido para a instância atual.
     *
     * @return      ?bool
     */
    function get() : ?bool;
    /**
     * Retorna o valor atualmente definido para a instância atual mas caso o
     * valor seja ``null``, retornará o valor definido em ``static::nullEquivalent()``.
     *
     * @return      bool
     */
    function getNotNull() : bool;





    /**
     * Indica qual valor (para esta instância) deve ser considerado equivalente a ``null``
     * para fins de comparação.
     *
     * @return      bool
     */
    function nullEquivalent() : bool;
}
