<?php
declare (strict_types=1);

namespace AeonDigital\Interfaces\Objects\Types;

use AeonDigital\Interfaces\Objects\iType as iType;








/**
 * Tipo ``Bool``.
 *
 * @package     AeonDigital\Interfaces\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
interface iBool extends iType
{



    /**
     * Valor padrão a ser definido para este tipo de instância caso nenhum valor válido
     * tenha sido explicitamente definido.
     *
     * @return      ?bool
     */
    function getDefault() : ?bool;
     /**
     * Retorna o valor atualmente definido para a instância atual.
     *
     * Usado apenas em casos onde ``self::isIterable() = false``.
     *
     * @return      ?bool
     */
    function get() : ?bool;
    /**
     * Retorna o valor atualmente definido para a instância atual mas caso o
     * valor seja ``null``, retornará o valor definido em ``self::nullEquivalent``.
     *
     * @return      bool
     */
    function getNotNull() : bool;
}
