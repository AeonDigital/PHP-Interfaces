<?php

declare(strict_types=1);

namespace AeonDigital\Interfaces\DataFormat;

use AeonDigital\Interfaces\DataFormat\iStringFormat as iStringFormat;







/**
 * Especializa a interface ``iStringFormat`` preparando-a para representar formatos de data e hora.
 *
 * @package     AeonDigital\Interfaces\DataFormat
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
interface iDateTimeFormat extends iStringFormat
{





    /**
     * Máscara da data.
     *
     * Especifica a máscara da data e hora a ser representada pela classe concreta que
     * implementa esta interface.
     *
     * Monte a máscara usando :
     * - ``yyyy``   : Ano, 4 dígitos
     * - ``MM``     : Mês, 2 dígitos
     * - ``dd``     : Dia, 2 dígitos
     * - ``HH``     : Hora, 2 digitos;      00 - 23
     * - ``mm``     : Minuto, 2 dígitos;    00 - 59
     * - ``ss``     : Segundo, 2 dígitos;   00 - 59
     * - ``Wxx``    : Número da semana naquele ano. [ usado em formato week ]
     * - ``d``      : Número do dia da semana. [ usado em formato week ]
     *
     * As máscaras de data são **case-sensitive**.
     *
     * @var         ?string
     */
    const DateMask = null;
}
