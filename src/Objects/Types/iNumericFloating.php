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
     * Valor padrão a ser definido para este tipo de instância caso nenhum valor válido
     * tenha sido explicitamente definido.
     *
     * @return      ?float
     */
    function getDefault() : ?float;
    /**
     * Retorna o menor valor aceitável para esta instância.
     *
     * @return      float
     */
    function getMin() : float;
    /**
     * Retorna o maior valor aceitável para esta instância.
     *
     * @return      float
     */
    function getMax() : float;



    /**
     * Retorna o valor atualmente definido para a instância atual.
     *
     * @return      ?float
     */
    function get() : ?float;
    /**
     * Retorna o valor atualmente definido para a instância atual mas caso o
     * valor seja ``null``, retornará o valor definido em ``self::nullEquivalent``.
     *
     * @return      float
     */
    function getNotNull() : float;
}
