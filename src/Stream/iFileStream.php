<?php
declare (strict_types=1);

namespace AeonDigital\Interfaces\Stream;

use AeonDigital\Interfaces\Stream\iStream as iStream;








/**
 * Interface iFileStream.
 *
 * @package     AeonDigital\Stream
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
interface iFileStream extends iStream
{





    /**
     * Retorna o caminho completo até onde o arquivo está no momento.
     *
     * @return      string
     */
    function getPathToFile() : string;



    /**
     * Retorna o nome do arquivo.
     *
     * @return      string
     */
    function getFilename() : string;



    /**
     * Resgata o mimetype do arquivo.
     *
     * @return      string
     */
    function getMimeType() : string;



    /**
     * Define um novo arquivo alvo para a instância ``FileStream``.
     * Use o método ``detach`` para liberar o recurso atual para outras ações.
     *
     * @param       string $pathToFile
     *              Caminho completo até o arquivo alvo.
     *
     * @param       ?string $openMode
     *              Modo de abertura do stream.
     *              Se for mantido ``null``, o novo arquivo deve utilizar o mesmo modo usado
     *              pelo anterior.
     *
     * @return      void
     *
     * @throws      \InvalidArgumentException
     *              Caso o arquivo indicado não exista.
     */
    function setFileStream(string $pathToFile, ?string $openMode = null) : void;
}
