<?php
declare (strict_types=1);

namespace AeonDigital\Interfaces\Objects\Standart;

use AeonDigital\Interfaces\Objects\iStandartType as iStandartType;








/**
 * Define um ``Standart`` para tipos de ``DateTime``.
 *
 * @package     AeonDigital\Interfaces\Objects\Standart
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
interface iGeneralDateTime extends iStandartType
{



    /**
     * Quando ``true`` indica se este tipo é representado por uma classe.
     *
     * @var         bool
     */
    const IS_CLASS = true;
    /**
     * Quando ``true`` indica que trata-se de um tipo de valor numérico ou comparável
     * em termos de grandeza.
     * Nestes casos há definição explicita para o valor mínimo e máximo que o ítem
     * pode assumir.
     *
     * @var         bool
     */
    const HAS_LIMIT_RANGE = true;





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
