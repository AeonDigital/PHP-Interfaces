<?php

declare(strict_types=1);

namespace AeonDigital\Interfaces\Http\Server;

use AeonDigital\Interfaces\Http\Message\iServerRequest as iServerRequest;
use AeonDigital\Interfaces\Http\Server\iRequestHandler as iRequestHandler;
use AeonDigital\Interfaces\Http\Message\iResponse as iResponse;





/**
 * Participante no processamento de uma solicitação e resposta do servidor..
 *
 * Equivalente à ``Psr\Http\Server\MiddlewareInterface``, porém, com algumas alterações
 * para permitir o uso de tipagem equivalente à versão 8.2 do PHP além de melhorias percebidas
 * como necessárias para este tipo de objeto.
 *
 * Todos os métodos existentes na interface original estão presentes aqui mas com uma assinatura
 * levemente diferente.
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
}
