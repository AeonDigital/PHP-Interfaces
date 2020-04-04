<?php
declare (strict_types=1);

namespace AeonDigital\Interfaces\Http\Data;

use Psr\Http\Message\UploadedFileInterface as UploadedFileInterface;








/**
 * Interface ``iFile``.
 *
 * @package     AeonDigital\Interfaces\Http
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
interface iFile extends UploadedFileInterface
{





    /**
     * Retorna o caminho completo para onde o arquivo está salvo no servidor.
     *
     * @return      string
     */
    function getPathToFile() : string;



    /**
     * Libera o ``stream`` para que o recurso possa ser usado por outra tarefa.
     *
     * Após esta ação os métodos da instância que dependem diretamente do recurso que foi
     * liberado não irão funcionar.
     *
     * @return      void
     */
    function dropStream() : void;
}
