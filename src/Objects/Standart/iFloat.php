<?php
declare (strict_types=1);

namespace AeonDigital\Interfaces\Objects\Standart;

use AeonDigital\Interfaces\Objects\Standart\iNumeric as iNumeric;








/**
 * Define um ``Standart do tipo float``.
 *
 * @package     AeonDigital\Interfaces\Objects\Standart
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
interface iFloat extends iNumeric
{
    /*
     * Por padrão os valores máximos e mínimos do para numerais no PHP variam
     * conforme a versão que está sendo usada (32/64 bits).
     * Portanto é altamente recomendável que, sempre que possível, seja
     * usada a versão x64.
    */



    /**
     * Define um novo valor para a instância.
     *
     * @param       ?float $v
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
    function set(?float $v, bool $throws = true, ?string &$err = null) : bool;



    /**
     * Retorna o valor atualmente definido para a instância atual.
     *
     * @return      ?float
     */
    function get() : ?float;
    /**
     * Retorna o valor atualmente definido para a instância atual mas caso o
     * valor seja ``null``, retornará o valor definido em ``self::nullEquivalent()``.
     *
     * @return      float
     */
    function getNotNull() : float;





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
     * Retorna o maior valor possível para este tipo.
     *
     * @return      float
     */
    static function max() : float;
}
