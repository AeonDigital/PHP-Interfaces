<?php
declare (strict_types=1);

namespace AeonDigital\Interfaces\Objects\Standart;

use AeonDigital\Interfaces\Objects\iStandartType as iStandartType;








/**
 * Define um ``Standart`` para o tipo ``bool``
 *
 * @package     AeonDigital\Interfaces\Objects\Standart
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
interface iBool extends iStandartType
{



    /**
     * Nome deste tipo
     * OU
     * Namespace completa para quando tratar-se de uma classe.
     *
     * @var         string
     */
    const TYPE = "Bool";
    /**
     * Quando ``true`` indica se este tipo é representado por uma classe.
     *
     * @var         bool
     */
    const IS_CLASS = false;
    /**
     * Quando ``true`` indica que trata-se de um tipo de valor numérico ou comparável
     * em termos de grandeza.
     * Nestes casos há definição explicita para o valor mínimo e máximo que o ítem
     * pode assumir.
     *
     * @var         bool
     */
    const HAS_LIMIT_RANGE = false;





    /**
     * Retorna o valor atualmente definido para a instância atual.
     *
     * @return      ?bool
     */
    function get() : ?bool;
    /**
     * Retorna o valor atualmente definido para a instância atual mas caso o
     * valor seja ``null``, retornará o valor definido em ``self::nullEquivalent()``.
     *
     * @return      bool
     */
    function getNotNull() : bool;





    /**
     * Indica qual valor (para este tipo) deve ser considerado equivalente a ``null``
     * para fins de comparação.
     *
     * @return      bool
     */
    static function nullEquivalent() : bool;
}
