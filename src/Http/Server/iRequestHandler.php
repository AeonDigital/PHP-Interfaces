<?php

declare(strict_types=1);

namespace AeonDigital\Interfaces\Http\Server;

use AeonDigital\Interfaces\Http\Message\iServerRequest as iServerRequest;
use AeonDigital\Interfaces\Http\Message\iResponse as iResponse;






/**
 * Manipula uma requisição recebida pelo servidor e produz uma respota.
 *
 * Equivalente à ``Psr\Http\Server\RequestHandlerInterface``, porém, com algumas alterações
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
interface iRequestHandler
{



    /**
     * Handles a request and produces a response.
     *
     * May call other collaborating code to generate the response.
     *
     * @param iServerRequest $request
     *
     * @return iResponse
     */
    public function handle(iServerRequest $request): iResponse;
}
