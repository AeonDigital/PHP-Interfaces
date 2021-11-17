<?php
declare (strict_types=1);

namespace AeonDigital\Interfaces\DataFormat;

use AeonDigital\Interfaces\DataFormat\iFormat as iFormat;








/**
 * Especializa a interface ``iFormat`` preparando-a para representar formatos específicos
 * de ``strings``.
 *
 * @package     AeonDigital\Interfaces\DataFormat
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
interface iStringFormat extends iFormat
{





    /**
     * Expressão regular para validação.
     *
     * Define uma expressão regular que permite a validação do formato de entrada. Deve
     * ser usado SEMPRE para tipos de dados ``string``.
     *
     * @var         ?string
     */
    const RegExp = null;



    /**
     * Quantidade **mínima** de caracteres necessários para expressar o formato.
     *
     * @var         int
     */
    const MinLength = 0;



    /**
     * Quantidade **máxima** de caracteres necessários para expressar o formato.
     *
     * @var         int
     */
    const MaxLength = 0;
}
