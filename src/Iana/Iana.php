<?php

declare(strict_types=1);

namespace AeonDigital\Iana;









/**
 * Classe ``wrapper`` para constantes desta namespace.
 *
 * - HTTPMethod
 * - HTTPStatusCode
 * - MimeExtension
 * - MimeType
 *
 * @package     AeonDigital\Iana
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
class Iana
{
    /**
     * Lista de métodos HTTP definidos pela Iana.
     *
     * Esta lista foi verificada a última vez em ``2022-11-23``.
     *
     * @see https://www.iana.org/assignments/http-methods/http-methods.xhtml
     */
    public const HTTPMethod = \AeonDigital\Iana\Const\HTTPMethod;

    /**
     * Lista de códigos de status HTTP definidos pela Iana.
     *
     * Esta lista foi verificada a última vez em ``2022-11-23``.
     *
     * @see http://www.iana.org/assignments/http-status-codes/http-status-codes.xhtml
     */
    public const HTTPStatusCode = \AeonDigital\Iana\Const\HTTPStatusCode;


    /**
     * Representa um array associativo que contém uma coleção de extenções
     * de arquivos comuns e seus respectivos mimetypes.
     *
     * A estrutura dos dados estará disposta da seguinte forma:
     * ```php
     *  MimeExtension = [
     *      // Cada extensão de arquivo compõe uma chave neste array
     *      // e, correlacionado à mesma, há um array unidimensional
     *      // que traz seus possíveis mimetypes.
     *      "extension" => []
     *  ];
     * ```
     *
     * Esta lista foi verificada a última vez em ``2022-11-23``.
     *
     * @see https://www.iana.org/assignments/media-types/media-types.xhtml
     * @see http://svn.apache.org/repos/asf/httpd/httpd/trunk/docs/conf/mime.types
     */
    public const MimeExtension = \AeonDigital\Iana\Const\MimeExtension;

    /**
     * Representa um array associativo que contém a coleção de mimetypes
     * reconhecidos pela IANA.
     *
     * A estrutura dos dados estará disposta da seguinte forma:
     * ```php
     *  MimeType = [
     *      // Nome individual de cada mime.
     *      // Cada nome aponta para um array unidimensional que traz as
     *      // extensões que são normalmente usadas por aquele tipo.
     *      "mimeTypeName" => []
     *  ];
     * ```
     *
     * Esta lista foi verificada a última vez em ``2022-11-23``.
     *
     * @see https://www.iana.org/assignments/media-types/media-types.xhtml
     * @see http://svn.apache.org/repos/asf/httpd/httpd/trunk/docs/conf/mime.types
     */
    public const MimeType = \AeonDigital\Iana\Const\MimeType;
}