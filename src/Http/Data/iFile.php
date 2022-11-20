<?php

declare(strict_types=1);

namespace AeonDigital\Interfaces\Http\Data;

use Psr\Http\Message\UploadedFileInterface as UploadedFileInterface;
use AeonDigital\Interfaces\Stream\iFileStream as iFileStream;






/**
 * Interface ``iFile``.
 *
 * Equivalente à ``Psr\Http\Message\UploadedFileInterface``, porém, com algumas alterações
 * para permitir o uso de tipagem equivalente à versão 8.2 do PHP além de melhorias percebidas
 * como necessárias.
 *
 * Para permitir aderencia à interface PSR foi criado o método "toPSR" que deve retornar um
 * objeto que não quebre a interface na qual esta foi baseada.
 *
 *
 * @package     AeonDigital\Interfaces\Http
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
interface iFile
{




    /**
     * Retorna o stream que representa o arquivo sendo enviado.
     *
     * @return iFileStream
     */
    public function getStream(): iFileStream;

    /**
     * Move o arquivo carregado para a nova localização.
     *
     * Esta ação só pode ser executada 1 vez pois o arquivo na posição original será excluido ao
     * final do processo.
     *
     * @param string $targetPath
     * Caminho completo até o novo local onde o arquivo deve ser salvo.
     *
     * @return void
     *
     * @throws \InvalidArgumentException
     * Caso o destino especificado seja inválido
     *
     * @throws \RuntimeException
     * Quando alguma operação de mover ou excluir falhar.
     */
    public function moveTo(string $targetPath) : void;

    /**
     * Retorna o tamanho (em bytes) do ``Stream`` carregado.
     * Retornará ``null`` quando o stream for liberado usando o método ``dropStream``.
     *
     * @return ?int
     */
    public function getSize(): ?int;

    /**
     * Retorna o erro ao efetuar o upload do arquivo, se houver.
     * Não havendo erro o valor retornado é equivalente a constante ``UPLOAD_ERR_OK``
     *
     * @return int
     */
    public function getError(): int;

    /**
     * Retorna o nome do arquivo que está sendo enviado.
     *
     * @return string
     */
    public function getClientFilename(): string;

    /**
     * Resgata o mimetype do arquivo que está sendo enviado.
     *
     * @return string
     */
    public function getClientMediaType(): string;






    /**
     * Retorna o caminho completo para onde o arquivo está salvo no servidor.
     *
     * @return string
     */
    function getPathToFile(): string;



    /**
     * Libera o ``stream`` para que o recurso possa ser usado por outra tarefa.
     *
     * Após esta ação os métodos da instância que dependem diretamente do recurso que foi
     * liberado não irão funcionar.
     *
     * @return void
     */
    function dropStream(): void;






    /**
     * Retorna uma instância deste mesmo objeto, porém, compatível com a interface
     * original ``Psr\Http\Message\UploadedFileInterface``.
     */
    function toPSR(): UploadedFileInterface;
}
