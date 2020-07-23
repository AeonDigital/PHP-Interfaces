<?php
declare (strict_types=1);

namespace AeonDigital\Interfaces\Objects\Standart;

use AeonDigital\Interfaces\Objects\Standart\iNumeric as iNumeric;
use AeonDigital\Objects\Realtype as Realtype;







/**
 * Define um ``Standart`` para lidar com números naturais.
 *
 * @package     AeonDigital\Interfaces\Objects\Standart
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
interface iReal extends iNumeric
{
    /*
     * Esta interface deve ser usada em conjunto com alguma classe que implemente
     * uma extenção matemática do PHP. Elas usam ``strings`` para representar os
     * numerais mas permitem que qualquer valor numerico seja usado independente da
     * quantidade de digitos antes ou após o separador decimal. Além disso a precisão
     * do ponto decimal se mantém ao longo das operações.
    */



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
