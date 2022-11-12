<?php

declare(strict_types=1);

namespace AeonDigital\Interfaces\Http\Uri;

use AeonDigital\Interfaces\Http\Uri\iBasicUri as iBasicUri;






/**
 * Esta interface indica como implementar uma classe ``URI`` que possui uma parte hierarquica
 * (tipo mais comum de ``URI``).
 * Esta parte da ``URI`` é formada pela parte conhecida como ``authority`` em conjunto com a
 * parte conhecida como ``path``.
 *
 * @see         https://tools.ietf.org/html/rfc3986#section-3
 *
 * @package     AeonDigital\Interfaces\Http
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
interface iHierPartUri extends iBasicUri
{





    /**
     * 3.2.  Authority
     * Origem : https://tools.ietf.org/html/rfc3986#section-3.2
     * Data: 2017-10-23
     *
     *    Este componente é precedido por barras duplas ("//") após o "scheme"
     *    e termina ao chegar na próxima barra ("/"), interrogação ("?"),
     *    hash ("#") ou ao finalizar a URI.
     *
     *    A sintaxe padrão deste componente é:
     *    <pre>
     *    [username[:password]@]host[:port]
     *    </pre>
     *
     *
     * 3.3  Path
     * Origem : https://tools.ietf.org/html/rfc3986#section-3.2
     * Data: 2017-10-23
     *
     *    O componente path contem dados, geralmente organizados em forma
     *    hierarquica que servem para identificar um recurso no escopo da URI.
     *
     *    Cada segmento do path é dividida por pelo caracter barra ("/") e
     *    pode ser formado seguindo o seguinte esquema:
     *
     *    segment       = * ( ALPHA / DIGIT / "-" / "." / "_" / "~" /
     *                        "%" HEXDIG HEXDIG / "!" / "$" / "&" / "'" /
     *                        "(" / ")" / "*" / "+" / "," / ";" / "=" /
     *                        ":" / "@" )
     *
     */










    /**
     * Retorna o componente ``user`` da ``URI`` ou ``''`` caso ele não esteja especificado.
     * O valor será retornado usando ``percent-encoding``.
     *
     * @return      string
     */
    function getUser(): string;



    /**
     * Este método ``DEVE`` manter o estado da instância atual e retornar uma nova instância
     * contendo o ``user`` especificado.
     *
     * @param       ?string $user
     *              O novo valor para ``user`` para a nova instância.
     *
     * @return      static
     *
     * @throws      \InvalidArgumentException
     *              Caso seja definido um valor inválido para ``user``.
     */
    function withUser($user);





    /**
     * Retorna o componente ``password`` da ``URI``.
     * Uma ``password`` pode ser uma string vazia, portanto o valor ``null`` indica quando ela
     * não está setada.
     * O valor será retornado usando ``percent-encoding``.
     *
     * @return      ?string
     */
    function getPassword(): ?string;



    /**
     * Este método ``DEVE`` manter o estado da instância atual e retornar uma nova instância
     * contendo o ``password`` especificado.
     *
     * @param       ?string $password
     *              O novo valor para ``password`` para a nova instância.
     *              Se ``null`` for passado, o valor da ``password`` será removido.
     *
     * @return      static
     *
     * @throws      \InvalidArgumentException
     *              Caso seja definido um valor inválido para ``password``.
     */
    function withPassword($password = null);





    /**
     * Retorna o componente ``host`` da ``URI`` ou ``''`` caso ele não esteja especificado.
     *
     * @return      string
     */
    function getHost(): string;



    /**
     * Este método ``DEVE`` manter o estado da instância atual e retornar uma nova instância
     * contendo o ``host`` especificado.
     *
     * @param       string $host
     *              O novo valor para ``host`` para a nova instância.
     *
     * @return      static
     *
     * @throws      \InvalidArgumentException
     *              Caso seja definido um valor inválido para ``host``.
     */
    function withHost($host);





    /**
     * Retorna o componente ``port`` da ``URI`` ou ``null`` caso a porta definida seja a padrão
     * para o ``scheme`` que está sendo usado.
     *
     * @return      ?int
     */
    function getPort(): ?int;



    /**
     * Retorna a porta padrão para o ``scheme`` definido para este ``URI``.
     * Se o ``scheme`` não possui uma porta padrão deverá ser retornado ``null``.
     *
     * @return      ?int
     */
    function getDefaultPort(): ?int;



    /**
     * Este método ``DEVE`` manter o estado da instância atual e retornar uma nova instância
     * contendo o ``port`` especificado.
     *
     * @param       ?int $port
     *              O novo valor para ``port`` para a nova instância.
     *
     * @return      static
     *
     * @throws      \InvalidArgumentException
     *              Caso seja definido um valor inválido para ``port``.
     */
    function withPort($port);













    /**
     * Componente ``user information`` da ``URI``.
     * Se este componente não estiver presente na ``URI`` será retornado ``''``.
     * Os componentes que são armazenados usando ``percent-encoding`` serão retornados já usando
     * este formato.
     *
     * A sintaxe padrão deste componente é:
     *
     * ```
     *  [username[:password]]
     * ```
     *
     * @return      string
     */
    function getUserInfo(): string;



    /**
     * Este método ``DEVE`` manter o estado da instância atual e retornar uma nova instância
     * contendo o ``user information`` especificado.
     *
     * @param       string $user
     *              O novo valor para ``user`` na nova instância.
     *
     * @param       string $password
     *              O novo valor para ``password`` na nova instância.
     *
     * @return      static
     *
     * @throws      \InvalidArgumentException
     *              Caso seja definido um valor inválido para algum argumento.
     */
    function withUserInfo($user, $password = null);










    /**
     * Componente ``authority`` da ``URI``.
     * Os componentes que são armazenados usando ``percent-encoding`` serão retornados já usando
     * este formato.
     *
     * A sintaxe padrão deste componente é:
     *
     * ```
     *  [[user-info@]host[:port]]
     * ```
     *
     * O componente ``port`` deve ser omitido quando esta não estiver definida, ou, se for uma
     * das portas padrão para o ``scheme`` atualmente em uso.
     *
     * @see         https://tools.ietf.org/html/rfc3986#section-3.2
     *
     * @return      string
     */
    function getAuthority(): string;



    /**
     * Este método ``DEVE`` manter o estado da instância atual e retornar uma nova instância
     * contendo a parte "autority" especificado.
     *
     * @param       string $user
     *              O novo valor para ``user`` na nova instância.
     *
     * @param       ?string $password
     *              O novo valor para ``password`` para a nova instância.
     *              Se ``null`` for passado, o valor da ``password`` será removido.
     *
     * @param       string $host
     *              O novo valor para ``host`` na nova instância.
     *
     * @param       ?int $port
     *              O novo valor para ``port`` na nova instância.
     *              Use ``null`` para ignorar usar o valor padrão para o ``scheme``.
     *
     * @return      static
     *
     * @throws      \InvalidArgumentException
     *              Caso seja definido um valor inválido para algum argumento.
     */
    function withAuthority($user = "", $password = null, $host = "", $port = null);













    /**
     * Retorna o componente ``path`` da ``URI`` ou ``''`` caso ele não esteja especificado.
     * O valor será retornado usando ``percent-encoding``.
     *
     * @return      string
     */
    function getPath(): string;



    /**
     * Este método ``DEVE`` manter o estado da instância atual e retornar uma nova instância
     * contendo o ``path`` especificado.
     *
     * @param       string $path
     *              O novo valor para ``path`` para a nova instância.
     *
     * @return      static
     *
     * @throws      \InvalidArgumentException
     *              Caso seja definido um valor inválido para ``path``.
     */
    function withPath($path);













    /**
     * Retorna uma string que representa a parte básica da ``URI`` representada pela instância.
     *
     * O resultado será uma string com o seguinte formato:
     *
     * ```
     *  [ scheme ":" ][ "//" authority ]
     * ```
     *
     * @return      string
     */
    function getBase(): string;



    /**
     * Retorna uma string que representa toda a parte hierarquica da ``URI`` representada pela
     * instância.
     *
     * O resultado será uma string com o seguinte formato:
     *
     * ```
     *  [ scheme ":" ][ "//" authority ][ "/" path ]
     * ```
     *
     * @return      string
     */
    function getBasePath(): string;
}
