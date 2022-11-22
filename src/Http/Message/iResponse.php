<?php

declare(strict_types=1);

namespace AeonDigital\Interfaces\Http\Message;

use Psr\Http\Message\ResponseInterface as ResponseInterface;
use AeonDigital\Interfaces\Http\Message\iMessage as iMessage;






/**
 * Representação de uma requisição HTTP de saída do lado do servidor.
 *
 * Equivalente à ``Psr\Http\Message\ResponseInterface``, porém, com algumas alterações
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
interface iResponse extends iMessage
{



    /**
     * Gets the response status code.
     *
     * The status code is a 3-digit integer result code of the server's attempt
     * to understand and satisfy the request.
     *
     * @return int Status code.
     */
    public function getStatusCode(): int;

    /**
     * Return an instance with the specified status code and, optionally, reason phrase.
     *
     * If no reason phrase is specified, implementations MAY choose to default
     * to the RFC 7231 or IANA recommended reason phrase for the response's
     * status code.
     *
     * This method MUST be implemented in such a way as to retain the
     * immutability of the message, and MUST return an instance that has the
     * updated status and reason phrase.
     *
     * @link http://tools.ietf.org/html/rfc7231#section-6
     * @link http://www.iana.org/assignments/http-status-codes/http-status-codes.xhtml
     * @param int $code The 3-digit integer result code to set.
     * @param string $reasonPhrase The reason phrase to use with the
     *     provided status code; if none is provided, implementations MAY
     *     use the defaults as suggested in the HTTP specification.
     * @return static
     * @throws \InvalidArgumentException For invalid status code arguments.
     */
    public function withStatus(int $code, string $reasonPhrase = ''): static;

    /**
     * Gets the response reason phrase associated with the status code.
     *
     * Because a reason phrase is not a required element in a response
     * status line, the reason phrase value MAY be null. Implementations MAY
     * choose to return the default RFC 7231 recommended reason phrase (or those
     * listed in the IANA HTTP Status Code Registry) for the response's
     * status code.
     *
     * @link http://tools.ietf.org/html/rfc7231#section-6
     * @link http://www.iana.org/assignments/http-status-codes/http-status-codes.xhtml
     * @return string Reason phrase; must return an empty string if none present.
     */
    public function getReasonPhrase(): string;










    /**
     * Entenda como uma ``viewData`` toda informação que DEVE ser enviada para o UA pois entende-se
     * que este foi o motivo da requisição original.
     *
     * Trata-se de um objeto do tipo ``stdClass`` cujos valores representam, de forma estruturada
     * a informação essencial que a requisição original visava obter.
     *
     * Se a URL apontava para uma listagem, o corpo da listagem (em formato de dados brutos) deve
     * estar aqui representado. Se fosse o registro de uma postagem, logo, os dados da mesma devem
     * estar contidos aqui.
     *
     *
     * @return ?\stdClass
     */
    public function getViewData(): ?\stdClass;
    /**
     * Este método **DEVE** manter o estado da instância atual e retornar uma nova instância
     * contendo o ``viewData`` especificado.
     *
     * @param ?\stdClass $viewData
     * Objeto "viewData".
     *
     * @return static
     */
    public function withViewData(?\stdClass $viewData): static;





    /**
     * Entenda como um ``viewConfig`` toda meta-informação que pode ser útil para que a
     * montagem do corpo da mensagem seja realizada.
     *
     * Trata-se de um objeto do tipo ``stdClass`` cujas chaves e valores representam, as diversas
     * configurações que orientam a montagem da view final.
     *
     * Estes dados NÃO DEVEM ser expostos para o UA pois não tem qualquer serventia para o mesmo.
     *
     *
     * @return ?\stdClass
     */
    public function getViewConfig(): ?\stdClass;
    /**
     * Este método **DEVE** manter o estado da instância atual e retornar uma nova instância
     * contendo o ``viewConfig`` especificado.
     *
     * @param ?\stdClass $viewConfig
     * Objeto "viewConfig".
     *
     * @return static
     */
    public function withViewConfig(?\stdClass $viewConfig): static;





    /**
     * Permite alterar a coleção completa de ``headers`` a serem usados, ou, ainda
     * efetuar um ``merge`` com os headers atualmente existentes.
     *
     * Este método **DEVE** manter o estado da instância atual e retornar uma nova instância
     * contendo os ``headers`` especificados.
     *
     * @param array $headers
     * Coleção de headers a substituirem ou a serem incorporados ao objeto resultante.
     *
     * @param bool $merge
     * Quando ``true`` irá manter os headers já definidos e apenas adicionar os novos.
     * Quando ``false`` irá sobrescrever totalmente os valores atuais pelos novos.
     *
     * @return static
     */
    public function withHeaders(array $headers, bool $merge = false): static;





    /**
     * Permite alterar de uma única vez as propriedades que servem para a montagem da
     * view/body que será enviado para o UA.
     *
     * Este método **DEVE** manter o estado da instância atual e retornar uma nova instância
     * contendo o ``viewData`` e o ``viewConfig`` especificados.
     *
     * @param ?\stdClass $viewData
     * Objeto ``viewData``.
     *
     * @param ?\stdClass $viewConfig
     * Objeto ``viewConfig``.
     *
     * @param ?array $headers
     * Coleção de headers.
     * Irá executar um Merge com os headers existentes.
     *
     * @return static
     */
    public function withActionProperties(
        ?\stdClass $viewData,
        ?\stdClass $viewConfig,
        ?array $headers
    ): static;





    /**
     * Retorna uma instância deste mesmo objeto, porém, compatível com a interface
     * em que foi baseada ``Psr\Http\Message\ResponseInterface``.
     */
    public function toPSR(): ResponseInterface;
    /**
     * A partir de um objeto ``Psr\Http\Message\ResponseInterface``, retorna um novo que implementa
     * a interface ``AeonDigital\Interfaces\Http\Message\iResponse``.
     *
     * @param ResponseInterface $obj
     * Instância original.
     *
     * @return static
     * Nova instância, sob nova interface.
     */
    public static function fromPSR(ResponseInterface $obj): static;
}
