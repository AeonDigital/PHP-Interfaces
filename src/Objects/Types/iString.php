<?php
declare (strict_types=1);

namespace AeonDigital\Interfaces\Objects\Types;

use AeonDigital\Interfaces\Objects\iType as iType;








/**
 * Descreve uma instância para o tipo ``string``
 *
 * @package     AeonDigital\Interfaces\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
interface iString extends iType
{



    /**
     * Indica qual valor (para esta instância) deve ser considerado equivalente a ``null``
     * para fins de comparação.
     *
     * @return      string
     */
    function nullEquivalent() : string;



    /**
     * Retorna o valor atualmente definido para a instância atual.
     *
     * @return      ?string
     */
    function get() : ?string;
    /**
     * Retorna o valor atualmente definido para a instância atual mas caso o
     * valor seja ``null``, retornará o valor definido em ``self::nullEquivalent``.
     *
     * @return      string
     */
    function getNotNull() : string;
}
