<?php
declare (strict_types=1);

namespace AeonDigital\Interfaces\Http\Message;

use Psr\Http\Message\ResponseInterface as ResponseInterface;








/**
 * Interface de expansão para ``Psr\Http\Message\ResponseInterface``.
 *
 * @package     AeonDigital\Interfaces\Http
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
interface iResponse extends ResponseInterface
{



    /**
     * Retorna o objeto ``viewData`` contendo as informações obtidas durante o processamento
     * da rota alvo.
     *
     * Este objeto traz dados a serem usados no corpo da view.
     *
     * @return      ?\StdClass
     */
    function getViewData() : ?\StdClass;
    /**
     * Este método **DEVE** manter o estado da instância atual e retornar uma nova instância
     * contendo o ``viewData`` especificado.
     *
     * @param       ?\StdClass $viewData
     *              Objeto "viewData".
     *
     * @return      iResponse
     */
    function withViewData(?\StdClass $viewData) : iResponse;





    /**
     * Retorna o objeto ``viewConfig`` contendo as informações obtidas durante o processamento
     * da rota alvo.
     *
     * Este objeto traz dados que orientam a criação da view.
     *
     * @return      ?\StdClass
     */
    function getViewConfig() : ?\StdClass;
    /**
     * Este método **DEVE** manter o estado da instância atual e retornar uma nova instância
     * contendo o ``viewConfig`` especificado.
     *
     * @param       ?\StdClass $viewConfig
     *              Objeto "viewConfig".
     *
     * @return      iResponse
     */
    function withViewConfig(?\StdClass $viewConfig) : iResponse;





    /**
     * Este método **DEVE** manter o estado da instância atual e retornar uma nova instância
     * contendo os ``headers`` especificados.
     *
     * @param       array $headers
     *              Coleção de headers.
     *
     * @param       bool $merge
     *              Quando ``true`` irá manter os headers já definidos e apenas adicionar
     *              ou sobrescrever os definidos em ``$headers``.
     *
     * @return      iResponse
     */
    function withHeaders(array $headers, bool $merge = false) : iResponse;





    /**
     * Este método **DEVE** manter o estado da instância atual e retornar uma nova instância
     * contendo o ``viewData`` e o ``viewConfig`` especificados.
     *
     * @param       ?\StdClass $viewData
     *              Objeto ``viewData``.
     *
     * @param       ?\StdClass $viewConfig
     *              Objeto ``viewConfig``.
     *
     * @param       ?array $headers
     *              Coleção de headers.
     *              Irá executar um Merge com os headers existentes.
     *
     * @return      iResponse
     */
    function withActionProperties(
        ?\StdClass $viewData,
        ?\StdClass $viewConfig,
        ?array $headers
    ) : iResponse;
}
