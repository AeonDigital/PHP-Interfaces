<?php
declare (strict_types=1);

namespace AeonDigital\Interfaces\Objects\Standart;

use AeonDigital\Interfaces\Objects\iStandartType as iStandartType;








/**
 * Define um ``Standart do tipo \DateTime``.
 *
 * @package     AeonDigital\Interfaces\Objects\Standart
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
interface iDateTime extends iStandartType
{



    /**
     * Define um novo valor para a instância.
     *
     * @param       ?\DateTime $v
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
    function set(?\DateTime $v, bool $throws = true, ?string &$err = null) : bool;



    /**
     * Retorna o valor atualmente definido para a instância atual.
     *
     * @return      ?\DateTime
     */
    function get() : ?\DateTime;
    /**
     * Retorna o valor atualmente definido para a instância atual mas caso o
     * valor seja ``null``, retornará o valor definido em ``self::nullEquivalent()``.
     *
     * @return      \DateTime
     */
    function getNotNull() : \DateTime;





    /**
     * Indica qual valor (para este tipo) deve ser considerado equivalente a ``null``
     * para fins de comparação.
     *
     * @return      \DateTime
     */
    static function nullEquivalent() : \DateTime;



    /**
     * Retorna o menor valor possível para este tipo.
     *
     * @return      \DateTime
     */
    static function min() : \DateTime;



    /**
     * Retorna o maior valor possível para este tipo.
     *
     * @return      \DateTime
     */
    static function max() : \DateTime;
}
