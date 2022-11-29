<?php

declare(strict_types=1);

namespace AeonDigital\Interfaces\Http\Uri;

use Psr\Http\Message\UriInterface as UriInterface;
use AeonDigital\Interfaces\Http\Uri\iAbsoluteUri as iAbsoluteUri;






/**
 * Representação de uma Uri.
 *
 * Equivalente à ``Psr\Http\Message\UriInterface``, porém, com algumas alterações
 * para permitir o uso de tipagem equivalente à versão 8.2 do PHP além de melhorias percebidas
 * como necessárias para este tipo de objeto.
 *
 * Todos os métodos existentes na interface original estão presentes aqui mas com uma assinatura
 * levemente diferente. Para permitir manter a compatibilidade com o projeto PSR foram
 * adicionados 2 métodos extra sendo eles ``toPSR`` e ``fromPSR``.
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
interface iUri extends iAbsoluteUri
{



    /**
     * Retorna uma instância deste mesmo objeto, porém, compatível com a interface
     * em que foi baseada ``Psr\Http\Message\UriInterface``.
     */
    public function toPSR(): UriInterface;
    /**
     * A partir de um objeto ``Psr\Http\Message\UriInterface``, retorna um novo que implementa
     * a interface ``AeonDigital\Interfaces\Stream\iStream``.
     *
     * @param UriInterface $obj
     * Instância original.
     *
     * @return static
     * Nova instância, sob nova interface.
     *
     * @throws \InvalidArgumentException
     * Se por qualquer motivo não for possível retornar uma nova instância a partir da
     * que foi passada
     */
    public static function fromPSR(UriInterface $obj): static;
}
