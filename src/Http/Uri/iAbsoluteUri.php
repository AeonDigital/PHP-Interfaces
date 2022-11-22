<?php

declare(strict_types=1);

namespace AeonDigital\Interfaces\Http\Uri;

use AeonDigital\Interfaces\Http\Uri\iHierPartUri as iHierPartUri;







/**
 * Uma ``absolute-uri``.
 *
 * Refere-se ao formato de ``URI`` que corresponde ao seguinte esquema:
 * ```txt
 *  absolute-URI  = scheme ":" hier-part [ "?" query ] [ "#" fragment ]
 * ```
 *
 * Portanto ele extende as necessidades/funcionalidades de uma ``hier-part`` adicionando o
 * componente ``query``.
 *
 * Embora não faça parte da especificação ``absolute-uri``, foi adicionado nesta interface as
 * capacidades de lidar com o componente ``fragment`` (também chamado de same-document
 * reference)
 *
 *
 * @see https://tools.ietf.org/html/rfc3986#section-4.3
 * @see https://tools.ietf.org/html/rfc3986#section-4.4
 *
 * @package     AeonDigital\Interfaces\Http
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
interface iAbsoluteUri extends iHierPartUri
{





    /**
     * * 3.4.  Query
     * Origem : https://tools.ietf.org/html/rfc3986#section-3.4
     * Data: 2017-10-23
     *
     * Querystrings são dados não hierarquicos que podem definir um recurso
     * dentro do escopo da URI.
     *
     *    A sintaxe padrão deste componente é:
     *    <pre>
     *    name=query [& name=query ... ]
     *    </pre>
     *
     *
     * Abaixo segue o esquema que deve ser seguido para orientar a
     * formatação adequada de um valor de um valor "query".
     *
     *       query       = * ( ALPHA / DIGIT / "-" / "." / "_" / "~"
     *                   / "%" HEXDIG HEXDIG / "!" / "$" / "&" / "'"
     *                   / "(" / ")" / "*" / "+" / "," / ";" / "="
     *                   / ":" / "@" / "/" / "?"
     */










    /**
     * Retorna o componente ``query`` da ``URI`` ou ``''`` caso ele não esteja especificado.
     * O caracter ``?`` não faz parte do componente ``query``.
     *
     * Os valores definidos serão retornados usando ``percent-encoding``.
     *
     * @see https://tools.ietf.org/html/rfc3986#section-3.4
     *
     * @return string
     */
    public function getQuery(): string;

    /**
     * Este método ``DEVE`` manter o estado da instância atual e retornar uma nova instância
     * contendo o ``query`` especificado.
     *
     * @param string $query
     * O novo valor para ``query`` na nova instância.
     *
     * @return static
     *
     * @throws \InvalidArgumentException
     * Caso seja definido um valor inválido para ``query``.
     */
    public function withQuery(string $query): static;



    /**
     * Retorna o componente ``fragment`` da ``URI`` ou ``''`` caso ele não esteja especificado.
     * O caracter ``#`` não faz parte do componente ``fragment``.
     *
     * Os valores definidos serão retornados usando ``percent-encoding``.
     *
     * @see https://tools.ietf.org/html/rfc3986#section-3.4
     *
     * @return string
     */
    public function getFragment(): string;

    /**
     * Este método ``DEVE`` manter o estado da instância atual e retornar uma nova instância
     * contendo o ``fragment`` especificado.
     *
     * @param string $fragment
     * O novo valor para ``fragment`` na nova instância.
     *
     * @return static
     *
     * @throws \InvalidArgumentException
     * Caso seja definido um valor inválido para ``fragment``.
     */
    public function withFragment(string $fragment): static;



    /**
     * Este método ``DEVE`` manter o estado da instância atual e retornar uma nova instância
     * contendo a parte ``relative-uri`` especificado.
     *
     * @param string $path
     * O novo valor para ``path`` na nova instância.
     *
     * @param string $query
     * O novo valor para ``query`` na nova instância.
     *
     * @param string $fragment
     * O novo valor para ``fragment`` na nova instância.
     *
     * @return static
     *
     * @throws \InvalidArgumentException
     * Caso seja definido um valor inválido para algum argumento.
     */
    public function withRelativeUri(string $path = "", string $query = "", string $fragment = ""): static;



    /**
     * Retorna uma string que representa toda a uri representada pela atual instância.
     *
     * O resultado será uma string com o seguinte formato:
     *
     * ```txt
     *  [ scheme ":" ][ "//" authority ][ "/" path ][ "?" query ][ "#" fragment ]
     * ```
     *
     * @param bool $withFragment
     * Quando ``true`` irá adicionar o componente ``fragment``.
     * Se ``false`` irá omitir totalmente este componente.
     *
     * @return string
     */
    public function getAbsoluteUri(bool $withFragment = false): string;

    /**
     * Retorna uma string que representa toda a parte relativa da ``URI`` atualmente representada
     * pela instância.
     *
     * O resultado será uma string com o seguinte formato:
     *
     * ```txt
     *  [ "/" path ][ "?" query ][ "#" fragment ]
     * ```
     *
     * @param bool $withFragment
     * Quando ``true`` irá adicionar o componente ``fragment``.
     * Se ``false`` irá omitir totalmente este componente.
     *
     * @return string
     */
    public function getRelativeUri(bool $withFragment = false): string;
}
