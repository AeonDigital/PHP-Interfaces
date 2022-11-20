<?php

declare(strict_types=1);

namespace AeonDigital\Interfaces\Http\Data;

use AeonDigital\Interfaces\Collection\iCollection as iCollection;







/**
 * Interface ``iQueryStringCollection``.
 *
 * Extende a interface ``iCollection`` para que ela se especialize em QueryStrings passadas
 * via ``URI``.
 *
 * @package     AeonDigital\Interfaces\Http
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
interface iQueryStringCollection extends iCollection
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



    /**
     * Permite determinar quando os valores retornados pela coleção devem ou não estar usando
     * ``percent-encode``.
     *
     * Internamente os valores devem **SEMPRE** serem armazenados utilizando tal encode, mas ao
     * retornar os dados eles devem ser alterados caso seja definido ``false``.
     *
     * @param bool $use
     * Indica se a coleção deve retornar os valores utilizando ``percent-encode`` ou não.
     *
     * @return void
     */
    function usePercentEncode(bool $use): void;
}
