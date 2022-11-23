<?php

declare(strict_types=1);

namespace AeonDigital\Interfaces\Http\Server;

use Psr\Http\Server\RequestHandlerInterface as RequestHandlerInterface;
use AeonDigital\Interfaces\Http\Message\iServerRequest as iServerRequest;
use AeonDigital\Interfaces\Http\Message\iResponse as iResponse;






/**
 * Manipula uma requisição recebida pelo servidor e produz uma respota.
 *
 * Equivalente à ``Psr\Http\Server\RequestHandlerInterface``, porém, com algumas alterações
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





    /**
     * Retorna uma instância deste mesmo objeto, porém, compatível com a interface
     * em que foi baseada ``Psr\Http\Server\RequestHandlerInterface``.
     */
    public function toPSR(): RequestHandlerInterface;
    /**
     * A partir de um objeto ``Psr\Http\Server\RequestHandlerInterface``, retorna um novo que implementa
     * a interface ``AeonDigital\Interfaces\Http\Server\iRequestHandler``.
     *
     * @param RequestHandlerInterface $obj
     * Instância original.
     *
     * @return static
     * Nova instância, sob nova interface.
     *
     * @throws \InvalidArgumentException
     * Se por qualquer motivo não for possível retornar uma nova instância a partir da
     * que foi passada
     */
    public static function fromPSR(RequestHandlerInterface $obj): static;
}
