<?php
declare (strict_types=1);

namespace AeonDigital\Interfaces\Objects\Standart\Types;

use AeonDigital\Interfaces\Objects\Standart\Types\iNumeric as iNumeric;








/**
 * Define um ``Standart\Types`` para lidar com números naturais.
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
     * Indica qual valor (para este tipo) deve ser considerado equivalente a ``null``
     * para fins de comparação.
     *
     * @return      string
     */
    static function nullEquivalent() : string;



    /**
     * Retorna o menor valor possível para este tipo.
     *
     * @return      string
     */
    static function min() : string;



    /**
     * Retorna o maior valor possível para este tipo.
     *
     * @return      string
     */
    static function max() : string;
}
