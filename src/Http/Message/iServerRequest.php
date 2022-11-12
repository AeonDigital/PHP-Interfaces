<?php

declare(strict_types=1);

namespace AeonDigital\Interfaces\Http\Message;

use Psr\Http\Message\ServerRequestInterface as ServerRequestInterface;
use AeonDigital\Interfaces\Http\Data\iCookie as iCookie;






/**
 * Interface de expansão para ``Psr\Http\Message\ServerRequestInterface``.
 *
 * @package     AeonDigital\Interfaces\Http
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
interface iServerRequest extends ServerRequestInterface
{



    /**
     * Retorna a data e hora do instante em que a instância foi criada.
     *
     * @return      \DateTime
     */
    function getNow(): \DateTime;



    /**
     * Retorna o valor da querystring de nome indicado.
     * Retornará ``null`` caso ela não exista.
     *
     * @param       string $name
     *              Nome da querystring alvo.
     *
     * @return      ?string
     */
    function getQueryString(string $name): ?string;



    /**
     * Retorna um array contendo todos os campos recebidos no corpo da requisição.
     *
     * Trata-se de um alias para o método ``getParsedBody``.
     *
     * @return      ?array
     */
    function getPostedFields(): ?array;



    /**
     * Retorna o valor do campo de nome indicado.
     * Retornará ``null`` caso ele não exista.
     *
     * @param       string $name
     *              Nome do campo alvo.
     *
     * @return      ?string|array
     */
    function getPost(string $name);



    /**
     * Retorna o objeto ``iCookie`` correspondente ao cookie de nome indicado.
     * Retornará ``null`` caso ele não exista.
     *
     * @param       string $name
     *              Nome do cookie alvo.
     *
     * @return      ?iCookie
     */
    function getCookie(string $name): ?iCookie;



    /**
     * Retorna o valor do cookie de nome indicado.
     * Retornará ``null`` caso ele não exista.
     *
     * @param       string $name
     *              Nome do cookie alvo.
     *
     * @return      ?string
     */
    function getCookieValue(string $name): ?string;



    /**
     * Retorna o valor do parametro da requisição de nome indicado.
     * A chave é procurada entre Attributes, Cookies, Post Data, QueryStrings respectivamente e
     * será retornada a primeira entre as coleções avaliadas.
     *
     * Retornará ``null`` caso o nome da chave não seja encontrado.
     *
     * @param       string $name
     *              Nome do campo que está sendo requerido.
     *
     * @return      ?string|array
     */
    function getParam(string $name);





    /**
     * Define uma coleção de atributos iniciais para a requisição atual.
     * Este método só pode ser utilizado 1 vez.
     *
     * Estes devem ser **SEMPRE** os primeiros atributos a serem definidos para a coleção.
     *
     * @param       array $attributes
     *              Array associativo contendo a coleção de atributos que serão definidos.
     *
     * @return      void
     */
    function setInitialAttributes(array $attributes): void;





    /**
     * Retorna uma coleção de mimetypes que o ``UA`` definiu como opções válidas para responder
     * a esta requisição.
     *
     * Este valor é definido a partir da avaliação qualitativa do Header ``accept``.
     *
     * Será retornado ``null`` caso não seja possível (por qualquer motivo) definir a coleção de
     * valores válidos.
     * Os valores retornados estarão na ordem de qualificação dos itens encontrados no Header ``accept``.
     *
     * @return      ?array
     * ``` php
     *  $arr = [
     *      [
     *          "mime"      string  Extenção do mimetype.
     *          "mimeType   string  Mimetype real que deve ser usado.
     *      ]
     *  ];
     * ```
     */
    function getResponseMimes(): ?array;




    /**
     * Retorna uma coleção de locales que o ``UA`` definiu como opções válidas para responder a
     * esta requisição.
     *
     * Este valor é definido a partir da avaliação qualitativa do Header ``accept-language``.
     *
     * Será retornado ``null`` caso não seja possível (por qualquer motivo) definir a coleção de
     * valores válidos.
     * Os valores retornados estarão na ordem de qualificação dos itens encontrados no Header
     * ``accept-language``.
     *
     * @return      ?array
     */
    function getResponseLocales(): ?array;




    /**
     * Retorna uma coleção de languages que o ``UA`` definiu como opções válidos para responder
     * a esta requisição.
     *
     * Este valor é definido a partir da avaliação qualitativa do Header ``accept-language``.
     *
     * Será retornado ``null`` caso não seja possível (por qualquer motivo) definir a coleção de
     * valores válidos.
     * Os valores retornados estarão na ordem de qualificação dos itens encontrados no Header
     * ``accept-language``.
     *
     * @return      ?array
     */
    function getResponseLanguages(): ?array;
}
