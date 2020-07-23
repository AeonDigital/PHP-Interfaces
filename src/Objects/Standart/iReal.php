<?php
declare (strict_types=1);

namespace AeonDigital\Interfaces\Objects\Standart;

use AeonDigital\Interfaces\Objects\Standart\iNumeric as iNumeric;








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
     * Define um novo valor para a instância.
     *
     * @param       ?string $v
     *              Valor a ser atribuido a esta instância.
     *
     * @param       bool $throws
     *              Indica se deve soltar uma exception caso o valor definido
     *              seja inválido.
     *
     * @param       ?string $err
     *              Informa o tipo de erro que impediu que o valor fosse atribuido.
     *
     * @return      bool
     *              Retornará ``true`` caso o valor tenha sido aceito e ``false``
     *              caso contrário.
     */
    //function set(?string $v, bool $throws = true, ?string &$err = null) : bool;



    /**
     * Retorna o valor atualmente definido para a instância atual.
     *
     * @return      ?string
     */
    //function get() : ?string;
    /**
     * Retorna o valor atualmente definido para a instância atual mas caso o
     * valor seja ``null``, retornará o valor definido em ``self::nullEquivalent()``.
     *
     * @return      string
     */
    //function getNotNull() : string;





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
