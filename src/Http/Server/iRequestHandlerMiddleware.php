<?php

declare(strict_types=1);

namespace AeonDigital\Interfaces\Http\Server;

use AeonDigital\Interfaces\Http\Server\iRequestHandler as iRequestHandler;
use AeonDigital\Interfaces\Http\Server\iMiddleware as iMiddleware;






/**
 * Expande a interface ``iRequestHandler`` para adicionar a capacidade de utilizar
 * uma lista de instâncias de middleware.
 *
 *
 * @package     AeonDigital\Interfaces\Http
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
interface iRequestHandlerMiddleware extends iRequestHandler
{



    /**
     * Adiciona um novo Middleware na lista de processos da requisição.
     *
     * @param iMiddleware $middleware
     * Objeto Middleware a ser adicionado na lista de tarefas a serem
     * executadas antes de entregar o resultado final com o método ``handle``.
     *
     * @return void
     */
    public function add(iMiddleware $middleware): void;
}
