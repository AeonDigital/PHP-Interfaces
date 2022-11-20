<?php

declare(strict_types=1);

namespace AeonDigital\Interfaces\Stream;

use Psr\Http\Message\StreamInterface as StreamInterface;







/**
 * Interface iStream.
 *
 * Equivalente à ``Psr\Http\Message\StreamInterface``, porém, com algumas alterações
 * para permitir o uso de tipagem equivalente à versão 8.2 do PHP além de melhorias percebidas
 * como necessárias.
 *
 * Para permitir aderencia à interface PSR foi criado o método "toPSR" que deve retornar um
 * objeto que não quebre a interface na qual esta foi baseada.
 *
 *
 * @package     AeonDigital\Interfaces\Stream
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
interface iStream
{



    /**
     * Este método retorna todo o conteúdo do ``Stream`` em uma string.
     * Para isso, primeiro o cursor é reposicionado no início do mesmo e então seu conteúdo é
     * retornado.
     *
     * Ao final do processo, se possível (conforme o modo no qual o arquivo está aberto) o cursor
     * será reposicionado onde estava imediatamente antes da execução deste método. Este
     * comportamento é próprio desta implementação.
     *
     * @see http://php.net/manual/en/language.oop5.magic.php#object.tostring
     *
     * @return string
     *
     * @codeCoverageIgnore
     */
    function __toString(): string;

    /**
     * Encerra o ``Stream``.
     *
     * @return void
     */
    function close(): void;

    /**
     * Encerra o uso do ``Stream`` atualmente carregado para esta instância.
     * Retorna o objeto ``Stream`` em sua condição atual ou ``null`` caso ele não esteja definido.
     *
     * @return ?resource
     */
    function detach();

    /**
     * Retorna o tamanho (em bytes) do ``Stream`` carregado ou ``null`` caso ele não exista ou se
     * não for possível determinar.
     *
     * @return ?int
     */
    function getSize(): ?int;

    /**
     * Retorna a posição atual do ponteiro.
     *
     * @return int
     *
     * @throws \RuntimeException
     */
    function tell(): int;

    /**
     * Retornará ``true`` caso o ponteiro do ``Stream`` esteja posicionado no final do arquivo.
     *
     * @return bool
     */
    function eof(): bool;

    /**
     * Retorna ``true`` se o ``Stream`` carregado é *pesquisável*.
     *
     * @return bool
     */
    function isSeekable(): bool;

    /**
     * Modifica a posição do cursor dentro do ``Stream`` conforme indicações ``offset`` e
     * ``whence``.
     *
     * Esta função tem funcionamento identico ao ``fseek`` do PHP.
     * Importante lembrar que conforme o modo de abertura do recurso (r ; rw; r+; a+ ...) esta
     * função pode não funcionar adequadamente.
     *
     * @link http://www.php.net/manual/en/function.fseek.php
     *
     * @param int $offset
     * Posição que será definida para o cursor.
     *
     * @param int $whence
     * Especifica a forma como a posição do cursor será calculado.
     * Valores válidos são ``SEEK_SET``, ``SEEK_CUR`` e ``SEEK_END``.
     *
     * @return void
     *
     * @throws \RuntimeException
     */
    function seek(int $offset, int $whence = SEEK_SET): void;

    /**
     * Posiciona o cursor do ``Stream`` no início do mesmo.
     * Se o ``Stream`` não for *pesquisável* então este método irá lançar uma exception.
     *
     * @see seek()
     *
     * @link http://www.php.net/manual/en/function.fseek.php
     *
     * @return void
     *
     * @throws \RuntimeException
     */
    function rewind(): void;

    /**
     * Retorna ``true`` se é possível escrever no ``Stream`` ou se ele está com seu modo de
     * escrita ativo.
     *
     * @return bool
     */
    function isWritable(): bool;

    /**
     * Escreve no ``Stream`` carregado.
     * Retorna o número de bytes escritos no ``Stream``.
     *
     * @param string $string
     * Dados que serão escritos.
     *
     * @return int
     *
     * @throws \RuntimeException
     */
    function write(string $string): int;

    /**
     * Retorna ``true`` se é possível ler o ``Stream`` ou se ele está com seu modo de
     * leitura ativo.
     *
     * @return bool
     */
    function isReadable(): bool;

    /**
     * Lê as informações do ``Stream`` carregado a partir da posição atual do cursor até onde
     * ``$length`` indicar.
     *
     * @param int $length
     * Tamanho da string que será retornada.
     *
     * @return string
     *
     * @throws \RuntimeException
     */
    function read(int $length): string;

    /**
     * A partir da posição atual do cursor, retorna o conteúdo do ``Stream`` em uma string.
     * Lança uma exception caso algum erro ocorra.
     *
     * @return string
     *
     * @throws \RuntimeException
     */
    function getContents(): string;

    /**
     * Retorna os metadados do stream como um array associativo ou o valor específico de
     * uma chave indicada.
     *
     * Os dados retornados são identicos aos que seriam pegos pela função do PHP
     * ``stream_get_meta_data``.
     *
     * @link http://php.net/manual/en/function.stream-get-meta-data.php
     *
     * @param ?string $key
     * Nome da chave de metadados que serão retornados.
     *
     * @return mixed
     * Retorna ``null`` se o stream principal não estiver definido.
     *
     * Retorna um array associativo com todos valores atualmente definidos quando
     * a chave não for passada, ou, se for passada como ``null`` ou se for passada
     * como um valor que não seja uma ``string``.
     *
     * Retorna o valor atual da chave se ela existir.
     *
     * Retorna ``null`` se a chave não for encontrada.
     */
    function getMetadata(?string $key = null): mixed;





    /**
     * Retorna uma instância deste mesmo objeto, porém, compatível com a interface
     * original ``Psr\Http\Message\StreamInterface``.
     */
    function toPSR(): StreamInterface;
}
