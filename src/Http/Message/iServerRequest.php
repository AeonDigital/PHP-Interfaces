<?php

declare(strict_types=1);

namespace AeonDigital\Interfaces\Http\Message;

use Psr\Http\Message\RequestInterface as RequestInterface;
use Psr\Http\Message\ServerRequestInterface as ServerRequestInterface;
use AeonDigital\Interfaces\Http\Message\iRequest as iRequest;
use AeonDigital\Interfaces\Http\Data\iCookie as iCookie;




/**
 * Representação de uma solicitação HTTP recebida do lado do servidor.
 *
 * Equivalente à ``Psr\Http\Message\ServerRequestInterface``, porém, com algumas alterações
 * para permitir o uso de tipagem equivalente à versão 8.2 do PHP além de melhorias percebidas
 * como necessárias para este tipo de objeto.
 *
 * Visto que todos os métodos existentes na interface original estarão presentes aqui mas com
 * uma assinatura levemente diferente, e, para permitir manter a compatibilidade com o projeto
 * PSR original foram adicionados 2 métodos extra sendo eles ``toPSR`` e ``fromPSR``.
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
interface iServerRequest extends iRequest
{



    /**
     * Retrieve server parameters.
     *
     * Retrieves data related to the incoming request environment,
     * typically derived from PHP's $_SERVER superglobal. The data IS NOT
     * REQUIRED to originate from $_SERVER.
     *
     * @return array
     */
    public function getServerParams(): array;

    /**
     * Retrieve cookies.
     *
     * Retrieves cookies sent by the client to the server.
     *
     * The data MUST be compatible with the structure of the $_COOKIE
     * superglobal.
     *
     * @return array
     */
    public function getCookieParams(): array;

    /**
     * Return an instance with the specified cookies.
     *
     * The data IS NOT REQUIRED to come from the $_COOKIE superglobal, but MUST
     * be compatible with the structure of $_COOKIE. Typically, this data will
     * be injected at instantiation.
     *
     * This method MUST NOT update the related Cookie header of the request
     * instance, nor related values in the server params.
     *
     * This method MUST be implemented in such a way as to retain the
     * immutability of the message, and MUST return an instance that has the
     * updated cookie values.
     *
     * @param array $cookies Array of key/value pairs representing cookies.
     * @return static
     */
    public function withCookieParams(array $cookies): static;

    /**
     * Retrieve query string arguments.
     *
     * Retrieves the deserialized query string arguments, if any.
     *
     * Note: the query params might not be in sync with the URI or server
     * params. If you need to ensure you are only getting the original
     * values, you may need to parse the query string from `getUri()->getQuery()`
     * or from the `QUERY_STRING` server param.
     *
     * @return array
     */
    public function getQueryParams(): array;

    /**
     * Return an instance with the specified query string arguments.
     *
     * These values SHOULD remain immutable over the course of the incoming
     * request. They MAY be injected during instantiation, such as from PHP's
     * $_GET superglobal, or MAY be derived from some other value such as the
     * URI. In cases where the arguments are parsed from the URI, the data
     * MUST be compatible with what PHP's parse_str() would return for
     * purposes of how duplicate query parameters are handled, and how nested
     * sets are handled.
     *
     * Setting query string arguments MUST NOT change the URI stored by the
     * request, nor the values in the server params.
     *
     * This method MUST be implemented in such a way as to retain the
     * immutability of the message, and MUST return an instance that has the
     * updated query string arguments.
     *
     * @param array $query Array of query string arguments, typically from
     *     $_GET.
     * @return static
     */
    public function withQueryParams(array $query): static;

    /**
     * Retrieve normalized file upload data.
     *
     * This method returns upload metadata in a normalized tree, with each leaf
     * an instance of Psr\Http\Message\UploadedFileInterface.
     *
     * These values MAY be prepared from $_FILES or the message body during
     * instantiation, or MAY be injected via withUploadedFiles().
     *
     * @return array An array tree of UploadedFileInterface instances; an empty
     *     array MUST be returned if no data is present.
     */
    public function getUploadedFiles(): array;

    /**
     * Create a new instance with the specified uploaded files.
     *
     * This method MUST be implemented in such a way as to retain the
     * immutability of the message, and MUST return an instance that has the
     * updated body parameters.
     *
     * @param array $uploadedFiles An array tree of UploadedFileInterface instances.
     * @return static
     * @throws \InvalidArgumentException if an invalid structure is provided.
     */
    public function withUploadedFiles(array $uploadedFiles): static;

    /**
     * Retrieve any parameters provided in the request body.
     *
     * If the request Content-Type is either application/x-www-form-urlencoded
     * or multipart/form-data, and the request method is POST, this method MUST
     * return the contents of $_POST.
     *
     * Otherwise, this method may return any results of deserializing
     * the request body content; as parsing returns structured content, the
     * potential types MUST be arrays or objects only. A null value indicates
     * the absence of body content.
     *
     * @return null|array|object The deserialized body parameters, if any.
     *     These will typically be an array or object.
     */
    public function getParsedBody(): null|array|object;

    /**
     * Return an instance with the specified body parameters.
     *
     * These MAY be injected during instantiation.
     *
     * If the request Content-Type is either application/x-www-form-urlencoded
     * or multipart/form-data, and the request method is POST, use this method
     * ONLY to inject the contents of $_POST.
     *
     * The data IS NOT REQUIRED to come from $_POST, but MUST be the results of
     * deserializing the request body content. Deserialization/parsing returns
     * structured data, and, as such, this method ONLY accepts arrays or objects,
     * or a null value if nothing was available to parse.
     *
     * As an example, if content negotiation determines that the request data
     * is a JSON payload, this method could be used to create a request
     * instance with the deserialized parameters.
     *
     * This method MUST be implemented in such a way as to retain the
     * immutability of the message, and MUST return an instance that has the
     * updated body parameters.
     *
     * @param null|array|object $data The deserialized body data. This will
     *     typically be in an array or object.
     * @return static
     * @throws \InvalidArgumentException if an unsupported argument type is
     *     provided.
     */
    public function withParsedBody(null|array|object $data): static;

    /**
     * Retrieve attributes derived from the request.
     *
     * The request "attributes" may be used to allow injection of any
     * parameters derived from the request: e.g., the results of path
     * match operations; the results of decrypting cookies; the results of
     * deserializing non-form-encoded message bodies; etc. Attributes
     * will be application and request specific, and CAN be mutable.
     *
     * @return array Attributes derived from the request.
     */
    public function getAttributes(): array;

    /**
     * Retrieve a single derived request attribute.
     *
     * Retrieves a single derived request attribute as described in
     * getAttributes(). If the attribute has not been previously set, returns
     * the default value as provided.
     *
     * This method obviates the need for a hasAttribute() method, as it allows
     * specifying a default value to return if the attribute is not found.
     *
     * @see getAttributes()
     * @param string $name The attribute name.
     * @param mixed $default Default value to return if the attribute does not exist.
     * @return mixed
     */
    public function getAttribute(string $name, mixed $default = null): mixed;

    /**
     * Return an instance with the specified derived request attribute.
     *
     * This method allows setting a single derived request attribute as
     * described in getAttributes().
     *
     * This method MUST be implemented in such a way as to retain the
     * immutability of the message, and MUST return an instance that has the
     * updated attribute.
     *
     * @see getAttributes()
     * @param string $name The attribute name.
     * @param mixed $value The value of the attribute.
     * @return static
     */
    public function withAttribute(string $name, mixed $value): static;

    /**
     * Return an instance that removes the specified derived request attribute.
     *
     * This method allows removing a single derived request attribute as
     * described in getAttributes().
     *
     * This method MUST be implemented in such a way as to retain the
     * immutability of the message, and MUST return an instance that removes
     * the attribute.
     *
     * @see getAttributes()
     * @param string $name The attribute name.
     * @return static
     */
    public function withoutAttribute(string $name): static;










    /**
     * Retorna a data e hora do instante em que a instância foi criada.
     *
     * @return \DateTime
     */
    public function getNow(): \DateTime;



    /**
     * Retorna o valor da querystring de nome indicado.
     *
     * @param string $name
     * Nome da querystring alvo.
     *
     * @return ?string
     * Retornará ``null`` caso ela não exista ou o valor correspondente
     * a chave indicada.
     */
    public function getQueryString(string $name): ?string;



    /**
     * Retorna um array contendo todos os campos recebidos no corpo da requisição.
     * Trata-se de uma especialização mais estrita do método ``getParsedBody``.
     *
     * @return ?array
     */
    public function getPostedFields(): ?array;

    /**
     * Retorna o valor do campo de nome indicado.
     *
     * @param string $name
     * Nome do campo alvo.
     *
     * @return null|string|array
     * Retornará ``null`` caso ele não exista ou o valor correspondente
     * à chave indicada.
     */
    public function getField(string $name): null|string|array;



    /**
     * Retorna o objeto ``iCookie`` correspondente ao cookie de nome indicado.
     *
     * @param string $name
     * Nome do cookie alvo.
     *
     * @return ?iCookie
     * Retornará ``null`` caso ele não exista ou o valor correspondente
     * a chave indicada.
     */
    public function getCookie(string $name): ?iCookie;

    /**
     * Retorna o valor do cookie de nome indicado.
     *
     * @param string $name
     * Nome do cookie alvo.
     *
     * @return ?string
     * Retornará ``null`` caso ele não exista ou o valor correspondente
     * a chave indicada.
     */
    public function getCookieValue(string $name): ?string;



    /**
     * Retorna o valor do parametro da requisição de nome indicado.
     * A chave é procurada entre Attributes, Cookies, Post Data, QueryStrings respectivamente e
     * será retornada a primeira entre as coleções avaliadas.
     *
     * @param string $name
     * Nome do campo que está sendo requerido.
     *
     * @return null|string|array
     * Retornará ``null`` caso ele não exista ou o valor correspondente
     * a chave indicada.
     */
    public function getParam(string $name): null|string|array;





    /**
     * Define uma coleção de atributos iniciais para a requisição atual.
     * Este método só pode ser utilizado 1 vez.
     *
     * Estes devem ser **SEMPRE** os primeiros atributos a serem definidos para a coleção.
     *
     * @param array $attributes
     * Array associativo contendo a coleção de atributos que serão definidos.
     *
     * @return void
     */
    public function setInitialAttributes(array $attributes): void;





    /**
     * Retorna uma coleção de mimetypes que o ``UA`` definiu como opções válidas para responder
     * a esta requisição.
     *
     * Este valor é definido a partir da avaliação qualitativa do Header ``accept``.
     *
     * @return ?array
     * Será retornado ``null`` caso não seja possível (por qualquer motivo) definir a coleção de
     * valores válidos.
     * Os valores retornados estarão na ordem de qualificação dos itens encontrados no Header ``accept``.
     *
     * ```php
     *  $arr = [
     *      [
     *          "mime"      =>  //string  Extenção do mimetype.
     *          "mimeType"  =>  //string  Mimetype real que deve ser usado.
     *      ]
     *  ];
     * ```
     */
    public function getResponseMimes(): ?array;



    /**
     * Retorna uma coleção de locales que o ``UA`` definiu como opções válidas para responder a
     * esta requisição.
     *
     * Este valor é definido a partir da avaliação qualitativa do Header ``accept-language``.
     *
     * @return ?array
     * Será retornado ``null`` caso não seja possível (por qualquer motivo) definir a coleção de
     * valores válidos.
     * Os valores retornados estarão na ordem de qualificação dos itens encontrados no Header
     * ``accept-language``.
     */
    public function getResponseLocales(): ?array;



    /**
     * Retorna uma coleção de languages que o ``UA`` definiu como opções válidos para responder
     * a esta requisição.
     *
     * Este valor é definido a partir da avaliação qualitativa do Header ``accept-language``.
     *
     * @return ?array
     * Será retornado ``null`` caso não seja possível (por qualquer motivo) definir a coleção de
     * valores válidos.
     * Os valores retornados estarão na ordem de qualificação dos itens encontrados no Header
     * ``accept-language``.
     */
    public function getResponseLanguages(): ?array;





    /**
     * Retorna uma instância deste mesmo objeto, porém, compatível com a interface
     * em que foi baseada ``Psr\Http\Message\ServerRequestInterface``.
     */
    public function toPSR(): RequestInterface|ServerRequestInterface;
    /**
     * A partir de um objeto ``Psr\Http\Message\ServerRequestInterface``, retorna um novo que implementa
     * a interface ``AeonDigital\Interfaces\Http\Message\iServerRequest``.
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
