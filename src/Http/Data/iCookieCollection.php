<?php

declare(strict_types=1);

namespace AeonDigital\Interfaces\Http\Data;

use AeonDigital\Interfaces\Collection\iCollection as iCollection;







/**
 * Interface ``iCookieCollection``.
 *
 * Extende a interface ``iCollection`` para que ela se especialize em Cookies ``Http``.
 *
 * @package     AeonDigital\Interfaces\Http
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
interface iCookieCollection extends iCollection
{




    /**
     * Retorna uma representação dos dados da coleção em formato de string.
     *
     * @param ?bool $originalKeys
     * Quando ``true`` irá usar as chaves conforme foram definidas na função ``set``.
     * Se no armazenamento interno elas sofrerem qualquer alteração e for definido
     * ``false`` então elas retornarão seu formato alterado.
     *
     * @return string
     */
    function toString(?bool $originalKeys = false): string;
}
