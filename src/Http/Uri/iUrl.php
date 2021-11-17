<?php
declare (strict_types=1);

namespace AeonDigital\Interfaces\Http\Uri;

use Psr\Http\Message\UriInterface as UriInterface;
use AeonDigital\Interfaces\Http\Uri\iAbsoluteUri as iAbsoluteUri;







/**
 * Interface que implementa a ``Psr\Http\Message\UriInterface`` em conjunto com a
 * ``AeonDigital\Interfaces\Http\Uri\iAbsoluteUri``.
 *
 * @package     AeonDigital\Interfaces\Http
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
interface iUrl extends iAbsoluteUri, UriInterface
{
}
