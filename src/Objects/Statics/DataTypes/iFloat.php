<?php
declare (strict_types=1);

namespace AeonDigital\Interfaces\Objects\Statics\DataTypes;

use AeonDigital\Interfaces\Objects\Statics\DataTypes\iNumeric as iNumeric;








/**
 * Define um ``static data type float``.
 *
 * Por padrão os valores máximos e mínimos do para numerais no PHP variam
 * conforme a versão que está sendo usada (32/64 bits).
 * Portanto é altamente recomendável que, sempre que possível, seja
 * usada a versão x64.
 *
 * @package     AeonDigital\Interfaces\Objects\Statics\DataTypes
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
interface iFloat extends iNumeric
{



    /**
     * Indica qual valor (para este tipo) deve ser considerado equivalente a ``null``
     * para fins de comparação.
     *
     * @return      float
     */
    static function nullEquivalent() : float;



    /**
     * Retorna o menor valor possível para este tipo.
     *
     * @return      float
     */
    static function min() : float;


    /**
     * Retorna o menor valor possível para este tipo.
     *
     * @return      float
     */
    static function max() : float;
}