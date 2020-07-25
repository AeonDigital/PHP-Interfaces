<?php
declare (strict_types=1);

namespace AeonDigital\Interfaces\Objects\Types;

use AeonDigital\Interfaces\Objects\iType as iType;








/**
 * Descreve uma instância para o tipo ``DateTime``.
 *
 * @package     AeonDigital\Interfaces\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
interface iGeneralDateTime extends iType
{



    /**
     * Indica qual valor (para esta instância) deve ser considerado equivalente a ``null``
     * para fins de comparação.
     *
     * @return      \DateTime
     */
    function nullEquivalent() : \DateTime;
    /**
     * Retorna o menor valor aceitável para esta instância.
     *
     * @return      \DateTime
     */
    function min() : \DateTime;
    /**
     * Retorna o maior valor aceitável para esta instância.
     *
     * @return      \DateTime
     */
    function max() : \DateTime;



    /**
     * Retorna o valor atualmente definido para a instância atual.
     *
     * @return      ?\DateTime
     */
    function get() : ?\DateTime;
    /**
     * Retorna o valor atualmente definido para a instância atual mas caso o
     * valor seja ``null``, retornará o valor definido em ``self::nullEquivalent``.
     *
     * @return      \DateTime
     */
    function getNotNull() : \DateTime;
}
