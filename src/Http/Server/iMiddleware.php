<?php

declare(strict_types=1);

namespace AeonDigital\Interfaces\Http\Server;

use Psr\Http\Server\MiddlewareInterface as MiddlewareInterface;
use AeonDigital\Interfaces\Http\Message\iServerRequest as iServerRequest;
use AeonDigital\Interfaces\Http\Message\iResponse as iResponse;
use AeonDigital\Interfaces\Http\Server\iRequestHandler as iRequestHandler;




/**
 * Participante no processamento de uma solicitação e resposta do servidor..
 *
 * Equivalente à ``Psr\Http\Server\MiddlewareInterface``, porém, com algumas alterações
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
interface iMiddleware
{



    /**
     * Process an incoming server request.
     *
     * Processes an incoming server request in order to produce a response.
     * If unable to produce the response itself, it may delegate to the provided
     * request handler to do so.
     *
     * @param iServerRequest $request
     *
     * @param iRequestHandler $handler
     *
     * @return iResponse
     */
    public function process(iServerRequest $request, iRequestHandler $handler): iResponse;





    /**
     * Retorna uma instância deste mesmo objeto, porém, compatível com a interface
     * em que foi baseada ``Psr\Http\Server\MiddlewareInterface``.
     */
    public function toPSR(): MiddlewareInterface;
    /**
     * A partir de um objeto ``Psr\Http\Server\MiddlewareInterface``, retorna um novo que implementa
     * a interface ``AeonDigital\Interfaces\Http\Server\iMiddleware``.
     *
     * @param MiddlewareInterface $obj
     * Instância original.
     *
     * @return static
     * Nova instância, sob nova interface.
     *
     * @throws \InvalidArgumentException
     * Se por qualquer motivo não for possível retornar uma nova instância a partir da
     * que foi passada
     */
    public static function fromPSR(MiddlewareInterface $obj): static;
}
