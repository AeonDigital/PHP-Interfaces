<?php
declare (strict_types=1);

namespace AeonDigital\Interfaces\Http;










/**
 * Interface que implementa métodos de execução de ações ``Http``.
 *
 * @package     AeonDigital\EnGarde
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
interface iExecute
{





    /**
     * Retorna o status do último erro ocorrido após o a última requisição executada.
     * O Valor vazio "" indica que nenhum erro ocorreu.
     *
     * @return      string
     */
    static function getLastError() : string;



    /**
     * Efetua uma requisição ``Http`` e retorna seu resultado em uma ``string``.
     * Qualquer tipo de falha encontrada fará retornar ``null``.
     *
     * @param       string $method
     *              Método ``Http`` que será executado.
     *
     * @param       string $absoluteURL
     *              ``URL`` alvo.
     *
     * @param       array $content
     *              Array associativo com as chaves e valores que serão enviados.
     *
     * @param       array $headers
     *              Array associativo com cabeçalhos ``Http`` para serem enviados na requisição.
     *
     * @return      ?string
     */
    static function request(
        string $method,
        string $absoluteURL,
        array $content = [],
        array $headers = []
    ) : ?string;



    /**
     * Efetua o download de um arquivo a partir de uma ``URL`` e salva-o no diretório indicado
     * com o nome escolhido.
     *
     * @param       string $absoluteURL
     *              ``URL`` de onde o arquivo será resgatado.
     *
     * @param       string $absoluteSystemPathToDir
     *              Diretório da aplicação onde o arquivo será salvo.
     *
     * @param       string $fileName
     *              Nome usado para salvar o arquivo.
     *              Se não informado será usado o nome original do mesmo.
     *
     * @return      bool
     */
    static function download(
        string $absoluteURL,
        string $absoluteSystemPathToDir,
        string $fileName = ""
    ) : bool;
}
