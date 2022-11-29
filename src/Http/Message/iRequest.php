<?php

declare(strict_types=1);

namespace AeonDigital\Interfaces\Http\Message;

use Psr\Http\Message\RequestInterface as RequestInterface;
use Psr\Http\Message\ServerRequestInterface as ServerRequestInterface;
use AeonDigital\Interfaces\Http\Message\iMessage as iMessage;
use AeonDigital\Interfaces\Http\Uri\iUri as iUri;




/**
 * Representação de uma requisição HTTP de saída do lado do cliente.
 *
 * Equivalente à ``Psr\Http\Message\RequestInterface``, porém, com algumas alterações
 * para permitir o uso de tipagem equivalente à versão 8.2 do PHP além de melhorias percebidas
 * como necessárias para este tipo de objeto.
 *
 * Todos os métodos existentes na interface original estão presentes aqui mas com uma assinatura
 * levemente diferente. Para permitir manter a compatibilidade com o projeto PSR foram
 * adicionados 2 métodos extra sendo eles ``toPSR`` e ``fromPSR``.
 *
 * Obs:
 * Os textos originais dos métodos da interface base foram mantidos alterando apenas alguns
 * itens contextuais que ficarão evidentes ao efetuar a leitura e/ou comparação entre os casos.
 *
 *
 * @package     AeonDigital\Interfaces\Http
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
interface iRequest extends iMessage
{



    /**
     * Retrieves the message's request target.
     *
     * Retrieves the message's request-target either as it will appear (for
     * clients), as it appeared at request (for servers), or as it was
     * specified for the instance (see withRequestTarget()).
     *
     * In most cases, this will be the origin-form of the composed URI,
     * unless a value was provided to the concrete implementation (see
     * withRequestTarget() below).
     *
     * If no URI is available, and no request-target has been specifically
     * provided, this method MUST return the string "/".
     *
     * @return string
     */
    public function getRequestTarget(): string;

    /**
     * Return an instance with the specific request-target.
     *
     * If the request needs a non-origin-form request-target — e.g., for
     * specifying an absolute-form, authority-form, or asterisk-form —
     * this method may be used to create an instance with the specified
     * request-target, verbatim.
     *
     * This method MUST be implemented in such a way as to retain the
     * immutability of the message, and MUST return an instance that has the
     * changed request target.
     *
     * @link http://tools.ietf.org/html/rfc7230#section-5.3 (for the various
     *     request-target forms allowed in request messages)
     * @param string $requestTarget
     * @return static
     */
    public function withRequestTarget(string $requestTarget): static;

    /**
     * Retrieves the HTTP method of the request.
     *
     * @return string Returns the request method.
     */
    public function getMethod(): string;

    /**
     * Return an instance with the provided HTTP method.
     *
     * While HTTP method names are typically all uppercase characters, HTTP
     * method names are case-sensitive and thus implementations SHOULD NOT
     * modify the given string.
     *
     * This method MUST be implemented in such a way as to retain the
     * immutability of the message, and MUST return an instance that has the
     * changed request method.
     *
     * @param string $method Case-sensitive method.
     * @return static
     * @throws \InvalidArgumentException for invalid HTTP methods.
     */
    public function withMethod(string $method): static;

    /**
     * Retrieves the URI instance.
     *
     * This method MUST return a ``iUri`` instance.
     *
     * @link http://tools.ietf.org/html/rfc3986#section-4.3
     * @return iUri Returns a ``iUri`` instance
     *     representing the URI of the request.
     */
    public function getUri(): iUri;

    /**
     * Returns an instance with the provided URI.
     *
     * This method MUST update the Host header of the returned request by
     * default if the URI contains a host component. If the URI does not
     * contain a host component, any pre-existing Host header MUST be carried
     * over to the returned request.
     *
     * You can opt-in to preserving the original state of the Host header by
     * setting `$preserveHost` to `true`. When `$preserveHost` is set to
     * `true`, this method interacts with the Host header in the following ways:
     *
     * - If the Host header is missing or empty, and the new URI contains
     *   a host component, this method MUST update the Host header in the returned
     *   request.
     * - If the Host header is missing or empty, and the new URI does not contain a
     *   host component, this method MUST NOT update the Host header in the returned
     *   request.
     * - If a Host header is present and non-empty, this method MUST NOT update
     *   the Host header in the returned request.
     *
     * This method MUST be implemented in such a way as to retain the
     * immutability of the message, and MUST return an instance that has the
     * new ``iUri`` instance.
     *
     * @link http://tools.ietf.org/html/rfc3986#section-4.3
     * @param iUri $uri New request URI to use.
     * @param bool $preserveHost Preserve the original state of the Host header.
     * @return static
     */
    public function withUri(iUri $uri, bool $preserveHost = false): static;





    /**
     * Retorna uma instância deste mesmo objeto, porém, compatível com a interface
     * em que foi baseada ``Psr\Http\Message\RequestInterface``.
     */
    public function toPSR(): RequestInterface|ServerRequestInterface;
    /**
     * A partir de um objeto ``Psr\Http\Message\RequestInterface``, retorna um novo que implementa
     * a interface ``AeonDigital\Interfaces\Http\Message\iRequest``.
     *
     * @param RequestInterface|ServerRequestInterface $obj
     * Instância original.
     *
     * @return static
     * Nova instância, sob nova interface.
     *
     * @throws \InvalidArgumentException
     * Se por qualquer motivo não for possível retornar uma nova instância a partir da
     * que foi passada
     */
    public static function fromPSR(RequestInterface|ServerRequestInterface $obj): static;
}
