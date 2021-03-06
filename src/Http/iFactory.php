<?php
declare (strict_types=1);

namespace AeonDigital\Interfaces\Http;

use AeonDigital\Interfaces\Http\Uri\iUrl as iUrl;
use AeonDigital\Interfaces\Http\Message\iRequest as iRequest;
use AeonDigital\Interfaces\Http\Message\iResponse as iResponse;
use AeonDigital\Interfaces\Http\Message\iServerRequest as iServerRequest;
use AeonDigital\Interfaces\Http\Data\iHeaderCollection as iHeaderCollection;
use AeonDigital\Interfaces\Http\Data\iCookieCollection as iCookieCollection;
use AeonDigital\Interfaces\Http\Data\iQueryStringCollection as iQueryStringCollection;
use AeonDigital\Interfaces\Http\Data\iFileCollection as iFileCollection;
use AeonDigital\Interfaces\Stream\iStream as iStream;
use AeonDigital\Interfaces\Stream\iFileStream as iFileStream;
use AeonDigital\Interfaces\Collection\iCollection as iCollection;



/**
 * Define uma fábrica de instâncias da namespace ``AeonDigital\Interfaces\Http``.
 *
 * @package     AeonDigital\EnGarde
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
interface iFactory
{





    /**
     * Retorna uma coleção de headers baseado nos valores passados.
     *
     * O objeto retornado deve implementar a interface ``AeonDigital\Interfaces\Http\Data\iHeaderCollection``.
     *
     * @param       ?array $initialValues
     *              Valores iniciais dos headers.
     *
     * @return      iHeaderCollection
     */
    function createHeaderCollection(?array $initialValues = null) : iHeaderCollection;
    /**
     * Retorna uma coleção de headers baseado nos valores passados.
     *
     * O objeto retornado deve implementar a interface ``AeonDigital\Interfaces\Http\Data\iCookieCollection``.
     *
     * @param       ?string|array $initialValues
     *              Valores iniciais para a coleção de cookies.
     *
     * @return      iCookieCollection
     */
    function createCookieCollection($initialValues = null) : iCookieCollection;
    /**
     * Retorna uma coleção de headers baseado nos valores passados.
     *
     * O objeto retornado deve implementar a interface ``AeonDigital\Interfaces\Http\Data\iQueryStringCollection``.
     *
     * @param       ?string|array $initialValues
     *              Valores iniciais para a coleção de cookies.
     *
     * @return      iQueryStringCollection
     */
    function createQueryStringCollection($initialValues = null) : iQueryStringCollection;
    /**
     * Retorna uma coleção de headers baseado nos valores passados.
     *
     * O objeto retornado deve implementar a interface ``AeonDigital\Interfaces\Http\Data\iFileCollection``.
     *
     * @param       ?array $initialValues
     *              Valores iniciais para a coleção de cookies.
     *
     * @return      iFileCollection
     */
    function createFileCollection(?array $initialValues = null) : iFileCollection;
    /**
     * Retorna um objeto ``iCollection`` vazio.
     *
     * O objeto retornado deve implementar a interface ``AeonDigital\Interfaces\Collection\iCollection``.
     *
     * @param       ?array $initialValues
     *              Valores com os quais a instância deve iniciar.
     *
     * @param       bool $autoincrement
     *              Quando ``true`` permite que seja omitido o nome da chave dos valores pois
     *              eles serão definidos internamente conforme fosse um array começando em zero.
     *
     * @return      iCollection
     */
    function createCollection(?array $initialValues = [], bool $autoincrement = false) : iCollection;










    /**
     * Retorna um objeto que implemente a interface ``AeonDigital\Interfaces\Http\Uri\iUrl``.
     *
     * @param       string $uri
     *              Uri.
     *
     * @return      iUrl
     *
     * @throws      \InvalidArgumentException
     *              Caso a ``uri`` passada seja inválida.
     */
    function createUri(string $uri = "") : iUrl;










    /**
     * Retorna um objeto que implemente a interface ``AeonDigital\Interfaces\Stream\iStream``.
     *
     * @param       string $content
     *              Conteúdo inicial.
     *
     * @return      iStream
     */
    function createStream(string $content = "") : iStream;
    /**
     * Retorna um objeto que implemente a interface ``AeonDigital\Interfaces\Stream\iFileStream``.
     *
     * @param       string $filename
     *              Caminho completo até o arquivo.
     *
     * @param       string $mode
     *              Modo no qual o stream será aberto.
     *
     * @return      iFileStream
     */
    function createStreamFromFile(string $filename, string $mode = "r") : iFileStream;
    /**
     * Retorna um objeto que implemente a interface ``AeonDigital\Interfaces\Stream\iStream``.
     *
     * @param       resource $resource
     *              Recurso que será aberto no stream.
     *
     * @return      iStream
     */
    function createStreamFromResource($resource) : iStream;
    /**
     * Retorna um objeto que implemente a interface ``AeonDigital\Interfaces\Stream\iStream``.
     *
     * O objeto criado deve ser baseado no ``stream`` do ``body`` da requisição que está
     * ocorrendo no momento.
     *
     * @return      iStream
     */
    function createStreamFromBodyRequest() : iStream;










    /**
     * Retorna um objeto que implemente a interface ``AeonDigital\Interfaces\Http\Message\iRequest``.
     *
     * @param       string $httpMethod
     *              Método ``Http`` que está sendo usado para a requisição.
     *
     * @param       string $uri
     *              ``URI`` que está sendo executada.
     *
     * @param       ?string $httpVersion
     *              Versão do protocolo ``Http``.
     *
     * @param       ?iHeaderCollection $headers
     *              Objeto que implementa ``iHeaderCollection`` cotendo os cabeçalhos da requisição.
     *
     * @param       ?iStream $body
     *              Objeto ``stream`` que faz parte do corpo da mensagem.
     *
     * @return      iRequest
     *
     * @throws      \InvalidArgumentException
     *              Caso algum dos argumentos passados seja inválido.
     */
    function createRequest(
        string $httpMethod,
        string $uri,
        ?string $httpVersion,
        ?iHeaderCollection $headers,
        ?iStream $body
    ) : iRequest;





    /**
     * Retorna um objeto que implemente a interface ``AeonDigital\Interfaces\Http\Message\iServerRequest``.
     *
     * @param       string $httpMethod
     *              Método ``Http`` que está sendo usado para a requisição.
     *
     * @param       string $uri
     *              ``URI`` que está sendo executada.
     *
     * @param       ?string $httpVersion
     *              Versão do protocolo ``Http``.
     *
     * @param       ?iHeaderCollection $headers
     *              Objeto que implementa ``iHeaderCollection`` cotendo os cabeçalhos da requisição.
     *
     * @param       ?iStream $body
     *              Objeto ``stream`` que faz parte do corpo da mensagem.
     *
     * @param       ?iCookieCollection $cookies
     *              Objeto que implementa ``iCookieCollection`` cotendo os cookies da requisição.
     *
     * @param       ?iQueryStringCollection $queryStrings
     *              Objeto que implementa ``iQueryStringCollection`` cotendo os queryStrings da ``URI``.
     *
     * @param       ?iFileCollection $files
     *              Objeto que implementa ``iFileCollection`` cotendo os arquivos enviados nesta
     *              requisição.
     *
     * @param       ?array $serverParans
     *              Coleção de parametros definidos pelo servidor sobre o ambiente e requisição
     *              atual.
     *
     * @param       ?iCollection $attributes
     *              Objeto que implementa ``iCollection`` cotendo atributos personalizados para
     *              esta requisição.
     *
     * @param       ?iCollection $bodyParsers
     *              Objeto que implementa ``iCollection`` cotendo os closures que podem efetuar
     *              o processamento do body da requisição.
     *
     * @return      iServerRequest
     *
     * @throws      \InvalidArgumentException
     *              Caso algum dos argumentos passados seja inválido.
     */
    function createServerRequest(
        string $httpMethod,
        string $uri,
        ?string $httpVersion = null,
        ?iHeaderCollection $headers = null,
        ?iStream $body = null,
        ?iCookieCollection $cookies = null,
        ?iQueryStringCollection $queryStrings = null,
        ?iFileCollection $files = null,
        ?array $serverParans = null,
        ?iCollection $attributes = null,
        ?iCollection $bodyParsers = null
    ) : iServerRequest;





    /**
     * Retorna um objeto que implemente a interface ``AeonDigital\Interfaces\Http\Message\iResponse``.
     *
     * @param       int $statusCode
     *              Código do status ``Http``.
     *
     * @param       string $reasonPhrase
     *              Frase razão do status ``Http``.
     *              Se não for definida e o código informado for um código padrão, usará a frase
     *              razão correspondente.
     *
     * @param       ?string $httpVersion
     *              Versão do protocolo ``Http``.
     *
     * @param       ?iHeaderCollection $headers
     *              Objeto que implementa ``iHeaderCollection``
     *              cotendo os cabeçalhos da requisição.
     *
     * @param       ?iStream $body
     *              Objeto ``stream`` que faz parte do corpo da mensagem.
     *
     * @param       ?\StdClass $viewData
     *              Objeto ``viewData``.
     *
     * @param       ?string $mime
     *              Mimetype que deve ser usado para criar o corpo da mensagem.
     *
     * @param       ?string $locale
     *              Locale no qual a informação que consta no corpo da mensagem está construído.
     *
     * @return      iResponse
     *
     * @throws      \InvalidArgumentException
     *              Caso algum dos argumentos passados seja inválido.
     */
    function createResponse(
        int $statusCode = 200,
        string $reasonPhrase = "",
        ?string $httpVersion = null,
        ?iHeaderCollection $headers = null,
        ?iStream $body = null,
        ?\StdClass $viewData = null,
        ?string $mime = null,
        ?string $locale = null
    ) : iResponse;
}
