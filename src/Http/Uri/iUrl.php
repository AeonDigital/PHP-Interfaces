<?php

declare(strict_types=1);

namespace AeonDigital\Interfaces\Http\Uri;

use Psr\Http\Message\UriInterface as UriInterface;
use AeonDigital\Interfaces\Http\Uri\iAbsoluteUri as iAbsoluteUri;






/**
 * Interface iUrl.
 *
 * Equivalente à ``Psr\Http\Message\UriInterface``, porém, com algumas alterações
 * para permitir o uso de tipagem equivalente à versão 8.2 do PHP além de melhorias percebidas
 * como necessárias.
 *
 * Para permitir aderencia à interface PSR foi criado o método "toPSR" que deve retornar um
 * objeto que não quebre a interface na qual esta foi baseada.
 *
 *
 * @package     AeonDigital\Interfaces\Http
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
interface iUrl extends iAbsoluteUri
{



    /**
     * Retorna uma instância deste mesmo objeto, porém, compatível com a interface
     * original ``Psr\Http\Message\UriInterface``.
     */
    function toPSR(): UriInterface;
}
