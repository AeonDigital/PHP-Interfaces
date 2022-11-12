<?php

declare(strict_types=1);

namespace AeonDigital\Interfaces\SimpleType;

use AeonDigital\Interfaces\SimpleType\iNumeric as iNumeric;
use AeonDigital\Interfaces\SimpleType\iSimpleType as iSimpleType;






/**
 * Especificação de um tipo numérico real.
 *
 * Esta classe deve ser usada em conjunto com alguma classe que implemente
 * uma extenção matemática do PHP. Elas usam ``strings`` para representar os
 * numerais mas permitem que qualquer valor numerico seja usado independente da
 * quantidade de digitos antes ou após o separador decimal. Além disso a precisão
 * do ponto decimal se mantém ao longo das operações.
 *
 * @package     AeonDigital\Interfaces\SimpleType
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
interface iReal extends iNumeric, iSimpleType
{





    /**
     * Retorna o menor valor possível para o tipo definido. Se for definido ``null``, não
     * haverá limites para a representação numérica a ser utilizada.
     *
     * @return      ?string
     */
    public static function min(): ?string;


    /**
     * Retorna o maior valor possível para o tipo definido. Se for definido ``null``, não
     * haverá limites para a representação numérica a ser utilizada.
     *
     * @return      ?string
     */
    public static function max(): ?string;
}
