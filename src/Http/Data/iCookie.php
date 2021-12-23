<?php
declare (strict_types=1);

namespace AeonDigital\Interfaces\Http\Data;










/**
 * Interface ``iCookie``.
 *
 * @package     AeonDigital\Interfaces\Http
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
interface iCookie
{




    /**
     * Define o nome do cookie.
     *
     * @param       string $name
     *              Nome do cookie.
     *
     * @return      void
     *
     * @throws      \InvalidArgumentException
     *              Caso o valor indicado seja inválido.
     */
    function setName(string $name) : void;
    /**
     * Retorna o nome identificador do cookie.
     *
     * @return      string
     */
    function getName() : string;





    /**
     * Define o valor do cookie.
     * O valor será armazenado em ``percent-encode``.
     *
     * @param       string $value
     *              Valor do cookie.
     *
     * @return      void
     */
    function setValue(string $value) : void;
    /**
     * Retorna o valor do cookie.
     * O valor será retornado usando ``percent-encode``.
     *
     * @param       bool $urldecoded
     *              Indica se o valor retornado deve ser convertido para o formato **natural**,
     *              sem ``percent-encode``.
     *
     * @return      string
     */
    function getValue(bool $urldecoded = true) : string;





    /**
     * Define o ``Expires`` do cookie.
     *
     * O valor ``null`` irá remover esta propriedade do cookie.
     *
     * @param       ?DateTime $expires
     *              Data de expiração.
     *
     * @return      void
     */
    function setExpires(?\DateTime $expires) : void;
    /**
     * Retorna o atual valor de ``Expires`` definido para este cookie em formato \DateTime.
     *
     * O valor ``null`` será retornado caso nenhum valor esteja definido para esta propriedade.
     *
     * @return      ?DateTime
     */
    function getExpires() : ?\DateTime;
    /**
     * Retorna o atual valor de ``Expires`` definido para este cookie.
     * O valor deve ser devolvido usando o modelo:
     *
     * ```
     *  strDay(3 char), intDay strMonth(3 char) intYear intHour:intMinute:intSec UTC
     * ```
     *
     * O valor ``null`` será retornado caso nenhum valor esteja definido para esta propriedade.
     *
     * @return      ?\DateTime
     */
    function getStrExpires() : ?string;





    /**
     * Define o ``Domain`` do cookie.
     *
     * O valor ``null`` irá remover esta propriedade do cookie.
     *
     * @param       ?string $domain
     *              Domain.
     *
     * @return      void
     */
    function setDomain(?string $domain) : void;
    /**
     * Retorna o ``Domain`` definido para este cookie.
     * O velor deve ser devolvido em seu formato ``lowerCase``.
     *
     * O valor ``null`` será retornado caso nenhum valor esteja definido para esta propriedade.
     *
     * @return      ?string
     */
    function getDomain() : ?string;





    /**
     * Define o ``Path`` do cookie.
     *
     * O valor ``null`` irá remover esta propriedade do cookie.
     *
     * @param       ?string $path
     *              Path.
     *
     * @return      void
     */
    function setPath(?string $path) : void;
    /**
     * Retorna o ``Path`` definido para este cookie.
     *
     * O valor ``/`` será retornado caso nenhum valor esteja definido para esta propriedade.
     *
     * @return      string
     */
    function getPath() : string;





    /**
     * Define se o cookie é do tipo ``Secure``.
     *
     * Quando ``true`` significa que o cookie só deve trafegar em canais seguros (tipicamente
     * ``Http`` sobre uma camada TSL).
     *
     * O valor ``null`` irá remover esta propriedade do cookie.
     *
     * @param       bool $secure
     *              Secure.
     *
     * @return      void
     */
    function setSecure(bool $secure) : void;
    /**
     * Indica se a diretiva ``Secure`` deve ser aplicada.
     *
     * Quando ``true`` significa que o cookie só deve trafegar em canais seguros (tipicamente
     * ``Http`` sobre uma camada TSL).
     *
     * @return      bool
     */
    function getSecure() : bool;





    /**
     * Define se o cookie é do tipo ``HttpOnly``.
     *
     * Quando ``true`` significa que o cookie só deve trafegar em via ``Http``.
     *
     * O valor ``null`` irá remover esta propriedade do cookie.
     *
     * @param       bool $httpOnly
     *              HttpOnly.
     *
     * @return      void
     */
    function setHttpOnly(bool $httpOnly) : void;
    /**
     * Indica se a diretiva ``HttpOnly`` deve ser aplicada.
     *
     * Quando ``true`` significa que o cookie só deve trafegar em via ``Http``.
     *
     * @return      bool
     */
    function getHttpOnly() : bool;










    /**
     * Devolve uma string com o valor completo do Cookie.
     *
     * ```
     *  name=value; [Expires=string;] [Domain=string;] [Path=string;] [Secure;] [HttpOnly;]
     * ```
     *
     * @param       bool $urldecoded
     *              Indica se o valor retornado deve ser convertido para o formato **natural**,
     *              sem ``percent-encode``.
     *
     * @return      string
     */
    function toString(bool $urldecoded = true) : string;



    /**
     * Cria o cookie e envia-o para o ``UA``.
     * O retorno ``true`` apenas indica que a operação foi concluída mas não que o ``UA``
     * aceitou o Cookie.
     *
     * @return      bool
     */
    function defineCookie() : bool;



    /**
     * Remove o cookie atual.
     *
     * O retorno ``true`` apenas indica que a operação foi concluída mas não que o ``UA``
     * aceitou o Cookie.
     *
     * @return      bool
     */
    function removeCookie() : bool;
}
