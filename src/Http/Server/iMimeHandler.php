<?php

declare(strict_types=1);

namespace AeonDigital\Interfaces\Http\Server;









/**
 * Interface de um manipulador capaz de gerar uma resposta
 * adequada a um determinado tipo mime.
 *
 * @package     AeonDigital\Interfaces\Http
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
interface iMimeHandler
{



    /**
     * Gera uma string que representa a resposta a ser enviada para o ``UA``, compatível com o
     * mimetype que esta classe está apta a manipular.
     *
     * @return string
     */
    public function createResponseBody(): string;
}
